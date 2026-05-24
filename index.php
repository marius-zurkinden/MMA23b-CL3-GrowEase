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
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <div class="hero-text fade-in">
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <p class="eyebrow">Promotion Website</p>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <h1>Natürlich wachsen mit GrowEase</h1>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <p>Entdecke Produkte und Dienstleistungen rund ums Gärtnern. Unser Online-Shop ist bald verfügbar.</p>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <div class="hero-buttons">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <a href="produkte.php" class="btn primary">Produkte ansehen</a>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <a href="konto-erstellen.php" class="btn secondary">Konto erstellen</a>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </div>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </div>

    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <div class="hero-card">
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <div class="slider" id="slider">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="slide active">🌸<span>Blumen-Sets für Zuhause</span></div>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="slide">🌿<span>Bio-Samen & Kräuter</span></div>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="slide">🪴<span>Gartenhilfe einfach buchen</span></div>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </div>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <div class="slider-dots" id="sliderDots">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <button class="active" data-slide="0"></button>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <button data-slide="1"></button>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <button data-slide="2"></button>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </div>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </div>
<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
</section>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="section">
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <div class="section-title">
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <p class="eyebrow">Was wir anbieten</p>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <h2>Alles für deinen grünen Alltag</h2>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </div>

    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <div class="info-grid">
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <article class="info-card">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <span>🌱</span>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <h3>Produkte</h3>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <p>Samen, Blumen-Kits und einfache Lösungen für Balkon, Garten und Fensterbank.</p>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </article>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <article class="info-card">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <span>🧤</span>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <h3>Dienstleistungen</h3>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <p>Unterstützung bei Rasenpflege, Hecken schneiden oder Blumenbeeten.</p>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </article>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <article class="info-card">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <span>🎮</span>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <h3>Garten-Game</h3>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <p>Ein kleines interaktives Spiel als Extra für die Promotion-Website.</p>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </article>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </div>
<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
</section>

<!-- Kommentar: Startet den PHP-Bereich der Datei. -->
<?php include 'includes/footer.php'; ?>
