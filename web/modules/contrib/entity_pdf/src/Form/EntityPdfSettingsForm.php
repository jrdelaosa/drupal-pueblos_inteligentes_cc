<?php

namespace Drupal\entity_pdf\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element;
use Drupal\entity_pdf\Plugin\EntityPdfRenderingEngineInterface;
use Drupal\entity_pdf\Service\EntityPdfGenerator;

class EntityPdfSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'entity_pdf_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'entity_pdf.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('entity_pdf.settings');

    $form['filename'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Filename for generated PDF documents.'),
      '#default_value' => $config->get('filename') ?: '[node:nid].pdf',
      '#description' => $this->t('You can use node tokens.'),
    ];

    $form['tempDir'] = [
      '#type' => 'textfield',
      '#title' => $this->t('tempDir: DRUPAL_ROOT/'),
      '#default_value' => $config->get('tempDir') ?: 'sites/default/files/entity_pdf',
      '#description' => $this->t('Do not include a leading slash.'),
    ];

    $form['openInBrowser'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Open in browser'),
      '#default_value' => $config->get('openInBrowser') ?: FALSE,
      '#description' => $this->t('Open in the browser instead of downloading. Can be reverted in specific cases by adding ?inline=1 to a pdf links'),
    ];

    /** @var EntityPdfGenerator */
    $generator = \Drupal::service('entity_pdf.generator');
    $engines = [];
    foreach ($generator->getRenderingEngines() as $engine) {
      /** @var EntityPdfRenderingEngineInterface $engine */
      $engines[$engine->getPluginId()] = $engine->getName();
    }
    $form['renderingEngine'] = [
      '#type' => 'select',
      '#title' => $this->t('Rendering Engine'),
      '#options' => $engines,
      '#default_value' => $config->get('renderingEngine') ?: $generator->getRenderingEngine()->getPluginId(),
      '#description' => $this->t('Select a pdf rendering engine. Modules could provide new rendering engines with EntityPdfRenderingEngine plugins.'),
    ];
    foreach ($generator->getRenderingEngines() as $engine) {
      /** @var EntityPdfRenderingEngineInterface $engine */
      $configurableRenderingOptions = $engine->getConfigurableOptions();
      if (!empty($configurableRenderingOptions)) {
        $form['renderingEngineOptions'] = $form['renderingEngineOptions'] ?? [
          '#type' => 'vertical_tabs',
          '#title' => $this->t('Settings'),
          '#tree' => true,
        ];
        $form['renderingEngineOptions'][$engine->getPluginId()] = [
          '#type' => 'details',
          '#title' => $this->t('Options for @pdf_rendering_engine', ['@pdf_rendering_engine' => $engine->getName()]),
          '#group' => 'renderingEngineOptions',
          '#tree' => true,
        ];
        $engine->overrideSettingsForm($form['renderingEngineOptions'][$engine->getPluginId()], $form_state);
        $renderingOptions = $engine->getRenderingOptions();
        foreach (Element::children($form['renderingEngineOptions'][$engine->getPluginId()]) as $key) {
          if (!isset($form['renderingEngineOptions'][$engine->getPluginId()][$key]['#default_value']) && isset($renderingOptions[$key])) {
            $form['renderingEngineOptions'][$engine->getPluginId()][$key]['#default_value'] = $renderingOptions[$key];
            $form['renderingEngineOptions'][$engine->getPluginId()][$key]['#description'] = $this->t('Defaults to: @value', ['@value' => $configurableRenderingOptions[$key]]);
          }
        }
      }
    }

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('entity_pdf.settings');
    $config->set('filename', $form_state->getValue('filename'));
    $config->set('tempDir', $form_state->getValue('tempDir'));
    $config->set('openInBrowser', $form_state->getValue('openInBrowser'));
    $config->set('renderingEngine', $form_state->getValue('renderingEngine'));

    /** @var EntityPdfGenerator */
    $generator = \Drupal::service('entity_pdf.generator');
    $renderingEngineOptions = [];
    foreach ($generator->getRenderingEngines() as $engine) {
      /** @var EntityPdfRenderingEngineInterface $engine */
      if (!empty($engine->getConfigurableOptions())) {
        $renderingEngineOptions[$engine->getPluginId()] = $form_state->getValue(['renderingEngineOptions', $engine->getPluginId()]);
        $engine->overrideSettingsFormSubmit($form['renderingEngineOptions'][$engine->getPluginId()], $form_state);
      }
    }
    $config->set('renderingEngineOptions', $renderingEngineOptions);

    $config->save();
    parent::submitForm($form, $form_state);
  }

}
