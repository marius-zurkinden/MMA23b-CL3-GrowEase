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

| Tabelle        | Verwendung               |
|---------------|--------------------------|
| Produkt        | Produkte-Seite & Homepage |
| Dienstleistung | Dienstleistungen-Seite   |
| Bestellung     | Bestellungen-Seite        |
| Kunde          | Kunden-Seite             |

Feldnamen werden flexibel erkannt (z.B. `Name` oder `Bezeichnung`, `Bild`-URL etc.).
Falls die API nicht erreichbar ist, werden Demo-Daten angezeigt.

## Responsive

- Desktop: 1400px, volle Navigation, Grid-Layouts
- Tablet: ~900px, angepasste Layouts
- Mobile: ~500px, Hamburger-Menü, einspaltige Darstellung
