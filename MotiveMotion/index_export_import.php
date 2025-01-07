<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import/Export Data</title>
</head>
<body>
    <h1>Import/Export Data</h1>
    <form action="import/import_excel.php" method="post" enctype="multipart/form-data">
        <label for="file">Import Excel:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Import</button>
    </form>
    <br>
    <form action="import/import_pdf.php" method="post" enctype="multipart/form-data">
        <label for="file">Import PDF:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Import</button>
    </form>
    <br>
    <form action="import/import_word.php" method="post" enctype="multipart/form-data">
        <label for="file">Import Word:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Import</button>
    </form>
    <br>
    <form action="export/export_excel.php" method="post">
        <button type="submit">Export Excel</button>
    </form>
    <br>
    <form action="export/export_pdf.php" method="post">
        <button type="submit">Export PDF</button>
    </form>
    <br>
    <form action="export/export_word.php" method="post">
        <button type="submit">Export Word</button>
    </form>
    <br>
    <form action="export/export_qr_code.php" method="post">
        <button type="submit">Export QR Code</button>
    </form>
</body>
</html>