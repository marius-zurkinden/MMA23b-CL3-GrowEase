// nav.js – Burger-Menu Logik
document.addEventListener("DOMContentLoaded", function () {
  var hamburgerBtn = document.getElementById("hamburgerBtn");
  var mobileMenu = document.getElementById("mobileMenu");
  var mobileClose = document.getElementById("mobileClose");

  if (!hamburgerBtn || !mobileMenu || !mobileClose) {
    alert("nav.js Fehler: Ein oder mehrere Elemente wurden nicht gefunden!\n" +
      "hamburgerBtn: " + !!hamburgerBtn + "\n" +
      "mobileMenu: " + !!mobileMenu + "\n" +
      "mobileClose: " + !!mobileClose
    );
    console.warn("nav.js: Elemente nicht gefunden");
    return;
  }

  // Sicherstellen, dass das Menu beim Start geschlossen ist
  mobileMenu.classList.remove("is-open");
  mobileMenu.style.display = "none";

  function openMenu() {
    alert("Menü wird geöffnet ✅");
    // Doppelte Strategie: inline style + CSS-Klasse
    mobileMenu.style.display = "flex";
    mobileMenu.style.setProperty("display", "flex", "important");
    mobileMenu.classList.add("is-open");
    hamburgerBtn.classList.add("is-open");
    hamburgerBtn.setAttribute("aria-label", "Menü schliessen");
    document.body.style.overflow = "hidden";
  }

  function closeMenu() {
    mobileMenu.style.display = "none";
    mobileMenu.classList.remove("is-open");
    hamburgerBtn.classList.remove("is-open");
    hamburgerBtn.setAttribute("aria-label", "Menü öffnen");
    document.body.style.overflow = "";
  }

  hamburgerBtn.addEventListener("click", openMenu);
  mobileClose.addEventListener("click", closeMenu);

  mobileMenu.querySelectorAll("a").forEach(function (a) {
    a.addEventListener("click", closeMenu);
  });

  mobileMenu.addEventListener("click", function (e) {
    if (e.target === mobileMenu) closeMenu();
  });
});
