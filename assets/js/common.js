// Kommentar: Wartet, bis gnaze Webseite geladen ist
document.addEventListener('DOMContentLoaded', function () {
    // Kommentar: Speichert Elemente für mobile Menü
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileClose = document.getElementById('mobileClose');

    // Kommentar: Öffnet das mobile Menü
    function openMenu() {
        // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
        mobileMenu.classList.add('is-open');
        hamburgerBtn.classList.add('is-open');
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        hamburgerBtn.setAttribute('aria-label', 'Menü schliessen');
        document.body.style.overflow = 'hidden';
    }

    // Schliesst das mobile Menü
    function closeMenu() {
        // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
        mobileMenu.classList.remove('is-open');
        hamburgerBtn.classList.remove('is-open');
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        hamburgerBtn.setAttribute('aria-label', 'Menü öffnen');
        document.body.style.overflow = '';
    }

    // Kommentar: Prüft, ob alle Menü-Elemente auf der Seite vorhanden sind
    if (hamburgerBtn && mobileMenu && mobileClose) {
        // Kommentar: Reagiert auf eine Klick auf das Burger-Menü
        hamburgerBtn.addEventListener('click', function () {
            // Kommentar: Prüft ob das Menü bereits geöffnet ist
            if (mobileMenu.classList.contains('is-open')) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        // Kommentar: Schliesst das Menü über den Schliessen-Button
        mobileClose.addEventListener('click', closeMenu);

        // Kommentar: Schliesst das Menü, wenn ein Link im mobilen Menü angeklickt wird
        mobileMenu.querySelectorAll('a').forEach(function (link) {
            // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
            link.addEventListener('click', closeMenu);
        });

        // Kommentar: Schliesst das Menü, wenn auf den Hintergrund des Menüs geklickt wird
        mobileMenu.addEventListener('click', function (event) {
            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (event.target === mobileMenu) {
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                closeMenu();
            }
        });

        // Kommentar: Schliesst das Menü mit der Escape-Taste
        document.addEventListener('keydown', function (event) {
            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (event.key === 'Escape') {
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                closeMenu();
            }
        });
    }

    // Kommentar: Speichert alle Slides und Navigationspunkte des Sliders
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('#sliderDots button');
    // Kommentar: Speichert, welcher Slide aktuell angezeigt wird
    let currentSlide = 0;

    // Kommentar: Zeigt einen bestimmten Slide an
    function showSlide(index) {
        // Kommentar: Entfernt zuerst bei allen Slides die aktive Klasse
        slides.forEach(function (slide) {
            // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
            slide.classList.remove('active');
        });

        // Kommentar: Entfernt zuerst bei allen Punkten die aktive Klasse
        dots.forEach(function (dot) {
            // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
            dot.classList.remove('active');
        });

        if (slides[index]) {
            // Kommentar: Macht den gewünschten Slide sichtbar
            slides[index].classList.add('active');
        }

        // Kommentar: Prüft eine Bedingung im JavaScript.
        if (dots[index]) {
            // Kommentar: Markiert den passenden Punkt als aktiv
            dots[index].classList.add('active');
        }

        // Kommentar: Speichert den aktuell angezeigten Slide
        currentSlide = index;
    }

    // Kommentar: Prüft, ob Slider und Punkte vorhanden sind
    if (slides.length > 0 && dots.length > 0) {
        // Kommentar: Führt eine JavaScript-Anweisung aus.
        dots.forEach(function (dot) {
            // Kommentar: Wechselt den Slide beim Klick auf einen Punkt
            dot.addEventListener('click', function () {
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showSlide(Number(dot.dataset.slide));
            });
        });

        // Kommentar: Wechselt automatisch alle 4 Sekunden zum nächsten Slide. 
        setInterval(function () {
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            showSlide((currentSlide + 1) % slides.length);
        }, 4000);
    // Kommentar: Beendet den aktuellen JavaScript-Block.
    }

    // Kommentar: Speichert alle Filterbuttons und Produktkarten
    const filterButtons = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');

    // Kommentar: Reagiert auf Klicks auf die Filterbuttons
    filterButtons.forEach(function (button) {
        // Kommentar: Reagiert auf eine Benutzeraktion wie Klick oder Eingabe.
        button.addEventListener('click', function () {
            // Kommentar: Liest aus, welcher Filter ausgewählt wurde
            const filter = button.dataset.filter;

            // Kommentar: Entfernt bei allen Buttons die aktive Klasse
            filterButtons.forEach(function (btn) {
                // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
                btn.classList.remove('active');
            });

            // Kommentar: Markiert den angeklickten Button als aktiv
            button.classList.add('active');

            // Kommentar: Geht alle Produktkarten durch
            productCards.forEach(function (card) {
                // Kommentar: Liest die Kategorie der Produktkarte aus
                const category = card.dataset.category;

                // Kommentar: Zeigt passende Produkte an und blendet unpassende aus
                if (filter === 'Alle' || filter === category) {
                    // Kommentar: Führt eine JavaScript-Anweisung aus.
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Kommentar: Speichert das Formular
    const form = document.getElementById('accountForm');


    // Kommentar: Prüft, ob das Formular auf der Seite vorhanden ist
    if (form) {
        // Kommentar: Speichert alle Eingabefelder des Formulars
        const vorname = document.getElementById('vorname');
        const nachname = document.getElementById('nachname');
        const adresse = document.getElementById('adresse');
        const postleitzahl = document.getElementById('postleitzahl');
        const stadt = document.getElementById('stadt');
        const telefon = document.getElementById('telefon');
        const email = document.getElementById('email');
        const formMessage = document.getElementById('formMessage');
        const spinner = document.getElementById('spinner');

        // Kommentar: Regeln für die Formularprüfung
        const nameRegex = /^[A-Za-zÄÖÜäöü]+$/; // Erlaubt nur Buchstaben und Umlaute.
        // Kommentar: Erstellt eine konstante Variable.
        const addressRegex = /^(?=.*[A-Za-zÄÖÜäöü])(?=.*\d)[A-Za-zÄÖÜäöü0-9\s-]+$/; // Erlaubt Adresse mit Text, Zahl, Leerzeichen und Bindestrich.
        const plzRegex = /^\d{4}$/; // Erlaubt genau 4 Zahlen.
        const cityRegex = /^[A-Za-zÄÖÜäöü]+$/; // Erlaubt nur ein Wort mit Buchstaben.
        const phoneRegex = /^041 \d{3} \d{2} \d{2}$/; // Erlaubt nur das Format 041 000 00 00.
^        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Prüft eine einfache gültige E-Mail-Adresse.

        // Kommentar: Zeigt eine Fehlermeldung unter einem Eingabefeld an
        function showError(input, message) {
            // Kommentar: Erstellt eine konstante Variable.
            const error = input.parentElement.querySelector('.error'); // Holt die Fehlermeldung unter dem Feld.
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            error.textContent = message; // Schreibt die Fehlermeldung in das Formular.
            // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
            input.classList.add('input-error'); // Markiert das Feld als fehlerhaft.
        }

        // Kommentar: Löscht eine Fehlermeldung unter einem Eingabefeld
        function clearError(input) {
            // Kommentar: Erstellt eine konstante Variable.
            const error = input.parentElement.querySelector('.error'); // Holt die Fehlermeldung unter dem Feld.
            // Kommentar: Führt eine JavaScript-Anweisung aus.
            error.textContent = ''; // Löscht die alte Fehlermeldung.
            // Kommentar: Fügt eine CSS-Klasse hinzu oder entfernt sie.
            input.classList.remove('input-error'); // Entfernt die Fehler-Markierung.
        }

        // Kommentar: Prüft, ob alle Formularfelder korrekt ausgefüllt sind
        function validateForm() {
            // Kommentar: Startet mit der Annahme, dass das Formular gültig ist
            let isValid = true; // Am Anfang gehen wir davon aus, dass alles korrekt ist.

            // Kommentar: Löscht alte Fehlermeldungen vor der neuen Prüfung
            clearError(vorname); // Löscht alte Fehler beim Vornamen.
            clearError(nachname); // Löscht alte Fehler beim Nachnamen.
            clearError(adresse); // Löscht alte Fehler bei der Adresse.
            clearError(postleitzahl); // Löscht alte Fehler bei der PLZ.
            clearError(stadt); // Löscht alte Fehler bei der Stadt.
            clearError(telefon); // Löscht alte Fehler bei der Telefonnummer.
            clearError(email); // Löscht alte Fehler bei der E-Mail.

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (vorname.value.trim() === '') { // Prüft, ob der Vorname leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(vorname, 'Bitte gib deinen Vornamen ein.'); // Zeigt Fehler, wenn der Vorname fehlt.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!nameRegex.test(vorname.value.trim())) { // Prüft, ob der Vorname Zahlen oder Sonderzeichen enthält.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(vorname, 'Vorname darf nur Buchstaben enthalten.'); // Zeigt Fehler bei Zahlen oder Sonderzeichen.
                isValid = false; // Formular ist ungültig.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (nachname.value.trim() === '') { // Prüft, ob der Nachname leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(nachname, 'Bitte gib deinen Nachnamen ein.'); // Zeigt Fehler, wenn der Nachname fehlt.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!nameRegex.test(nachname.value.trim())) { // Prüft, ob der Nachname Zahlen oder Sonderzeichen enthält.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(nachname, 'Nachname darf nur Buchstaben enthalten.'); // Zeigt Fehler bei Zahlen oder Sonderzeichen.
                isValid = false; // Formular ist ungültig.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (adresse.value.trim() === '') { // Prüft, ob die Adresse leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(adresse, 'Bitte gib deine Adresse ein.'); // Zeigt Fehler, wenn die Adresse fehlt.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!addressRegex.test(adresse.value.trim())) { // Prüft, ob die Adresse Text und Zahl enthält und keine falschen Sonderzeichen hat.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(adresse, 'Adresse braucht Text und Hausnummer. Nur Bindestrich ist erlaubt.'); // Zeigt Fehler bei falscher Adresse.
                isValid = false; // Formular ist ungültig.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (postleitzahl.value.trim() === '') { // Prüft, ob die PLZ leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(postleitzahl, 'Bitte gib deine PLZ ein.'); // Zeigt Fehler, wenn die PLZ fehlt.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!plzRegex.test(postleitzahl.value.trim())) { // Prüft, ob die PLZ genau 4 Zahlen hat.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(postleitzahl, 'PLZ muss genau 4 Zahlen haben.'); // Zeigt Fehler bei falscher PLZ.
                isValid = false; // Formular ist ungültig.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (stadt.value.trim() === '') { // Prüft, ob die Stadt leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(stadt, 'Bitte gib deine Stadt ein.'); // Zeigt Fehler, wenn die Stadt fehlt.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!cityRegex.test(stadt.value.trim())) { // Prüft, ob die Stadt Zahlen, Leerzeichen oder Sonderzeichen enthält.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(stadt, 'Stadt darf nur ein Wort mit Buchstaben sein.'); // Zeigt Fehler bei falscher Stadt.
                isValid = false; // Formular ist ungültig.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (telefon.value.trim() === '') { // Prüft, ob die Telefonnummer leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(telefon, 'Bitte gib deine Telefonnummer ein.'); // Zeigt Fehler, wenn die Telefonnummer fehlt.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!phoneRegex.test(telefon.value.trim())) { // Prüft, ob die Telefonnummer exakt im Format 041 000 00 00 ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(telefon, 'Format: 041 000 00 00'); // Zeigt Fehler bei falschem Telefonnummer-Format.
                isValid = false; // Formular ist ungültig.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (email.value.trim() === '') { // Prüft, ob die E-Mail leer ist.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(email, 'Bitte gib deine E-Mail ein.'); // Zeigt Fehler, wenn die E-Mail fehlt.
                isValid = false; // Formular ist ungültig.
            // Kommentar: Prüft eine Bedingung im JavaScript.
            } else if (!emailRegex.test(email.value.trim())) { // Prüft, ob die E-Mail eine gültige Grundstruktur hat.
                // Kommentar: Führt eine JavaScript-Anweisung aus.
                showError(email, 'Bitte gib eine gültige E-Mail ein.'); // Zeigt Fehler bei falscher E-Mail.
                isValid = false; // Formular ist ungültig.
            }

            // Kommentar: Gibt einen Wert zurück oder beendet die Funktion.
            return isValid; // Gibt zurück, ob das Formular gültig ist.
        }

        // Kommentar: Prüft die Felder direkt während der Eingabe
        vorname.addEventListener('input', validateForm); // Prüft den Vornamen direkt beim Schreiben.
        nachname.addEventListener('input', validateForm); // Prüft den Nachnamen direkt beim Schreiben.
        adresse.addEventListener('input', validateForm); // Prüft die Adresse direkt beim Schreiben.
        postleitzahl.addEventListener('input', validateForm); // Prüft die PLZ direkt beim Schreiben.
        stadt.addEventListener('input', validateForm); // Prüft die Stadt direkt beim Schreiben.
        telefon.addEventListener('input', validateForm); // Prüft die Telefonnummer direkt beim Schreiben.
        email.addEventListener('input', validateForm); // Prüft die E-Mail direkt beim Schreiben.

        // Kommentar: Reagiert auf das Absenden des Formulars
        form.addEventListener('submit', function (event) {
            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (!validateForm()) { // Prüft das Formular beim Absenden.
                // Stoppt das Absenden, wenn Fehler vorhanden sind
                event.preventDefault(); // Stoppt das Absenden, wenn etwas falsch ist.
                // Kommentar: Zeigt eine allgemeine Fehlermeldung an
                formMessage.textContent = 'Bitte korrigiere die markierten Felder.'; // Zeigt eine allgemeine Fehlermeldung an.
                // Kommentar: Gibt einen Wert zurück oder beendet die Funktion.
                return; // Beendet die Funktion.
            }

            // Kommentar: Prüft eine Bedingung im JavaScript.
            if (spinner) { // Prüft, ob der Spinner vorhanden ist.
                // Zeigt einen Lade-Spinner beim Absenden an
                spinner.style.display = 'inline-block'; // Zeigt den Spinner beim Absenden an.
            }

            // Kommentar: Zeigt eine Verarbeitungsmeldung an
            formMessage.textContent = 'Daten werden verarbeitet ...'; // Zeigt an, dass gespeichert wird.
        });
    }
});
