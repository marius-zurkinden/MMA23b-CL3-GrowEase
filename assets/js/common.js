document.addEventListener('DOMContentLoaded', function () {
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileClose = document.getElementById('mobileClose');

    function openMenu() {
        mobileMenu.classList.add('is-open');
        hamburgerBtn.classList.add('is-open');
        hamburgerBtn.setAttribute('aria-label', 'Menü schliessen');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        mobileMenu.classList.remove('is-open');
        hamburgerBtn.classList.remove('is-open');
        hamburgerBtn.setAttribute('aria-label', 'Menü öffnen');
        document.body.style.overflow = '';
    }

    if (hamburgerBtn && mobileMenu && mobileClose) {
        hamburgerBtn.addEventListener('click', function () {
            if (mobileMenu.classList.contains('is-open')) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        mobileClose.addEventListener('click', closeMenu);

        mobileMenu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeMenu);
        });

        mobileMenu.addEventListener('click', function (event) {
            if (event.target === mobileMenu) closeMenu();
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeMenu();
        });
    }

    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('#sliderDots button');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        if (slides[index]) slides[index].classList.add('active');
        if (dots[index]) dots[index].classList.add('active');
        currentSlide = index;
    }

    if (slides.length > 0) {
        dots.forEach(dot => {
            dot.addEventListener('click', () => showSlide(Number(dot.dataset.slide)));
        });
        setInterval(() => showSlide((currentSlide + 1) % slides.length), 4000);
    }

    const filterButtons = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.dataset.filter;
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            productCards.forEach(card => {
                const category = card.dataset.category;
                card.style.display = filter === 'Alle' || filter === category ? 'block' : 'none';
            });
        });
    });

    const accountForm = document.getElementById('accountForm');

    if (accountForm) {
        accountForm.addEventListener('submit', (event) => {
            const fields = {
                vorname: 'Bitte gib deinen Vornamen ein.',
                nachname: 'Bitte gib deinen Nachnamen ein.',
                adresse: 'Bitte gib deine Adresse ein.',
                postleitzahl: 'Bitte gib eine gültige 4-stellige Postleitzahl ein.',
                stadt: 'Bitte gib deine Stadt ein.',
                telefon: 'Bitte gib die Telefonnummer im Format 041 000 00 00 ein.',
                email: 'Bitte gib eine gültige E-Mail-Adresse ein.'
            };

            let isValid = true;

            Object.keys(fields).forEach(id => {
                const input = document.getElementById(id);
                const error = input.parentElement.querySelector('.error');
                error.textContent = '';
                if (!input.value.trim()) {
                    error.textContent = fields[id];
                    isValid = false;
                }
            });

            const postleitzahl = document.getElementById('postleitzahl');
            const telefon = document.getElementById('telefon');
            const email = document.getElementById('email');

            if (postleitzahl.value.trim() && !/^\d{4}$/.test(postleitzahl.value.trim())) {
                postleitzahl.parentElement.querySelector('.error').textContent = fields.postleitzahl;
                isValid = false;
            }

            if (telefon.value.trim() && !/^0\d{2} \d{3} \d{2} \d{2}$/.test(telefon.value.trim())) {
                telefon.parentElement.querySelector('.error').textContent = fields.telefon;
                isValid = false;
            }

            if (email.value.trim() && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
                email.parentElement.querySelector('.error').textContent = fields.email;
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
                document.getElementById('formMessage').textContent = 'Bitte korrigiere die markierten Felder.';
                return;
            }

            const submitBtn = accountForm.querySelector('.submit-btn');
            submitBtn.classList.add('loading');
            document.getElementById('formMessage').textContent = 'Daten werden verarbeitet ...';
        });
    }

    const startGameBtn = document.getElementById('startGameBtn');

    if (startGameBtn) {
        startGameBtn.addEventListener('click', () => {
            document.querySelector('.game-box').classList.add('running');
            document.getElementById('gameText').textContent = 'Das Game läuft. Der richtige Game-Code kann später hier eingefügt werden.';
        });
    }
});
