<?php
// Kommentar: Startet den PHP-Bereich der Datei.
// Kommentar: Setzt den Titel der aktuellen Seite.
$pageTitle = 'GrowEase – Konto erstellen';
// Kommentar: Speichert, welche Seite in der Navigation aktiv ist.
$activePage = 'konto';

// Kommentar: Bindet eine andere PHP-Datei in diese Seite ein.
require_once 'db.php';

// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
$success = false;
$error = '';

// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
$vorname = '';
$nachname = '';
$adresse = '';
$postleitzahl = '';
$stadt = '';
$telefon = '';
$email = '';

// Kommentar: Prüft eine Bedingung und führt den folgenden Block nur dann aus.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kommentar: Liest einen Formularwert aus und entfernt unnötige Leerzeichen.
    $vorname = trim($_POST['vorname'] ?? '');
    $nachname = trim($_POST['nachname'] ?? '');
    $adresse = trim($_POST['adresse'] ?? '');
    $postleitzahl = trim($_POST['postleitzahl'] ?? '');
    $stadt = trim($_POST['stadt'] ?? '');
    $telefon = trim($_POST['telefon'] ?? '');
    $email = trim($_POST['email'] ?? '');

    // Kommentar: Prüft eine Bedingung und führt den folgenden Block nur dann aus.
    if ($vorname === '' || $nachname === '' || $adresse === '' || $postleitzahl === '' || $stadt === '' || $telefon === '' || $email === '') {
        // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
        $error = 'Bitte fülle alle Felder aus.';
    // Kommentar: Prüft eine Bedingung und führt den folgenden Block nur dann aus.
    } elseif (!preg_match('/^[A-Za-zÄÖÜäöü]+$/u', $vorname)) {
        // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
        $error = 'Vorname darf nur Buchstaben enthalten.';
    // Kommentar: Prüft eine Bedingung und führt den folgenden Block nur dann aus.
    } elseif (!preg_match('/^[A-Za-zÄÖÜäöü]+$/u', $nachname)) {
        // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
        $error = 'Nachname darf nur Buchstaben enthalten.';
    // Kommentar: Prüft eine Bedingung und führt den folgenden Block nur dann aus.
    } elseif (!preg_match('/^(?=.*[A-Za-zÄÖÜäöü])(?=.*\d)[A-Za-zÄÖÜäöü0-9\s-]+$/u', $adresse)) {
        // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
        $error = 'Adresse braucht Text und Hausnummer. Nur Bindestrich ist erlaubt.';
    // Kommentar: Prüft eine Bedingung und führt den folgenden Block nur dann aus.
    } elseif (!preg_match('/^\d{4}$/', $postleitzahl)) {
        // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
        $error = 'Bitte gib eine gültige 4-stellige Postleitzahl ein.';
    // Kommentar: Prüft eine Bedingung und führt den folgenden Block nur dann aus.
    } elseif (!preg_match('/^[A-Za-zÄÖÜäöü]+$/u', $stadt)) {
        // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
        $error = 'Stadt darf nur ein Wort mit Buchstaben sein.';
    // Kommentar: Prüft eine Bedingung und führt den folgenden Block nur dann aus.
    } elseif (!preg_match('/^041 \d{3} \d{2} \d{2}$/', $telefon)) {
        // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
        $error = 'Bitte gib die Telefonnummer im Format 041 000 00 00 ein.';
    // Kommentar: Prüft eine Bedingung und führt den folgenden Block nur dann aus.
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
        $error = 'Bitte gib eine gültige E-Mail-Adresse ein.';
    // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
    } else {
        // Kommentar: Bereitet eine SQL-Abfrage sicher vor.
        $stmt = $conn->prepare("SELECT id FROM Kunde WHERE Email = :email");
        // Kommentar: Führt die vorbereitete SQL-Abfrage aus.
        $stmt->execute([
            // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
            ':email' => $email
        // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
        ]);
        // Kommentar: Holt einen einzelnen Datensatz aus dem Ergebnis.
        $kunde = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kommentar: Prüft eine Bedingung und führt den folgenden Block nur dann aus.
        if ($kunde) {
            // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
            $error = 'Diese E-Mail wird schon verwendet.';
        // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
        } else {
            // Kommentar: Bereitet eine SQL-Abfrage sicher vor.
            $stmt = $conn->prepare("
                INSERT INTO Kunde
                (Vorname, Nachname, Adresse, PLZ, Stadt, Telefonnummer, Email)
                VALUES
                (:vorname, :nachname, :adresse, :plz, :stadt, :telefonnummer, :email)
            ");

            // Kommentar: Führt die vorbereitete SQL-Abfrage aus.
            $stmt->execute([
                // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
                ':vorname' => $vorname,
                ':nachname' => $nachname,
                ':adresse' => $adresse,
                ':plz' => $postleitzahl,
                ':stadt' => $stadt,
                ':telefonnummer' => $telefon,
                ':email' => $email
            ]);

            // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
            $success = true;

            // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
            $vorname = '';
            $nachname = '';
            $adresse = '';
            $postleitzahl = '';
            $stadt = '';
            $telefon = '';
            $email = '';
        // Kommentar: Beendet den aktuellen Codeblock oder die Schleife.
        }
    // Kommentar: Beendet den aktuellen Codeblock oder die Schleife.
    }
// Kommentar: Beendet den aktuellen Codeblock oder die Schleife.
}

