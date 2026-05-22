<?php
if (!isset($pageTitle)) {
    $pageTitle = 'GrowEase';
}
if (!isset($activePage)) {
    $activePage = '';
}
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="assets/css/common.css">
    <?php if (!empty($extraCss)) { ?>
        <?php foreach ($extraCss as $cssFile) { ?>
            <link rel="stylesheet" href="<?= htmlspecialchars($cssFile) ?>">
        <?php } ?>
    <?php } ?>
</head>
<body>
    <div class="game-bar">
        <a href="game.php">🌿 <span>Garten-Game</span> spielen</a>
    </div>

    <header class="site-header">
        <nav class="main-nav">
            <a href="index.php" class="nav-logo" aria-label="GrowEase Startseite">
                <span class="nav-logo-icon">🌱</span>
                <span class="nav-logo-text">GrowEase</span>
            </a>

            <ul class="nav-links">
                <li><a href="index.php" class="<?= $activePage === 'home' ? 'active' : '' ?>">Home</a></li>
                <li><a href="produkte.php" class="<?= $activePage === 'produkte' ? 'active' : '' ?>">Produkte</a></li>
                <li><a href="dienstleistungen.php" class="<?= $activePage === 'dienstleistungen' ? 'active' : '' ?>">Dienstleistungen</a></li>
                <li><a href="about.php" class="<?= $activePage === 'about' ? 'active' : '' ?>">Über uns</a></li>
            </ul>

            <div class="nav-actions">
                <a class="nav-icon-btn account-icon <?= $activePage === 'konto' ? 'active' : '' ?>" href="konto-erstellen.php" title="Konto erstellen" aria-label="Konto erstellen">
                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>
            </div>

            <button class="nav-hamburger" id="hamburgerBtn" aria-label="Menü öffnen" aria-controls="mobileMenu">
                <span></span><span></span><span></span>
            </button>
        </nav>
    </header>

    <div class="mobile-menu" id="mobileMenu">
        <button class="mobile-menu-close" id="mobileClose" aria-label="Menü schliessen">✕</button>
        <a href="index.php" class="mobile-logo">
            <span>🌱</span>
            <strong>GrowEase</strong>
        </a>
        <a href="index.php" class="<?= $activePage === 'home' ? 'active' : '' ?>">Home</a>
        <a href="produkte.php" class="<?= $activePage === 'produkte' ? 'active' : '' ?>">Produkte</a>
        <a href="dienstleistungen.php" class="<?= $activePage === 'dienstleistungen' ? 'active' : '' ?>">Dienstleistungen</a>
        <a href="about.php" class="<?= $activePage === 'about' ? 'active' : '' ?>">Über uns</a>
    </div>

    <main>
