<?php
// Kommentar: Startet den PHP-Bereich der Datei.
// Kommentar: Setzt den Titel der aktuellen Seite.
$pageTitle = 'GrowEase – Startseite';
// Kommentar: Speichert, welche Seite in der Navigation aktiv ist.
$activePage = 'home';
// Kommentar: Bindet eine andere PHP-Datei in diese Seite ein.
include 'includes/header.php';
// Kommentar: Beendet den PHP-Bereich und wechselt zurück zu HTML.
?>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="hero">
    <div class="hero-text fade-in">
        <p class="eyebrow">Promotion Website</p>
        <h1>Natürlich wachsen mit GrowEase</h1>
        <p>Entdecke Produkte und Dienstleistungen rund ums Gärtnern. Unser Online-Shop ist bald verfügbar.</p>
        <div class="hero-buttons">
            <a href="produkte.php" class="btn primary">Produkte ansehen</a>
            <a href="konto-erstellen.php" class="btn secondary">Konto erstellen</a>
        </div>
    </div>

    <div class="hero-card">
        <div class="slider" id="slider">
            <div class="slide active">🌸<span>Blumen-Sets für Zuhause</span></div>
            <div class="slide">🌿<span>Bio-Samen & Kräuter</span></div>
^            <div class="slide">🪴<span>Gartenhilfe einfach buchen</span></div>
        </div>
        <div class="slider-dots" id="sliderDots">
            <button class="active" data-slide="0"></button>
            <button data-slide="1"></button>
            <button data-slide="2"></button>
        </div>
    </div>
</section>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="section">
    <div class="section-title">
        <p class="eyebrow">Was wir anbieten</p>
        <h2>Alles für deinen grünen Alltag</h2>
    </div>

    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <div class="info-grid">
        <article class="info-card">
            <span>🌱</span>
            <h3>Produkte</h3>
            <p>Samen, Blumen-Kits und einfache Lösungen für Balkon, Garten und Fensterbank.</p>
        </article>
        <article class="info-card">
            <span>🧤</span>
            <h3>Dienstleistungen</h3>
            <p>Unterstützung bei Rasenpflege, Hecken schneiden oder Blumenbeeten.</p>
        </article>
        <article class="info-card">
            <span>🎮</span>
            <h3>Garten-Game</h3>
            <p>Ein kleines interaktives Spiel als Extra für die Promotion-Website.</p>
        </article>
    </div>
</section>

<!-- Kommentar: Startet den PHP-Bereich der Datei. -->
<?php include 'includes/footer.php'; ?>
