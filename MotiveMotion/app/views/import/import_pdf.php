<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import PDF</title>
</head>
<body>
    <h1>Import PDF</h1>
    <form action="/MotiveMotion/import/pdf" method="post" enctype="multipart/form-data">
        <label for="file">Import PDF:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Import</button>
    </form>
</body>
</html>