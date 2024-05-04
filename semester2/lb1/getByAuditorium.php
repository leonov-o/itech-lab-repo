<div class="">Results</div>
<table>
    <tr>
        <th>week_day</th>
        <th>lesson_number</th>
        <th>auditorium</th>
        <th>disciple</th>
        <th>name</th>
        <th>type</th>
    </tr>

    <?php

    include "./db.php";

    $auditorium = $_POST["auditorium"];

    if ($auditorium == "") {
        echo "Bad request";
    }

    $sth = $dbh->prepare('
    SELECT DISTINCT l.*, t.name FROM lesson AS l
    JOIN lesson_teacher AS lt ON l.ID_Lesson = lt.FID_Lesson1
    JOIN teacher AS t ON lt.FID_Teacher = t.ID_Teacher
    WHERE l.auditorium = :auditorium;
');
    $sth->bindValue(':auditorium', $auditorium, PDO::PARAM_INT);
    $sth->execute();
    $lessons = $sth->fetchAll();
    foreach ($lessons as $lesson) {
        echo "
        <tr>
        <td>{$lesson['week_day']}</td>
        <td>{$lesson['lesson_number']}</td>
        <td>{$lesson['auditorium']}</td>
        <td>{$lesson['disciple']}</td>
        <td>{$lesson['name']}</td>
        <td>{$lesson['type']}</td>
    </tr>
    ";
    }
    ?>

</table>
