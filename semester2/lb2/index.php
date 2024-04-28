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
<form action="getByCpu.php" method="POST">
    <label for="cpu">
        Введіть назву процесора:
        <input type="text" name="cpu" id="cpu">
        <input type="submit" value="Search">
    </label>
</form>
<br>
<form action="getBySoftware.php" method="POST">
    <label for="software">
        Оберіть програмне забезпечення:
        <select name="software" id="software">
            <option selected>Оберіть ПЗ</option>
            <?php
            require "./db.php";
            $distinctSoftware = $collection->distinct("software");
            foreach ($distinctSoftware as $software) {
                echo "<option>$software</option>";
            }
            ?>
        </select>
        <input type="submit" value="Search">
    </label>
</form>
<br>
<form action="getByWarranty.php" method="GET">
    <label for="warranty">
        Показати пристрої з вичерпаним гарантійним терміном:
        <input type="submit" value="Search">
    </label>
</form>
<br>
</body>
</html>

