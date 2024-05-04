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

    $teacherID = $_POST["teacher"];

    if ($teacherID == "") {
        echo "Bad request";
    }

    $sth = $dbh->prepare('
    SELECT DISTINCT l.*, t.name FROM lesson AS l
    JOIN lesson_groups AS b ON l.ID_Lesson = b.FID_Lesson2
    JOIN lesson_teacher AS lt ON l.ID_Lesson = lt.FID_Lesson1
    JOIN teacher AS t ON lt.FID_Teacher = t.ID_Teacher
    WHERE lt.FID_Teacher = :teacherID;
');
    $sth->bindValue(':teacherID', $teacherID, PDO::PARAM_INT);
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
