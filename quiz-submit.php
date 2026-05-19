<?php
// quiz-submit.php
// Sehr einfache Backend-Validierung: Es muss nur eine gültige E-Mail-Adresse vorhanden sein.

header("Content-Type: application/json; charset=utf-8");

$email = trim($_POST["email"] ?? "");

if ($email === "") {
    echo json_encode([
        "success" => false,
        "message" => "Bitte gib deine E-Mail-Adresse ein."
    ]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        "success" => false,
        "message" => "Bitte gib eine gültige E-Mail-Adresse ein."
    ]);
    exit;
}

// Hier kann später gespeichert oder eine Bestätigungsmail versendet werden.

echo json_encode([
    "success" => true,
    "message" => "Quiz erfolgreich abgeschlossen!"
]);
exit;
?>
