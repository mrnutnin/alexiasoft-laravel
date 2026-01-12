@extends('layouts.app')

@section('content')

    {{-- Import Font --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
    </style>

    <style>
        /* --- THEME CONFIG --- */
        :root {
            /* Theme เดิม: เขียว -> ฟ้า */
            --primary-grad: linear-gradient(135deg, #22c55e 0%, #3b82f6 100%);
            --primary-shadow: rgba(34, 197, 94, 0.4);
            
            --text-main: #1e293b;
            --text-sub: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-main);
            overflow-x: hidden;
            /* โปร่งแสงเพื่อให้เห็น Blob ด้านหลัง */
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
            padding: 120px 0 80px;
        }

        .hero-tag {
            display: inline-block;
            color: #22c55e;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
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

        /* ปุ่ม Theme */
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

        /* --- GRAPHIC: NETWORK HUB (ขวามือ) --- */
        .hub-wrapper {
            position: relative;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1000px;
        }

        /* แกนกลาง */
        .hub-core {
            width: 100px; height: 100px;
            background: white;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 2.5rem;
            color: #3b82f6;
            box-shadow: 0 0 50px rgba(59, 130, 246, 0.3);
            position: relative;
            z-index: 10;
            animation: pulse-core 3s infinite;
        }

        /* วงโคจร */
        .orbit-ring {
            position: absolute;
            border: 1px dashed rgba(100, 116, 139, 0.3);
            border-radius: 50%;
            animation: spin 20s linear infinite;
        }
        .ring-1 { width: 250px; height: 250px; }
        .ring-2 { width: 380px; height: 380px; border-color: rgba(100, 116, 139, 0.15); animation-duration: 30s; animation-direction: reverse; }

        /* Node ลูกข่าย */
        .hub-node {
            position: absolute;
            width: 50px; height: 50px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
            color: #64748b;
        }
        /* ตำแหน่ง Node */
        .node-1 { top: 20px; right: 80px; color: #f59e0b; }
        .node-2 { bottom: 40px; left: 60px; color: #22c55e; }
        .node-3 { top: 50%; right: -20px; transform: translateY(-50%); color: #ef4444; }
        .node-4 { top: 0; left: 50%; transform: translateX(-50%); color: #8b5cf6; }

        /* เส้นเชื่อม (Connector) */
        .connector {
            position: absolute;
            top: 50%; left: 50%;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6 0%, transparent 100%);
            transform-origin: left center;
            z-index: 1;
        }
        .conn-1 { width: 140px; transform: rotate(-45deg); }
        .conn-2 { width: 160px; transform: rotate(135deg); }
        .conn-3 { width: 180px; transform: rotate(0deg); }
        .conn-4 { width: 120px; transform: rotate(-90deg); }

        /* Data Packet (จุดวิ่ง) */
        .data-packet {
            position: absolute;
            width: 8px; height: 8px;
            background: #22c55e;
            border-radius: 50%;
            top: -3px;
            left: 0;
            box-shadow: 0 0 10px #22c55e;
            animation: move-data 2s linear infinite;
        }
        .pkt-delay-1 { animation-delay: 0.5s; }
        .pkt-delay-2 { animation-delay: 1s; }

        @keyframes pulse-core {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
            70% { box-shadow: 0 0 0 20px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        @keyframes move-data { 0% { left: 0; opacity: 1; } 100% { left: 100%; opacity: 0; } }

        /* --- FEATURES GRID --- */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
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
        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.05);
        }

        .icon-circle {
            width: 50px; height: 50px;
            background: #f1f5f9; 
            color: #475569;
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
            .hub-wrapper { margin-top: 50px; height: 350px; }
            .tech-strip { justify-content: center; }
        }
    </style>

    {{-- แสง Ambient Background (เหมือนหน้าอื่นๆ) --}}
    <div class="ambient-blob blob-1"></div>
    <div class="ambient-blob blob-2" style="background: rgba(59, 130, 246, 0.3);"></div>

    <div class="container-custom">
        
        {{-- 1. HERO SECTION --}}
        <section class="hero-section">
            {{-- Left Content --}}
            <div>
                <span class="hero-tag"><i class="fa-solid fa-network-wired"></i> System Integration</span>
                
                <h1>
                    เชื่อมต่อทุกระบบ <br>
                    <span class="text-highlight">ให้เป็นหนึ่งเดียว</span>
                </h1>
                
                <p class="hero-desc">
                    ลดความซับซ้อนในการทำงานด้วยการเชื่อมต่อข้อมูลระหว่างระบบเก่า (Legacy) 
                    และระบบใหม่ผ่าน API อย่างปลอดภัย ข้อมูลลื่นไหล ไร้รอยต่อ
                </p>

                <div style="display: flex; gap: 15px; align-items: center;" class="d-mobile-center">
                    <a href="{{ route('contact.page') }}" class="btn-theme">
                        ปรึกษาผู้เชี่ยวชาญ <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <div class="tech-strip">
                    <div class="tech-badge"><i class="fa-solid fa-code"></i> REST API</div>
                    <div class="tech-badge"><i class="fa-solid fa-database" style="color: #f59e0b;"></i> MySQL</div>
                    <div class="tech-badge">JSON</div>
                    <div class="tech-badge">SOAP</div>
                </div>
            </div>

            {{-- Right Content: Network Hub Graphic --}}
            <div class="hub-wrapper">
            
                <div class="orbit-ring ring-1"></div>
                <div class="orbit-ring ring-2"></div>

                <div class="hub-core">
                    <i class="fa-solid fa-server"></i>
                </div>

                <div class="connector conn-1"><div class="data-packet"></div></div>
                <div class="connector conn-2"><div class="data-packet pkt-delay-1"></div></div>
                <div class="connector conn-3"><div class="data-packet pkt-delay-2"></div></div>
                <div class="connector conn-4"></div>

                {{-- Nodes ลอยๆ --}}
                <div class="hub-node node-1"><i class="fa-brands fa-aws"></i></div>
                <div class="hub-node node-2"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                <div class="hub-node node-3"><i class="fa-solid fa-users"></i></div>
                <div class="hub-node node-4"><i class="fa-solid fa-shop"></i></div>

            </div>
        </section>


        {{-- 2. FEATURES GRID --}}
        <section style="margin-bottom: 80px;">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 2rem; font-weight: 700; color: #1e293b;">บริการ Integration ของเรา</h2>
                <p style="color: var(--text-sub);">ปลดล็อกศักยภาพข้อมูลในองค์กรของคุณ</p>
            </div>

            <div class="features-grid">
                {{-- Feature 1 --}}
                <div class="feature-box">
                    <div class="icon-circle" style="background: #f0fdf4; color: #22c55e;">
                        <i class="fa-solid fa-plug"></i>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 10px;">API Development</h3>
                    <p style="color: var(--text-sub);">พัฒนา API มาตรฐาน (RESTful, GraphQL) เพื่อให้แอปพลิเคชันต่างๆ คุยกันรู้เรื่อง</p>
                </div>
                
                {{-- Feature 2 --}}
                <div class="feature-box">
                    <div class="icon-circle" style="background: #eff6ff; color: #3b82f6;">
                        <i class="fa-solid fa-rotate"></i>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 10px;">Real-time Sync</h3>
                    <p style="color: var(--text-sub);">ข้อมูลอัปเดตพร้อมกันทุกระบบ ไม่ว่าจะเป็นสต็อกสินค้า ยอดขาย หรือข้อมูลสมาชิก</p>
                </div>

                {{-- Feature 3 --}}
                <div class="feature-box">
                    <div class="icon-circle" style="background: #fefce8; color: #eab308;">
                        <i class="fa-solid fa-database"></i>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 10px;">Legacy Connect</h3>
                    <p style="color: var(--text-sub);">เชื่อมต่อซอฟต์แวร์รุ่นเก่า (Legacy Systems) เข้ากับเทคโนโลยี Cloud ยุคใหม่ได้อย่างไร้รอยต่อ</p>
                </div>
            </div>
        </section>

    </div>

@endsection