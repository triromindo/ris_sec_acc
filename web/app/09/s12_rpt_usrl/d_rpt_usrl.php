<?php

require '../../vendor/autoload.php';

//  Flexible colom
$arrExcelCol[1] = 'A';
$arrExcelCol[2] = 'B';
$arrExcelCol[3] = 'C';
$arrExcelCol[4] = 'D';
$arrExcelCol[5] = 'E';
$arrExcelCol[6] = 'F';
$arrExcelCol[7] = 'G';
$arrExcelCol[8] = 'H';
$arrExcelCol[9] = 'I';
$arrExcelCol[10] = 'J';
$arrExcelCol[11] = 'K';
$arrExcelCol[12] = 'L';
$arrExcelCol[13] = 'M';
$arrExcelCol[14] = 'N';
$arrExcelCol[15] = 'O';
$arrExcelCol[16] = 'P';
$arrExcelCol[17] = 'Q';
$arrExcelCol[18] = 'R';
$arrExcelCol[19] = 'S';
$arrExcelCol[20] = 'T';
$arrExcelCol[21] = 'U';
$arrExcelCol[22] = 'V';
$arrExcelCol[23] = 'W';
$arrExcelCol[24] = 'X';
$arrExcelCol[25] = 'Y';
$arrExcelCol[26] = 'Z';
$arrExcelCol[27] = 'AA';
$arrExcelCol[28] = 'AB';
$arrExcelCol[29] = 'AC';
$arrExcelCol[30] = 'AD';
$arrExcelCol[31] = 'AE';
$arrExcelCol[32] = 'AF';
$arrExcelCol[33] = 'AG';
$arrExcelCol[34] = 'AH';
$arrExcelCol[35] = 'AI';
$arrExcelCol[36] = 'AJ';
$arrExcelCol[37] = 'AK';
$arrExcelCol[38] = 'AL';
$arrExcelCol[39] = 'AM';
$arrExcelCol[40] = 'AN';
$arrExcelCol[41] = 'AO';
$arrExcelCol[42] = 'AP';
$arrExcelCol[43] = 'AQ';
$arrExcelCol[44] = 'AR';
$arrExcelCol[45] = 'AS';
$arrExcelCol[46] = 'AT';
$arrExcelCol[47] = 'AU';
$arrExcelCol[48] = 'AV';
$arrExcelCol[49] = 'AW';

//  Style
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

// Nama file
$EXCEL['filename'] = 'RIS_SEC_S12_' . date('Ymd_His') . '.xlsx';

// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Set document properties
$tmpCreator = 'RIS Sec Autogen';
$tmpModify = 'RIS Sec Autogen';
$tmpTitle = $EXCEL['title'];
$tmpSubject = $EXCEL['title'];
$tmpDesc = $EXCEL['title'] . ' - ' . $EXCEL['sub_title'];
$tmpKeyword = 'RIS Sec Report ' . $EXCEL['title'];
$tmpCategory = 'RIS Sec Report';

$spreadsheet->getProperties()->setCreator($tmpCreator)
        ->setLastModifiedBy($tmpModify)
        ->setTitle($tmpTitle)
        ->setSubject($tmpSubject)
        ->setDescription($tmpDesc)
        ->setKeywords($tmpKeyword)
        ->setCategory($tmpCategory);

$sharedStyle_title = new Style();
$sharedStyle_subtitle = new Style();
$sharedStyle_table_header_top = new Style();
$sharedStyle_table_header_1 = new Style();
$sharedStyle_table_header_2 = new Style();
$sharedStyle_table_header_3 = new Style();
$sharedStyle_table_header_4 = new Style();

$sharedStyle_title->applyFromArray(
        ['font' => [
                'bold' => true,
                'sise' => 16,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFffffff'],
            ],
        ]
);

$sharedStyle_subtitle->applyFromArray(
        ['font' => [
                'bold' => true,
                'sise' => 12,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFffffff'],
            ],
        ]
);

$sharedStyle_table_header_top->applyFromArray(
        ['font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFff9800'],
            ],
            'borders' => [
                'bottom' => ['borderStyle' => Border::BORDER_MEDIUM],
                'top' => ['borderStyle' => Border::BORDER_MEDIUM],
            ],
        ]
);

