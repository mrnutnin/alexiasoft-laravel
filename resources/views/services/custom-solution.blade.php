@extends('layouts.app')
@section('title', 'Custom Solution | AlexiaSoft')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        /* โหลดฟอนต์มาจากgoogle font */
        
        :root {
            --primary-grad: linear-gradient(135deg, #22c55e 0%, #3b82f6 100%);
            --primary-shadow: rgba(34, 197, 94, 0.4);
            --text-main: #1e293b;
            --text-sub: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-main);
            overflow-x: hidden;
        }

        .container-custom {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* --- HERO SECTION --- */
        .hero-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 50px;
            padding: 110px 0 80px;
        }

        .hero-tag {
            display: inline-block;
            color: #22c55e;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 2.0rem; /* ปรับขนาดให้พอดี */
            margin-bottom: 15px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 25px;
            color: #0f172a;
        }

        .text-highlight {
            background: var(--primary-grad);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p.hero-desc {
            font-size: 1.15rem;
            color: var(--text-sub);
            line-height: 1.7;
            margin-bottom: 40px;
            max-width: 90%;
        }

        .btn-theme {
            background: var(--primary-grad);
            color: white;
            padding: 14px 32px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex; align-items: center; gap: 8px;
            box-shadow: 0 10px 20px -5px var(--primary-shadow);
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-theme:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(34, 197, 94, 0.5);
        }

        /* --- GRAPHIC: CODE WINDOW --- */
        .graphic-wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            perspective: 1000px;
        }

        .code-window {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            transform: rotateY(-10deg) rotateX(5deg);
            transition: transform 0.3s ease;
            padding: 25px;
            width: 100%;
            max-width: 450px;
            z-index: 2;
        }

        .code-window:hover { transform: rotateY(0deg) rotateX(0deg); }

        .code-header { display: flex; gap: 8px; margin-bottom: 20px; }
        .dot { width: 12px; height: 12px; border-radius: 50%; }

        .code-content {
            font-family: 'Courier New', monospace;
            color: #e2e8f0;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .float-icon {
            position: absolute;
            width: 65px; height: 65px;
            background: white;
            border-radius: 18px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            font-size: 2rem;
            animation: float 4s ease-in-out infinite;
            z-index: 3;
        }
        .icon-1 { top: -20px; right: 0; color: #61dafb; animation-delay: 0s; }
        .icon-2 { bottom: -20px; left: 0; color: #F05340; animation-delay: 2s; }

        @keyframes float {    
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }   /* ทำแอนิเมชั่นให้ไอคอนลอยขึ้นลง (Floating Effect) */

        /* --- FEATURES GRID --- */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 80px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.6);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            border-color: #22c55e;
            box-shadow: 0 20px 25px -5px rgba(34, 197, 94, 0.15);
        }

        .icon-circle {
            width: 60px; height: 60px;
            border-radius: 15px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .tech-strip {
            display: flex; justify-content: center; gap: 40px; flex-wrap: wrap;
            font-size: 2.5rem; color: var(--text-sub); opacity: 0.7;
        }
        .tech-icon { transition: 0.3s; cursor: pointer; }
        .tech-icon:hover { opacity: 1; transform: scale(1.1); }

        @media (max-width: 900px) {
            .hero-section { grid-template-columns: 1fr; text-align: center; }
            .hero-desc { margin-left: auto; margin-right: auto; }
            .graphic-wrapper { margin-top: 60px; }
            .d-mobile-center { justify-content: center; }
            h1 { font-size: 2.5rem; }
        }  /* ปรับแต่งหน้าจอสำหรับมือถือ (Mobile Responsive) */
    </style>

    <div class="container-custom">
        {{-- 1. HERO SECTION --}}
        <section class="hero-section">
            <div>
                <span class="hero-tag">
                    <i class="fa-solid fa-code"></i> 
                    <span data-en="Custom Software Development" data-th="บริการพัฒนาซอฟต์แวร์เฉพาะทาง">Custom Software Development</span>
                </span>
                
                <h1>
                    <span data-en="Build Exactly" data-th="สร้างสิ่งที่">Build Exactly</span><br>
                    <span class="text-highlight" data-en="What You Need" data-th="คุณต้องการจริงๆ">What You Need</span>
                </h1>
                
                <p class="hero-desc"
                   data-en="Don't settle for off-the-shelf software. We build scalable, secure, and high-performance solutions tailored to your specific business workflows."
                   data-th="อย่าทนใช้ซอฟต์แวร์สำเร็จรูปที่ไม่ตอบโจทย์ เราสร้างระบบที่ยืดหยุ่น ปลอดภัย และมีประสิทธิภาพสูง ที่ออกแบบมาเพื่อขั้นตอนการทำงานของคุณโดยเฉพาะ">
                   Don't settle for off-the-shelf software. We build scalable, secure, and high-performance solutions tailored to your specific business workflows.
                </p>

                <div style="display: flex; gap: 15px; align-items: center;" class="d-mobile-center">
                    <a href="{{ route('contact.page') }}" class="btn-theme">
                        <span data-en="Start Your Project" data-th="เริ่มโปรเจกต์ของคุณ">Start Your Project</span>
                        <i class="fa-solid fa-rocket"></i>
                    </a>
                </div>
            </div>

            {{-- Right Content: Code Window --}}
            <div class="graphic-wrapper">  
                <!-- กราฟิกหน้าต่างโค้ดแบบ 3D  -->
                <div class="float-icon icon-1"><i class="fa-brands fa-react"></i></div>
                {{-- ไอคอนลอยได้ตัวที่ 1 (React) มี Animation ลอยขึ้นลง --}}
                <div class="float-icon icon-2"><i class="fa-brands fa-laravel"></i></div>
                {{-- ไอคอนลอยได้ตัวที่ 2 (Laravel) --}}
                {{-- หน้าต่าง Code Editor จำลอง (ส่วนที่เอียง 3D) --}}
                <div class="code-window">
                    {{-- แถบหัวหน้าต่าง (Title Bar) --}}
                    <div class="code-header">
                        <div class="dot" style="background: #ff5f56;"></div>
                        <div class="dot" style="background: #ffbd2e;"></div>
                        <div class="dot" style="background: #27c93f;"></div>
                    </div>
                    <div class="code-content">
                        <span style="color: #c792ea;">const</span> <span style="color: #ffcb6b;">YourBusiness</span> = {<br>
                        &nbsp;&nbsp;type: <span style="color: #c3e88d;">'Unique'</span>,<br>
                        &nbsp;&nbsp;goal: <span style="color: #c3e88d;">'Growth'</span>,<br>
                        &nbsp;&nbsp;solution: <span style="color: #82aaff;">() =></span> {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #f07178;">return</span> <span style="color: #c3e88d;">'Custom Solution'</span>;<br>
                        &nbsp;&nbsp;}<br>
                        };<br><br>
                        <span style="color: #546e7a;">// Running optimization...</span><br>
                        <span style="color: #89ddff;">Success!</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- 2. FEATURES GRID --}}
        <section style="padding: 50px 0 80px;">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 2.5rem;" data-en="Why Choose Custom?" data-th="ทำไมต้องซอฟต์แวร์สั่งทำ?">Why Choose Custom?</h2>
                <p style="color: var(--text-sub);" data-en="Because your business is unique." data-th="เพราะธุรกิจของคุณมีเอกลักษณ์ ไม่เหมือนใคร">Because your business is unique.</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="icon-circle" style="background: rgba(34, 197, 94, 0.1); color: #22c55e;">
                        <i class="fa-solid fa-puzzle-piece"></i>
                    </div>
                    <h3 data-en="Perfect Fit 100%" data-th="เข้ากับระบบงาน 100%" style="font-size: 1.25rem; font-weight: 700; margin-bottom: 10px;">Perfect Fit 100%</h3>
                    <p data-en="Don't change how you work to fit software. We build software that fits you." 
                       data-th="ไม่ต้องปรับเปลี่ยนวิธีการทำงานของคุณเพื่อซอฟต์แวร์ แต่เราสร้างซอฟต์แวร์ที่ปรับเข้าหาคุณ" 
                       style="color: var(--text-sub); font-size: 0.95rem;">
                       Don't change how you work to fit software. We build software that fits you.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="icon-circle" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>
                    <h3 data-en="Scalability" data-th="รองรับการเติบโต" style="font-size: 1.25rem; font-weight: 700; margin-bottom: 10px;">Scalability</h3>
                    <p data-en="Start small and scale big. Add new features anytime you need without limits." 
                       data-th="เริ่มจากเล็กแล้วขยายใหญ่ เพิ่มฟีเจอร์ใหม่ๆ ได้ตลอดเวลาที่คุณต้องการ โดยไม่มีข้อจำกัด" 
                       style="color: var(--text-sub); font-size: 0.95rem;">
                       Start small and scale big. Add new features anytime you need without limits.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="icon-circle" style="background: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h3 data-en="High Security" data-th="ความปลอดภัยสูง" style="font-size: 1.25rem; font-weight: 700; margin-bottom: 10px;">High Security</h3>
                    <p data-en="You own 100% of your data with advanced security systems designed for your organization." 
                       data-th="คุณเป็นเจ้าของข้อมูล 100% พร้อมระบบความปลอดภัยขั้นสูงที่ออกแบบมาเฉพาะองค์กร" 
                       style="color: var(--text-sub); font-size: 0.95rem;">
                       You own 100% of your data with advanced security systems designed for your organization.
                    </p>
                </div>
            </div>
        </section>

        {{-- 3. TECH STACK --}}
        <section style="padding: 0 0 80px;">
            <div style="text-align: center;">
                <p style="text-transform: uppercase; letter-spacing: 2px; font-size: 0.8rem; color: var(--text-sub); margin-bottom: 30px;"
                    data-en="POWERED BY MODERN TECHNOLOGY" data-th="ขับเคลื่อนด้วยเทคโนโลยีทันสมัย">
                    POWERED BY MODERN TECHNOLOGY
                </p>
                <div class="tech-strip">
                    <i class="fa-brands fa-laravel tech-icon" title="Laravel"></i>
                    <i class="fa-brands fa-react tech-icon" title="React"></i>
                    <i class="fa-brands fa-vuejs tech-icon" title="Vue.js"></i>
                    <i class="fa-brands fa-node-js tech-icon" title="Node.js"></i>
                    <i class="fa-brands fa-aws tech-icon" title="AWS"></i>
                </div>
            </div>
        </section>
    </div>
@endsection