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
// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
$error = '';

// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
$vorname = '';
// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
$nachname = '';
// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
$adresse = '';
// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
$postleitzahl = '';
// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
$stadt = '';
// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
$telefon = '';
// Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
$email = '';

// Kommentar: Prüft eine Bedingung und führt den folgenden Block nur dann aus.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kommentar: Liest einen Formularwert aus und entfernt unnötige Leerzeichen.
    $vorname = trim($_POST['vorname'] ?? '');
    // Kommentar: Liest einen Formularwert aus und entfernt unnötige Leerzeichen.
    $nachname = trim($_POST['nachname'] ?? '');
    // Kommentar: Liest einen Formularwert aus und entfernt unnötige Leerzeichen.
    $adresse = trim($_POST['adresse'] ?? '');
    // Kommentar: Liest einen Formularwert aus und entfernt unnötige Leerzeichen.
    $postleitzahl = trim($_POST['postleitzahl'] ?? '');
    // Kommentar: Liest einen Formularwert aus und entfernt unnötige Leerzeichen.
    $stadt = trim($_POST['stadt'] ?? '');
    // Kommentar: Liest einen Formularwert aus und entfernt unnötige Leerzeichen.
    $telefon = trim($_POST['telefon'] ?? '');
    // Kommentar: Liest einen Formularwert aus und entfernt unnötige Leerzeichen.
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
                // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
                ':nachname' => $nachname,
                // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
                ':adresse' => $adresse,
                // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
                ':plz' => $postleitzahl,
                // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
                ':stadt' => $stadt,
                // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
                ':telefonnummer' => $telefon,
                // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
                ':email' => $email
            // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
            ]);

            // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
            $success = true;

            // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
            $vorname = '';
            // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
            $nachname = '';
            // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
            $adresse = '';
            // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
            $postleitzahl = '';
            // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
            $stadt = '';
            // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
            $telefon = '';
            // Kommentar: Führt eine PHP-Anweisung für diese Seite aus.
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
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <p class="eyebrow">Mein Konto</p>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <h1>Konto erstellen</h1>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    <p>Erstelle ein Konto, damit du später einfacher bestellen kannst.</p>
<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
</section>

<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
<section class="section form-section">
    <!-- Kommentar: Startet den PHP-Bereich der Datei. -->
    <?php if ($success): ?>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <div class="success-box">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <h2>Konto wurde erstellt ✅</h2>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <p>Deine Daten wurden erfolgreich in der Datenbank gespeichert.</p>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
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
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <div class="form-grid">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="form-field">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <label for="vorname">Vorname</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="text" id="vorname" name="vorname" autocomplete="given-name" value="<?= htmlspecialchars($vorname) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="form-field">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <label for="nachname">Nachname</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="text" id="nachname" name="nachname" autocomplete="family-name" value="<?= htmlspecialchars($nachname) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="form-field full">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <label for="adresse">Adresse</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="text" id="adresse" name="adresse" autocomplete="street-address" value="<?= htmlspecialchars($adresse) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="form-field">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <label for="postleitzahl">Postleitzahl</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="text" id="postleitzahl" name="postleitzahl" inputmode="numeric" maxlength="4" value="<?= htmlspecialchars($postleitzahl) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="form-field">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <label for="stadt">Stadt</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="text" id="stadt" name="stadt" value="<?= htmlspecialchars($stadt) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="form-field">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <label for="telefon">Telefonnummer</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="text" id="telefon" name="telefon" placeholder="041 000 00 00" value="<?= htmlspecialchars($telefon) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>

            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <div class="form-field">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <label for="email">E-Mail</label>
                <!-- Kommentar: Gibt Text sicher aus, damit kein HTML-Code ausgeführt wird. -->
                <input type="email" id="email" name="email" autocomplete="email" value="<?= htmlspecialchars($email) ?>">
                <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
                <small class="error"></small>
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            </div>
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </div>

        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <div class="form-message" id="formMessage"></div>

        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        <button class="btn primary submit-btn" type="submit">
            <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
            <span class="spinner" id="spinner"></span>
            <!-- Kommentar: Führt eine PHP-Anweisung für diese Seite aus. -->
            Konto erstellen
        <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
        </button>
    <!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
    </form>
<!-- Kommentar: Erstellt ein HTML-Element für den Seitenaufbau. -->
</section>

<!-- Kommentar: Startet den PHP-Bereich der Datei. -->
<?php include 'includes/footer.php'; ?>
