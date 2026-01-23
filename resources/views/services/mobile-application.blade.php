@extends('layouts.app')
@section('title', 'Mobile Application | AlexiaSoft')
@section('content')

    {{-- Import Font --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
    </style>

    <style>
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
            font-size: 2.0rem;
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

        .phone-wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            perspective: 1000px;
        }

        .phone-frame {
            width: 280px;
            height: 500px;
            background: #0f172a;
            border-radius: 40px;
            border: 6px solid #334155;
            position: relative;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
            transform: rotateY(-10deg) rotateX(5deg);
            transition: transform 0.5s ease;
            overflow: hidden;
            z-index: 2;
        }
        .phone-frame:hover { transform: rotateY(0) rotateX(0); }

        .phone-notch {
            position: absolute;
            top: 0; left: 50%;
            transform: translateX(-50%);
            width: 100px; height: 24px;
            background: #334155;
            border-bottom-left-radius: 14px;
            border-bottom-right-radius: 14px;
            z-index: 10;
        }

        .phone-screen {
            width: 100%; height: 100%;
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
            padding: 60px 20px;
            display: flex; flex-direction: column; gap: 15px;
        }

        .app-card {
            background: rgba(255,255,255,0.07);
            border-radius: 16px;
            padding: 15px;
            border: 1px solid rgba(255,255,255,0.05);
        }
        .skeleton { background: rgba(255,255,255,0.1); border-radius: 4px; }
        .h-8 { height: 8px; margin-bottom: 6px; }
        .w-50 { width: 50%; } .w-70 { width: 70%; }
        .chart-bar { flex: 1; border-radius: 4px 4px 0 0; }

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
        .icon-1 { top: 80px; right: -10px; color: #000; animation-delay: 0s; }
        .icon-2 { bottom: 100px; left: -10px; color: #3ddc84; animation-delay: 2s; }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 100px;
        }

        .feature-box {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            transition: transform 0.3s;
            border: 1px solid rgba(255,255,255,0.6);
        }
        .feature-box:hover { transform: translateY(-5px); }
        
        .icon-circle {
            width: 50px; height: 50px;
            background: #f0fdf4;
            color: #22c55e;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .tech-strip {
            display: flex; gap: 15px; flex-wrap: wrap; margin-top: 40px;
        }
        .tech-badge {
            display: flex; align-items: center; gap: 8px;
            background: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            color: #475569;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        @media (max-width: 900px) {
            .hero-section { grid-template-columns: 1fr; text-align: center; }
            .hero-desc { margin-left: auto; margin-right: auto; }
            .phone-wrapper { margin-top: 60px; }
            .tech-strip { justify-content: center; }
            h1 { font-size: 2.5rem; }
        }
    </style>
    
    <div class="container-custom">
        
        {{-- 1. HERO SECTION --}}
        <section class="hero-section">
            <div>
                <span class="hero-tag">
                    <i class="fa-solid fa-mobile-screen"></i>
                    <span data-en="Mobile Application" data-th="แอปพลิเคชันมือถือ">Mobile Application</span>
                </span>
                
                <h1>
                    <span data-en="Connect Customers" data-th="เชื่อมต่อลูกค้า">Connect Customers</span> <br>
                    <span class="text-highlight" data-en="Anytime, Anywhere" data-th="ได้ทุกที่ทุกเวลา">Anytime, Anywhere</span>
                </h1>
                
                <p class="hero-desc"
                   data-en="We develop beautiful, user-friendly, and fast mobile applications (iOS & Android) to deliver the best experience for your brand."
                   data-th="บริการพัฒนาแอปพลิเคชันมือถือ (iOS & Android) ที่เน้นความสวยงาม ใช้งานง่าย และทำงานรวดเร็ว เพื่อสร้างประสบการณ์ที่ดีที่สุดให้กับแบรนด์ของคุณ">
                We develop beautiful, user-friendly, and fast mobile applications (iOS & Android) to deliver the best experience for your brand. 
                </p>

                <div style="display: flex; gap: 15px; align-items: center;" class="d-mobile-center">
                    <a href="{{ route('contact.page') }}" class="btn-theme">
                        <span data-en="Start Your Project" data-th="เริ่มโปรเจกต์ของคุณ">Start Your Project</span>
                        <i class="fa-solid fa-rocket"></i>
                    </a>
                </div>

                <div class="tech-strip">
                    <div class="tech-badge"><i class="fa-brands fa-apple"></i> iOS</div>
                    <div class="tech-badge"><i class="fa-brands fa-android" style="color: #3ddc84;"></i> Android</div>
                    <div class="tech-badge"><i class="fa-brands fa-react" style="color: #61dafb;"></i> React Native</div>
                    <div class="tech-badge"><i class="fa-solid fa-f" style="color: #02569b;"></i> Flutter</div>
                </div>
            </div>

            {{-- Right Content: Phone Graphic --}}
            <div class="phone-wrapper">
                <div class="phone-frame">
                    <div class="phone-notch"></div>
                    <div class="phone-screen">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                            <div style="font-size: 0.8rem; color: #94a3b8;">Welcome back</div>
                            <div style="width: 28px; height: 28px; background: #22c55e; border-radius: 50%;"></div>
                        </div>
                        <div class="app-card" style="background: linear-gradient(135deg, #22c55e 0%, #3b82f6 100%); border: none;">
                            <div style="color: rgba(255,255,255,0.8); font-size: 0.8rem;">Total Users</div>
                            <div style="color: white; font-size: 1.5rem; font-weight: 700;">12,450</div>
                        </div>
                        <div class="app-card" style="flex: 1; display: flex; flex-direction: column;">
                            <div style="color: #94a3b8; font-size: 0.8rem; margin-bottom: 15px;">Weekly Stats</div>
                            <div style="display: flex; align-items: flex-end; gap: 8px; height: 100%;">
                                <div class="chart-bar" style="height: 40%; background: #334155;"></div>
                                <div class="chart-bar" style="height: 60%; background: #334155;"></div>
                                <div class="chart-bar" style="height: 85%; background: #22c55e;"></div>
                                <div class="chart-bar" style="height: 50%; background: #334155;"></div>
                            </div>
                        </div>
                        <div class="app-card">
                            <div style="display: flex; gap: 10px; align-items: center;">
                                <div style="width: 32px; height: 32px; background: rgba(255,255,255,0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa-solid fa-bell" style="color: #fbbf24; font-size: 0.8rem;"></i>
                                </div>
                                <div style="flex: 1;">
                                    <div class="skeleton h-8 w-50"></div>
                                    <div class="skeleton h-8 w-70" style="opacity: 0.5;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-icon icon-1"><i class="fa-brands fa-apple"></i></div>
                <div class="float-icon icon-2"><i class="fa-brands fa-android"></i></div>
            </div>
        </section>

        {{-- 2. FEATURES GRID --}}
        <section style="margin-bottom: 80px;">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 2rem; font-weight: 700; color: #1e293b;"
                    data-en="Why have a Mobile App?" data-th="ทำไมต้องมี Mobile App?">
                    Why have a Mobile App?
                </h2>
                <p style="color: var(--text-sub);"
                   data-en="Get closer to your customers than ever before."
                   data-th="เข้าถึงลูกค้าได้ใกล้ชิดกว่าที่เคย">
                Get closer to your customers than ever before.
                </p>
            </div>

            <div class="features-grid">
                <div class="feature-box">
                    <div class="icon-circle">
                        <i class="fa-solid fa-fingerprint"></i>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 10px;"
                        data-en="Native Features" data-th="ฟีเจอร์พื้นฐาน">Native Features</h3>
                    <p style="color: var(--text-sub);"
                       data-en="Fully utilize device potential like Camera, GPS, Fingerprint, and Face ID."
                       data-th="ดึงศักยภาพเครื่องมาใช้ได้เต็มที่ เช่น กล้อง, GPS, สแกนนิ้ว และ Face ID">
                       Fully utilize device potential like Camera, GPS, Fingerprint, and Face ID.
                    </p>
                </div>
                
                <div class="feature-box">
                    <div class="icon-circle" style="background: #eff6ff; color: #3b82f6;">
                        <i class="fa-solid fa-bell"></i>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 10px;"
                        data-en="Push Notifications" data-th="ระบบแจ้งเตือน">Push Notifications</h3>
                    <p style="color: var(--text-sub);"
                       data-en="Send promotions or order updates directly to customer screens instantly."
                       data-th="แจ้งเตือนโปรโมชั่น หรือสถานะคำสั่งซื้อถึงหน้าจอลูกค้าได้ทันที">
                       Send promotions or order updates directly to customer screens instantly.
                    </p>
                </div>

                <div class="feature-box">
                    <div class="icon-circle" style="background: #fff7ed; color: #f97316;">
                        <i class="fa-solid fa-rocket"></i>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 10px;"
                        data-en="Better Performance" data-th="ประสิทธิภาพสูง">Better Performance</h3>
                    <p style="color: var(--text-sub);"
                       data-en="Smoother and more stable than websites, with Offline Mode support."
                       data-th="การทำงานที่ลื่นไหลและเสถียรกว่าเว็บไซต์ทั่วไป พร้อมระบบ Offline Mode">
                       Smoother and more stable than websites, with Offline Mode support.
                    </p>
                </div>
            </div>
        </section>

    </div>

@endsection