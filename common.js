// common.js – gemeinsame Funktionen für alle Seiten
document.addEventListener("DOMContentLoaded", function () {
  var hamburgerBtn = document.getElementById("hamburgerBtn");
  var mobileMenu = document.getElementById("mobileMenu");
  var mobileClose = document.getElementById("mobileClose");

  if (!hamburgerBtn || !mobileMenu || !mobileClose) {
    console.warn("Navigation: Elemente wurden nicht gefunden.");
    return;
  }

  function openMenu() {
    mobileMenu.classList.add("is-open");
    hamburgerBtn.classList.add("is-open");
    hamburgerBtn.setAttribute("aria-label", "Menü schliessen");
    document.body.style.overflow = "hidden";
  }

  function closeMenu() {
    mobileMenu.classList.remove("is-open");
    hamburgerBtn.classList.remove("is-open");
    hamburgerBtn.setAttribute("aria-label", "Menü öffnen");
    document.body.style.overflow = "";
  }

  hamburgerBtn.addEventListener("click", function () {
    if (mobileMenu.classList.contains("is-open")) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  mobileClose.addEventListener("click", closeMenu);

  mobileMenu.querySelectorAll("a").forEach(function (link) {
    link.addEventListener("click", closeMenu);
  });

  mobileMenu.addEventListener("click", function (event) {
    if (event.target === mobileMenu) {
      closeMenu();
    }
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      closeMenu();
    }
  });
});
