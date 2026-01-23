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
   MOBILE MENU LOGIC (เพิ่มส่วนนี้ต่อท้ายสุด)
   ========================================= */

// ฟังก์ชันหลักที่ปุ่ม Hamburger เรียกใช้
function toggleMobileMenu() {
    const menu = document.getElementById('navMenu');
    const icon = document.querySelector('.hamburger i');
    
    // 1. สลับ class 'active' เพื่อแสดง/ซ่อน เมนู
    menu.classList.toggle('active');
    
    // 2. เปลี่ยนไอคอน: ถ้าเปิดอยู่ให้เป็นกากบาท (X) ถ้าปิดให้เป็นขีด (Bars)
    if (icon) {
        if (menu.classList.contains('active')) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-xmark'); // ต้องมั่นใจว่าใช้ FontAwesome 6
        } else {
            icon.classList.remove('fa-xmark');
            icon.classList.add('fa-bars');
        }
    }
}

// เสริม: คลิกที่ Link ในเมนูแล้วให้ปิดเมนูอัตโนมัติ (UX ที่ดีบนมือถือ)
document.addEventListener("DOMContentLoaded", function() {
    const mobileLinks = document.querySelectorAll('.nav-menu a');
    
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            const menu = document.getElementById('navMenu');
            // เช็คว่าถ้าเป็นมือถือ (จอเล็ก) และเมนูเปิดอยู่ -> ให้สั่งปิด
            if (window.innerWidth < 991 && menu.classList.contains('active')) {
                 toggleMobileMenu();
            }
        });
    });
});
/* =========================================
   MOBILE MENU & DROPDOWN LOGIC (FINAL FIX)
   ========================================= */

document.addEventListener("DOMContentLoaded", function() {
    
    // 1. จัดการปุ่ม Dropdown (Services, Tools)
    const dropdownTriggers = document.querySelectorAll('.nav-menu .dropdown-trigger');

    dropdownTriggers.forEach(trigger => {
        // ต้องใช้ click event
        trigger.addEventListener('click', function(e) {
            // เช็คว่าเป็นมือถือหรือไม่
            if (window.innerWidth < 991) {
                e.preventDefault();    // 1. ห้ามลิงก์ทำงาน (ไม่กระโดดไป #services)
                e.stopPropagation();   // 2. ห้าม Event ทะลุไปปิดเมนูหลัก
                
                const wrapper = this.closest('.dropdown-wrapper');
                
                // ปิดอันอื่นก่อน (ถ้าอยากให้เปิดได้ทีละอัน)
                document.querySelectorAll('.dropdown-wrapper.active').forEach(w => {
                    if (w !== wrapper) w.classList.remove('active');
                });

                // เปิด/ปิด ตัวที่กด
                wrapper.classList.toggle('active');
            }
        });
    });

    // 2. จัดการลิงก์ธรรมดา (Home, Portfolio, About, Contact)
    // เมนูพวกนี้พอกดแล้ว ต้องปิด Navbar ทิ้ง
    const normalLinks = document.querySelectorAll('.nav-menu a:not(.dropdown-trigger)');
    
    normalLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth < 991) {
                // ปิดเมนู
                document.getElementById('navMenu').classList.remove('active');
                
                // เปลี่ยนไอคอนกลับเป็น 3 ขีด
                const icon = document.querySelector('.hamburger i');
                if(icon) {
                    icon.classList.remove('fa-xmark');
                    icon.classList.add('fa-bars');
                }
            }
        });
    });
});

// 3. ฟังก์ชันปุ่ม Hamburger (เรียกผ่าน onclick ใน HTML)
function toggleMobileMenu() {
    const menu = document.getElementById('navMenu');
    const icon = document.querySelector('.hamburger i');
    
    menu.classList.toggle('active');
    
    // เปลี่ยนไอคอน
    if (menu.classList.contains('active')) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-xmark');
    } else {
        icon.classList.remove('fa-xmark');
        icon.classList.add('fa-bars');
    }
}