$sharedStyle_table_header_1->applyFromArray(
        ['font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFffc107'],
            ],
            'borders' => [
                'bottom' => ['borderStyle' => Border::BORDER_THIN],
                'top' => ['borderStyle' => Border::BORDER_THIN],
            ],
        ]
);

$sharedStyle_table_header_2->applyFromArray(
        ['font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFf0e68c'],
            ],
            'borders' => [
                'bottom' => ['borderStyle' => Border::BORDER_THIN],
                'top' => ['borderStyle' => Border::BORDER_THIN],
            ],
        ]
);

$sharedStyle_table_header_3->applyFromArray(
        ['font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFfdf5e6'],
            ],
            'borders' => [
                'bottom' => ['borderStyle' => Border::BORDER_THIN],
                'top' => ['borderStyle' => Border::BORDER_THIN],
            ],
        ]
);

$sharedStyle_table_header_4->applyFromArray(
        ['font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFff5722'],
            ],
            'borders' => [
                'bottom' => ['borderStyle' => Border::BORDER_THIN],
                'top' => ['borderStyle' => Border::BORDER_THIN],
            ],
        ]
);

// Start Awal
$varExcelRow = 1;

//  Title
$spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $varExcelRow, $EXCEL['title']);
$spreadsheet->setActiveSheetIndex(0)->duplicateStyle($sharedStyle_title, 'A' . $varExcelRow . ':G' . $varExcelRow);

//  Subtitle
$varExcelRow++;
$spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $varExcelRow, $EXCEL['sub_title']);
$spreadsheet->setActiveSheetIndex(0)->duplicateStyle($sharedStyle_subtitle, 'A' . $varExcelRow . ':G' . $varExcelRow);

//  Add Line
$varExcelRow++;
//$varExcelCol++;
// Header Table
$varExcelRow++;
$spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $varExcelRow, 'No')
        ->setCellValue('B' . $varExcelRow, 'Nama');

$varExcelCol = 3;
for ($i = 1; $i <= 31; $i++) {
    $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue($arrExcelCol[$varExcelCol] . $varExcelRow, $i);
    $varExcelCol++;
}

//$varExcelColTw=$varExcelCol;
$spreadsheet->setActiveSheetIndex(0)->setCellValue($arrExcelCol[$varExcelCol] . $varExcelRow, 'Total');
$varExcelCol++;

$varExcelColMax = $varExcelCol;
$spreadsheet->setActiveSheetIndex(0)->duplicateStyle($sharedStyle_table_header_top, 'A' . $varExcelRow . ':' . $arrExcelCol[$varExcelColMax] . $varExcelRow);

if (isset($PAGE['form']['table'])) {
    foreach ($PAGE['form']['table'] as $keyUser => $valUser) {
//                print_r($valItem);
//                exit();
        $varNumber++;
        $varExcelRow++;
        $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $varExcelRow, $varNumber)
                ->setCellValue('B' . $varExcelRow, $keyUser);

        $varExcelCol = 3;
        for ($i = 1; $i <= 31; $i++) {
            if (isset($PAGE['form']['table'][$keyUser][$i])) {
                $val = 'X';
            } else {
                $val = ' ';
            }
            $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue($arrExcelCol[$varExcelCol] . $varExcelRow, $val);
            $varExcelCol++;
        }
//            $varExcelCol++;
        $spreadsheet->setActiveSheetIndex(0)->setCellValue($arrExcelCol[$varExcelCol] . $varExcelRow, $PAGE['form']['table_count'][$keyUser]);
        $spreadsheet->getActiveSheet()->getStyle($arrExcelCol[$varExcelCol] . $varExcelRow)->getNumberFormat()->setFormatCode('#,##0;[Red]-#,##0');
        $varExcelCol++;
    }
} else {
    $varExcelRow++;
    $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A' . $varExcelRow, 'No Data');
}

//  Atur lebar kolom
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('S')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('T')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('U')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('V')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('W')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('X')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('Y')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('Z')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('AA')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('AB')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('AC')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('AD')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('AE')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('AF')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('AG')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('AH')->setWidth(7);


// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Report');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $EXCEL['filename'] . '"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;
?>