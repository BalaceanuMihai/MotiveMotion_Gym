<?php
// filepath: /c:/xampp/htdocs/MotiveMotion/app/controllers/ExportController.php
require_once "vendor/autoload.php";
require_once "app/models/User.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Color\Color;
use TCPDF as TCPDF;

class ExportController {
    public static function showExportExcel() {
        require_once "app/views/export/export_excel.php";
    }

    public static function showExportPDF() {
        require_once "app/views/export/export_pdf.php";
    }

    public static function showExportWord() {
        require_once "app/views/export/export_word.php";
    }

    public static function showExportQR() {
        require_once "app/views/export/export_qr_code.php";
    }

    public static function exportExcel() {
        $data = User::getAllUsers();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'First Name');
        $sheet->setCellValue('C1', 'Last Name');
        $sheet->setCellValue('D1', 'Email');
        $sheet->setCellValue('E1', 'Role ID');

        // Add data
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['id']);
            $sheet->setCellValue('B' . $row, $item['first_name']);
            $sheet->setCellValue('C' . $row, $item['last_name']);
            $sheet->setCellValue('D' . $row, $item['email']);
            $sheet->setCellValue('E' . $row, $item['role_id']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'export.xlsx';

        // Output the file to the browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        header('Expires: 0');
        header('Pragma: public');

        $writer->save('php://output');
        exit;
    }

    public static function exportPDF() {
        $data = User::getAllUsers();
        $pdf = new TCPDF();
        $pdf->AddPage();
        $html = '<h1>Export Data</h1><table border="1"><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Role ID</th></tr>';
        foreach ($data as $item) {
            $html .= '<tr><td>' . $item['id'] . '</td><td>' . $item['first_name'] . '</td><td>' . $item['last_name'] . '</td><td>'. $item['email'] . '</td><td>' . $item['role_id'] . '</td></tr>';
        }
        $html .= '</table>';
        $pdf->writeHTML($html);
        $pdf->Output('export.pdf', 'D');
    }

    public static function exportWord() {
        $data = User::getAllUsers();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $table = $section->addTable();

        // Set the header
        $table->addRow();
        $table->addCell(2000)->addText('ID');
        $table->addCell(2000)->addText('First Name');
        $table->addCell(2000)->addText('Last Name');
        $table->addCell(2000)->addText('Email');
        $table->addCell(2000)->addText('Role ID');

        // Add data
        foreach ($data as $item) {
            $table->addRow();
            $table->addCell(2000)->addText($item['id']);
            $table->addCell(2000)->addText($item['first_name']);
            $table->addCell(2000)->addText($item['last_name']);
            $table->addCell(2000)->addText($item['email']);
            $table->addCell(2000)->addText($item['role_id']);
        }

        $fileName = 'export.docx';
        $writer = WordIOFactory::createWriter($phpWord, 'Word2007');

        // Save the file to a temporary location
        $temp_file = tempnam(sys_get_temp_dir(), 'phpword');
        $writer->save($temp_file);

        // Output the file to the browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        header('Expires: 0');
        header('Pragma: public');

        readfile($temp_file);
        unlink($temp_file);
        exit;
    }

    public static function exportQR() {
        $data = User::getAllUsers();
        $pdf = new TCPDF();
        $pdf->AddPage();

        foreach ($data as $item) {
            $qrCode = new QrCode(
                json_encode($item),
                new Encoding('UTF-8'),
                ErrorCorrectionLevel::Low,
                150, // Set the size here
                10,
                RoundBlockSizeMode::Margin,
                new Color(0, 0, 0),
                new Color(255, 255, 255)
            );
            $writer = new PngWriter();
            $qrCodeImage = $writer->write($qrCode)->getString();

            $pdf->Image('@' . $qrCodeImage, '', '', 50, 50, 'PNG');
            $pdf->Ln(60); // Move to the next line
        }

        $pdf->Output('export_qr.pdf', 'D');
    }
}
?>