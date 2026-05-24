<?php
// Kommentar: Startet den PHP-Bereich der Datei.
// Kommentar: Setzt den Titel der aktuellen Seite.
$pageTitle = 'GrowEase – Garten-Game';
// Kommentar: Speichert, welche Seite in der Navigation aktiv ist.
$activePage = 'game';
// Kommentar: Lädt zusätzliches CSS nur für diese Seite.
$extraCss = ['assets/css/game.css'];
// Kommentar: Lädt zusätzliches JavaScript nur für diese Seite.
$extraJs = ['assets/js/game.js'];
// Kommentar: Bindet eine andere PHP-Datei in diese Seite ein.
include 'includes/header.php';
// Kommentar: Beendet den PHP-Bereich und wechselt zurück zu HTML.
?>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="game-page">
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <div class="game-wrapper">
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <section class="game-header-card">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <span>🌱 GrowEase Mini Game</span>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <h1>Garden Runner</h1>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <p>Springe mit deinem Blumentopf über die Schnecken und sammle so viele Punkte wie möglich.</p>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </section>

        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <section class="game-info">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="game-info-box">Punkte: <strong id="score">0</strong></div>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="game-info-box">Level: <strong id="level">1</strong></div>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </section>

        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <section id="growGame" class="grow-game" aria-label="GrowEase Garten-Game">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="cloud"></div>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="cloud two"></div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div id="player" class="player-plant" aria-hidden="true">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <div class="flower"></div>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <div class="plant-stem"></div>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <div class="leaf left"></div>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <div class="leaf right"></div>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <div class="pot"></div>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div id="obstacle" class="snail" aria-hidden="true">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <div class="snail-shell"></div>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <div class="snail-body"></div>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <div class="snail-eye">•</div>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div id="startOverlay" class="game-overlay">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <div class="game-overlay-card">
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                    <h2>Bereit?</h2>
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                    <p>Klicke auf Start und springe mit der Leertaste oder per Klick über die Schnecken.</p>
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                    <button id="startBtn" class="game-button" type="button">Garten-Game starten</button>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                </div>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div id="gameOverOverlay" class="game-overlay hidden">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <div class="game-overlay-card">
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                    <h2>Game Over</h2>
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                    <p id="finalText">Dein Garten braucht kurz Pflege.</p>
                    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                    <button id="restartBtn" class="game-button" type="button">Nochmal spielen</button>
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                </div>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </section>

        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <p class="game-controls">Steuerung: Leertaste drücken oder auf das Spielfeld klicken.</p>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </div>
<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
</section>

<!-- Kommentar: Startet den PHP-Bereich der Datei. -->
<?php include 'includes/footer.php'; ?>
