<?php
// kunden-submit.php
// Backend-Validierung für das Kontoformular.
// Gibt JSON zurück, damit kunden.html auf derselben Seite bleiben kann.

header("Content-Type: application/json; charset=utf-8");

function antwort($success, $message, $konto = null) {
    echo json_encode([
        "success" => $success,
        "message" => $message,
        "konto" => $konto
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    antwort(false, "Ungültige Anfrage.");
}

$vorname = trim($_POST["vorname"] ?? "");
$nachname = trim($_POST["nachname"] ?? "");
$benutzername = trim($_POST["benutzername"] ?? "");
$email = trim($_POST["email"] ?? "");
$telefon = trim($_POST["telefon"] ?? "");
$passwort = $_POST["passwort"] ?? "";
$passwortWiederholen = $_POST["passwortWiederholen"] ?? "";
$hinweis = trim($_POST["hinweis"] ?? "");

$nameRegex = "/^[\p{L} .'-]{2,40}$/u";
$usernameRegex = "/^[a-zA-Z0-9._-]{4,20}$/";
$telefonRegex = "/^[0-9 +()\/.-]{7,25}$/";

if ($vorname === "" || !preg_match($nameRegex, $vorname)) {
    antwort(false, "Bitte gib einen gültigen Vornamen ein.");
}

if ($nachname === "" || !preg_match($nameRegex, $nachname)) {
    antwort(false, "Bitte gib einen gültigen Nachnamen ein.");
}

if ($benutzername === "" || !preg_match($usernameRegex, $benutzername)) {
    antwort(false, "Der Benutzername muss 4–20 Zeichen lang sein. Erlaubt sind Buchstaben, Zahlen, Punkt, Unterstrich und Bindestrich.");
}

if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    antwort(false, "Bitte gib eine gültige E-Mail-Adresse ein.");
}

if ($telefon === "" || !preg_match($telefonRegex, $telefon)) {
    antwort(false, "Bitte gib eine gültige Telefonnummer ein.");
}

if (strlen($passwort) < 8) {
    antwort(false, "Das Passwort muss mindestens 8 Zeichen lang sein.");
}

if ($passwort !== $passwortWiederholen) {
    antwort(false, "Die Passwörter stimmen nicht überein.");
}

if (mb_strlen($hinweis) > 300) {
    antwort(false, "Der Hinweis darf maximal 300 Zeichen lang sein.");
}

// Hier kann später das Konto in der Datenbank gespeichert werden.
// Das Passwort wird hier bewusst NICHT zurückgegeben.
// In einer echten Website müsste das Passwort vor dem Speichern gehasht werden.

antwort(true, "Konto erfolgreich erstellt!", [
    "vorname" => htmlspecialchars($vorname, ENT_QUOTES, "UTF-8"),
    "nachname" => htmlspecialchars($nachname, ENT_QUOTES, "UTF-8"),
    "benutzername" => htmlspecialchars($benutzername, ENT_QUOTES, "UTF-8"),
    "email" => htmlspecialchars($email, ENT_QUOTES, "UTF-8"),
    "telefon" => htmlspecialchars($telefon, ENT_QUOTES, "UTF-8"),
    "hinweis" => htmlspecialchars($hinweis, ENT_QUOTES, "UTF-8")
]);
?>
