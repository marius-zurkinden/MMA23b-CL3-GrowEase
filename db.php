<?php
$host   = "growease.wildsphere-praktika-mma23.bbzwinf.ch";
$dbname = "growease_db";
$user   = "growease";
$pass   = "Z&o1crh2VcH*i7pt";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage());
}
?>
