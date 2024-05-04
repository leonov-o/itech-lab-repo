<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Уніфікований інтерфейс PDO</title>
</head>
<body>
<form action="getByGroup.php" method="post">
    <label for="group">Group</label>
    <select name="group" id="group" >
        <option selected disabled>Select group</option>
        <?php
            include "db.php";
            $sth = $dbh->prepare('SELECT * FROM groups');
            $sth->execute();
            $groups = $sth->fetchAll();
            foreach ($groups as $group) {
                echo "<option value='{$group["ID_Groups"]}'>{$group["title"]}</option>";

            }
        ?>
    </select>
    <button type="submit">Search</button>
</form>
<form action="getByTeacher.php" method="post">
    <label for="teacher">Teacher</label>
    <select name="teacher" id="teacher" >
        <option selected disabled>Select teacher</option>
        <?php
        include "db.php";
        $sth = $dbh->prepare('SELECT * FROM teacher');
        $sth->execute();
        $teachers = $sth->fetchAll();
        foreach ($teachers as $teacher) {
            echo "<option value='{$teacher["ID_Teacher"]}'>{$teacher["name"]}</option>";

        }
        ?>
    </select>
    <button type="submit">Search</button>
</form>
<form action="getByAuditorium.php" method="post">
    <label for="auditorium">Auditorium</label>
    <select name="auditorium" id="auditorium" >
        <option selected disabled>Select auditorium</option>
        <?php
        include "db.php";
        $sth = $dbh->prepare('SELECT DISTINCT lesson.auditorium FROM lesson');
        $sth->execute();
        $lessons = $sth->fetchAll();
        foreach ($lessons as $lesson) {
            echo "<option value='{$lesson["auditorium"]}'>{$lesson["auditorium"]}</option>";

        }
        ?>
    </select>
    <button type="submit">Search</button>
</form>
</body>
</html>




