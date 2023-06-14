<?php
class Pdf extends CI_Model
{
	function pdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
 
    function load_pdf($params=NULL)
    {
        include_once APPPATH.'/third_party/mpdf/mpdf.php';
		$margin_top = 20;
		$margin_right = '10';
        if ($params == NULL)
        {
			$params = '"en-GB-x","A4","","",10,'.$margin_right.','.$margin_top.',10,6,3'; // Defaults to portrait
        }
		elseif ($params == 'P')
        {
			$params = '"en-GB-x","A4","","",10,'.$margin_right.','.$margin_top.',10,6,3,"P"'; // Portrait
        }
		elseif ($params == 'L')
        {
			$params = '"en-GB-x","A4","","",10,'.$margin_right.','.$margin_top.',10,6,3,"L"'; // Landscape
        }
        return new mPDF($params);
    }
	function create_pdf($html,$arquivo,$header,$footer,$orientacao = NULL)
	{
		// As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
		$pdfFilePath = FCPATH."assets/downloads/$arquivo.pdf";
		
		ini_set('memory_limit','32M'); // boost the memory limit if it's low ;)
		$mpdf = $this->load_pdf($orientacao);
		$mpdf->setAutoTopMargin = 'stretch';
		$mpdf->SetHTMLHeader($header,'BLANK',true);
		//$mpdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure ;)
		$mpdf->WriteHTML($html); // write the HTML into the PDF
		$mpdf->Output($pdfFilePath, 'F'); // save to file because we can
		
		return $pdfFilePath;
	}
}
?>