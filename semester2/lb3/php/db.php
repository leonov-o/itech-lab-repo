<?php

$username = "root";
$password = "";
$options = array(PDO::ATTR_PERSISTENT => true, PDO::
MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
try {
    $dbh = new PDO ("mysql:host=localhost; dbname=lb_pdo_lessons", $username, $password, $options);
//    echo "Connected to database<br>";
} catch (PDOException $e) {
//    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}

