// main.js
// Verantwortlich für: Hamburger-Menü (mobile) und Hervorhebung des aktiven Navigationslinks
// Sauberes Vanilla JS, barrierefrei (ARIA) und kommentiert.

// Elemente auswählen
const navHamburger = document.getElementById("navHamburger");
const mobileMenu = document.getElementById("mobileMenu");
const mobileMenuClose = document.getElementById("mobileMenuClose");
const navLinks = Array.from(document.querySelectorAll(".nav-links a"));
const mobileLinks = Array.from(document.querySelectorAll("#mobileMenu a"));

// Menü öffnen / schließen
function setMenuOpen(open) {
  if (open) {
    mobileMenu.classList.add("open");
    navHamburger.classList.add("is-open");
    navHamburger.setAttribute("aria-expanded", "true");
    mobileMenu.setAttribute("aria-hidden", "false");
    // Fokus auf erstes Link im Mobile-Menu
    const first = mobileMenu.querySelector("a");
    if (first) first.focus();
  } else {
    mobileMenu.classList.remove("open");
    navHamburger.classList.remove("is-open");
    navHamburger.setAttribute("aria-expanded", "false");
    mobileMenu.setAttribute("aria-hidden", "true");
    navHamburger.focus();
  }
}

// Toggle-Handler
navHamburger &&
  navHamburger.addEventListener("click", () => {
    const isOpen = mobileMenu.classList.contains("open");
    setMenuOpen(!isOpen);
  });

// Mobile close button
mobileMenuClose &&
  mobileMenuClose.addEventListener("click", () => setMenuOpen(false));

// Schließen bei Klick auf einen Menü-Link (mobile)
mobileLinks.forEach((link) => {
  link.addEventListener("click", () => setMenuOpen(false));
});

// Schließen bei Escape
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") setMenuOpen(false);
});

// Klick außerhalb schließt das mobile Menü (bei Klick auf Overlay)
mobileMenu.addEventListener("click", (e) => {
  if (e.target === mobileMenu) setMenuOpen(false);
});

// Aktiven Link hervorheben
function markActiveLinks() {
  const currentUrl = window.location.pathname.replace(/\/$/, ""); // ohne End-Slash
  const currentHash = window.location.hash;

  function highlight(list) {
    list.forEach((a) => {
      a.classList.remove("active");
      const href = a.getAttribute("href");

      // 1) exakte Pfad-Übereinstimmung
      try {
        const linkUrl = new URL(href, window.location.origin);
        const linkPath = linkUrl.pathname.replace(/\/$/, "");
        if (linkPath === currentUrl && !currentHash) {
          a.classList.add("active");
          return;
        }
      } catch (e) {
        // href kann ein Hash oder relativer Link sein
      }

      // 2) Hash-Vergleich (z.B. #ueber-uns)
      if (href === currentHash) {
        a.classList.add("active");
        return;
      }

      // 3) Wenn href ist genau die Startseite (index.html) und currentUrl leer (/)
      if (
        (href === "index.html" || href === "./" || href === "/") &&
        (currentUrl === "" ||
          currentUrl === "/" ||
          currentUrl.endsWith("index.html"))
      ) {
        a.classList.add("active");
        return;
      }
    });
  }

  highlight(navLinks);
  highlight(mobileLinks);
}

// Beim Laden markieren
document.addEventListener("DOMContentLoaded", () => {
  markActiveLinks();
});

// Optional: beobachte Hash-Änderungen (einseitige Navigation)
window.addEventListener("hashchange", () => markActiveLinks());
