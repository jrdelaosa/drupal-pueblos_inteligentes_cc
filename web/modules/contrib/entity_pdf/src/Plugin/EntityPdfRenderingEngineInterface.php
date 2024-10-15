<?php

namespace Drupal\entity_pdf\Plugin;

use Drupal\Component\Plugin\PluginInspectionInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\BubbleableMetadata;

/**
 * Defines an interface for EntityPdfRenderingEngine plugins.
 */
interface EntityPdfRenderingEngineInterface extends PluginInspectionInterface {

  /**
   * Gets the EntityPdfRenderingEngine name.
   *
   * @return string
   *   Name of the EntityPdfRenderingEngine.
   */
  public function getName();

  /**
   * Return PDF content
   *
   * @see \Drupal\entity_pdf\Service\EntityPdfGenerator
   *
   * @param string $output (HTML string)
   * @param EntityInterface|null $entity
   * @param string|null $filename
   * @param string|null $langcode
   * @param \Drupal\Core\Render\BubbleableMetadata|null $bubbleableMetadata
   * @return string
   */
  public function generatePdf($output, $entity = null, $filename = null, $langcode = null, ?BubbleableMetadata $bubbleableMetadata = null);

  /**
   * Return configured options
   *
   * @return array
   */
  public function getRenderingOptions();

  /**
   * Return configurable options (with default values)
   *
   * @return array
   */
  public function getConfigurableOptions();

  /**
   * Override entity_pdf settings form
   *
   * @param array &$form
   * @param FormStateInterface $form_state
   * @return array
   */
  public function overrideSettingsForm(array &$form, FormStateInterface $form_state);

  /**
   * Override entity_pdf settings form
   *
   * @param array &$form
   * @param FormStateInterface $form_state
   * @return array
   */
  public function overrideSettingsFormSubmit(array &$form, FormStateInterface $form_state);

}
