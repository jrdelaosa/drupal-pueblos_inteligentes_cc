<?php

namespace Drupal\entity_pdf\Controller;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Cache\CacheableResponse;
use Drupal\Core\Entity\Controller\EntityViewController;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Render\BubbleableMetadata;
use Drupal\entity_pdf\Service\EntityPdfGenerator;
use Mpdf\Output\Destination;
use Symfony\Component\HttpFoundation\Response;

/**
 * Defines a controller to render a single entity.
 */
class PdfEntityController extends EntityViewController {

  /**
   * Public function view.
   */
  public function view(EntityInterface $entity, $view_mode = 'full', $langcode = NULL) {
    $bubbleableMetadata = new BubbleableMetadata();
    $bubbleableMetadata->addCacheContexts(['languages', 'url.query_args:inline']);

    $config = \Drupal::config('entity_pdf.settings');

    /** @var EntityPdfGenerator */
    $generator = \Drupal::service('entity_pdf.generator');

    // Get filename
    $filename = $generator->getFilename($entity, $langcode, $bubbleableMetadata);

    // Render HTML
    $output = $generator->renderEntity($entity, $view_mode, $langcode, $bubbleableMetadata);

    // Generate PDF content
    $content = $generator->generatePdf($output, $entity, $filename, $langcode, $bubbleableMetadata);

    // Decide if content is sent to browser or downloaded
    $openInBrowser = !!$config->get('openInBrowser');
    $contentDisposition = !!$openInBrowser || \Drupal::request()->query->get('inline') == 1 ? 'inline' : 'attachment';
    $headers = [
      'Content-Type' => 'application/pdf',
      'Content-disposition' => $contentDisposition . '; filename="' . $filename . '"',
    ];

    // Prepare response
    $response = new CacheableResponse($content, 200, $headers);
    $response->addCacheableDependency($bubbleableMetadata);

    return $response;
  }

  /**
   * Public function title.
   *
   * @inheritdoc
   */
  public function title(EntityInterface $entity) {
    return $entity->label();
  }

  /**
   * Checks access for a specific request.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   The entity object.
   * @param string $view_mode
   *   The view mode.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The access result.
   */
  public function access(AccountInterface $account, EntityInterface $entity, string $view_mode = 'full') {
    return AccessResult::allowedIf(
      $account->hasPermission('view entity pdf') ||
      $account->hasPermission('view ' . $entity->getEntityTypeId() . '.' . $entity->bundle() . '.' . $view_mode . ' pdf')
    );
  }

}
