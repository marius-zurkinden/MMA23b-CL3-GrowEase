# Growease Website

## Dateistruktur

```
growease/
├── index.html              ← Startseite
├── produkte.html           ← Produkte mit Filter & Suche
├── dienstleistungen.html   ← Dienstleistungen
├── quiz.html               ← Quiz / Gewinnspiel
├── bestellungen.html       ← Bestellungen (Admin)
├── kunden.html             ← Kunden (Admin)
├── style.css               ← Globales CSS (responsive)
├── assets/
│   ├── js/
│   │   └── nav.js          ← Navigation (wird auto-injiziert)
│   └── images/
│       ├── hero1.jpg       ← Hero Slider Bild 1 (beliebige Grösse)
│       ├── hero2.jpg       ← Hero Slider Bild 2
│       ├── hero3.jpg       ← Hero Slider Bild 3
│       └── feature-center.jpg ← Bild im Features-Bereich
```

## Bilder einfügen

Lege deine Bilder einfach unter `assets/images/` ab. Jede Grösse funktioniert –
die CSS-Eigenschaft `object-fit: cover` passt sie automatisch an den Container an.

Für Produkte aus der Datenbank: Speichere die Bild-URL oder den Pfad in der
Spalte `Bild` der Tabelle `Produkt`.

## Datenbank-Verbindung

Die API läuft unter `http://localhost:8081/api.php/records`.
Erwartete Tabellennamen (passe ggf. im JS an):

| Tabelle        | Verwendung                |
| -------------- | ------------------------- |
| Produkt        | Produkte-Seite & Homepage |
| Dienstleistung | Dienstleistungen-Seite    |
| Bestellung     | Bestellungen-Seite        |
| Kunde          | Kunden-Seite              |

Feldnamen werden flexibel erkannt (z.B. `Name` oder `Bezeichnung`, `Bild`-URL etc.).
Falls die API nicht erreichbar ist, werden Demo-Daten angezeigt.

## Responsive

- Desktop: 1400px, volle Navigation, Grid-Layouts
- Tablet: ~900px, angepasste Layouts
- Mobile: ~500px, Hamburger-Menü, einspaltige Darstellung

## Kontoformular — Validierungskonzept

Kurze Dokumentation der Validierungsregeln für die Seite `konto.html`:

Felder:

- **Vorname**
  - Pflicht: ja
  - Länge: min 2, max 30
  - Keine Eingabe nur aus Leerzeichen
  - Erlaubte Zeichen: Unicode-Buchstaben, Leerzeichen, Punkte, Apostrophe, Bindestriche
- **Nachname**
  - Pflicht: ja
  - Länge: min 2, max 40
  - Wie Vorname validiert
- **Benutzername**
  - Pflicht: ja
  - Länge: min 4, max 20
  - Erlaubte Zeichen: a-z, 0-9, Punkt, Unterstrich, Bindestrich
- **E-Mail-Adresse**
  - Pflicht: ja
  - Länge: min 5, max 254
  - Format: geprüft per RegExp (keine native `type="email"`)
- **Passwort**
  - Pflicht: ja
  - Länge: min 8, max 72
  - Mindestens ein Grossbuchstabe, ein Kleinbuchstabe und eine Zahl
- **Passwort wiederholen**
  - Pflicht: ja
  - Muss exakt mit dem Passwort übereinstimmen
- **Kurzer Hinweis**
  - Optional
  - Maximale Länge: 300 Zeichen

Fehlermeldungen & Anzeige:

- Fehler erscheinen als Text direkt unter dem jeweiligen Feld (`.error-msg`).
- Fehlerzustand markiert das Feld mit `.field-error` (rote Umrandung).
- Erfolgreiche Felder erhalten `.field-success` (grüne Umrandung).
- Beim Absenden wird das Formular blockiert, falls Fehler vorhanden sind.

Technische Hinweise:

- Alle Validierungen erfolgen in `assets/js/script.js` (Vanilla JS).
- Styling in `assets/css/style.css` (mobile-first).
- Keine HTML5-native Validierung wird verwendet (`novalidate` im `<form>`).

Erweiterbarkeit:

- Regeln sind in `assets/js/script.js` in der `rules`-Konstanten zentral konfiguriert.
- Neue Felder können durch Ergänzung von `rules` und Hinzufügen des entsprechenden Feldes im HTML integriert werden.
