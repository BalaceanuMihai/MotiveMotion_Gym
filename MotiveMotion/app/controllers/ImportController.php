<?php
require_once "vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\IOFactory;
use Smalot\PdfParser\Parser;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;

class ImportController {
    public static function importExcel() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $filePath = $_FILES['file']['tmp_name'];
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $data = [];

            foreach ($sheet->getRowIterator() as $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                $rowData = [];
                foreach ($cellIterator as $cell) {
                    $rowData[] = $cell->getValue();
                }
                $data[] = $rowData;
            }

            echo '<pre>';
            print_r($data);
            echo '</pre>';
        } else {
            require_once "app/views/import/import_excel.php";
        }
    }

    public static function importPDF() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $filePath = $_FILES['file']['tmp_name'];
            $parser = new Parser();
            $pdf = $parser->parseFile($filePath);
            $text = $pdf->getText();

            echo '<pre>';
            echo $text;
            echo '</pre>';
        } else {
            require_once "app/views/import/import_pdf.php";
        }
    }

    public static function importWord() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $filePath = $_FILES['file']['tmp_name'];

            // Verificăm dacă fișierul a fost încărcat corect
            if (!file_exists($filePath)) {
                echo '<pre>';
                echo 'Eroare: Fișierul nu a fost încărcat corect.';
                echo '</pre>';
                return;
            }

            try {
                $phpWord = WordIOFactory::load($filePath);
                $data = [];

                // Metodă alternativă pentru a extrage textul
                foreach ($phpWord->getSections() as $section) {
                    foreach ($section->getElements() as $element) {
                        if (method_exists($element, 'getText')) {
                            $data[] = $element->getText();
                        } elseif (method_exists($element, 'getElements')) {
                            foreach ($element->getElements() as $subElement) {
                                if (method_exists($subElement, 'getText')) {
                                    $data[] = $subElement->getText();
                                }
                            }
                        } elseif (get_class($element) === 'PhpOffice\PhpWord\Element\Table') {
                            foreach ($element->getRows() as $row) {
                                foreach ($row->getCells() as $cell) {
                                    foreach ($cell->getElements() as $cellElement) {
                                        if (method_exists($cellElement, 'getText')) {
                                            $data[] = $cellElement->getText();
                                        }
                                    }
                                }
                            }
                        } else {
                            echo '<pre>';
                            echo 'Eroare: Elementul nu are metodele getText sau getElements. Tipul elementului: ' . get_class($element);
                            echo '</pre>';
                        }
                    }
                }

                // Verificăm dacă array-ul $data conține date
                if (empty($data)) {
                    echo '<pre>';
                    echo 'Eroare: Nu s-au găsit date în fișierul Word.';
                    echo '</pre>';
                } else {
                    echo '<pre>';
                    print_r($data);
                    echo '</pre>';
                }
            } catch (Exception $e) {
                echo '<pre>';
                echo 'Eroare la procesarea fișierului Word: ' . $e->getMessage();
                echo '</pre>';
            }
        } else {
            require_once "app/views/import/import_word.php";
        }
    }
}
?>