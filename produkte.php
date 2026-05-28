<?php
$pageTitle = 'GrowEase – Produkte';
//Speichert, welche Seite in der Navigation aktiv ist.
$activePage = 'produkte';

//Bindet eine andere PHP-Datei in diese Seite ein.
require_once 'db.php';

//Bereitet eine SQL-Abfrage sicher vor.
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
//Führt die vorbereitete SQL-Abfrage aus.
$stmt->execute();
//Holt alle gefundenen Datensätze als Array.
$produkte = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Bereitet eine SQL-Abfrage sicher vor.
$stmt = $conn->prepare("SELECT id, name FROM Kategorie ORDER BY name");
//Führt die vorbereitete SQL-Abfrage aus.
$stmt->execute();
//Holt alle gefundenen Datensätze als Array.
$kategorien = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Bindet eine andere PHP-Datei in diese Seite ein.
include 'includes/header.php';
//Beendet den PHP-Bereich und wechselt zurück zu HTML.
?>


<section class="page-hero small">
    <p class="eyebrow">Sortiment</p>
    <h1>Unsere Produkte</h1>
    <p>Entdecke unser Sortiment und filtere die Produkte nach Kategorie.</p>
</section>

<section class="section">
    <div class="filter-row" id="productFilter">
        <button class="filter-btn active" data-filter="Alle">Alle</button>
        <?php foreach ($kategorien as $kategorie): ?>
            <!-- Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
            <button class="filter-btn" data-filter="<?= htmlspecialchars($kategorie['name']) ?>">
                <!-- Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <?= htmlspecialchars($kategorie['name']) ?>
            </button>
        <?php endforeach; ?>
    </div>

    <div class="card-grid products">
        <?php foreach ($produkte as $produkt): ?>
            <!-- Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
            <article class="product-card" data-category="<?= htmlspecialchars($produkt['KategorieName']) ?>">
                <div class="product-img">
                    <?php if ($produkt['HatBild']): ?>
                        <!-- Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                        <img src="produkt-bild.php?id=<?= (int)$produkt['id'] ?>" alt="<?= htmlspecialchars($produkt['Name']) ?>" loading="lazy">
                    <?php else: ?>
                        <!-- Führt eine PHP-Anweisung für diese Seite aus. -->
                        🌿
                    <?php endif; ?>
                </div>
                <!-- Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <div class="tag"><?= htmlspecialchars($produkt['KategorieName'] ?? 'Ohne Kategorie') ?></div>
                <h3><?= htmlspecialchars($produkt['Name']) ?></h3>
                <p class="product-description"><?= htmlspecialchars($produkt['Beschreibung']) ?></p>
                <div class="product-meta">
                    <!-- Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                    <span><strong>Bestand:</strong> <?= htmlspecialchars($produkt['Bestand']) ?></span>
                    <strong class="product-price">CHF <?= number_format((float)$produkt['Preis'], 2, '.', '') ?></strong>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php include 'includes/footer.php'; ?>