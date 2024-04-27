<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Нереляційна СУБД MongoDB і зберігання даних на стороні клієнта</title>
</head>
<body>
<form action="" method="POST">
    <label for="cpu">
        Введіть назву процесора:
        <input type="text" name="cpu" id="cpu">
        <input type="submit" value="Search">
    </label>
</form>
<br>
<form action="" method="POST">
    <label for="cpu">
        Оберіть програмне забезпечення:
        <select name="software" id="software">
            <?php

            ?>
        </select>
        <input type="submit" value="Search">
    </label>
</form>
<br>
<form action="db.php" method="GET">
    <label for="warranty">
        Показати пристрої з вичерпаним гарантійним терміном:
        <input type="submit" value="Search">
    </label>
</form>
<br>
</body>
</html>

