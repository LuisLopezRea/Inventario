<?php

// Requiere PhpSpreadsheet instalado por Composer
require 'vendor/autoload.php';
include 'config.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$excel = new Spreadsheet();
$sheet = $excel->getActiveSheet();

// Encabezados
$headers = [
    'Inventory ID',
    'Brand',
    'Model',
    'Serial',
    'IP',
    'Location',
    'Observations'
];

// Escribir encabezados en la fila 1
$sheet->fromArray($headers, NULL, 'A1');

// Consultar datos
$row = 2;
$result = $conn->query("SELECT * FROM printers");

while ($x = $result->fetch_assoc()) {
    $sheet->fromArray([
        $x['inventory_id'],
        $x['brand'],
        $x['model'],
        $x['serial_number'],
        $x['ip_address'],
        $x['location'],
        $x['observations']
    ], NULL, 'A' . $row);

    $row++;
}

// Descargar archivo Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="printers.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($excel);
$writer->save('php://output');
exit;