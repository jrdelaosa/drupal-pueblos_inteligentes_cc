<?php

namespace Drupal\entity_pdf\Plugin\EntityPdfRenderingEngine;

use Drupal\Core\Render\BubbleableMetadata;
use Drupal\entity_pdf\Plugin\EntityPdfRenderingEngineBase;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;

/**
 * Plugin definition for the MPDF Engine plugin.
 *
 * @EntityPdfRenderingEngine(
 *   id = "entity_pdf_engine_mpdf",
 *   label = @Translation("MPdf 8"),
 * )
 */
class RenderingEngineMpdf extends EntityPdfRenderingEngineBase {

  /** @inheritDoc */
  public function generatePdf($output, $entity = null, $filename = null, $langcode = null, ?BubbleableMetadata $bubbleableMetadata = null) {
    // Get mpdf's default config and allow other modules to alter it.
    $mpdf_config = [];
    $mpdf_config['tempDir'] = $this->getGenerator()->getTempDir();
    $defaultConfig = (new ConfigVariables())->getDefaults();
    $mpdf_config['fontDir'] = $defaultConfig['fontDir'];
    $defaultFontConfig = (new FontVariables())->getDefaults();
    $mpdf_config['fontdata'] = $defaultFontConfig['fontdata'];
    $mpdf_config['autoScriptToLang'] = TRUE;
    $mpdf_config['autoLangToFont'] = TRUE;
    $this->getModuleHandler()->alter('mpdf_config', $mpdf_config);

    // Build and return the pdf.
    $mpdf = new Mpdf($mpdf_config);
    $mpdf->autoScriptToLang = $mpdf_config['autoScriptToLang'];
    $mpdf->autoLangToFont = $mpdf_config['autoLangToFont'];
    $mpdf->SetBasePath(\Drupal::request()->getSchemeAndHttpHost());
    $mpdf->SetTitle($filename);
    $mpdf->WriteHTML($output);
    return $mpdf->Output($filename, Destination::STRING_RETURN);
  }

}
