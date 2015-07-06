<?php

define('_MPDF_PATH','../');
include('../mpdf.php');
$mpdf=new mPDF();



$mpdf->WriteHTML('<html><head></head><body><p>Hallo World</p></body></html>');



$mpdf->Output;
exit;
?>
