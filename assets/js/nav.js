// nav.js – shared navigation component for Growease
(function () {
  const pages = [
    { href: "index.html", label: "Home" },
    { href: "produkte.html", label: "Produkte" },
    { href: "dienstleistungen.html", label: "Dienstleistungen" },
    { href: "quiz.html", label: "Quiz" },
    { href: "bestellungen.html", label: "Bestellungen" },
    { href: "kunden.html", label: "Kunden" },
  ];

  const current = location.pathname.split("/").pop() || "index.html";

  // Build promo banner
  const banner = document.createElement("div");
  banner.className = "promo-banner";
  banner.innerHTML = '<a href="quiz.html">Quiz ausfüllen</a> und gewinnen 🌱';

  // Build nav
  const nav = document.createElement("nav");
  nav.className = "main-nav";
  nav.innerHTML = `
    <a href="index.html" class="nav-logo">
      <svg class="nav-logo-icon" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <!-- Leaf shape -->
        <path d="M16 4 C16 4, 28 8, 28 20 C28 26, 22 30, 16 30 C10 30, 4 26, 4 20 C4 8, 16 4, 16 4Z" fill="#2d4a2d"/>
        <!-- Center vein -->
        <path d="M16 28 L16 10" stroke="#c8d8c0" stroke-width="1.5" stroke-linecap="round"/>
        <!-- Side veins -->
        <path d="M16 22 C16 22, 12 20, 9 17" stroke="#c8d8c0" stroke-width="1" stroke-linecap="round"/>
        <path d="M16 22 C16 22, 20 20, 23 17" stroke="#c8d8c0" stroke-width="1" stroke-linecap="round"/>
        <path d="M16 17 C16 17, 12 15, 10 12" stroke="#c8d8c0" stroke-width="1" stroke-linecap="round"/>
        <path d="M16 17 C16 17, 20 15, 22 12" stroke="#c8d8c0" stroke-width="1" stroke-linecap="round"/>
      </svg>
      <span class="nav-logo-text">Growease</span>
    </a>
    <ul class="nav-links">
      ${pages.map((p) => `<li><a href="${p.href}" class="${current === p.href ? "active" : ""}">${p.label}</a></li>`).join("")}
    </ul>
    <div class="nav-actions">
      <button title="Warenkorb" onclick="location.href='bestellungen.html'">
        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
          <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/>
          <path d="M16 10a4 4 0 01-8 0"/>
        </svg>
      </button>
      <button class="nav-action-desktop" title="Konto" onclick="location.href='konto.html'">
        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
          <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>
        </svg>
      </button>
    </div>
    <button class="nav-hamburger" id="hamburgerBtn" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  `;

  // Mobile menu
  const mobileMenu = document.createElement("div");
  mobileMenu.className = "mobile-menu";
  mobileMenu.id = "mobileMenu";
  mobileMenu.innerHTML = `
    <button class="mobile-menu-close" id="mobileClose">✕</button>
    <a href="index.html" class="nav-logo" style="margin-bottom:8px;">
      <svg width="40" height="40" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 4 C16 4, 28 8, 28 20 C28 26, 22 30, 16 30 C10 30, 4 26, 4 20 C4 8, 16 4, 16 4Z" fill="#2d4a2d"/>
        <path d="M16 28 L16 10" stroke="#c8d8c0" stroke-width="1.5" stroke-linecap="round"/>
        <path d="M16 22 C16 22, 12 20, 9 17" stroke="#c8d8c0" stroke-width="1" stroke-linecap="round"/>
        <path d="M16 22 C16 22, 20 20, 23 17" stroke="#c8d8c0" stroke-width="1" stroke-linecap="round"/>
        <path d="M16 17 C16 17, 12 15, 10 12" stroke="#c8d8c0" stroke-width="1" stroke-linecap="round"/>
        <path d="M16 17 C16 17, 20 15, 22 12" stroke="#c8d8c0" stroke-width="1" stroke-linecap="round"/>
      </svg>
      <span class="nav-logo-text">Growease</span>
    </a>
    ${pages.map((p) => `<a href="${p.href}">${p.label}</a>`).join("")}
  `;

  // Insert into DOM in correct visual order (prepend reverses, so insert last-first)
  const body = document.body;
  body.prepend(mobileMenu); // hidden overlay, order doesn't matter visually
  body.prepend(nav); // sticky nav
  body.prepend(banner); // topmost promo bar

  // Hamburger toggle
  const hamburgerBtn = document.getElementById("hamburgerBtn");
  function openMenu() {
    mobileMenu.classList.add("open");
    hamburgerBtn.classList.add("is-open");
    document.body.style.overflow = "hidden";
  }
  function closeMenu() {
    mobileMenu.classList.remove("open");
    hamburgerBtn.classList.remove("is-open");
    document.body.style.overflow = "";
  }
  hamburgerBtn.addEventListener("click", openMenu);
  document.getElementById("mobileClose").addEventListener("click", closeMenu);
  mobileMenu.querySelectorAll("a").forEach((a) => {
    a.addEventListener("click", closeMenu);
  });
})();
