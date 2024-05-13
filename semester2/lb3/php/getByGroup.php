<?php
// server.php

include "./db.php";

$groupID = $_GET["group"];

if ($groupID == "") {
    echo json_encode(["error" => "Bad request"]);
    exit;
}

$sth = $dbh->prepare('
    SELECT DISTINCT l.*, t.name FROM lesson AS l
    JOIN lesson_groups AS b ON l.ID_Lesson = b.FID_Lesson2
    JOIN lesson_teacher AS lt ON l.ID_Lesson = lt.FID_Lesson1
    JOIN teacher AS t ON lt.FID_Teacher = t.ID_Teacher
    WHERE b.FID_Groups = :groupID;
');
$sth->bindValue(':groupID', $groupID, PDO::PARAM_INT);
$sth->execute();
$lessons = $sth->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($lessons);
