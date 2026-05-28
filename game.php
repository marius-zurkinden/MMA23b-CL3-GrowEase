<?php

$pageTitle = 'GrowEase – Garten-Game';
// Speichert, welche Seite in der Navigation aktiv ist.
$activePage = 'game';
// Lädt zusätzliches CSS nur für diese Seite.
$extraCss = ['assets/css/game.css'];
// Lädt zusätzliches JavaScript nur für diese Seite.
$extraJs = ['assets/js/game.js'];
// Bindet eine andere PHP-Datei in diese Seite ein.
include 'includes/header.php';
?>

<section class="game-page">
    <div class="game-wrapper">
        <section class="game-header-card">
            <span>🌱 GrowEase Mini Game</span>
            <h1>Garden Runner</h1>
            <p>Springe mit deinem Blumentopf über die Schnecken und sammle so viele Punkte wie möglich.</p>
        </section>

        <section class="game-info">
            <div class="game-info-box">Punkte: <strong id="score">0</strong></div>
            <div class="game-info-box">Level: <strong id="level">1</strong></div>
        </section>

        <section id="growGame" class="grow-game" aria-label="GrowEase Garten-Game">
            <div class="cloud"></div>
            <div class="cloud two"></div>

            <div id="player" class="player-plant" aria-hidden="true">
                <div class="flower"></div>
                <div class="plant-stem"></div>
                <div class="leaf left"></div>
                <div class="leaf right"></div>
                <div class="pot"></div>
            </div>

            <div id="obstacle" class="snail" aria-hidden="true">
                <div class="snail-shell"></div>
                <div class="snail-body"></div>
                <div class="snail-eye">•</div>
            </div>

            <div id="startOverlay" class="game-overlay">
                <div class="game-overlay-card">
                    <h2>Bereit?</h2>
                    <p>Klicke auf Start und springe mit der Leertaste oder per Klick über die Schnecken.</p>
                    <button id="startBtn" class="game-button" type="button">Garten-Game starten</button>
                </div>
            </div>

            <div id="gameOverOverlay" class="game-overlay hidden">
                <div class="game-overlay-card">
                    <h2>Game Over</h2>
                    <p id="finalText">Dein Garten braucht kurz Pflege.</p>
                    <button id="restartBtn" class="game-button" type="button">Nochmal spielen</button>
                </div>
            </div>
        </section>

        <p class="game-controls">Steuerung: Leertaste drücken oder auf das Spielfeld klicken.</p>
    </div>
</section>

<!-- Startet den PHP-Bereich der Datei. -->
<?php include 'includes/footer.php'; ?>