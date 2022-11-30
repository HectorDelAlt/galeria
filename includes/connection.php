<?php 
$host = "db";
$user = "root";
$password = "test";
$db = "GALLERY2";

$dsn = "mysql:host=$host;dbname=$db";

try {
$link = new PDO($dsn, $user, $password);
} catch(PDOException $ex) {
    die("Error en la conexión. ".$ex->getMessage());
}
?>