// Kommentar: Bindet eine andere PHP-Datei in diese Seite ein.
include 'includes/header.php';
// Kommentar: Beendet den PHP-Bereich und wechselt zurück zu HTML.
?>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="page-hero small">
    <p class="eyebrow">Mein Konto</p>
    <h1>Konto erstellen</h1>
    <p>Erstelle ein Konto, damit du später einfacher bestellen kannst.</p>
</section>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="section form-section">
    <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
    <?php if ($success): ?>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <div class="success-box">
            <h2>Konto wurde erstellt ✅</h2>
            <p>Deine Daten wurden erfolgreich in der Datenbank gespeichert.</p>
        </div>
    <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
    <?php endif; ?>

    <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
    <?php if ($error): ?>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <div class="error-box">
            <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
            <?= htmlspecialchars($error) ?>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </div>
    <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
    <?php endif; ?>

    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <form class="account-form" id="accountForm" method="post" action="konto-erstellen.php" novalidate>
        <div class="form-grid">
            <div class="form-field">
                <label for="vorname">Vorname</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="text" id="vorname" name="vorname" autocomplete="given-name" value="<?= htmlspecialchars($vorname) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="form-field">
                <label for="nachname">Nachname</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="text" id="nachname" name="nachname" autocomplete="family-name" value="<?= htmlspecialchars($nachname) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="form-field full">
                <label for="adresse">Adresse</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="text" id="adresse" name="adresse" autocomplete="street-address" value="<?= htmlspecialchars($adresse) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="form-field">
                <label for="postleitzahl">Postleitzahl</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="text" id="postleitzahl" name="postleitzahl" inputmode="numeric" maxlength="4" value="<?= htmlspecialchars($postleitzahl) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="form-field">
                <label for="stadt">Stadt</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="text" id="stadt" name="stadt" value="<?= htmlspecialchars($stadt) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="form-field">
                <label for="telefon">Telefonnummer</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="text" id="telefon" name="telefon" placeholder="041 000 00 00" value="<?= htmlspecialchars($telefon) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="form-field">
                <label for="email">E-Mail</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="email" id="email" name="email" autocomplete="email" value="<?= htmlspecialchars($email) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>
        </div>

        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <div class="form-message" id="formMessage"></div>

        <button class="btn primary submit-btn" type="submit">
            <span class="spinner" id="spinner"></span>
            <!-- Kommentar: Führt eine PHP-Anweisung für diese Seite aus. -->
            Konto erstellen
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </button>
    </form>
</section>

<!-- Kommentar: Startet den PHP-Bereich der Datei. -->
<?php include 'includes/footer.php'; ?>
