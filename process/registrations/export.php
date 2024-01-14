<?php

use Core\Database;
use PhpOffice\PhpSpreadsheet\IOFactory; 
use PhpOffice\PhpSpreadsheet\Spreadsheet; 

$db = new Database;
$spreadsheet = new Spreadsheet; 
$sheet = $spreadsheet->getActiveSheet(); 

$data = $db->all('registrations');

// Add headers 
$sheet->setCellValue('A1', 'ID Registrasi'); 
$sheet->setCellValue('B1', 'Nama'); 
$sheet->setCellValue('C1', 'No. WA'); 
$sheet->setCellValue('D1', 'Email'); 
$sheet->setCellValue('E1', 'PIN'); 
$sheet->setCellValue('F1', 'Status'); 
$sheet->setCellValue('G1', 'Kode Tagihan'); 

// Add data from the database 
$row = 2; 
foreach ($data as $registration) { 
    $sheet->setCellValue('A' . $row, $registration->id); 
    $sheet->setCellValue('B' . $row, $registration->name); 
    $sheet->setCellValue('C' . $row, $registration->phone); 
    $sheet->setCellValue('D' . $row, $registration->email); 
    $sheet->setCellValue('E' . $row, $registration->PIN); 
    $sheet->setCellValue('F' . $row, $registration->status); 
    $sheet->setCellValue('G' . $row, $registration->bill_code); 
    $row++; 
}

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx'); 
$writer->save('export-data-registrations.xlsx'); 

// Provide a download link 

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
header('Content-Disposition: attachment;filename="export-data-registrations.xlsx"'); 
header('Cache-Control: max-age=0'); 
readfile('export-data-registrations.xlsx'); 

exit;