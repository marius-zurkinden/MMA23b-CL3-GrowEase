<?php
$pageTitle = 'GrowEase – Konto erstellen';
// Speichert, welche Seite in der Navigation aktiv ist.
$activePage = 'konto';

// Bindet eine andere PHP-Datei in diese Seite ein.
require_once 'db.php';

// Führt eine PHP-Anweisung für diese Seite aus.
$success = false;
$error = '';

// Führt eine PHP-Anweisung für diese Seite aus.
$vorname = '';
$nachname = '';
$adresse = '';
$postleitzahl = '';
$stadt = '';
$telefon = '';
$email = '';

// Prüft eine Bedingung und führt den folgenden Block nur dann aus.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Liest einen Formularwert aus und entfernt unnötige Leerzeichen.
    $vorname = trim($_POST['vorname'] ?? '');
    $nachname = trim($_POST['nachname'] ?? '');
    $adresse = trim($_POST['adresse'] ?? '');
    $postleitzahl = trim($_POST['postleitzahl'] ?? '');
    $stadt = trim($_POST['stadt'] ?? '');
    $telefon = trim($_POST['telefon'] ?? '');
    $email = trim($_POST['email'] ?? '');

    // Prüft eine Bedingung und führt den folgenden Block nur dann aus.
    if ($vorname === '' || $nachname === '' || $adresse === '' || $postleitzahl === '' || $stadt === '' || $telefon === '' || $email === '') {
        // Führt eine PHP-Anweisung für diese Seite aus.
        $error = 'Bitte fülle alle Felder aus.';
    } elseif (!preg_match('/^[A-Za-zÄÖÜäöü]+$/u', $vorname)) {
        $error = 'Vorname darf nur Buchstaben enthalten.';
    } elseif (!preg_match('/^[A-Za-zÄÖÜäöü]+$/u', $nachname)) {
        $error = 'Nachname darf nur Buchstaben enthalten.';
    } elseif (!preg_match('/^(?=.*[A-Za-zÄÖÜäöü])(?=.*\d)[A-Za-zÄÖÜäöü0-9\s-]+$/u', $adresse)) {
        $error = 'Adresse braucht Text und Hausnummer. Nur Bindestrich ist erlaubt.';
    } elseif (!preg_match('/^\d{4}$/', $postleitzahl)) {
        $error = 'Bitte gib eine gültige 4-stellige Postleitzahl ein.';
    } elseif (!preg_match('/^[A-Za-zÄÖÜäöü]+$/u', $stadt)) {
        $error = 'Stadt darf nur ein Wort mit Buchstaben sein.';
    } elseif (!preg_match('/^041 \d{3} \d{2} \d{2}$/', $telefon)) {
        $error = 'Bitte gib die Telefonnummer im Format 041 000 00 00 ein.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Bitte gib eine gültige E-Mail-Adresse ein.';
    } else {
        // Bereitet eine SQL-Abfrage sicher vor.
        $stmt = $conn->prepare("SELECT id FROM Kunde WHERE Email = :email");
        // Führt die vorbereitete SQL-Abfrage aus.
        $stmt->execute([
            // Führt eine PHP-Anweisung für diese Seite aus.
            ':email' => $email
            // Führt eine PHP-Anweisung für diese Seite aus.
        ]);
        // Holt einen einzelnen Datensatz aus dem Ergebnis.
        $kunde = $stmt->fetch(PDO::FETCH_ASSOC);

        // Prüft eine Bedingung und führt den folgenden Block nur dann aus.
        if ($kunde) {
            // Führt eine PHP-Anweisung für diese Seite aus.
            $error = 'Diese E-Mail wird schon verwendet.';
            // Führt eine PHP-Anweisung für diese Seite aus.
        } else {
            // Bereitet eine SQL-Abfrage sicher vor.
            $stmt = $conn->prepare("
                INSERT INTO Kunde
                (Vorname, Nachname, Adresse, PLZ, Stadt, Telefonnummer, Email)
                VALUES
                (:vorname, :nachname, :adresse, :plz, :stadt, :telefonnummer, :email)
            ");

            // Führt die vorbereitete SQL-Abfrage aus.
            $stmt->execute([
                // Führt eine PHP-Anweisung für diese Seite aus.
                ':vorname' => $vorname,
                ':nachname' => $nachname,
                ':adresse' => $adresse,
                ':plz' => $postleitzahl,
                ':stadt' => $stadt,
                ':telefonnummer' => $telefon,
                ':email' => $email
            ]);

            // Führt eine PHP-Anweisung für diese Seite aus.
            $success = true;

            // Führt eine PHP-Anweisung für diese Seite aus.
            $vorname = '';
            $nachname = '';
            $adresse = '';
            $postleitzahl = '';
            $stadt = '';
            $telefon = '';
            $email = '';
        }
    }
}

// Bindet eine andere PHP-Datei in diese Seite ein.
include 'includes/header.php';
?>

<section class="page-hero small">
    <p class="eyebrow">Mein Konto</p>
    <h1>Konto erstellen</h1>
    <p>Erstelle ein Konto, damit du später einfacher bestellen kannst.</p>
</section>

<section class="section form-section">
    <?php if ($success): ?>
        <div class="success-box">
            <h2>Konto wurde erstellt ✅</h2>
            <p>Deine Daten wurden erfolgreich in der Datenbank gespeichert.</p>
        </div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="error-box">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form class="account-form" id="accountForm" method="post" action="konto-erstellen.php" novalidate>
        <div class="form-grid">
            <div class="form-field">
                <label for="vorname">Vorname</label>
                <input type="text" id="vorname" name="vorname" autocomplete="given-name" value="<?= htmlspecialchars($vorname) ?>">
                <small class="error"></small>
            </div>

            <div class="form-field">
                <label for="nachname">Nachname</label>
                <input type="text" id="nachname" name="nachname" autocomplete="family-name" value="<?= htmlspecialchars($nachname) ?>">
                <small class="error"></small>
            </div>

            <div class="form-field full">
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" name="adresse" autocomplete="street-address" value="<?= htmlspecialchars($adresse) ?>">
                <small class="error"></small>
            </div>

            <div class="form-field">
                <label for="postleitzahl">Postleitzahl</label>
                <input type="text" id="postleitzahl" name="postleitzahl" inputmode="numeric" maxlength="4" value="<?= htmlspecialchars($postleitzahl) ?>">
                <small class="error"></small>
            </div>

            <div class="form-field">
                <label for="stadt">Stadt</label>
                <input type="text" id="stadt" name="stadt" value="<?= htmlspecialchars($stadt) ?>">
                <small class="error"></small>
            </div>

            <div class="form-field">
                <label for="telefon">Telefonnummer</label>
                <input type="text" id="telefon" name="telefon" placeholder="041 000 00 00" value="<?= htmlspecialchars($telefon) ?>">
                <small class="error"></small>
            </div>

            <div class="form-field">
                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email" autocomplete="email" value="<?= htmlspecialchars($email) ?>">
                <small class="error"></small>
            </div>
        </div>

        <div class="form-message" id="formMessage"></div>

        <button class="btn primary submit-btn" type="submit">
            <span class="spinner" id="spinner"></span>
            <!-- Führt eine PHP-Anweisung für diese Seite aus. -->
            Konto erstellen
        </button>
    </form>
</section>

<!-- Startet den PHP-Bereich der Datei. -->
<?php include 'includes/footer.php'; ?>