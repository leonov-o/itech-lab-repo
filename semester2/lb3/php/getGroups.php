<?php
include "db.php";
$sth = $dbh->prepare('SELECT * FROM groups');
$sth->execute();
$groups = $sth->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($groups);
