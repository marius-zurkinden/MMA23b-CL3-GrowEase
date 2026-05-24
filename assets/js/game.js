// Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
document.addEventListener("DOMContentLoaded", function () {
  // Kommentar: Erstellt eine konstante Variable.
  const game = document.getElementById("growGame");
  // Kommentar: Erstellt eine konstante Variable.
  const player = document.getElementById("player");
  // Kommentar: Erstellt eine konstante Variable.
  const obstacle = document.getElementById("obstacle");
  // Kommentar: Erstellt eine konstante Variable.
  const scoreElement = document.getElementById("score");
  // Kommentar: Erstellt eine konstante Variable.
  const levelElement = document.getElementById("level");
  // Kommentar: Erstellt eine konstante Variable.
  const startOverlay = document.getElementById("startOverlay");
  // Kommentar: Erstellt eine konstante Variable.
  const gameOverOverlay = document.getElementById("gameOverOverlay");
  // Kommentar: Erstellt eine konstante Variable.
  const finalText = document.getElementById("finalText");
  // Kommentar: Erstellt eine konstante Variable.
  const startBtn = document.getElementById("startBtn");
  // Kommentar: Erstellt eine konstante Variable.
  const restartBtn = document.getElementById("restartBtn");

  // Kommentar: Prüft eine Bedingung im JavaScript.
  if (!game || !player || !obstacle) return;

  // Kommentar: Erstellt eine veränderbare Variable.
  let score = 0;
  // Kommentar: Erstellt eine veränderbare Variable.
  let level = 1;
  // Kommentar: Erstellt eine veränderbare Variable.
  let gameRunning = false;
  // Kommentar: Erstellt eine veränderbare Variable.
  let scoreTimer;
  // Kommentar: Erstellt eine veränderbare Variable.
  let collisionTimer;
  // Kommentar: Erstellt eine veränderbare Variable.
  let speedTimer;
  // Kommentar: Erstellt eine veränderbare Variable.
  let obstacleSpeed = 1.65;

  // Kommentar: Startet eine JavaScript-Funktion.
  function startGame() {
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    score = 0;
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    level = 1;
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    obstacleSpeed = 1.65;
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    gameRunning = true;

    // Kommentar: Führt eine JavaScript-Anweisung aus.
    scoreElement.textContent = score;
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    levelElement.textContent = level;
    // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
    startOverlay.classList.add("hidden");
    // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
    gameOverOverlay.classList.add("hidden");

    // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
    obstacle.classList.remove("run");
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    void obstacle.offsetWidth;
    // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
    obstacle.classList.add("run");
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    obstacle.style.animationDuration = obstacleSpeed + "s";

    // Kommentar: Führt eine JavaScript-Anweisung aus.
    clearInterval(scoreTimer);
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    clearInterval(collisionTimer);
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    clearInterval(speedTimer);

    // Kommentar: Startet eine zeitgesteuerte Aktion.
    scoreTimer = setInterval(updateScore, 80);
    // Kommentar: Startet eine zeitgesteuerte Aktion.
    collisionTimer = setInterval(checkCollision, 20);
    // Kommentar: Startet eine zeitgesteuerte Aktion.
    speedTimer = setInterval(increaseSpeed, 5000);
  // Kommentar: Beendet den aktuellen JavaScript-Block.
  }

  // Kommentar: Startet eine JavaScript-Funktion.
  function updateScore() {
    // Kommentar: Prüft eine Bedingung im JavaScript.
    if (!gameRunning) return;
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    score++;
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    scoreElement.textContent = score;
  // Kommentar: Beendet den aktuellen JavaScript-Block.
  }

  // Kommentar: Startet eine JavaScript-Funktion.
  function increaseSpeed() {
    // Kommentar: Prüft eine Bedingung im JavaScript.
    if (!gameRunning) return;
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    level++;
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    levelElement.textContent = level;
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    obstacleSpeed = Math.max(0.85, obstacleSpeed - 0.12);
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    obstacle.style.animationDuration = obstacleSpeed + "s";
  // Kommentar: Beendet den aktuellen JavaScript-Block.
  }

  // Kommentar: Startet eine JavaScript-Funktion.
  function jump() {
    // Kommentar: Prüft eine Bedingung im JavaScript.
    if (!gameRunning) return;
    // Kommentar: Prüft eine Bedingung im JavaScript.
    if (player.classList.contains("jump")) return;

    // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
    player.classList.add("jump");
    // Kommentar: Startet eine zeitgesteuerte Aktion.
    setTimeout(function () {
      // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
      player.classList.remove("jump");
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    }, 750);
  // Kommentar: Beendet den aktuellen JavaScript-Block.
  }

  // Kommentar: Startet eine JavaScript-Funktion.
  function checkCollision() {
    // Kommentar: Prüft eine Bedingung im JavaScript.
    if (!gameRunning) return;

    // Kommentar: Erstellt eine konstante Variable.
    const playerBox = player.getBoundingClientRect();
    // Kommentar: Erstellt eine konstante Variable.
    const obstacleBox = obstacle.getBoundingClientRect();

    // Kommentar: Erstellt eine konstante Variable.
    const hit =
      // Kommentar: Führt eine JavaScript-Anweisung aus.
      playerBox.right > obstacleBox.left + 8 &&
      // Kommentar: Führt eine JavaScript-Anweisung aus.
      playerBox.left < obstacleBox.right - 8 &&
      // Kommentar: Führt eine JavaScript-Anweisung aus.
      playerBox.bottom > obstacleBox.top + 8 &&
      // Kommentar: Führt eine JavaScript-Anweisung aus.
      playerBox.top < obstacleBox.bottom - 8;

    // Kommentar: Prüft eine Bedingung im JavaScript.
    if (hit) endGame();
  // Kommentar: Beendet den aktuellen JavaScript-Block.
  }

  // Kommentar: Startet eine JavaScript-Funktion.
  function endGame() {
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    gameRunning = false;
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    clearInterval(scoreTimer);
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    clearInterval(collisionTimer);
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    clearInterval(speedTimer);

    // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
    obstacle.classList.remove("run");
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    finalText.textContent =
      // Kommentar: Führt eine JavaScript-Anweisung aus.
      "Du hast " + score + " Punkte erreicht. Dein Garten braucht kurz Pflege.";
    // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
    gameOverOverlay.classList.remove("hidden");
  // Kommentar: Beendet den aktuellen JavaScript-Block.
  }

  // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
  startBtn.addEventListener("click", startGame);
  // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
  restartBtn.addEventListener("click", startGame);
  // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
  game.addEventListener("click", jump);

  // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
  document.addEventListener("keydown", function (event) {
    // Kommentar: Prüft eine Bedingung im JavaScript.
    if (event.code === "Space") {
      // Kommentar: Verhindert das normale Absenden des Formulars.
      event.preventDefault();
      // Kommentar: Führt eine JavaScript-Anweisung aus.
      jump();
    // Kommentar: Beendet den aktuellen JavaScript-Block.
    }
  // Kommentar: Führt eine JavaScript-Anweisung aus.
  });
// Kommentar: Führt eine JavaScript-Anweisung aus.
});
