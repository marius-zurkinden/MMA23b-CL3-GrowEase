// nav.js – Burger-Menu Logik (Navigation ist direkt im HTML)
(function () {
  var hamburgerBtn = document.getElementById('hamburgerBtn');
  var mobileMenu   = document.getElementById('mobileMenu');
  var mobileClose  = document.getElementById('mobileClose');

  if (!hamburgerBtn || !mobileMenu) return;

  function openMenu() {
    mobileMenu.classList.add('open');
    hamburgerBtn.classList.add('is-open');
    document.body.style.overflow = 'hidden';
  }

  function closeMenu() {
    mobileMenu.classList.remove('open');
    hamburgerBtn.classList.remove('is-open');
    document.body.style.overflow = '';
  }

  hamburgerBtn.addEventListener('click', openMenu);
  mobileClose.addEventListener('click', closeMenu);

  mobileMenu.querySelectorAll('a').forEach(function (a) {
    a.addEventListener('click', closeMenu);
  });

  // Schliessen bei Klick auf den dunklen Hintergrund
  mobileMenu.addEventListener('click', function (e) {
    if (e.target === mobileMenu) closeMenu();
  });
})();
