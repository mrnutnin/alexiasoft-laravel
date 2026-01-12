@extends('layouts.app')

@section('content')

    {{-- CSS เฉพาะหน้านี้ (ถ้าอยากให้สะอาด ย้ายไปใส่ app.css ได้ครับ) --}}
    <style>
        /* ส่วนหัวแบบไล่สีข้อความ */
        .gradient-text {
            background: var(--gradient-main);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        /* กล่อง Code จำลอง */
        .code-window {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            transform: perspective(1000px) rotateY(-5deg) rotateX(5deg);
            transition: transform 0.3s ease;
        }
        .code-window:hover {
            transform: perspective(1000px) rotateY(0deg) rotateX(0deg);
        }

        /* การ์ดฟีเจอร์ */
        .feature-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.2);
        }
        .feature-card:hover {
            transform: translateY(-10px);
            border-color: var(--primary-start);
            box-shadow: 0 10px 30px rgba(34, 197, 94, 0.2);
        }

        /* ไอคอนลอย */
        .float-icon {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
    </style>

    {{-- Background --}}
    <div class="ambient-blob blob-1"></div>
    <div class="ambient-blob blob-2"></div>

    {{-- SECTION 1: HERO (ส่วนหัวสุดว้าว) --}}
    <section class="scroll-reveal contact-page" style="padding-bottom: 20px;">
        <div class="container">
            <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 50px;">
                
                {{-- ฝั่งซ้าย: ข้อความ --}}
                <div style="flex: 1; min-width: 300px; text-align: left;">
                    <span style="color: var(--primary-start); font-weight: bold; letter-spacing: 1px; text-transform: uppercase; font-size: 0.9rem;">
                        <i class="fa-solid fa-code"></i> Custom Software Development
                    </span>
                    <h1 style="font-size: 3.5rem; line-height: 1.2; margin: 15px 0 25px;">
                        <span data-en="Build Exactly" data-th="สร้างสิ่งที่">สร้างสิ่งที่</span><br>
                        <span class="gradient-text" data-en="What You Need" data-th="คุณต้องการจริงๆ">คุณต้องการจริงๆ</span>
                    </h1>
                    <p style="font-size: 1.1rem; color: var(--text-muted); line-height: 1.8; margin-bottom: 30px;"
                       data-en="Don't settle for off-the-shelf software. We build scalable, secure, and high-performance solutions tailored to your specific business workflows."
                       data-th="อย่าทนใช้ซอฟต์แวร์สำเร็จรูปที่ไม่ตอบโจทย์ เราสร้างระบบที่ยืดหยุ่น ปลอดภัย และมีประสิทธิภาพสูง ที่ออกแบบมาเพื่อขั้นตอนการทำงานของคุณโดยเฉพาะ">
                        อย่าทนใช้ซอฟต์แวร์สำเร็จรูปที่ไม่ตอบโจทย์ เราสร้างระบบที่ยืดหยุ่น ปลอดภัย และมีประสิทธิภาพสูง ที่ออกแบบมาเพื่อขั้นตอนการทำงานของคุณโดยเฉพาะ
                    </p>
                    
                    <a href="{{ route('contact.page') }}" class="glass-card" 
                       style="display: inline-block; padding: 15px 40px; text-decoration: none; background: var(--gradient-main); color: white; border: none; font-weight: bold; border-radius: 50px;">
                        <span data-en="Start Your Project" data-th="เริ่มโปรเจกต์ของคุณ">เริ่มโปรเจกต์ของคุณ</span> 
                        <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i>
                    </a>
                </div>

                {{-- ฝั่งขวา: กราฟิกจำลอง Code Editor (ดู Techy มาก) --}}
                <div style="flex: 1; min-width: 300px; position: relative;">
                    <div class="float-icon" style="position: absolute; top: -30px; right: -20px; z-index: 2; font-size: 3rem; color: #61dafb; background: rgba(255,255,255,0.8); padding: 15px; border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                        <i class="fa-brands fa-react"></i>
                    </div>
                    <div class="float-icon" style="position: absolute; bottom: -30px; left: -20px; z-index: 2; font-size: 3rem; color: #F05340; background: rgba(255,255,255,0.8); padding: 15px; border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); animation-delay: 1s;">
                        <i class="fa-brands fa-laravel"></i>
                    </div>

                    <div class="code-window" style="padding: 20px;">
                        <div style="display: flex; gap: 8px; margin-bottom: 20px;">
                            <div style="width: 12px; height: 12px; border-radius: 50%; background: #ff5f56;"></div>
                            <div style="width: 12px; height: 12px; border-radius: 50%; background: #ffbd2e;"></div>
                            <div style="width: 12px; height: 12px; border-radius: 50%; background: #27c93f;"></div>
                        </div>
                        <div style="font-family: 'Courier New', monospace; color: #e2e8f0; line-height: 1.6; font-size: 0.9rem;">
                            <span style="color: #c792ea;">const</span> <span style="color: #ffcb6b;">YourBusiness</span> = {<br>
                            &nbsp;&nbsp;type: <span style="color: #c3e88d;">'Unique'</span>,<br>
                            &nbsp;&nbsp;goal: <span style="color: #c3e88d;">'Growth'</span>,<br>
                            &nbsp;&nbsp;solution: <span style="color: #82aaff;">() =></span> {<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #f07178;">return</span> <span style="color: #c3e88d;">'AlexiaSoft Custom Solution'</span>;<br>
                            &nbsp;&nbsp;}<br>
                            };<br><br>
                            <span style="color: #546e7a;">// Running optimization...</span><br>
                            <span style="color: #89ddff;">Success!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 2: WHY CUSTOM? (Grid การ์ดสวยๆ) --}}
    <section style="padding: 80px 0;">
        <div class="container">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 2.5rem;" data-en="Why Choose Custom?" data-th="ทำไมต้องซอฟต์แวร์สั่งทำ?">ทำไมต้องซอฟต์แวร์สั่งทำ?</h2>
                <p style="color: var(--text-muted);" data-en="Because your business is unique." data-th="เพราะธุรกิจของคุณมีเอกลักษณ์ ไม่เหมือนใคร">เพราะธุรกิจของคุณมีเอกลักษณ์ ไม่เหมือนใคร</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
                
                {{-- Card 1 --}}
                <div class="glass-card feature-card" style="padding: 30px;">
                    <div style="width: 60px; height: 60px; background: rgba(34, 197, 94, 0.1); border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: var(--primary-start); margin-bottom: 20px;">
                        <i class="fa-solid fa-puzzle-piece"></i>
                    </div>
                    <h3 data-en="Perfect Fit" data-th="เข้ากับระบบงาน 100%">เข้ากับระบบงาน 100%</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem;" 
                       data-en="No more changing your workflow to fit the software. We build software that fits YOU."
                       data-th="ไม่ต้องปรับเปลี่ยนวิธีการทำงานของคุณเพื่อซอฟต์แวร์ แต่เราสร้างซอฟต์แวร์ที่ปรับเข้าหาคุณ">
                        ไม่ต้องปรับเปลี่ยนวิธีการทำงานของคุณเพื่อซอฟต์แวร์ แต่เราสร้างซอฟต์แวร์ที่ปรับเข้าหาคุณ
                    </p>
                </div>

                {{-- Card 2 --}}
                <div class="glass-card feature-card" style="padding: 30px;">
                    <div style="width: 60px; height: 60px; background: rgba(59, 130, 246, 0.1); border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: var(--primary-end); margin-bottom: 20px;">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>
                    <h3 data-en="Scalability" data-th="รองรับการเติบโต">รองรับการเติบโต</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem;"
                       data-en="Start small and grow big. Add new features whenever you need them without limitations."
                       data-th="เริ่มจากเล็กแล้วขยายใหญ่ เพิ่มฟีเจอร์ใหม่ๆ ได้ตลอดเวลาที่คุณต้องการ โดยไม่มีข้อจำกัด">
                        เริ่มจากเล็กแล้วขยายใหญ่ เพิ่มฟีเจอร์ใหม่ๆ ได้ตลอดเวลาที่คุณต้องการ โดยไม่มีข้อจำกัด
                    </p>
                </div>

                {{-- Card 3 --}}
                <div class="glass-card feature-card" style="padding: 30px;">
                    <div style="width: 60px; height: 60px; background: rgba(245, 158, 11, 0.1); border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: #f59e0b; margin-bottom: 20px;">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h3 data-en="High Security" data-th="ความปลอดภัยสูง">ความปลอดภัยสูง</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem;"
                       data-en="You own the data. Enhanced security protocols specific to your business needs."
                       data-th="คุณเป็นเจ้าของข้อมูล 100% พร้อมระบบความปลอดภัยขั้นสูงที่ออกแบบมาเฉพาะองค์กร">
                        คุณเป็นเจ้าของข้อมูล 100% พร้อมระบบความปลอดภัยขั้นสูงที่ออกแบบมาเฉพาะองค์กร
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- SECTION 3: TECH STACK (โชว์ของหน่อย) --}}
    <section style="padding: 60px 0; background: rgba(255,255,255,0.3);">
        <div class="container" style="text-align: center;">
            <p style="text-transform: uppercase; letter-spacing: 2px; font-size: 0.8rem; color: var(--text-muted); margin-bottom: 30px;"
               data-en="POWERED BY MODERN TECHNOLOGY" data-th="ขับเคลื่อนด้วยเทคโนโลยีทันสมัย">
                ขับเคลื่อนด้วยเทคโนโลยีทันสมัย
            </p>
            <div style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap; font-size: 2.5rem; color: var(--text-muted); opacity: 0.7;">
                <i class="fa-brands fa-laravel" title="Laravel" style="transition: 0.3s; cursor: pointer;" onmouseover="this.style.color='#F05340'; this.style.opacity='1'" onmouseout="this.style.color='inherit'; this.style.opacity='0.7'"></i>
                <i class="fa-brands fa-react" title="React" style="transition: 0.3s; cursor: pointer;" onmouseover="this.style.color='#61dafb'; this.style.opacity='1'" onmouseout="this.style.color='inherit'; this.style.opacity='0.7'"></i>
                <i class="fa-brands fa-vuejs" title="Vue.js" style="transition: 0.3s; cursor: pointer;" onmouseover="this.style.color='#42b883'; this.style.opacity='1'" onmouseout="this.style.color='inherit'; this.style.opacity='0.7'"></i>
                <i class="fa-brands fa-node-js" title="Node.js" style="transition: 0.3s; cursor: pointer;" onmouseover="this.style.color='#68a063'; this.style.opacity='1'" onmouseout="this.style.color='inherit'; this.style.opacity='0.7'"></i>
                <i class="fa-brands fa-aws" title="AWS" style="transition: 0.3s; cursor: pointer;" onmouseover="this.style.color='#ff9900'; this.style.opacity='1'" onmouseout="this.style.color='inherit'; this.style.opacity='0.7'"></i>
            </div>
        </div>
    </section>

    {{-- SECTION 4: CTA (ปิดท้ายสวยๆ) --}}
    <section style="padding: 100px 0;">
        <div class="container">
            <div class="glass-card" style="padding: 60px; text-align: center; border: 2px solid var(--primary-start); position: relative; overflow: hidden;">
                <div style="position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: radial-gradient(circle, rgba(34,197,94,0.1) 0%, rgba(0,0,0,0) 70%); z-index: 0;"></div>
                
                <div style="position: relative; z-index: 1;">
                    <h2 style="font-size: 2.5rem; margin-bottom: 20px;" 
                        data-en="Ready to Build Your Solution?" 
                        data-th="พร้อมจะสร้างระบบของคุณหรือยัง?">
                        พร้อมจะสร้างระบบของคุณหรือยัง?
                    </h2>
                    <p style="max-width: 600px; margin: 0 auto 30px; color: var(--text-muted);"
                       data-en="Consult with our experts today. No commitment required."
                       data-th="ปรึกษาผู้เชี่ยวชาญของเราวันนี้ ฟรี! ไม่มีค่าใช้จ่ายและข้อผูกมัด">
                        ปรึกษาผู้เชี่ยวชาญของเราวันนี้ ฟรี! ไม่มีค่าใช้จ่ายและข้อผูกมัด
                    </p>
                    <a href="{{ route('contact.page') }}" style="display: inline-block; background: var(--text-main); color: white; padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: bold; transition: transform 0.2s;">
                        <i class="fa-solid fa-paper-plane" style="margin-right: 10px;"></i> 
                        <span data-en="Contact Us Now" data-th="ติดต่อเราเลย">ติดต่อเราเลย</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection