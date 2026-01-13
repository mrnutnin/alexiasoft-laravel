@extends('layouts.app')
@section('title', 'Contact | AlexiaSoft')
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
            position: relative;
            z-index: 10;
            /* ให้ Content อยู่เหนือ Background */
        }

        /* --- 1. HEADER SECTION (จัดระเบียบส่วนหัวใหม่) --- */
        .page-header {
            text-align: center;
            padding-top: 60px;
            padding-bottom: 60px;
            /* เว้นระยะห่างด้านล่างไม่ให้ชน Content */
            max-width: 800px;
            margin: 0 auto;
        }

        .header-subtitle {
            color: #22c55e;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 0.9rem;
            display: block;
            margin-bottom: 10px;
        }

        h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            color: #0f172a;
            line-height: 1.1;
        }

        .text-highlight {
            background: var(--primary-grad);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p.page-desc {
            font-size: 1.1rem;
            color: var(--text-sub);
            line-height: 1.6;
            margin: 0 auto;
        }

        /* --- 2. GRID LAYOUT (แก้ปัญหาซ้อนทับ) --- */
        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            /* ซ้าย 1 ส่วน : ขวา 1.5 ส่วน */
            gap: 50px;
            /* ระยะห่างแนวนอนระหว่างซ้ายขวา */
            align-items: start;
            /* ให้เริ่มชิดบนทั้งคู่ */
            padding-bottom: 100px;
        }

        /* --- LEFT: INFO CARDS --- */
        .info-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 20px -5px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            /* จัดให้อยู่กึ่งกลางแนวตั้ง */
            gap: 20px;
            margin-bottom: 25px;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px -5px rgba(0, 0, 0, 0.1);
        }

        .icon-box {
            width: 60px;
            height: 60px;
            background: #f0fdf4;
            color: #10b981;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
            /* ป้องกันไอคอนบีบตัว */
        }

        .icon-box.email {
            background: #fff7ed;
            color: #f97316;
        }

        .icon-box.phone {
            background: #eff6ff;
            color: #3b82f6;
        }

        .info-content h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0 0 5px 0;
            color: var(--text-main);
        }

        .info-content p {
            font-size: 1rem;
            color: var(--text-sub);
            margin: 0;
            line-height: 1.5;
        }

        /* --- RIGHT: MAP CONTAINER --- */
        .map-wrapper {
            background: white;
            padding: 10px;
            border-radius: 25px;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.1);
            height: 100%;
            min-height: 500px;
            /* Fix ความสูงขั้นต่ำให้แผนที่ */
        }

        .map-frame {
            width: 100%;
            height: 100%;
            min-height: 480px;
            /* ความสูงของ iframe */
            border-radius: 15px;
            border: 0;
        }

        /* --- RESPONSIVE --- */
        @media (max-width: 991px) {
            .contact-wrapper {
                grid-template-columns: 1fr;
                /* มือถือ: เรียงลงมา */
                gap: 40px;
            }

            .page-header {
                padding-top: 40px;
                padding-bottom: 40px;
            }

            h1 {
                font-size: 2.5rem;
            }

            .map-wrapper {
                min-height: 400px;
            }

            .map-frame {
                min-height: 380px;
            }
        }
    </style>

    <div class="ambient-blob blob-1"></div>
    <div class="ambient-blob blob-2" style="top: 40%; left: 80%;"></div>

    <div class="container-custom">

        <div class="page-header">
            <h1>Get In <span class="text-highlight">Touch</span></h1>
            <p class="page-desc">
                พร้อมเริ่มโปรเจกต์ใหม่หรือมีข้อสงสัย? ติดต่อเราได้ทันที <br class="d-none d-md-block">
                ทีมงานของเราพร้อมให้คำปรึกษาและสร้างสรรค์ผลงานไปพร้อมกับคุณ
            </p>
        </div>

        <div class="contact-wrapper">
            <div class="info-column">
                <div class="info-card">
                    <div class="icon-box">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="info-content">
                        <h3>Our Office</h3>
                        <p>
                            999/21 หมู่ 8 ต.เมืองเก่า <br>
                            อ.เมือง จ.ขอนแก่น 40000
                        </p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="icon-box email">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="info-content">
                        <h3>Email Us</h3>
                        <a href="mailto:sale@alexiasoft.co" class="contact-link">
                            sale@alexiasoft.co
                        </a>
                    </div>
                </div>

                <div class="info-card">
                    <div class="icon-box phone">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="info-content">
                        <h3>Call Us</h3>
                        <a href="tel:0616975959" class="contact-link">
                            061-697-5959
                        </a>
                    </div>
                </div>

            </div>


            <div class="map-column">
                <div class="map-wrapper">

                    <iframe class="map-frame"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.4888514055556!2d102.86803871086617!3d16.399980630432903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3122896b9151f1e9%3A0xca1c4406a9411728!2z4Lia4Lij4Li04Lip4Lix4LiXIOC5gOC4hC7guIvguLUu4LmA4Lih4LiX4LiX4Lit4Lil4LiK4Li14LiXIOC4iOC4s-C4geC4seC4lCAo4Lih4Lir4Liy4LiK4LiZKSDguKrguLPguJnguLHguIHguIfguLLguJnguYPguKvguI3guYg!5e0!3m2!1sth!2sth!4v1767923627460!5m2!1sth!2sth"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>

    </div>

@endsection