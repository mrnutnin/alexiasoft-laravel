/* ===============================
   DOM READY
================================ */
document.addEventListener('DOMContentLoaded', () => {

    /* ========= LANG SWITCHER ========= */
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault(); // กันกรณีเป็น <a>
            setLang(btn.dataset.lang);
        });
    });

    /* ========= SCROLL SPY ========= */
    const sections = document.querySelectorAll('section[id]');
    // ❗ สำคัญ: ไม่เอาปุ่มภาษา
    const navLinks = document.querySelectorAll('.nav-menu a:not(.lang-btn)');

    function onScroll() {
        const scrollPos = window.scrollY + 160;

        sections.forEach(section => {
            const top = section.offsetTop;
            const height = section.offsetHeight;
            const id = section.getAttribute('id');

            if (scrollPos >= top && scrollPos < top + height) {
                navLinks.forEach(link => {
                    link.classList.toggle(
                        'active',
                        link.getAttribute('href') === `#${id}`
                    );
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


/* ===============================
   LANG FUNCTION (GLOBAL)
================================ */
window.setLang = function (lang) {

    // toggle active button (ไม่โดน scroll spy ลบแล้ว)
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.classList.toggle('active', btn.dataset.lang === lang);
    });

    const content = document.getElementById('main-content');
    if (content) content.classList.add('content-hidden');

    setTimeout(() => {
        document.querySelectorAll('[data-en]').forEach(el => {

            el.innerHTML = lang === 'en'
                ? el.dataset.en
                : (el.dataset.th ?? el.dataset.en);
        });

        if (content) content.classList.remove('content-hidden');
    }, 300);
};
