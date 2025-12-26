/* =========================================================
   DOM READY
========================================================= */
document.addEventListener('DOMContentLoaded', () => {

    /* ================= LANG SWITCHER ================= */
    const langButtons = document.querySelectorAll('.lang-btn');

    langButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            setLang(btn.dataset.lang);
        });
    });

    /* ================= SCROLL REVEAL ================= */
    const revealElements = () => {
        const reveals = document.querySelectorAll('.scroll-reveal');
        const windowHeight = window.innerHeight;

        reveals.forEach(el => {
            const elementTop = el.getBoundingClientRect().top;
            const elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                el.classList.add('active');
            }
        });
    };

    window.addEventListener('scroll', revealElements);
    window.addEventListener('load', revealElements);

    // ================================
    // Nav Scroll Spy (IMPROVED)
    // ================================
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-menu a');

    function updateActiveNav() {
        let currentSection = null;

        sections.forEach(section => {
            const rect = section.getBoundingClientRect();

            // section ที่อยู่กลางจอ (แม่นมาก)
            if (
                rect.top <= window.innerHeight / 2 &&
                rect.bottom >= window.innerHeight / 2
            ) {
                currentSection = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');

            if (
                currentSection &&
                link.getAttribute('href') === `#${currentSection}`
            ) {
                link.classList.add('active');
            }
        });
    }

    // run ทั้งตอนโหลด และตอน scroll
    window.addEventListener('scroll', updateActiveNav);
    window.addEventListener('load', updateActiveNav);


    /* ================= PORTFOLIO SWIPER ================= */
    if (typeof Swiper !== 'undefined' && document.querySelector('.portfolioSwiper')) {
        new Swiper('.portfolioSwiper', {
            slidesPerView: 2,
            spaceBetween: 15,
            grabCursor: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                320: { slidesPerView: 2 },
                601: { slidesPerView: 3 },
                951: { slidesPerView: 4 },
            },
            on: {
                init() {
                    console.log('Portfolio Swiper initialized');
                }
            }
        });
    }

});


/* =========================================================
   LANG FUNCTION (GLOBAL)
========================================================= */
window.setLang = function (lang) {

    // toggle active button
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.classList.toggle('active', btn.dataset.lang === lang);
    });

    const content = document.getElementById('main-content');
    if (content) content.classList.add('content-hidden');

    setTimeout(() => {
        document.querySelectorAll('[data-en]').forEach(el => {
            el.innerHTML = lang === 'en'
                ? el.dataset.en
                : el.dataset.th;
        });

        if (content) content.classList.remove('content-hidden');
    }, 300);
};
