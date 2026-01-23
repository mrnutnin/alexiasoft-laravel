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
    if (!location.pathname.endsWith('/')) return; // ทำงานเฉพาะหน้า Home

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
/*ส่วนproject*/ 
const scrollReveal = () => {
    const items = document.querySelectorAll('.project-item');
    items.forEach(item => {
        const itemTop = item.getBoundingClientRect().top;
        const triggerPoint = window.innerHeight - 100;
        if (itemTop < triggerPoint) {
            item.classList.add('reveal');
        }
    });
}

window.addEventListener('scroll', scrollReveal);
window.addEventListener('load', scrollReveal);

document.addEventListener("DOMContentLoaded", function() {
    const lightbox = document.getElementById("lightbox");
    const lightboxImg = document.getElementById("lightbox-img");
    
    // เลือกรูปภาพทั้งหมดที่เป็นส่วนประกอบของงาน (ทั้งแผ่นหน้าและแผ่นหลัง)
    const projectImages = document.querySelectorAll(".img-main, .img-sub");

    projectImages.forEach(img => {
        // เปลี่ยนเมาส์เป็นรูปแว่นขยายเพื่อบอกว่ากดได้
        img.style.cursor = "zoom-in";

        img.addEventListener("click", function() {
            // ดึงที่อยู่ไฟล์รูปภาพจากตัวที่ถูกคลิก
            const imageSrc = this.getAttribute('src');
            
            // ใส่รูปเข้าไปใน Lightbox
            lightboxImg.src = imageSrc;
            
            // แสดงผล Lightbox
            lightbox.style.display = "flex";
            
            // ล็อกการ Scroll หน้าจอหลัก
            document.body.style.overflow = "hidden";
            
            // เพิ่ม Class เพื่อให้เกิด Animation ขยายตัว
            setTimeout(() => {
                lightbox.classList.add("active");
            }, 10);
        });
    });

    // ฟังก์ชันปิด (เมื่อคลิกพื้นหลัง หรือปุ่ม X)
    window.closeLightbox = function() {
        lightbox.classList.remove("active");
        setTimeout(() => {
            lightbox.style.display = "none";
            document.body.style.overflow = "auto";
        }, 300);
    };
});
/* =========================================
   MOBILE MENU & DROPDOWN LOGIC (CLEAN VERSION)
   ========================================= */

document.addEventListener("DOMContentLoaded", function() {
    const navMenu = document.getElementById('navMenu');
    const hamburgerIcon = document.querySelector('.hamburger i');

    // 1. จัดการ Dropdown (Services, Tools)
    const dropdownTriggers = document.querySelectorAll('.nav-menu .dropdown-trigger');

    dropdownTriggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            if (window.innerWidth < 991) {
                e.preventDefault(); 
                e.stopPropagation(); // หยุดไม่ให้ Event ไหลไปโดนคำสั่งปิดเมนูข้างล่าง
                
                const wrapper = this.closest('.dropdown-wrapper');
                
                // ปิด Dropdown อันอื่นก่อน
                document.querySelectorAll('.dropdown-wrapper.active').forEach(w => {
                    if (w !== wrapper) w.classList.remove('active');
                });

                // เปิด/ปิด ตัวที่กด
                wrapper.classList.toggle('active');
            }
        });
    });

    // 2. จัดการลิงก์ธรรมดา (กดแล้วให้ปิดเมนูทันที)
    // ใช้ Selector ที่เจาะจงเฉพาะลิงก์ที่ "ไม่ใช่" ตัวเปิดเมนูย่อย และ "ไม่ใช่" ลิงก์ที่อยู่ในเมนูย่อย
    const normalLinks = document.querySelectorAll('.nav-menu > a, .footer-sub-list a, .dropdown-menu a');
    
    normalLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth < 991) {
                // ปิด Navbar
                navMenu.classList.remove('active');
                // เปลี่ยนไอคอนกลับเป็น 3 ขีด
                if (hamburgerIcon) {
                    hamburgerIcon.classList.remove('fa-xmark');
                    hamburgerIcon.classList.add('fa-bars');
                }
            }
        });
    });
});

// 3. ฟังก์ชันปุ่ม Hamburger (ใช้ onclick="toggleMobileMenu()" ใน HTML)
function toggleMobileMenu() {
    const menu = document.getElementById('navMenu');
    const icon = document.querySelector('.hamburger i');
    
    if (!menu || !icon) return;

    menu.classList.toggle('active');
    
    if (menu.classList.contains('active')) {
        icon.className = 'fa-solid fa-xmark';
    } else {
        icon.className = 'fa-solid fa-bars';
        // เมื่อปิดเมนูหลัก ให้สั่งปิด dropdown ที่ค้างอยู่ทั้งหมดด้วย
        document.querySelectorAll('.dropdown-wrapper').forEach(w => w.classList.remove('active'));
    }
}