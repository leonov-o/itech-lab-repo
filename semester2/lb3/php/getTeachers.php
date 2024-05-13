<?php
include "db.php";
$sth = $dbh->prepare('SELECT * FROM teacher');
$sth->execute();
$teachers = $sth->fetchAll();

echo json_encode($teachers);
