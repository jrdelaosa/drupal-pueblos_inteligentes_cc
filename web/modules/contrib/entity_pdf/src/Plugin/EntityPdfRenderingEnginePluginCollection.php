<?php

namespace Drupal\entity_pdf\Plugin;

use Drupal\Core\Plugin\DefaultLazyPluginCollection;
use Drupal\entity_pdf\Plugin\EntityPdfRenderingEngineInterface;

/**
 * Provides a collection of EntityPdfRenderingEngineInterface plugins.
 */
class EntityPdfRenderingEnginePluginCollection extends DefaultLazyPluginCollection {

  /**
   * {@inheritdoc}
   *
   * @return EntityPdfRenderingEngineInterface
   */
  public function &get($instance_id) {
    return parent::get($instance_id);
  }

}
