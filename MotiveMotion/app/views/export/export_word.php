<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Word</title>
</head>
<body>
    <h1>Import Word File</h1>
    <form action="/MotiveMotion/import/word" method="post" enctype="multipart/form-data">
        <label for="file">Choose a Word file:</label>
        <input type="file" id="file" name="file" accept=".doc,.docx" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>