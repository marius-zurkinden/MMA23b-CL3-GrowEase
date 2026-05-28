// Wartet, bis die ganze Webseite vollständig geladen ist
document.addEventListener("DOMContentLoaded", function () {
  // Speichert wichtige Elemente des Spiels
  const game = document.getElementById("growGame");
  const player = document.getElementById("player");
  const obstacle = document.getElementById("obstacle");
  const scoreElement = document.getElementById("score");
  const levelElement = document.getElementById("level");
  const startOverlay = document.getElementById("startOverlay");
  const gameOverOverlay = document.getElementById("gameOverOverlay");
  const finalText = document.getElementById("finalText");
  const startBtn = document.getElementById("startBtn");
  const restartBtn = document.getElementById("restartBtn");

  //   Prüft, ob wichtige Spiel-Elemente vorhanden sind
  if (!game || !player || !obstacle) return;

  //   Speichert Spielwerte und Status
  let score = 0;
  let level = 1;
  let gameRunning = false;
  //   Speichert die Zeitsteuerungen des Spiels

  let scoreTimer;
  let collisionTimer;
  let speedTimer;
  // Speichert die Geschwindigkeit des Hindernisses
  let obstacleSpeed = 1.65;

  //   Startet oder startet das Spiel neu
  function startGame() {
  //   Setzt die Werte zurück
    score = 0;
    level = 1;
    obstacleSpeed = 1.65;
    gameRunning = true;

  //   Aktualisiert die Anzeige von Punkten und Level
    scoreElement.textContent = score;
    levelElement.textContent = level;
  //   Blendet Start- und Game-Over-Fenster aus
    startOverlay.classList.add("hidden");
    gameOverOverlay.classList.add("hidden");

    // Setzt die Hindernis-Animation zurück
    obstacle.classList.remove("run");
    void obstacle.offsetWidth;

    // Startet die Hindernisbewegung erneut
    obstacle.classList.add("run");
    obstacle.style.animationDuration = obstacleSpeed + "s";

    // Stoppt alte Timer
    clearInterval(scoreTimer);
    clearInterval(collisionTimer);
    clearInterval(speedTimer);

    //   Startet neue Timer für Punkte, Kollisionen und Geschwindigkeit
    scoreTimer = setInterval(updateScore, 80);
    collisionTimer = setInterval(checkCollision, 20);
    speedTimer = setInterval(increaseSpeed, 5000);
  }

  // Aktualisiert die Punktzahl
  function updateScore() {
    //   Prüft, ob das Spiel läuft
    if (!gameRunning) return;
    //   Erhöht die Punktzahl
    score++;
    // Aktualisiert die Punkteanzeige
    scoreElement.textContent = score;
  }

  //Erhöht den Schwierigkeitsgrad des Spiels
  function increaseSpeed() {
    //   Prüft, ob das Spiel läuft
    if (!gameRunning) return;
    // Erhöht das Level
    level++;
    levelElement.textContent = level;
    // Macht das Hindernis schneller
    obstacleSpeed = Math.max(0.85, obstacleSpeed - 0.12);
    // Aktualisiert die Geschwindigkeit der Animation
    obstacle.style.animationDuration = obstacleSpeed + "s";
  }

  function jump() {
    //   Lässt die Spielfigur springen
    if (!gameRunning) return;
    // Verhindert Doppelsprünge
    if (player.classList.contains("jump")) return;

    //Fügt die Sprung-Klasse hinzu
    player.classList.add("jump");
    //Entfernt die Sprung-Klasse nach der Animation
    setTimeout(function () {
      player.classList.remove("jump");
    }, 750);
  }

  // Prüft, ob die Spielfigur ein Hindernis berührt
  function checkCollision() {
    // Prüft, ob das Spiel läuft
    if (!gameRunning) return;
    //   Holt die Position und Grösse der Spielfigur
    const playerBox = player.getBoundingClientRect();
    // Holt die Position und Grösse des Hindernisses
    const obstacleBox = obstacle.getBoundingClientRect();

    //   Prüft, ob sich die Elemente überschneiden
    const hit =
      playerBox.right > obstacleBox.left + 8 &&
      playerBox.left < obstacleBox.right - 8 &&
      playerBox.bottom > obstacleBox.top + 8 &&
      playerBox.top < obstacleBox.bottom - 8;

      // Beendet das Spiel bei einer Kollision
    if (hit) endGame();
  }

  // Beendet das Spiel
  function endGame() {
    // Stoppt das Spiel
    gameRunning = false;
    // Stoppt alle laufenden Timer
    clearInterval(scoreTimer);
    clearInterval(collisionTimer);
    clearInterval(speedTimer);

    // Stoppt die Hindernisbewegung
    obstacle.classList.remove("run");
    // Zeigt die erreichte Punktzahl an
    finalText.textContent =
      "Du hast " + score + " Punkte erreicht. Dein Garten braucht kurz Pflege.";
    // Blendet das Game-Over-Fenster ein
    gameOverOverlay.classList.remove("hidden");
  }

  //   Startet das Spiel beim Klick auf den Start-Button
  startBtn.addEventListener("click", startGame);
  // Startet das Spiel erneut beim Klick auf den Neustart-Button
  restartBtn.addEventListener("click", startGame);
  //Lässt die Spielfigur beim Klick auf das Spielfeld springen
  game.addEventListener("click", jump);

  // Reagiert auf Tastatureingaben
  document.addEventListener("keydown", function (event) {
    //   Prüft, ob die Leertaste gedrückt wurde
    if (event.code === "Space") {
      //   Verhindert das normale Verhalten der Leertaste
      event.preventDefault();
      // Lässt die Spielfigur springen
      jump();
    }
  });
});
