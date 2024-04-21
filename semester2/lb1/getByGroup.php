<?php

include "./db.php";

$sth = $dbh->prepare('SELECT * FROM lesson JOIN lesson_groups ON lesson.ID_Lesson = lesson_groups.FID_Lesson2');
$sth->execute();
while ($row = $sth->fetch()) {
    echo "<p>".$row["disciple"]."</p>";
}