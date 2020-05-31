<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PT PLN');
$pdf->SetTitle('Laporan Dana Penugasan');
$pdf->SetSubject('Laporan');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH.' 005');

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

// set some text for example
$this->session->userdata('result');
$title = '<h1>Laporan Dana Penugasan</h1>';

$pdf->WriteHTMLcell(0,0,'','',$title,0,1,0,true,'C',true);
$table = '<table style="border:1px solid #000; padding:6px;">';

$table.='<tr>
			<th style="border:1px solid #000;">No.</th>
			<th style="border:1px solid #000;">Nomor WBS</th>
			<th style="border:1px solid #000;">Nama Penugasan</th>
			<th style="border:1px solid #000;">Nilai Penugasan</th>
			<th style="border:1px solid #000;">Nilai Pengadaan</th>
			<th style="border:1px solid #000;">Nilai Persekot</th>
			<th style="border:1px solid #000;">Realisasi</th>
			<th style="border:1px solid #000;">Sisa Dana</th>
			<th style="border:1px solid #000;">Efisiensi</th>

		</tr>';
	$no = 1;
	$total = 0;
	$
foreach ($data as $row): {
		
	
$table.='<tr>
			<td style="border:1px solid #000;">'.$no++.'</td>
			<td style="border:1px solid #000;">'.$row['no_WBS']'</td>
			<td style="border:1px solid #000;">'.$row['nama_penugasan']'</td>
			<td style="border:1px solid #000;">'.$row['nilai_penugasan']'</td>
		</tr>';




$total+= $row->sub_total; 
}
endforeach;
$table.='<tr>
                 </tr>';
$table.='</table>';

$pdf->WriteHTMLcell(0,0,'','',$table,0,1,0,true,'C',true);

// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdf->Output('Laporan Dana Penugasan.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
