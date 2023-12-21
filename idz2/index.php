<?php
$uploadDirectory = 'uploads/';


if (isset($_FILES['file'])) {
    $uploadedFile = $_FILES['file'];

    if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
        $fileName = pathinfo($uploadedFile['name'], PATHINFO_BASENAME);
        $fileType = pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);

        if ($fileType === "txt") {
            $destination = $uploadDirectory .  $fileName;
            move_uploaded_file($uploadedFile['tmp_name'], $destination);
        } else {
            echo 'Дозволені тільки файли з розширенням .txt';
        }
    } else {
        echo 'Помилка під час завантаження файлу.';
    }
}

// Отримання списку завантажених файлів
$uploadedFiles = glob($uploadDirectory . '*');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
<h2>Upload Files</h2>
<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button type="submit">Upload</button>
</form>

<h2>Uploaded Files</h2>
<ul>
    <?php foreach ($uploadedFiles as $file) : ?>
        <li><a href="view.php?file=<?php echo urlencode($file); ?>" target="_blank"><?php echo basename($file); ?></a></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
