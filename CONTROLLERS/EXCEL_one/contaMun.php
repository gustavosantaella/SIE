<?php 


 

/*require_once '../..\PHPExcel-1.8\Classes\PHPExcel.php';
*/
INCLUDE_ONCE("../../CONTROLLERS/modificar/contaMun.php");

INCLUDE_ONCE("../../VIEW/EXCEL_one/contaMun.php");

header("Pragma: ");
 header('Cache-control: ');
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header("Cache-Control: no-store, no-cache, must-revalidate");
 header("Cache-Control: post-check=0, pre-check=0", FALSE);
 header("Content-type: application/vnd.ms-excel");
 header("Content-disposition: attachment; filename=$estado.xls");

/*// Create new PHPExcel object
$objPHPExcel = new PHPExcel();


// Set document properties
$objPHPExcel->getProperties()->setCreator("Observatorio Nacional de Ciencia y Tecnología")
->setLastModifiedBy("")
->setTitle("Contagiados por municipios")
->setSubject("Office 2007 XLSX Test Document")
->setDescription("Contagiados por municipios")
->setKeywords("office 2007 openxml php")
->setCategory("COVID-19");



$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'ESTADO');

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', 'Municipio');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', 'Recuperados');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', 'Contagiados');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', 'Fallecidos')->getStyle('C2')->getFont()->setBold(true)
                                ->setName('Verdana')
                                ->setSize(10)
                                ->getColor()->setRGB('red');

$fila = 3;
while ($d = $listar->fetch()) {

	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila, $d['recuperados']);
$fila++;
}

// Miscellaneous glyphs, UTF-8

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Contagiados por municipios');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet



// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="COVID-19 por municipios.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;


*/

?>

