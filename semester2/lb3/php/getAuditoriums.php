<?php
include "db.php";

$sth = $dbh->prepare('SELECT DISTINCT lesson.auditorium FROM lesson');
$sth->execute();
$lessons = $sth->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($lessons);

