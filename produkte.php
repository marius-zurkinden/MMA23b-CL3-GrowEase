<?php
// Kommentar: Startet den PHP-Bereich der Datei.
// Kommentar: Setzt den Titel der aktuellen Seite.
$pageTitle = 'GrowEase – Produkte';
// Kommentar: Speichert, welche Seite in der Navigation aktiv ist.
$activePage = 'produkte';

// Kommentar: Bindet eine andere PHP-Datei in diese Seite ein.
require_once 'db.php';

// Kommentar: Bereitet eine SQL-Abfrage sicher vor.
$stmt = $conn->prepare("
    SELECT
        Produkt.id,
        Produkt.Name,
        Produkt.Preis,
        Produkt.Beschreibung,
        Produkt.Bestand,
        Produkt.KategorieID,
        Kategorie.name AS KategorieName,
        Produkt.Bild IS NOT NULL AS HatBild
    FROM Produkt
    LEFT JOIN Kategorie ON Produkt.KategorieID = Kategorie.id
    ORDER BY Produkt.id
");
// Kommentar: Führt die vorbereitete SQL-Abfrage aus.
$stmt->execute();
// Kommentar: Holt alle gefundenen Datensätze als Array.
$produkte = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kommentar: Bereitet eine SQL-Abfrage sicher vor.
$stmt = $conn->prepare("SELECT id, name FROM Kategorie ORDER BY name");
// Kommentar: Führt die vorbereitete SQL-Abfrage aus.
$stmt->execute();
// Kommentar: Holt alle gefundenen Datensätze als Array.
$kategorien = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kommentar: Bindet eine andere PHP-Datei in diese Seite ein.
include 'includes/header.php';
// Kommentar: Beendet den PHP-Bereich und wechselt zurück zu HTML.
?>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="page-hero small">
    <p class="eyebrow">Sortiment</p>
    <h1>Unsere Produkte</h1>
    <p>Entdecke unser Sortiment und filtere die Produkte nach Kategorie.</p>
</section>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="section">
    <div class="filter-row" id="productFilter">
        <button class="filter-btn active" data-filter="Alle">Alle</button>
        <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
        <?php foreach ($kategorien as $kategorie): ?>
            <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
            <button class="filter-btn" data-filter="<?= htmlspecialchars($kategorie['name']) ?>">
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <?= htmlspecialchars($kategorie['name']) ?>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </button>
        <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
        <?php endforeach; ?>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </div>

    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <div class="card-grid products">
        <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
        <?php foreach ($produkte as $produkt): ?>
            <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
            <article class="product-card" data-category="<?= htmlspecialchars($produkt['KategorieName']) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <div class="product-img">
                    <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
                    <?php if ($produkt['HatBild']): ?>
                        <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                        <img src="produkt-bild.php?id=<?= (int)$produkt['id'] ?>" alt="<?= htmlspecialchars($produkt['Name']) ?>" loading="lazy">
                    <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
                    <?php else: ?>
                        <!-- Kommentar: Führt eine PHP-Anweisung für diese Seite aus. -->
                        🌿
                    <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
                    <?php endif; ?>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                </div>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <div class="tag"><?= htmlspecialchars($produkt['KategorieName'] ?? 'Ohne Kategorie') ?></div>
                <h3><?= htmlspecialchars($produkt['Name']) ?></h3>
                <p class="product-description"><?= htmlspecialchars($produkt['Beschreibung']) ?></p>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <div class="product-meta">
                    <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                    <span><strong>Bestand:</strong> <?= htmlspecialchars($produkt['Bestand']) ?></span>
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                    <strong class="product-price">CHF <?= number_format((float)$produkt['Preis'], 2, '.', '') ?></strong>
                </div>
            </article>
        <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
        <?php endforeach; ?>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </div>
</section>

<!-- Kommentar: Startet den PHP-Bereich der Datei. -->
<?php include 'includes/footer.php'; ?>
