<?php
$pageTitle = 'GrowEase – Garten-Game';
$activePage = 'game';
include 'includes/header.php';
?>

<section class="page-hero small">
    <p class="eyebrow">Mini Game</p>
    <h1>Garten-Game</h1>
    <p>Hier kommt später euer angepasstes T-Rex-Runner-Garten-Spiel hinein.</p>
</section>

<section class="section game-placeholder">
    <div class="game-box">
        <div class="game-ground">
            <span class="player">🧑‍🌾</span>
            <span class="obstacle">🌵</span>
        </div>
        <button class="btn primary" id="startGameBtn">Game starten</button>
        <p id="gameText">Das Spiel startet erst, wenn der Benutzer auf den Button klickt.</p>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
