<?php
// Kommentar: Startet den PHP-Bereich der Datei.
// Kommentar: Setzt den Titel der aktuellen Seite.
$pageTitle = 'GrowEase – Dienstleistungen';
// Kommentar: Speichert, welche Seite in der Navigation aktiv ist.
$activePage = 'dienstleistungen';

// Kommentar: Bindet eine andere PHP-Datei in diese Seite ein.
require_once 'db.php';

// Kommentar: Bereitet eine SQL-Abfrage sicher vor.
$stmt = $conn->prepare("SELECT id, Name, Preis, Beschreibung, Dauer FROM Dienstleistung ORDER BY id");
// Kommentar: Führt die vorbereitete SQL-Abfrage aus.
$stmt->execute();
// Kommentar: Holt alle gefundenen Datensätze als Array.
$dienstleistungen = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kommentar: Bindet eine andere PHP-Datei in diese Seite ein.
include 'includes/header.php';
// Kommentar: Beendet den PHP-Bereich und wechselt zurück zu HTML.
?>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="page-hero small">
    <p class="eyebrow">Service</p>
    <h1>Dienstleistungen</h1>
    <p>Praktische Gartenhilfe für Zuhause, Balkon und Terrasse.</p>
<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
</section>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="section">
    <div class="card-grid">
        <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
        <?php foreach ($dienstleistungen as $dienstleistung): ?>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <article class="service-card">
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <h3><?= htmlspecialchars($dienstleistung['Name']) ?></h3>
                <p class="service-description"><?= htmlspecialchars($dienstleistung['Beschreibung']) ?></p>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <div class="service-meta">
                    <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                    <span>CHF <?= htmlspecialchars($dienstleistung['Preis']) ?>.–</span>
                    <span><?= htmlspecialchars($dienstleistung['Dauer']) ?></span>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                </div>
            </article>
        <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
        <?php endforeach; ?>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </div>
</section>

<!-- Kommentar: Startet den PHP-Bereich der Datei. -->
<?php include 'includes/footer.php'; ?>
