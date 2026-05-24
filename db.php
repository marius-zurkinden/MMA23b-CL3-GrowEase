<?php
// Kommentar: Startet den PHP-Bereich der Datei.
// Kommentar: Speichert einen Zugangswert für die Datenbankverbindung.
$host   = "growease.wildsphere-praktika-mma23.bbzwinf.ch";
// Kommentar: Speichert einen Zugangswert für die Datenbankverbindung.
$dbname = "growease_db";
// Kommentar: Speichert einen Zugangswert für die Datenbankverbindung.
$user   = "growease";
// Kommentar: Speichert einen Zugangswert für die Datenbankverbindung.
$pass   = "Z&o1crh2VcH*i7pt";

// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
try {
    // Kommentar: Speichert einen Zugangswert für die Datenbankverbindung.
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // Kommentar: Aktiviert Fehlermeldungen für die Datenbankverbindung.
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
} catch (PDOException $e) {
    // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
    die("Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage());
// Kommentar: Beendet den aktuellen Codeblock oder die Schleife.
}
// Kommentar: Beendet den PHP-Bereich und wechselt zurück zu HTML.
?>
