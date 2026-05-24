// Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
document.addEventListener('DOMContentLoaded', function () {
    // Kommentar: Erstellt eine konstante Variable.
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    // Kommentar: Erstellt eine konstante Variable.
    const mobileMenu = document.getElementById('mobileMenu');
    // Kommentar: Erstellt eine konstante Variable.
    const mobileClose = document.getElementById('mobileClose');

    // Kommentar: Startet eine JavaScript-Funktion.
    function openMenu() {
        // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
        mobileMenu.classList.add('is-open');
        // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
        hamburgerBtn.classList.add('is-open');
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        hamburgerBtn.setAttribute('aria-label', 'Menü schliessen');
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        document.body.style.overflow = 'hidden';
    // Kommentar: Beendet den aktuellen JavaScript-Block.
    }

    // Kommentar: Startet eine JavaScript-Funktion.
    function closeMenu() {
        // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
        mobileMenu.classList.remove('is-open');
        // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
        hamburgerBtn.classList.remove('is-open');
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        hamburgerBtn.setAttribute('aria-label', 'Menü öffnen');
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        document.body.style.overflow = '';
    // Kommentar: Beendet den aktuellen JavaScript-Block.
    }

    // Kommentar: Prüft eine Bedingung im JavaScript.
    if (hamburgerBtn && mobileMenu && mobileClose) {
        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        hamburgerBtn.addEventListener('click', function () {
            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (mobileMenu.classList.contains('is-open')) {
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                closeMenu();
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            } else {
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                openMenu();
            // Kommentar: Beendet den aktuellen JavaScript-Block.
            }
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        });

        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        mobileClose.addEventListener('click', closeMenu);

        // Kommentar: Sucht ein HTML-Element auf der Seite.
        mobileMenu.querySelectorAll('a').forEach(function (link) {
            // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
            link.addEventListener('click', closeMenu);
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        });

        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        mobileMenu.addEventListener('click', function (event) {
            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (event.target === mobileMenu) {
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                closeMenu();
            // Kommentar: Beendet den aktuellen JavaScript-Block.
            }
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        });

        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        document.addEventListener('keydown', function (event) {
            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (event.key === 'Escape') {
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                closeMenu();
            // Kommentar: Beendet den aktuellen JavaScript-Block.
            }
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        });
    // Kommentar: Beendet den aktuellen JavaScript-Block.
    }

    // Kommentar: Erstellt eine konstante Variable.
    const slides = document.querySelectorAll('.slide');
    // Kommentar: Erstellt eine konstante Variable.
    const dots = document.querySelectorAll('#sliderDots button');
    // Kommentar: Erstellt eine veränderbare Variable.
    let currentSlide = 0;

    // Kommentar: Startet eine JavaScript-Funktion.
    function showSlide(index) {
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        slides.forEach(function (slide) {
            // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
            slide.classList.remove('active');
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        });

        // Kommentar: Führt eine JavaScript-Anweisung aus.
        dots.forEach(function (dot) {
            // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
            dot.classList.remove('active');
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        });

        // Kommentar: Prüft eine Bedingung im JavaScript.
        if (slides[index]) {
            // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
            slides[index].classList.add('active');
        // Kommentar: Beendet den aktuellen JavaScript-Block.
        }

        // Kommentar: Prüft eine Bedingung im JavaScript.
        if (dots[index]) {
            // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
            dots[index].classList.add('active');
        // Kommentar: Beendet den aktuellen JavaScript-Block.
        }

        // Kommentar: Führt eine JavaScript-Anweisung aus.
        currentSlide = index;
    // Kommentar: Beendet den aktuellen JavaScript-Block.
    }

    // Kommentar: Prüft eine Bedingung im JavaScript.
    if (slides.length > 0 && dots.length > 0) {
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        dots.forEach(function (dot) {
            // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
            dot.addEventListener('click', function () {
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showSlide(Number(dot.dataset.slide));
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            });
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        });

        // Kommentar: Startet eine zeitgesteuerte Aktion.
        setInterval(function () {
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            showSlide((currentSlide + 1) % slides.length);
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        }, 4000);
    // Kommentar: Beendet den aktuellen JavaScript-Block.
    }

    // Kommentar: Erstellt eine konstante Variable.
    const filterButtons = document.querySelectorAll('.filter-btn');
    // Kommentar: Erstellt eine konstante Variable.
    const productCards = document.querySelectorAll('.product-card');

    // Kommentar: Führt eine JavaScript-Anweisung aus.
    filterButtons.forEach(function (button) {
        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        button.addEventListener('click', function () {
            // Kommentar: Erstellt eine konstante Variable.
            const filter = button.dataset.filter;

            // Kommentar: Führt eine JavaScript-Anweisung aus.
            filterButtons.forEach(function (btn) {
                // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
                btn.classList.remove('active');
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            });

            // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
            button.classList.add('active');

            // Kommentar: Führt eine JavaScript-Anweisung aus.
            productCards.forEach(function (card) {
                // Kommentar: Erstellt eine konstante Variable.
                const category = card.dataset.category;

                // Kommentar: Prüft eine Bedingung im JavaScript.
                if (filter === 'Alle' || filter === category) {
                    // Kommentar: Führt eine JavaScript-Anweisung aus.
                    card.style.display = 'flex';
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                } else {
                    // Kommentar: Führt eine JavaScript-Anweisung aus.
                    card.style.display = 'none';
                // Kommentar: Beendet den aktuellen JavaScript-Block.
                }
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            });
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        });
    // Kommentar: Führt eine JavaScript-Anweisung aus.
    });

    // Kommentar: Erstellt eine konstante Variable.
    const form = document.getElementById('accountForm');

    // Kommentar: Prüft eine Bedingung im JavaScript.
    if (form) {
        // Kommentar: Erstellt eine konstante Variable.
        const vorname = document.getElementById('vorname');
        // Kommentar: Erstellt eine konstante Variable.
        const nachname = document.getElementById('nachname');
        // Kommentar: Erstellt eine konstante Variable.
        const adresse = document.getElementById('adresse');
        // Kommentar: Erstellt eine konstante Variable.
        const postleitzahl = document.getElementById('postleitzahl');
        // Kommentar: Erstellt eine konstante Variable.
        const stadt = document.getElementById('stadt');
        // Kommentar: Erstellt eine konstante Variable.
        const telefon = document.getElementById('telefon');
        // Kommentar: Erstellt eine konstante Variable.
        const email = document.getElementById('email');
        // Kommentar: Erstellt eine konstante Variable.
        const formMessage = document.getElementById('formMessage');
        // Kommentar: Erstellt eine konstante Variable.
        const spinner = document.getElementById('spinner');

        // Kommentar: Erstellt eine konstante Variable.
        const nameRegex = /^[A-Za-zÄÖÜäöü]+$/; // Erlaubt nur Buchstaben und Umlaute.
        // Kommentar: Erstellt eine konstante Variable.
        const addressRegex = /^(?=.*[A-Za-zÄÖÜäöü])(?=.*\d)[A-Za-zÄÖÜäöü0-9\s-]+$/; // Erlaubt Adresse mit Text, Zahl, Leerzeichen und Bindestrich.
        // Kommentar: Erstellt eine konstante Variable.
        const plzRegex = /^\d{4}$/; // Erlaubt genau 4 Zahlen.
        // Kommentar: Erstellt eine konstante Variable.
        const cityRegex = /^[A-Za-zÄÖÜäöü]+$/; // Erlaubt nur ein Wort mit Buchstaben.
        // Kommentar: Erstellt eine konstante Variable.
        const phoneRegex = /^041 \d{3} \d{2} \d{2}$/; // Erlaubt nur das Format 041 000 00 00.
        // Kommentar: Erstellt eine konstante Variable.
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Prüft eine einfache gültige E-Mail-Adresse.

        // Kommentar: Startet eine JavaScript-Funktion.
        function showError(input, message) {
            // Kommentar: Erstellt eine konstante Variable.
            const error = input.parentElement.querySelector('.error'); // Holt die Fehlermeldung unter dem Feld.
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            error.textContent = message; // Schreibt die Fehlermeldung in das Formular.
            // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
            input.classList.add('input-error'); // Markiert das Feld als fehlerhaft.
        // Kommentar: Beendet den aktuellen JavaScript-Block.
        }

        // Kommentar: Startet eine JavaScript-Funktion.
        function clearError(input) {
            // Kommentar: Erstellt eine konstante Variable.
            const error = input.parentElement.querySelector('.error'); // Holt die Fehlermeldung unter dem Feld.
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            error.textContent = ''; // Löscht die alte Fehlermeldung.
            // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
            input.classList.remove('input-error'); // Entfernt die Fehler-Markierung.
        // Kommentar: Beendet den aktuellen JavaScript-Block.
        }

        // Kommentar: Startet eine JavaScript-Funktion.
        function validateForm() {
            // Kommentar: Erstellt eine veränderbare Variable.
            let isValid = true; // Am Anfang gehen wir davon aus, dass alles korrekt ist.

            // Kommentar: Führt eine JavaScript-Anweisung aus.
            clearError(vorname); // Löscht alte Fehler beim Vornamen.
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            clearError(nachname); // Löscht alte Fehler beim Nachnamen.
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            clearError(adresse); // Löscht alte Fehler bei der Adresse.
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            clearError(postleitzahl); // Löscht alte Fehler bei der PLZ.
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            clearError(stadt); // Löscht alte Fehler bei der Stadt.
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            clearError(telefon); // Löscht alte Fehler bei der Telefonnummer.
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            clearError(email); // Löscht alte Fehler bei der E-Mail.

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (vorname.value.trim() === '') { // Prüft, ob der Vorname leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(vorname, 'Bitte gib deinen Vornamen ein.'); // Zeigt Fehler, wenn der Vorname fehlt.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!nameRegex.test(vorname.value.trim())) { // Prüft, ob der Vorname Zahlen oder Sonderzeichen enthält.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(vorname, 'Vorname darf nur Buchstaben enthalten.'); // Zeigt Fehler bei Zahlen oder Sonderzeichen.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Beendet den aktuellen JavaScript-Block.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (nachname.value.trim() === '') { // Prüft, ob der Nachname leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(nachname, 'Bitte gib deinen Nachnamen ein.'); // Zeigt Fehler, wenn der Nachname fehlt.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!nameRegex.test(nachname.value.trim())) { // Prüft, ob der Nachname Zahlen oder Sonderzeichen enthält.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(nachname, 'Nachname darf nur Buchstaben enthalten.'); // Zeigt Fehler bei Zahlen oder Sonderzeichen.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Beendet den aktuellen JavaScript-Block.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (adresse.value.trim() === '') { // Prüft, ob die Adresse leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(adresse, 'Bitte gib deine Adresse ein.'); // Zeigt Fehler, wenn die Adresse fehlt.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!addressRegex.test(adresse.value.trim())) { // Prüft, ob die Adresse Text und Zahl enthält und keine falschen Sonderzeichen hat.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(adresse, 'Adresse braucht Text und Hausnummer. Nur Bindestrich ist erlaubt.'); // Zeigt Fehler bei falscher Adresse.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Beendet den aktuellen JavaScript-Block.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (postleitzahl.value.trim() === '') { // Prüft, ob die PLZ leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(postleitzahl, 'Bitte gib deine PLZ ein.'); // Zeigt Fehler, wenn die PLZ fehlt.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!plzRegex.test(postleitzahl.value.trim())) { // Prüft, ob die PLZ genau 4 Zahlen hat.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(postleitzahl, 'PLZ muss genau 4 Zahlen haben.'); // Zeigt Fehler bei falscher PLZ.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Beendet den aktuellen JavaScript-Block.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (stadt.value.trim() === '') { // Prüft, ob die Stadt leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(stadt, 'Bitte gib deine Stadt ein.'); // Zeigt Fehler, wenn die Stadt fehlt.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!cityRegex.test(stadt.value.trim())) { // Prüft, ob die Stadt Zahlen, Leerzeichen oder Sonderzeichen enthält.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(stadt, 'Stadt darf nur ein Wort mit Buchstaben sein.'); // Zeigt Fehler bei falscher Stadt.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Beendet den aktuellen JavaScript-Block.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (telefon.value.trim() === '') { // Prüft, ob die Telefonnummer leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(telefon, 'Bitte gib deine Telefonnummer ein.'); // Zeigt Fehler, wenn die Telefonnummer fehlt.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!phoneRegex.test(telefon.value.trim())) { // Prüft, ob die Telefonnummer exakt im Format 041 000 00 00 ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(telefon, 'Format: 041 000 00 00'); // Zeigt Fehler bei falschem Telefonnummer-Format.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Beendet den aktuellen JavaScript-Block.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (email.value.trim() === '') { // Prüft, ob die E-Mail leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(email, 'Bitte gib deine E-Mail ein.'); // Zeigt Fehler, wenn die E-Mail fehlt.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!emailRegex.test(email.value.trim())) { // Prüft, ob die E-Mail eine gültige Grundstruktur hat.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(email, 'Bitte gib eine gültige E-Mail ein.'); // Zeigt Fehler bei falscher E-Mail.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Beendet den aktuellen JavaScript-Block.
            }

            // Kommentar: Gibt einen Wert zurück oder beendet die Funktion.
            return isValid; // Gibt zurück, ob das Formular gültig ist.
        // Kommentar: Beendet den aktuellen JavaScript-Block.
        }

        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        vorname.addEventListener('input', validateForm); // Prüft den Vornamen direkt beim Schreiben.
        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        nachname.addEventListener('input', validateForm); // Prüft den Nachnamen direkt beim Schreiben.
        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        adresse.addEventListener('input', validateForm); // Prüft die Adresse direkt beim Schreiben.
        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        postleitzahl.addEventListener('input', validateForm); // Prüft die PLZ direkt beim Schreiben.
        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        stadt.addEventListener('input', validateForm); // Prüft die Stadt direkt beim Schreiben.
        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        telefon.addEventListener('input', validateForm); // Prüft die Telefonnummer direkt beim Schreiben.
        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        email.addEventListener('input', validateForm); // Prüft die E-Mail direkt beim Schreiben.

        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        form.addEventListener('submit', function (event) {
            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (!validateForm()) { // Prüft das Formular beim Absenden.
                // Kommentar: Verhindert das normale Absenden des Formulars.
                event.preventDefault(); // Stoppt das Absenden, wenn etwas falsch ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                formMessage.textContent = 'Bitte korrigiere die markierten Felder.'; // Zeigt eine allgemeine Fehlermeldung an.
                // Kommentar: Gibt einen Wert zurück oder beendet die Funktion.
                return; // Beendet die Funktion.
            // Kommentar: Beendet den aktuellen JavaScript-Block.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (spinner) { // Prüft, ob der Spinner vorhanden ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                spinner.style.display = 'inline-block'; // Zeigt den Spinner beim Absenden an.
            // Kommentar: Beendet den aktuellen JavaScript-Block.
            }

            // Kommentar: Führt eine JavaScript-Anweisung aus.
            formMessage.textContent = 'Daten werden verarbeitet ...'; // Zeigt an, dass gespeichert wird.
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        });
    // Kommentar: Beendet den aktuellen JavaScript-Block.
    }
// Kommentar: Führt eine JavaScript-Anweisung aus.
});
