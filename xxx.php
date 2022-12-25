<?php

// Include the Composer autoloader
require_once 'vendor/autoload.php';

// Create a new instance of the Spreadsheet class
$spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();

// Set the active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Get the active sheet and set its title
$activeSheet = $spreadsheet->getActiveSheet();
$activeSheet->setTitle('My Sheet');

// Add some data to the sheet
$activeSheet->setCellValue('A1', 'Name');
$activeSheet->setCellValue('B1', 'Email');
$activeSheet->setCellValue('A2', 'John Smith');
$activeSheet->setCellValue('B2', 'john@example.com');
$activeSheet->setCellValue('A3', 'Jane Doe');
$activeSheet->setCellValue('B3', 'jane@example.com');




// Create a new writer object
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

// Save the spreadsheet to a file
$writer->save('data.xlsx');

echo "Data written to Excel file successfully.";

