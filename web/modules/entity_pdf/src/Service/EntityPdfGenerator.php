<?php

namespace Drupal\entity_pdf\Service;

use Drupal\Core\Cache\CacheableDependencyInterface;
use Drupal\Core\Config\Config;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Render\BubbleableMetadata;
use Drupal\Core\Render\RenderContext;
use Drupal\Core\Render\RendererInterface;
use Drupal\entity_pdf\Plugin\EntityPdfRenderingEngineInterface;
use Drupal\entity_pdf\Plugin\EntityPdfRenderingEngineManager;
use Drupal\entity_pdf\Plugin\EntityPdfRenderingEnginePluginCollection;
use Drupal\file\FileRepositoryInterface;
use Drupal\token\Token;

class EntityPdfGenerator {

  /**
   * The File Repository service
   * @var \Drupal\file\FileRepositoryInterface
   */
  protected $fileRepository;

  /**
   * The File Repository service
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * The Entity type manager service
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The renderer service
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * The Token service
   * @var \Drupal\token\Token
   */
  protected $token;

  /**
   * The Config
   * @var Config
   */
  protected $config;

  /**
   * @var EntityPdfRenderingEngineInterface[]|null
   */
  protected $renderingEngines = null;

  /**
   * @var EntityPdfRenderingEngineInterface|null
   */
  protected $renderingEngine = null;

  /**
   * Construtor of EntityPdfGenerator service
   *
   * @param FileRepositoryInterface $file_repository
   * @param ModuleHandlerInterface $module_handler
   * @param EntityTypeManagerInterface $entity_type_manager
   * @param RendererInterface $renderer
   * @param Token $token
   */
  public function __construct(FileRepositoryInterface $file_repository, ModuleHandlerInterface $module_handler, EntityTypeManagerInterface $entity_type_manager, RendererInterface $renderer, Token $token) {
    $this->fileRepository = $file_repository;
    $this->entityTypeManager = $entity_type_manager;
    $this->renderer = $renderer;
    $this->moduleHandler = $module_handler;
    $this->token = $token;
    $this->config = \Drupal::config('entity_pdf.settings');
  }

  /**
   * Return config
   * @return void
   */
  public function getConfig() {
    return $this->config;
  }

  /**
   * Return configured filename for a specific entity
   *
   * @param EntityInterface $entity
   * @return string
   */
  public function getFilename(EntityInterface $entity, $langcode = null, ?BubbleableMetadata $bubbleableMetadata = null) {
    $filename = $this->config->get('filename');
    $this->moduleHandler->alter('entity_pdf_filename', $filename, $entity, $langcode);
    if ($bubbleableMetadata instanceof CacheableDependencyInterface) {
      $bubbleableMetadata->addCacheableDependency($this->config);
      $bubbleableMetadata->addCacheableDependency($entity);
      $bubbleableMetadata->addCacheContexts(['languages']);
    }
    return $this->token->replace($filename, [$entity->getEntityTypeId() => $entity], ['langcode' => $langcode], $bubbleableMetadata);
  }

  /**
   * Return configured temporary path
   * @return string
   */
  public function getTempDir() {
    return DRUPAL_ROOT . '/' . $this->config->get('tempDir');
  }

  /**
   * @return EntityPdfRenderingEngineInterface[]
   */
  public function getRenderingEngines(): array {
    if ($this->renderingEngines === null) {
      $this->renderingEngines = [];
      /** @var EntityPdfRenderingEngineManager */
      $pluginManager = \Drupal::service('plugin.manager.entity_pdf_rendering_engine');
      $definitions = $pluginManager->getDefinitions();
      $pluginCollection = new EntityPdfRenderingEnginePluginCollection($pluginManager, $definitions);
      foreach ($definitions as $plugin_id => $definition) {
        $plugin = $pluginCollection->get($plugin_id);
        if ($plugin instanceof EntityPdfRenderingEngineInterface) {
          $this->renderingEngines[$plugin->getPluginId()] = $plugin;
        }
      }
    }
    return $this->renderingEngines;
  }

  /**
   * @return EntityPdfRenderingEngineInterface
   */
  public function getRenderingEngine() {
    if ($this->renderingEngine === null) {
      $engines = $this->getRenderingEngines();
      $current = $this->config->get('renderingEngine');
      $this->renderingEngine = $engines[$current] ?? reset($engines);
    }
    return $this->renderingEngine;
  }

  /**
   * Render an entity with bubbleable metadata
   *
   * @param EntityInterface $entity
   * @param string $view_mode
   * @param string $langcode
   * @param BubbleableMetadata|null $bubbleableMetadata
   * @return string
   */
  public function renderEntity($entity, $view_mode = 'full', $langcode = null, ?BubbleableMetadata $bubbleableMetadata = null) {
    global $base_url;

    $context = new RenderContext();
    $renderer = $this->renderer;
    $entityTypeManager = $this->entityTypeManager;
    $output = $renderer->executeInRenderContext($context, function() use ($entityTypeManager, $renderer, $entity, $view_mode, $langcode, $base_url) {
      $content = $entityTypeManager
        ->getViewBuilder($entity->getEntityTypeId())
        ->view($entity, $view_mode);
      $content['#entity_type'] = $entity->getEntityTypeId();
      $content['#' . $content['#entity_type']] = $entity;

      $build = [
        '#theme' => 'htmlpdf',
        '#title' => $entity->label(),
        '#content' => $content,
        '#base_url' => $base_url,
        '#langcode' => $langcode,
      ];

      return $renderer->render($build);
    });
    // Handle any bubbled cacheability metadata.
    if ($bubbleableMetadata instanceof CacheableDependencyInterface) {
      if (!$context->isEmpty()) {
        $metadata = $context->pop();
        $bubbleableMetadata->merge($metadata);
      }
      $bubbleableMetadata->addCacheableDependency($entity);
      $bubbleableMetadata->addCacheContexts(['languages']);
    }

    return $output;
  }

  /**
   * Returns generated pdf
   *
   * @param string $output (HTML string)
   * @param EntityInterface|null $entity
   * @param string|null $filename
   * @param string|null $langcode
   * @param \Drupal\Core\Render\BubbleableMetadata|null $bubbleableMetadata
   * @return string
   */
  public function generatePdf($output, $entity = null, $filename = null, $langcode = null, ?BubbleableMetadata $bubbleableMetadata = null) {
    $filename = $filename ?: ($entity ? $this->getFilename($entity, $langcode, $bubbleableMetadata) : 'content.pdf');
    return $this->getRenderingEngine()->generatePdf($output, $entity, $filename, $langcode, $bubbleableMetadata);
  }

}
