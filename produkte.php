<?php
$pageTitle = 'GrowEase – Produkte';
$activePage = 'produkte';

require_once 'db.php';

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
$stmt->execute();
$produkte = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT id, name FROM Kategorie ORDER BY name");
$stmt->execute();
$kategorien = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'includes/header.php';
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
            <button class="filter-btn" data-filter="<?= htmlspecialchars($kategorie['name']) ?>">
                <?= htmlspecialchars($kategorie['name']) ?>
            </button>
        <?php endforeach; ?>
    </div>

    <div class="card-grid products">
        <?php foreach ($produkte as $produkt): ?>
            <article class="product-card" data-category="<?= htmlspecialchars($produkt['KategorieName']) ?>">
                <div class="product-img">
                    <?php if ($produkt['HatBild']): ?>
                        <img src="produkt-bild.php?id=<?= (int)$produkt['id'] ?>" alt="<?= htmlspecialchars($produkt['Name']) ?>">
                    <?php else: ?>
                        🌿
                    <?php endif; ?>
                </div>
                <div class="tag"><?= htmlspecialchars($produkt['KategorieName'] ?? 'Ohne Kategorie') ?></div>
                <h3><?= htmlspecialchars($produkt['Name']) ?></h3>
                <p class="product-description"><?= htmlspecialchars($produkt['Beschreibung']) ?></p>
                <div class="product-meta">
                    <span><strong>Bestand:</strong> <?= htmlspecialchars($produkt['Bestand']) ?></span>
                    <strong class="product-price">CHF <?= number_format((float)$produkt['Preis'], 2, '.', '') ?></strong>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
