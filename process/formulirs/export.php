<?php

use Core\Database;
use PhpOffice\PhpSpreadsheet\IOFactory; 
use PhpOffice\PhpSpreadsheet\Spreadsheet; 

$db = new Database;
$spreadsheet = new Spreadsheet; 
$sheet = $spreadsheet->getActiveSheet(); 

$data = $db->all('formulirs');

// Add headers 
$sheet->setCellValue('A1', 'ID Formulir'); 
$sheet->setCellValue('B1', 'NIK'); 
$sheet->setCellValue('C1', 'Nama'); 
$sheet->setCellValue('D1', 'Nama Panggilan'); 
$sheet->setCellValue('E1', 'Jenis Kelamin'); 
$sheet->setCellValue('F1', 'Tempat / Tanggal Lahir'); 
$sheet->setCellValue('G1', 'Kelas'); 
$sheet->setCellValue('H1', 'Kabupaten / Kota'); 
$sheet->setCellValue('I1', 'Kecamatan'); 
$sheet->setCellValue('J1', 'Desa / Keluarahan'); 
$sheet->setCellValue('K1', 'Alamat Lengkap'); 
$sheet->setCellValue('L1', 'Nomor Rumah'); 
$sheet->setCellValue('M1', 'RT / RW'); 
$sheet->setCellValue('N1', 'NIK Ayah'); 
$sheet->setCellValue('O1', 'Nama Lengkap Ayah'); 
$sheet->setCellValue('P1', 'Tempat / Tanggal Lahir Ayah'); 
$sheet->setCellValue('Q1', 'No. HP Ayah'); 
$sheet->setCellValue('R1', 'Pekerjaan Ayah'); 
$sheet->setCellValue('S1', 'NIK Ibu'); 
$sheet->setCellValue('T1', 'Nama Lengkap Ibu'); 
$sheet->setCellValue('U1', 'Tempat / Tanggal Lahir Ibu'); 
$sheet->setCellValue('V1', 'No. HP Ibu'); 
$sheet->setCellValue('W1', 'Pekerjaan Ibu'); 

// Add data from the database 
$row = 2; 
foreach ($data as $formulir) { 
    $formulir->metadata = json_decode($formulir->metadata);
    $sheet->setCellValue('A' . $row, $formulir->id); 
    $sheet->setCellValue('B' . $row, $formulir->NIK); 
    $sheet->setCellValue('C' . $row, $formulir->name); 
    $sheet->setCellValue('D' . $row, $formulir->nickname); 
    $sheet->setCellValue('E' . $row, $formulir->gender); 
    $sheet->setCellValue('F' . $row, $formulir->birthplace . ' / ' . $formulir->birthdate); 
    $sheet->setCellValue('G' . $row, $formulir->metadata->studyclass); 
    $sheet->setCellValue('H' . $row, $formulir->district); 
    $sheet->setCellValue('I' . $row, $formulir->subdistrict); 
    $sheet->setCellValue('J' . $row, $formulir->village); 
    $sheet->setCellValue('K' . $row, $formulir->address); 
    $sheet->setCellValue('L' . $row, $formulir->metadata->house_number); 
    $sheet->setCellValue('M' . $row, $formulir->metadata->RT . ' / ' . $formulir->metadata->RW); 
    $sheet->setCellValue('N' . $row, $formulir->metadata->dad->NIK); 
    $sheet->setCellValue('O' . $row, $formulir->metadata->dad->name); 
    $sheet->setCellValue('P' . $row, $formulir->metadata->dad->birthplace . ' / ' . $formulir->metadata->dad->birthdate); 
    $sheet->setCellValue('Q' . $row, $formulir->metadata->dad->phone); 
    $sheet->setCellValue('R' . $row, $formulir->metadata->dad->job); 
    $sheet->setCellValue('S' . $row, $formulir->metadata->mom->NIK); 
    $sheet->setCellValue('T' . $row, $formulir->metadata->mom->name); 
    $sheet->setCellValue('U' . $row, $formulir->metadata->mom->birthplace . ' / ' . $formulir->metadata->mom->birthdate); 
    $sheet->setCellValue('V' . $row, $formulir->metadata->mom->phone); 
    $sheet->setCellValue('W' . $row, $formulir->metadata->mom->job); 
    $row++; 
}

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx'); 
$writer->save('export-data-formulir.xlsx'); 

// Provide a download link 

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
header('Content-Disposition: attachment;filename="export-data-formulir.xlsx"'); 
header('Cache-Control: max-age=0'); 
readfile('export-data-formulir.xlsx'); 

exit;