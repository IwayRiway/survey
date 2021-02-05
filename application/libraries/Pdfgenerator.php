<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// panggil autoload dompdf nya
require_once 'dompdf-master/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
class Pdfgenerator {
    public function generate($html, $filename='', $stream=TRUE, $paper = '', $orientation = '')
    {   
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();

        $pdfroot  = dirname(dirname(dirname(__FILE__)));
        $pdfroot .= '/assets/report/';
      //   if ($stream) {
            $dompdf->stream($filename.".pdf", array("Attachment" => 0));
      //   } else {
         // $pdf_string =   $dompdf->output();
         // file_put_contents($pdfroot . $filename .'.pdf', $pdf_string );
      //   }
    }
}