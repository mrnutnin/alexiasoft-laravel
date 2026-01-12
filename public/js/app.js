// Lang Switcher with Animation
function setLang(lang) {
    document.querySelectorAll('.lang-btn').forEach(btn => btn.classList.remove('active'));
    const activeBtn = document.querySelector(`.lang-btn[onclick="setLang('${lang}')"]`);
    if (activeBtn) activeBtn.classList.add('active');

    const content = document.getElementById('main-content');
    content.classList.add('content-hidden');

    setTimeout(() => {
        document.querySelectorAll('[data-en]').forEach(el => {
            el.innerHTML = lang === 'en' ? el.dataset.en : el.dataset.th;
        });
        content.classList.remove('content-hidden');
    }, 350);
}

// Scroll Reveal Animation
const revealElements = () => {
    const reveals = document.querySelectorAll('.scroll-reveal');
    reveals.forEach(element => {
        const windowHeight = window.innerHeight;
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;

        if (elementTop < windowHeight - elementVisible) {
            element.classList.add('active');
        }
    });
};

// Initialize scroll reveal on load
window.addEventListener('load', revealElements);
window.addEventListener('scroll', revealElements);

/* =========================NAV SCROLL SPY (FIXED) ✔ underline ขึ้นทันที========================= */
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-menu a');

function updateActiveNav() {
    let currentSection = null;
    const viewportCenter = window.innerHeight / 2;

    sections.forEach(section => {
        const rect = section.getBoundingClientRect();
        if (rect.top <= viewportCenter && rect.bottom >= viewportCenter) {
            currentSection = section.id;
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

window.addEventListener('scroll', updateActiveNav);
window.addEventListener('load', updateActiveNav);

// Portfolio Swiper
const portfolioSwiper = new Swiper('.portfolioSwiper', {
    slidesPerView: 2,
    spaceBetween: 15,
    loop: false,
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
        // Mobile
        320: {
            slidesPerView: 2,
            spaceBetween: 15,
        },
        // Tablet
        601: {
            slidesPerView: 3,
            spaceBetween: 18,
        },
        // Desktop
        951: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    },
    on: {
        init: function () {
            console.log('Portfolio Swiper initialized');
        },
    },
});
// Force reveal on page load (for Contact page)
window.addEventListener('load', () => {
    const reveals = document.querySelectorAll('.scroll-reveal');

    reveals.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight - 100) {
            el.classList.add('active');
        }
    });
});


