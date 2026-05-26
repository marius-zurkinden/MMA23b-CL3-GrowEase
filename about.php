<?php
// Kommentar: Startet den PHP-Bereich der Datei.
// Kommentar: Titel der aktuellen Seite.
$pageTitle = 'GrowEase – Über uns';
// Kommentar: Speichert, welche Seite in der Navigation aktiv ist.
$activePage = 'about';
// Kommentar: Bindet eine andere PHP-Datei in diese Seite ein.
include 'includes/header.php';
// Kommentar: Beendet den PHP-Bereich und wechselt zurück zu HTML.
?>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="about-hero">
    <div class="about-hero-text fade-in">
        <p class="eyebrow">Über GrowEase</p>
        <h1>Wir bringen mehr Grün in deinen Alltag.</h1>
        <p>GrowEase ist eine moderne Promotion-Website für einen kommenden Garten-Online-Shop. Wir zeigen Produkte, Dienstleistungen und Ideen, mit denen Gärtnern einfacher, schöner und zugänglicher wird.</p>
        <a href="produkte.php" class="btn primary">Produkte entdecken</a>
    </div>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <div class="about-hero-card fade-in">
        <span>🌿</span>
        <h3>Einfach starten</h3>
        <p>Ob Balkon, Garten oder Fensterbank: GrowEase soll helfen, schnell die passenden Produkte und Services zu finden.</p>
    </div>
</section>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="section">
    <div class="about-highlight">
        <div>
            <p class="eyebrow">Unsere Idee</p>
            <h2>Gärtnern soll nicht kompliziert sein.</h2>
        </div>
        <p>Wir möchten eine Website gestalten, die clean aussieht, einfach bedienbar ist und wichtige Informationen schnell zeigt. Produkte, Dienstleistungen und das Konto-Formular sind klar getrennt, damit sich Besucherinnen und Besucher sofort zurechtfinden.</p>
    </div>
</section>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="section">
    <div class="section-title">
        <p class="eyebrow">Was uns wichtig ist</p>
        <h2>GrowEase steht für</h2>
    </div>

    <div class="value-grid">
        <div class="value-card">
            <span>🌱</span>
            <h3>Einfachheit</h3>
            <p>Klare Inhalte, einfache Navigation und keine unnötigen Ablenkungen.</p>
        </div>
        <div class="value-card">
            <span>🪴</span>
            <h3>Natürlichkeit</h3>
            <p>Ein ruhiges Design mit Farben, die zu Pflanzen und Garten passen.</p>
        </div>
        <div class="value-card">
            <span>✨</span>
            <h3>Modernes UI</h3>
            <p>Produkte und Dienstleistungen werden übersichtlich und benutzerfreundlich dargestellt.</p>
        </div>
    </div>
</section>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="section">
    <div class="team-strip">
        <div>
            <p class="eyebrow">Projektteam</p>
            <h2>Erstellt von Alexandra, Leandra und Marius</h2>
            <p>Diese Website ist ein Schulprojekt und dient als Vorschau auf einen möglichen Online-Shop.</p>
        </div>
        <div class="team-badges">
            <span>Alexandra</span>
            <span>Leandra</span>
            <span>Marius</span>
        </div>
    </div>
</section>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="section about-cta">
    <p class="eyebrow">Bereit?</p>
    <h2>Erstelle dein Konto und bleib auf dem Laufenden.</h2>
    <p>So können Interessierte später einfacher kontaktiert werden, wenn der Shop weiterentwickelt wird.</p>
    <a href="konto-erstellen.php" class="btn primary">Konto erstellen</a>
</section>

<!-- Kommentar: Startet den PHP-Bereich der Datei. -->
<?php include 'includes/footer.php'; ?>
