<?php

if (isset($_GET['file'])) {
    $file = $_GET['file'];

    if (file_exists($file)) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'txt') {
            $fileContent = file_get_contents($file);
            echo nl2br(htmlspecialchars($fileContent));
        } else {
            echo 'Цей тип файлу не підтримується для перегляду.';
        }
    } else {
        echo 'Файл не знайдено.';
    }
} else {
    echo 'Неправильний запит.';
}

