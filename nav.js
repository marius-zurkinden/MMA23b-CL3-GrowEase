// nav.js – Burger-Menu Logik
document.addEventListener('DOMContentLoaded', function () {
  var hamburgerBtn = document.getElementById('hamburgerBtn');
  var mobileMenu   = document.getElementById('mobileMenu');
  var mobileClose  = document.getElementById('mobileClose');

  if (!hamburgerBtn || !mobileMenu || !mobileClose) {
    console.warn('nav.js: Elemente nicht gefunden');
    return;
  }

  function openMenu() {
    mobileMenu.style.display = 'flex';
    hamburgerBtn.classList.add('is-open');
    document.body.style.overflow = 'hidden';
  }

  function closeMenu() {
    mobileMenu.style.display = 'none';
    hamburgerBtn.classList.remove('is-open');
    document.body.style.overflow = '';
  }

  hamburgerBtn.addEventListener('click', openMenu);
  mobileClose.addEventListener('click', closeMenu);

  mobileMenu.querySelectorAll('a').forEach(function (a) {
    a.addEventListener('click', closeMenu);
  });

  mobileMenu.addEventListener('click', function (e) {
    if (e.target === mobileMenu) closeMenu();
  });
});
