// script.js
// Vanilla-JS-Validierung für das vorhandene Registrierungsformular in konto.html.
// Keine HTML5-Validierung, keine Frameworks, keine Browser-Standardprüfung.

// Hauptformular der Kontoanlage-Seite holen.
const form = document.getElementById("accountForm");

if (form) {
  // Zentrale Feedback-Fläche und alle Formularfelder referenzieren.
  const formFeedback = document.getElementById("formFeedback");
  const fieldIds = [
    "vorname",
    "nachname",
    "benutzername",
    "email",
    "passwort",
    "passwortWiederholen",
    "hinweis",
  ];
  const fields = Object.fromEntries(
    fieldIds.map((id) => [id, document.getElementById(id)]),
  );

  // Reguläre Ausdrücke für Namen, Benutzernamen und E-Mail-Adressen.
  const nameRegex = /^[\p{L}-]+$/u;
  const usernameRegex = /^[A-Za-z0-9_]+$/;
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  // Hilfsfunktion: Fehlerzustand eines Feldes anzeigen.
  function showError(fieldEl, message) {
    const wrapper = fieldEl.closest(".form-field");
    const errorBox = wrapper.querySelector(".error-msg");
    wrapper.classList.remove("field-success");
    wrapper.classList.add("field-error");
    fieldEl.classList.remove("input-success");
    fieldEl.classList.add("input-error");
    errorBox.textContent = message;
  }

  // Hilfsfunktion: Erfolgszustand eines Feldes anzeigen.
  function showSuccess(fieldEl) {
    const wrapper = fieldEl.closest(".form-field");
    const errorBox = wrapper.querySelector(".error-msg");
    wrapper.classList.remove("field-error");
    wrapper.classList.add("field-success");
    fieldEl.classList.remove("input-error");
    fieldEl.classList.add("input-success");
    errorBox.textContent = "";
  }

  // Hilfsfunktion: visuelle Zustände und Fehlermeldungen entfernen.
  function clearState(fieldEl) {
    const wrapper = fieldEl.closest(".form-field");
    const errorBox = wrapper.querySelector(".error-msg");
    wrapper.classList.remove("field-error", "field-success");
    fieldEl.classList.remove("input-error", "input-success");
    errorBox.textContent = "";
  }

  // Hilfsfunktion: Feldwert getrimmt auslesen.
  function getValue(id) {
    return (fields[id].value || "").trim();
  }

  // Hilfsfunktion: E-Mail-Format per RegExp prüfen.
  function validateEmail(value) {
    return emailRegex.test(value);
  }

  // Hilfsfunktion: Passwortregeln prüfen.
  function validatePassword(value) {
    const hasUppercase = /[A-Z]/.test(value);
    const hasLowercase = /[a-z]/.test(value);
    const hasNumber = /\d/.test(value);
    const hasSpecialChar = /[^A-Za-z0-9]/.test(value);
    return (
      value.length >= 8 &&
      hasUppercase &&
      hasLowercase &&
      hasNumber &&
      hasSpecialChar
    );
  }

  // Einzelnes Feld anhand seiner Regeln validieren.
  function validateField(id, showLiveFeedback = true) {
    const field = fields[id];
    const value = getValue(id);

    if (!field) return true;

    // Vorname und Nachname: Pflicht, min. 2 Zeichen, nur Buchstaben und Bindestriche.
    if (id === "vorname" || id === "nachname") {
      if (value.length === 0) {
        if (showLiveFeedback)
          showError(field, `${capitalize(id)} darf nicht leer sein.`);
        return false;
      }
      if (value.length < 2) {
        if (showLiveFeedback)
          showError(
            field,
            `${capitalize(id)} muss mindestens 2 Zeichen haben.`,
          );
        return false;
      }
      if (!nameRegex.test(value) || /\s/.test(value)) {
        if (showLiveFeedback)
          showError(
            field,
            `${capitalize(id)} darf nur Buchstaben und Bindestriche enthalten.`,
          );
        return false;
      }
      showSuccess(field);
      return true;
    }

    // Benutzername: Pflicht, min. 4 Zeichen, nur Buchstaben, Zahlen und _. Keine Leerzeichen.
    if (id === "benutzername") {
      if (value.length === 0) {
        if (showLiveFeedback)
          showError(field, "Benutzername darf nicht leer sein.");
        return false;
      }
      if (value.length < 4) {
        if (showLiveFeedback)
          showError(field, "Benutzername muss mindestens 4 Zeichen haben.");
        return false;
      }
      if (/\s/.test(value)) {
        if (showLiveFeedback)
          showError(field, "Benutzername darf keine Leerzeichen enthalten.");
        return false;
      }
      if (!usernameRegex.test(value)) {
        if (showLiveFeedback)
          showError(
            field,
            "Benutzername darf nur Buchstaben, Zahlen und _ enthalten.",
          );
        return false;
      }
      showSuccess(field);
      return true;
    }

    // E-Mail-Adresse: Pflicht und Formatprüfung per RegExp.
    if (id === "email") {
      if (value.length === 0) {
        if (showLiveFeedback)
          showError(field, "E-Mail-Adresse darf nicht leer sein.");
        return false;
      }
      if (!validateEmail(value)) {
        if (showLiveFeedback)
          showError(field, "Bitte gib eine gültige E-Mail-Adresse ein.");
        return false;
      }
      showSuccess(field);
      return true;
    }

    // Passwort: Pflicht und komplexe Passwortregeln.
    if (id === "passwort") {
      if (value.length === 0) {
        if (showLiveFeedback)
          showError(field, "Passwort darf nicht leer sein.");
        return false;
      }
      if (!validatePassword(value)) {
        if (showLiveFeedback) {
          showError(
            field,
            "Mindestens 8 Zeichen, 1 Grossbuchstabe, 1 Kleinbuchstabe, 1 Zahl und 1 Sonderzeichen erforderlich.",
          );
        }
        return false;
      }
      showSuccess(field);
      return true;
    }

    // Passwort wiederholen: muss exakt mit dem ersten Passwort übereinstimmen.
    if (id === "passwortWiederholen") {
      const passwordValue = getValue("passwort");
      if (value.length === 0) {
        if (showLiveFeedback)
          showError(field, "Bitte wiederhole dein Passwort.");
        return false;
      }
      if (value !== passwordValue) {
        if (showLiveFeedback)
          showError(field, "Die Passwörter stimmen nicht überein.");
        return false;
      }
      showSuccess(field);
      return true;
    }

    // Hinweis: optional, aber bei Eingabe begrenzt und ohne reine Leerzeichen.
    if (id === "hinweis") {
      if (value.length === 0) {
        clearState(field);
        return true;
      }
      if (value.length > 300) {
        if (showLiveFeedback)
          showError(field, "Der Hinweis darf maximal 300 Zeichen haben.");
        return false;
      }
      if (value.replace(/\s/g, "").length === 0) {
        if (showLiveFeedback)
          showError(
            field,
            "Der Hinweis darf nicht nur aus Leerzeichen bestehen.",
          );
        return false;
      }
      showSuccess(field);
      return true;
    }

    return true;
  }

  // Gesamtes Formular prüfen, bevor gesendet wird.
  function validateForm() {
    return fieldIds.every((id) => validateField(id, true));
  }

  // Hilfsfunktion für schöne Feldnamen in Fehlermeldungen.
  function capitalize(value) {
    return value.charAt(0).toUpperCase() + value.slice(1);
  }

  // Live-Validierung: Felder reagieren direkt auf Eingaben und Fokusverlust.
  fieldIds.forEach((id) => {
    const field = fields[id];
    if (!field) return;

    field.addEventListener("input", () => {
      validateField(id, true);

      if (id === "passwort" && getValue("passwortWiederholen").length > 0) {
        validateField("passwortWiederholen", true);
      }
    });

    field.addEventListener("blur", () => validateField(id, true));
  });

  // Senden verhindern, wenn Fehler vorhanden sind, und Feedback anzeigen.
  form.addEventListener("submit", (event) => {
    event.preventDefault();
    formFeedback.textContent = "";
    formFeedback.style.color = "var(--muted)";

    if (!validateForm()) {
      formFeedback.textContent = "Bitte korrigiere die markierten Felder.";
      formFeedback.style.color = "var(--error)";
      return;
    }

    formFeedback.textContent = "Konto erfolgreich validiert.";
    formFeedback.style.color = "var(--success)";
  });
}

/*
Validierungsregeln:
- Vorname/Nachname: Pflicht, min. 2 Zeichen, nur Buchstaben und Bindestriche.
- Benutzername: Pflicht, min. 4 Zeichen, nur Buchstaben, Zahlen und _.
- E-Mail: Pflicht, per RegEx geprüft.
- Passwort: Pflicht, min. 8 Zeichen, mindestens 1 Grossbuchstabe, 1 Kleinbuchstabe, 1 Zahl, 1 Sonderzeichen.
- Passwort wiederholen: muss exakt mit Passwort übereinstimmen.
- Hinweis: optional, max. 300 Zeichen, keine reinen Leerzeichen.
- Fehler werden unter dem Feld angezeigt; Erfolg wird visuell mit input-success markiert.
*/
