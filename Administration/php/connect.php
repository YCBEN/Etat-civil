<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$db_name = "etat_civil";
// Create connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
} catch (Throwable $e) {
    die('error cnx');
}


?>