<?php
$pageTitle = 'GrowEase – Dienstleistungen';
// Speichert, welche Seite in der Navigation aktiv ist.
$activePage = 'dienstleistungen';

// Bindet eine andere PHP-Datei in diese Seite ein.
require_once 'db.php';

// Bereitet eine SQL-Abfrage sicher vor.
$stmt = $conn->prepare("SELECT id, Name, Preis, Beschreibung, Dauer FROM Dienstleistung ORDER BY id");
// Führt die vorbereitete SQL-Abfrage aus.
$stmt->execute();
// Holt alle gefundenen Datensätze als Array.
$dienstleistungen = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Bindet eine andere PHP-Datei in diese Seite ein.
include 'includes/header.php';
?>

<section class="page-hero small">
    <p class="eyebrow">Service</p>
    <h1>Dienstleistungen</h1>
    <p>Praktische Gartenhilfe für Zuhause, Balkon und Terrasse.</p>
</section>

<section class="section">
    <div class="card-grid">
        <?php foreach ($dienstleistungen as $dienstleistung): ?>
            <article class="service-card">
                <!-- Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <h3><?= htmlspecialchars($dienstleistung['Name']) ?></h3>
                <p class="service-description"><?= htmlspecialchars($dienstleistung['Beschreibung']) ?></p>
                <div class="service-meta">
                    <!-- Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                    <span>CHF <?= htmlspecialchars($dienstleistung['Preis']) ?>.–</span>
                    <span><?= htmlspecialchars($dienstleistung['Dauer']) ?></span>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>