document.addEventListener("DOMContentLoaded", function () {
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

    if (!game || !player || !obstacle) return;

    let score = 0;
    let level = 1;
    let gameRunning = false;
    let scoreTimer;
    let collisionTimer;
    let speedTimer;
    let obstacleSpeed = 1.65;

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

        scoreTimer = setInterval(updateScore, 80);
        collisionTimer = setInterval(checkCollision, 20);
        speedTimer = setInterval(increaseSpeed, 5000);
    }

    function updateScore() {
        if (!gameRunning) return;
        score++;
        scoreElement.textContent = score;
    }

    function increaseSpeed() {
        if (!gameRunning) return;
        level++;
        levelElement.textContent = level;
        obstacleSpeed = Math.max(0.85, obstacleSpeed - 0.12);
        obstacle.style.animationDuration = obstacleSpeed + "s";
    }

    function jump() {
        if (!gameRunning) return;
        if (player.classList.contains("jump")) return;

        player.classList.add("jump");
        setTimeout(function () {
            player.classList.remove("jump");
        }, 750);
    }

    function checkCollision() {
        if (!gameRunning) return;

        const playerBox = player.getBoundingClientRect();
        const obstacleBox = obstacle.getBoundingClientRect();

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
        finalText.textContent = "Du hast " + score + " Punkte erreicht. Dein Garten braucht kurz Pflege.";
        gameOverOverlay.classList.remove("hidden");
    }

    startBtn.addEventListener("click", startGame);
    restartBtn.addEventListener("click", startGame);
    game.addEventListener("click", jump);

    document.addEventListener("keydown", function (event) {
        if (event.code === "Space") {
            event.preventDefault();
            jump();
        }
    });
});
