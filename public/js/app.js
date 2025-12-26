/* ===============================DOM READY================================ */
document.addEventListener('DOMContentLoaded', () => {
    /* ========= LANG SWITCHER ========= */
    const langButtons = document.querySelectorAll('.lang-btn');

    langButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const lang = btn.dataset.lang;
            setLang(lang);
        });
    });

    /* ========= SCROLL SPY ========= */
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-menu a');

    function onScroll() {
        const scrollPos = window.scrollY + 160; // เผื่อ navbar fixed

        sections.forEach(section => {
            const top = section.offsetTop;
            const height = section.offsetHeight;
            const id = section.getAttribute('id');

            if (scrollPos >= top && scrollPos < top + height) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${id}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }

    window.addEventListener('scroll', onScroll);
    onScroll();

    /* ========= PORTFOLIO SWIPER ========= */
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
        });
    }

});


/* ===============================LANG FUNCTION (GLOBAL)================================ */
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
