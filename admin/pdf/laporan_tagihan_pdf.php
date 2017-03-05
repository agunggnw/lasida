<?php 

require_once 'dompdf/autoload.inc.php';

if (isset($_GET['stbyno'])) {
	include 'tagihan_stbyno.php';
}

if (condition) {
	# code...
}

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = ob_get_clean();

$dompdf->setPaper('A4', 'landscape');
$dompdf->loadHtml($html);
$dompdf->render();
ob_end_clean();
$dompdf->stream("codexworld",array("Attachment"=>0));
?>