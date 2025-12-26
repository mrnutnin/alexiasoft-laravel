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

// Nav Scroll Spy
window.addEventListener('scroll', () => {
    let current = '';
    document.querySelectorAll('section').forEach(section => {
        if (pageYOffset >= section.offsetTop - 150) current = section.getAttribute('id');
    });
    document.querySelectorAll('.nav-menu a').forEach(a => {
        a.classList.remove('active');
        if (a.getAttribute('href').includes(current)) a.classList.add('active');
    });
});

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
        init: function() {
            console.log('Portfolio Swiper initialized');
        },
    },
});

document.addEventListener("DOMContentLoaded", function () {
    console.log("Scroll Reveal Loaded"); // 🔍 debug

    const items = document.querySelectorAll(".scroll-reveal");
    if (!items.length) return;

    const observer = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("active");
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15 }
    );

    items.forEach(el => observer.observe(el));
});
