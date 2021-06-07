<?php
 
class PdfGenerator
{
  public function generate($html,$filename, $paper = 'A4', $orientation = "portrait")
  { 
    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->set_paper($paper, $orientation);
    $dompdf->render();
    $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
  }
}