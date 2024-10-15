<?php

namespace Drupal\entity_pdf\Plugin;

use Drupal\Component\Plugin\PluginBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Base class for EntityPdfRenderingEngine plugins.
 */
abstract class EntityPdfRenderingEngineBase extends PluginBase implements EntityPdfRenderingEngineInterface {

  /**
   * @var ModuleHandlerInterface|null
   */
  protected $moduleHandler = null;

  /**
   * @var EntityPdfGenerator|null
   */
  protected $generator = null;

  /**
   * @return ModuleHandlerInterface
   */
  public function getModuleHandler() {
    if ($this->moduleHandler === null) {
      $this->moduleHandler = \Drupal::moduleHandler();
    }
    return $this->moduleHandler;
  }

  /**
   * @return EntityPdfGenerator
   */
  public function getGenerator() {
    if ($this->generator === null) {
      $this->generator = \Drupal::service('entity_pdf.generator');
    }
    return $this->generator;
  }

  /** @inheritDoc */
  public function getName() {
    return $this->getPluginDefinition()['label'];
  }

  /** @inheritDoc */
  public function getRenderingOptions() {
    $options = $this->getGenerator()->getConfig()->get('renderingEngineOptions.' . $this->getPluginId()) ?: [];
    foreach ($this->getConfigurableOptions() as $key => $default) {
      $options[$key] = $options[$key] ?? $default;
    }
    return $options;
  }

  /** @inheritDoc */
  public function getConfigurableOptions() {
    return [];
  }

  /** @inheritDoc */
  public function overrideSettingsForm(array &$form, FormStateInterface $form_state) {}

  /** @inheritDoc */
  public function overrideSettingsFormSubmit(array &$form, FormStateInterface $form_state) {}

}
