@extends('layouts.app')
@section('title', 'Web Application | AlexiaSoft')
@section('content')

    {{-- Import Font --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
    </style>

    <style>
        /* --- THEME CONFIG --- */
        :root {
            --primary-grad: linear-gradient(135deg, #22c55e 0%, #3b82f6 100%); 
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
            padding: 140px 0 80px;
        }

        .hero-tag {
            display: inline-block;
            color: #22c55e;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 2.0rem;
            margin-bottom: 15px;
        }

        h1 {
            font-size: 3.5rem;
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
            box-shadow: 0 10px 20px -5px rgba(34, 197, 94, 0.4);
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }
        .btn-theme:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(34, 197, 94, 0.5);
        }

        /* --- GRAPHIC --- */
        .floating-card {
            background: #1e293b; 
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            position: relative;
            transform: perspective(1000px) rotateY(-5deg) rotateX(2deg);
            transition: transform 0.5s ease;
        }
        .floating-card:hover { transform: perspective(1000px) rotateY(0) rotateX(0); }

        .code-line { height: 12px; border-radius: 6px; margin-bottom: 12px; opacity: 0.8; }
        .code-1 { width: 40%; background: #f472b6; }
        .code-2 { width: 70%; background: #60a5fa; margin-left: 20px; }
        .code-3 { width: 60%; background: #34d399; margin-left: 20px; }
        .code-4 { width: 30%; background: #fbbf24; }

        .float-icon {
            position: absolute;
            width: 70px; height: 70px;
            background: white;
            border-radius: 18px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            font-size: 2rem;
            animation: float 4s ease-in-out infinite;
        }
        .icon-1 { top: -30px; right: -30px; color: #61dafb; }
        .icon-2 { bottom: -30px; left: -30px; color: #f05340; animation-delay: 2s; }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 100px;
        }

        .feature-box {
            background: rgba(255, 255, 255, 0.8); 
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            transition: transform 0.3s;
            border: 1px solid rgba(255,255,255,0.8);
        }
        .feature-box:hover { transform: translateY(-5px); }

        .icon-circle {
            width: 50px; height: 50px;
            background: #f0fdf4; 
            color: #10b981;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .tech-strip { display: flex; gap: 20px; flex-wrap: wrap; margin-top: 40px; }
        .tech-badge {
            display: flex; align-items: center; gap: 8px;
            background: white;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            color: #475569;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        @media (max-width: 900px) {
            .hero-section { grid-template-columns: 1fr; text-align: center; }
            h1 { font-size: 2.5rem; }
            .hero-desc { margin-left: auto; margin-right: auto; }
            .tech-strip { justify-content: center; }
        }
    </style>

    <div class="container-custom">
        
        {{-- 1. HERO SECTION --}}
        <section class="hero-section">
            <div>
                <span class="hero-tag">
                    <i class="fa-solid fa-code"></i> 
                    <span data-en="Web Application Service" data-th="บริการเว็บแอปพลิเคชัน">Web Application Service</span>
                </span>
                
                <h1>
                    <span data-en="Web Applications" data-th="แอปพลิเคชันบนเว็บ">Web Applications</span> <br>
                    <span class="text-highlight" data-en="Powerful" data-th="ที่ทรงพลัง">Powerful</span> 
                    <span data-en="& Seamless" data-th="และลื่นไหล">& Seamless</span>
                </h1>
                
                <p class="hero-desc"
                   data-en="Transform your website into a powerful Web App that works like desktop software. Fast, secure, and accessible on any device without installation."
                   data-th="เปลี่ยนเว็บไซต์ธรรมดาให้เป็น Web App ที่ทำงานได้เหมือนโปรแกรมบนคอมพิวเตอร์ รวดเร็ว ปลอดภัย และใช้งานได้ทุกอุปกรณ์โดยไม่ต้องติดตั้ง">
                </p>

                <div style="display: flex; gap: 15px; align-items: center;" class="d-mobile-center">
                    <a href="{{ route('contact.page') }}" class="btn-theme">
                        <span data-en="Start Your Project" data-th="เริ่มโปรเจกต์ของคุณ">Start Your Project</span> 
                        <i class="fa-solid fa-rocket"></i>
                    </a>
                </div>

                <div class="tech-strip">
                    <div class="tech-badge"><i class="fa-brands fa-react" style="color: #61dafb;"></i> React</div>
                    <div class="tech-badge"><i class="fa-brands fa-vuejs" style="color: #42b883;"></i> Vue.js</div>
                    <div class="tech-badge"><i class="fa-brands fa-laravel" style="color: #f05340;"></i> Laravel</div>
                </div>
            </div>

            <div style="position: relative;">
                <div class="floating-card">
                    <div style="display: flex; gap: 8px; margin-bottom: 20px;">
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: #ef4444;"></div>
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: #f59e0b;"></div>
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: #22c55e;"></div>
                    </div>
                    
                    <div style="font-family: monospace; color: #cbd5e1; font-size: 0.9rem;">
                        <span style="color: #c084fc;">const</span> WebApp = {<br>
                        &nbsp;&nbsp;performance: <span style="color: #34d399;">'Fast'</span>,<br>
                        &nbsp;&nbsp;security: <span style="color: #34d399;">'High'</span>,<br>
                        &nbsp;&nbsp;accessibility: <span style="color: #34d399;">'Anywhere'</span><br>
                        };<br><br>
                        <span style="color: #60a5fa;">// Deploying to Cloud...</span>
                    </div>

                    <div style="margin-top: 30px; background: rgba(255,255,255,0.1); padding: 15px; border-radius: 10px;">
                        <div class="code-line code-1"></div>
                        <div class="code-line code-2"></div>
                        <div class="code-line code-3"></div>
                    </div>
                </div>

                <div class="float-icon icon-1"><i class="fa-brands fa-react"></i></div>
                <div class="float-icon icon-2"><i class="fa-brands fa-laravel"></i></div>
            </div>
        </section>

        {{-- 2. FEATURES GRID --}}
        <section style="margin-bottom: 80px;">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 2rem; font-weight: 700; color: #1e293b;"
                    data-en="Why Web Application?" data-th="ทำไมต้อง Web Application?">
                    Why Web Application?
                </h2>
                <p style="color: var(--text-sub);"
                   data-en="Elevate your business operations with modern technology."
                   data-th="ยกระดับการทำงานขององค์กร ด้วยเทคโนโลยีที่ทันสมัย">
                </p>
            </div>

            

[Image of progressive web app architecture diagram]


            <div class="features-grid">
                <div class="feature-box">
                    <div class="icon-circle"><i class="fa-solid fa-cloud"></i></div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 10px;"
                        data-en="Accessible Anywhere" data-th="เข้าถึงได้ทุกที่">Accessible Anywhere</h3>
                    <p style="color: var(--text-sub);"
                       data-en="Work from anywhere with internet access, not tied to a specific computer."
                       data-th="ทำงานได้ทุกที่ที่มีอินเทอร์เน็ต ไม่ยึดติดกับคอมพิวเตอร์เครื่องเดิม">
                    </p>
                </div>
                
                <div class="feature-box">
                    <div class="icon-circle" style="background: #eff6ff; color: #3b82f6;"><i class="fa-solid fa-sync"></i></div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 10px;"
                        data-en="Real-time Data" data-th="ข้อมูลแบบเรียลไทม์">Real-time Data</h3>
                    <p style="color: var(--text-sub);"
                       data-en="Data updates instantly. No need to wait for file syncing."
                       data-th="ข้อมูลอัปเดตทันทีที่ใช้งาน ไม่ต้องรอ Sync ไฟล์ไปมาให้วุ่นวาย">
                    </p>
                </div>

                <div class="feature-box">
                    <div class="icon-circle" style="background: #fff7ed; color: #f97316;"><i class="fa-solid fa-mobile-screen"></i></div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 10px;"
                        data-en="No Installation" data-th="ไม่ต้องติดตั้ง">No Installation</h3>
                    <p style="color: var(--text-sub);"
                       data-en="Open via Browser (Chrome, Safari) immediately. No need to install heavy software."
                       data-th="เปิดผ่าน Browser (Chrome, Safari) ได้เลย ไม่ต้องลงโปรแกรมให้หนักเครื่อง">
                    </p>
                </div>
            </div>
        </section>
    </div>
    
@endsection