<?php

include "./db.php";

$auditorium = $_GET["auditorium"];

if ($auditorium == "") {
    echo json_encode(["error" => "Bad request"]);
    exit;
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
echo json_encode($lessons);
