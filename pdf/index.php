<?php
require('html2fpdf.php');
ob_start();

?>
<!DOCTYPE html>
<head>
<title>Laporan</title>
</head>
<body>
<table width="100%" class="table" border="1px">
    <thead>
        <tr>
            <td>No</td>
            <td>Nomor Pelanggan</td>
        </tr>
    </thead>
</table>


</body>
</html>
<?php
// Output-Buffer in variable:
$html=ob_get_contents();
ob_end_clean();
$pdf=new HTML2FPDF();
$pdf->AddPage();
$pdf->WriteHTML($html);
if (preg_match("/MSIE/i", $_SERVER["HTTP_USER_AGENT"])){
    header("Content-type: application/PDF");
} else {
    header("Content-type: application/PDF");
    header("Content-Type: application/pdf");
}
$pdf->Output("sample2.pdf","I");

?>