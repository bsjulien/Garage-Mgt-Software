
<?php
include("mpdf/mpdf.php");
$mpdf=new mPDF('P','A4'); 
$mpdf = new mPDF(); $stylesheet = file_get_contents('mpdf/pdf.css'); 
$mpdf->WriteHTML($stylesheet,1);
$mpdf->SetDisplayMode('fullpage');
//$mpdf->AddPage("L");

// LOAD a stylesheet
$stylesheet = file_get_contents('mpdf/mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$report_content=ob_get_contents();
ob_clean();

$mpdf->WriteHTML($report_content,2);
$mpdf->Output('REPORT.pdf','I');
exit;
?>