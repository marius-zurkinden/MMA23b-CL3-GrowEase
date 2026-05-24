<?php
// Kommentar: Startet den PHP-Bereich der Datei.
// Kommentar: Bindet eine andere PHP-Datei in diese Seite ein.
require_once 'db.php';

// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
$id = $_GET['id'] ?? 0;

// Kommentar: Bereitet eine SQL-Abfrage sicher vor.
$stmt = $conn->prepare("SELECT Bild FROM Produkt WHERE id = :id");
// Kommentar: Führt die vorbereitete SQL-Abfrage aus.
$stmt->execute([
    // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
    ':id' => $id
// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
]);

// Kommentar: Holt einen einzelnen Datensatz aus dem Ergebnis.
$produkt = $stmt->fetch(PDO::FETCH_ASSOC);

// Kommentar: Prüft eine Bedingung und führt den folgenden Block nur dann aus.
if (!$produkt || empty($produkt['Bild'])) {
    // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
    http_response_code(404);
    // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
    exit;
// Kommentar: Beendet den aktuellen Codeblock oder die Schleife.
}

// Kommentar: Setzt einen HTTP-Header für die Antwort.
header('Content-Type: image/png');
// Kommentar: Gibt Inhalt an den Browser aus.
echo $produkt['Bild'];
// Kommentar: Beendet den PHP-Bereich und wechselt zurück zu HTML.
?>
