<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Нереляційна СУБД MongoDB і зберігання даних на стороні клієнта</title>
</head>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }
</style>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>CPU</th>
        <th>GPU</th>
        <th>RAM</th>
        <th>Memory</th>
        <th>Програмне забезпечення</th>
        <th>Рік покупки</th>
        <th>Гарантія</th>
    </tr>
    <?php
    require "./db.php";
    $searchQuery = $_POST["cpu"];
    $computers = $collection->find([
        'cpu' => new MongoDB\BSON\Regex($searchQuery)
    ]);
    $filtered = [];
    echo "<h2>Результати</h2>";
    foreach ($computers as $computer) {
            $filtered[] = $computer;
            $softwareArray = (array)$computer->software;
            $softwareString = implode(", ", $softwareArray);
            echo "<tr><td>$computer->inventoryId</td>";
            echo "<td>$computer->cpu</td>";
            echo "<td>$computer->gpu</td>";
            echo "<td>$computer->memory</td>";
            echo "<td>$computer->diskCapacity</td>";
            echo "<td>$softwareString</td>";
            echo "<td>$computer->purchaseYear</td>";
            echo "<td>$computer->warrantyPeriod</td></tr>";
    }
    echo '<script>';
    echo "let computersData = " . json_encode($filtered) . ";";
    echo "let prev = JSON.parse(localStorage.getItem('byCpu'));";
    echo "localStorage.setItem('byCpu', JSON.stringify([computersData]));";
    echo "if(prev) localStorage.setItem('byCpu', JSON.stringify([...prev, computersData]));";
    echo "</script>";
    ?>

</table>
<div id="recent">
    <h3>Попередні запити</h3>
    <script>
        const recentQueries = JSON.parse(localStorage.getItem('byCpu'));

        function createComputerTable(computers) {
            const computerTable = document.createElement('table');
            const headers = ["ID", "Рік покупки", "Гарантія", "CPU", "GPU", "RAM", "Memory", "Програмне забезпечення"];

            const trh = document.createElement("tr");
            for (let header of headers) {
                const th = document.createElement("th");
                th.innerText = header;
                trh.appendChild(th);
            }
            computerTable.appendChild(trh);

            computers.forEach((computer) => {
                const softwareString = computer.software.join(", ");
                const tr = document.createElement("tr");
                for (let key in computer) {
                    if (key === "_id") continue;
                    const td = document.createElement("td");
                    td.innerText = (key === "software") ? softwareString : computer[key];
                    tr.appendChild(td);
                }
                computerTable.appendChild(tr);
            });
            computerTable.style.margin = "10px";
            document.getElementById("recent").appendChild(computerTable);
        }

        if (recentQueries) {
            recentQueries.reverse().forEach((query) => {
                createComputerTable(query);
            });
        }
    </script>

</div>
</body>
</html>
