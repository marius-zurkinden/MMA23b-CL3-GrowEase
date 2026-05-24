<?php
// Kommentar: Startet den PHP-Bereich der Datei.
// Kommentar: Setzt den Titel der aktuellen Seite.
if (!isset($pageTitle)) {
    // Kommentar: Setzt den Titel der aktuellen Seite.
    $pageTitle = 'GrowEase';
// Kommentar: Beendet den aktuellen Codeblock oder die Schleife.
}
// Kommentar: Speichert, welche Seite in der Navigation aktiv ist.
if (!isset($activePage)) {
    // Kommentar: Speichert, welche Seite in der Navigation aktiv ist.
    $activePage = '';
// Kommentar: Beendet den aktuellen Codeblock oder die Schleife.
}
// Kommentar: Beendet den PHP-Bereich und wechselt zurück zu HTML.
?>
<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<!doctype html>
<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<html lang="de">
<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<head>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <meta charset="UTF-8">
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Kommentar: Setzt den Titel der aktuellen Seite. -->
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <link rel="stylesheet" href="assets/css/common.css">

    <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
    <?php if (!empty($extraCss)) { ?>
        <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
        <?php foreach ($extraCss as $cssFile) { ?>
            <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
            <link rel="stylesheet" href="<?= htmlspecialchars($cssFile) ?>">
        <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
        <?php } ?>
    <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
    <?php } ?>
<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
</head>
<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<body>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <div class="game-bar">
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <a href="game.php">🌿 <span>Garten-Game</span> spielen</a>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </div>

    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <header class="site-header">
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <nav class="main-nav">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <a href="index.php" class="nav-logo" aria-label="GrowEase Startseite">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <img src="assets/images/logo.svg" alt="GrowEase Logo" class="nav-logo-img">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </a>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <ul class="nav-links">
                <!-- Kommentar: Speichert, welche Seite in der Navigation aktiv ist. -->
                <li><a href="index.php" class="<?= $activePage === 'home' ? 'active' : '' ?>">Home</a></li>
                <!-- Kommentar: Speichert, welche Seite in der Navigation aktiv ist. -->
                <li><a href="produkte.php" class="<?= $activePage === 'produkte' ? 'active' : '' ?>">Produkte</a></li>
                <!-- Kommentar: Speichert, welche Seite in der Navigation aktiv ist. -->
                <li><a href="dienstleistungen.php" class="<?= $activePage === 'dienstleistungen' ? 'active' : '' ?>">Dienstleistungen</a></li>
                <!-- Kommentar: Speichert, welche Seite in der Navigation aktiv ist. -->
                <li><a href="about.php" class="<?= $activePage === 'about' ? 'active' : '' ?>">Über uns</a></li>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </ul>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="nav-actions">
                <!-- Kommentar: Speichert, welche Seite in der Navigation aktiv ist. -->
                <a class="nav-icon-btn account-icon <?= $activePage === 'konto' ? 'active' : '' ?>" href="konto-erstellen.php" title="Konto erstellen" aria-label="Konto erstellen">
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                        <circle cx="12" cy="7" r="4"></circle>
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                    </svg>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                </a>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <button class="nav-hamburger" id="hamburgerBtn" aria-label="Menü öffnen" aria-controls="mobileMenu">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <span></span><span></span><span></span>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </button>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </nav>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </header>

    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <div class="mobile-menu" id="mobileMenu">
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <button class="mobile-menu-close" id="mobileClose" aria-label="Menü schliessen">✕</button>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <a href="index.php" class="mobile-logo" aria-label="GrowEase Startseite">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <img src="assets/images/logo.svg" alt="GrowEase Logo" class="mobile-logo-img">
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </a>
        <!-- Kommentar: Speichert, welche Seite in der Navigation aktiv ist. -->
        <a href="index.php" class="<?= $activePage === 'home' ? 'active' : '' ?>">Home</a>
        <!-- Kommentar: Speichert, welche Seite in der Navigation aktiv ist. -->
        <a href="produkte.php" class="<?= $activePage === 'produkte' ? 'active' : '' ?>">Produkte</a>
        <!-- Kommentar: Speichert, welche Seite in der Navigation aktiv ist. -->
        <a href="dienstleistungen.php" class="<?= $activePage === 'dienstleistungen' ? 'active' : '' ?>">Dienstleistungen</a>
        <!-- Kommentar: Speichert, welche Seite in der Navigation aktiv ist. -->
        <a href="about.php" class="<?= $activePage === 'about' ? 'active' : '' ?>">Über uns</a>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </div>

    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <main>
