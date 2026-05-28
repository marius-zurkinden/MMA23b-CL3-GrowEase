<?php
// Bindet eine andere PHP-Datei in diese Seite ein.
require_once 'db.php';

// Führt eine PHP-Anweisung für diese Seite aus.
$id = $_GET['id'] ?? 0;

// Bereitet eine SQL-Abfrage sicher vor.
$stmt = $conn->prepare("SELECT Bild FROM Produkt WHERE id = :id");
// Führt die vorbereitete SQL-Abfrage aus.
$stmt->execute([
    // Führt eine PHP-Anweisung für diese Seite aus.
    ':id' => $id
    // Führt eine PHP-Anweisung für diese Seite aus.
]);

// Holt einen einzelnen Datensatz aus dem Ergebnis.
$produkt = $stmt->fetch(PDO::FETCH_ASSOC);

// Prüft eine Bedingung und führt den folgenden Block nur dann aus.
if (!$produkt || empty($produkt['Bild'])) {
    // Führt eine PHP-Anweisung für diese Seite aus.
    http_response_code(404);
    // Führt eine PHP-Anweisung für diese Seite aus.
    exit;
    // Beendet den aktuellen Codeblock oder die Schleife.
}

// Setzt einen HTTP-Header für die Antwort.
header('Content-Type: image/png');
// Gibt Inhalt an den Browser aus.
echo $produkt['Bild'];
// Beendet den PHP-Bereich und wechselt zurück zu HTML.
