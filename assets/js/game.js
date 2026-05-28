// Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
document.addEventListener("DOMContentLoaded", function () {
  // Erstellt eine konstante Variable.
  const game = document.getElementById("growGame");
  //  Erstellt eine konstante Variable.
  const player = document.getElementById("player");
  //   Erstellt eine konstante Variable.
  const obstacle = document.getElementById("obstacle");
  //   Erstellt eine konstante Variable.
  const scoreElement = document.getElementById("score");
  //   Erstellt eine konstante Variable.
  const levelElement = document.getElementById("level");
  //   Erstellt eine konstante Variable.
  const startOverlay = document.getElementById("startOverlay");
  //   Erstellt eine konstante Variable.
  const gameOverOverlay = document.getElementById("gameOverOverlay");
  //   Erstellt eine konstante Variable.
  const finalText = document.getElementById("finalText");
  //   Erstellt eine konstante Variable.
  const startBtn = document.getElementById("startBtn");
  //   Erstellt eine konstante Variable.
  const restartBtn = document.getElementById("restartBtn");

  //   Prüft eine Bedingung im JavaScript.
  if (!game || !player || !obstacle) return;

  //   Erstellt eine veränderbare Variable.
  let score = 0;
  //   Erstellt eine veränderbare Variable.
  let level = 1;
  //   Erstellt eine veränderbare Variable.
  let gameRunning = false;
  //   Erstellt eine veränderbare Variable.
  let scoreTimer;
  //   Erstellt eine veränderbare Variable.
  let collisionTimer;
  //   Erstellt eine veränderbare Variable.
  let speedTimer;
  //   Erstellt eine veränderbare Variable.
  let obstacleSpeed = 1.65;

  //   Startet eine JavaScript-Funktion.
  function startGame() {
    score = 0;
    level = 1;
    obstacleSpeed = 1.65;
    gameRunning = true;

    scoreElement.textContent = score;
    levelElement.textContent = level;
    startOverlay.classList.add("hidden");
    gameOverOverlay.classList.add("hidden");

    obstacle.classList.remove("run");
    void obstacle.offsetWidth;

    obstacle.classList.add("run");
    obstacle.style.animationDuration = obstacleSpeed + "s";

    clearInterval(scoreTimer);
    clearInterval(collisionTimer);
    clearInterval(speedTimer);

    //   Startet eine zeitgesteuerte Aktion.
    scoreTimer = setInterval(updateScore, 80);
    collisionTimer = setInterval(checkCollision, 20);
    speedTimer = setInterval(increaseSpeed, 5000);
  }

  function updateScore() {
    //   Prüft eine Bedingung im JavaScript.
    if (!gameRunning) return;
    //   Führt eine JavaScript-Anweisung aus.
    score++;
    scoreElement.textContent = score;
  }
  function increaseSpeed() {
    //   Prüft eine Bedingung im JavaScript.
    if (!gameRunning) return;
    level++;
    levelElement.textContent = level;
    obstacleSpeed = Math.max(0.85, obstacleSpeed - 0.12);
    obstacle.style.animationDuration = obstacleSpeed + "s";
  }

  function jump() {
    //   Prüft eine Bedingung im JavaScript.
    if (!gameRunning) return;
    if (player.classList.contains("jump")) return;

    player.classList.add("jump");
    setTimeout(function () {
      player.classList.remove("jump");
    }, 750);
  }

  function checkCollision() {
    if (!gameRunning) return;

    //   Erstellt eine konstante Variable.
    const playerBox = player.getBoundingClientRect();
    //   Erstellt eine konstante Variable.
    const obstacleBox = obstacle.getBoundingClientRect();

    //   Erstellt eine konstante Variable.
    const hit =
      playerBox.right > obstacleBox.left + 8 &&
      playerBox.left < obstacleBox.right - 8 &&
      playerBox.bottom > obstacleBox.top + 8 &&
      playerBox.top < obstacleBox.bottom - 8;

    if (hit) endGame();
  }

  function endGame() {
    gameRunning = false;
    clearInterval(scoreTimer);
    clearInterval(collisionTimer);
    clearInterval(speedTimer);

    obstacle.classList.remove("run");
    finalText.textContent =
      "Du hast " + score + " Punkte erreicht. Dein Garten braucht kurz Pflege.";
    gameOverOverlay.classList.remove("hidden");
  }

  //   Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
  startBtn.addEventListener("click", startGame);
  restartBtn.addEventListener("click", startGame);
  game.addEventListener("click", jump);

  document.addEventListener("keydown", function (event) {
    //   Prüft eine Bedingung im JavaScript.
    if (event.code === "Space") {
      //   Verhindert das normale Absenden des Formulars.
      event.preventDefault();
      jump();
    }
  });
});
