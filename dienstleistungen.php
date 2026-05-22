<?php
$pageTitle = 'GrowEase – Dienstleistungen';
$activePage = 'dienstleistungen';

require_once 'db.php';

$stmt = $conn->prepare("SELECT id, Name, Preis, Beschreibung, Dauer FROM Dienstleistung ORDER BY id");
$stmt->execute();
$dienstleistungen = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                <h3><?= htmlspecialchars($dienstleistung['Name']) ?></h3>
                <p class="service-description"><?= htmlspecialchars($dienstleistung['Beschreibung']) ?></p>
                <div class="service-meta">
                    <span>CHF <?= htmlspecialchars($dienstleistung['Preis']) ?>.–</span>
                    <span><?= htmlspecialchars($dienstleistung['Dauer']) ?></span>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
