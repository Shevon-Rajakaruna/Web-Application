<?php
	include 'conn.php';
	$pd = "SELECT * FROM purchas";

	$record = mysqli_query($conn,$pd);

	 require("fpdf181/fpdf.php");
	 $pdf = new FPDf('p','mm','A4'); 
	 $pdf->AddPage();
	 $pdf->SetFont('Arial', 'B', 14);
	 $pdf->cell(20, 10, "number", 1, 0,'C');
	 $pdf->cell(30, 10, "PurchaseId", 1, 0,'C');
	 $pdf->cell(50, 10, "Customer", 1, 0,'C');
	 $pdf->cell(40, 10, "Amount", 1, 0,'C');
	 $pdf->cell(30, 10, "Type", 1, 0,'C');
	 $pdf->cell(30, 10, "Date", 1, 0,'C');

	 $pdf->SetFont('Arial', '', 14);
	 while ($row = mysqli_fetch_array($record)) {
	 	$pdf->cell(20, 10, $row['num'], 1, 0, 'C');
	 	$pdf->cell(30, 10, $row['PurchaseId'], 1, 0, 'C');
	 	$pdf->cell(50, 10, $row['cust'], 1, 0, 'C');
	 	$pdf->cell(40, 10, $row['Amount'], 1, 0, 'C');
	 	$pdf->cell(30, 10, $row['purchaset'], 1, 0, 'C');
	 	$pdf->cell(30, 10, $row['Date'], 1, 1, 'C');
	 }
	 $pdf->OutPut();

 ?>
