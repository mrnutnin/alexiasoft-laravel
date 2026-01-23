<footer>
    <div class="footer-wave"></div>

    <div class="footer-content">
        <div class="footer-container">

            <div class="footer-section company-info">
                <div class="footer-logo">
                    <img src="{{ asset('images/logo1.png') }}" alt="AlexiaSoft Logo" style="height: 40px; width: auto;">
                    <h3>AlexiaSoft Co., Ltd.</h3>
                </div>
                <p data-en="Crafted software solutions for modern businesses."
                    data-th="โซลูชันซอฟต์แวร์ระดับพรีเมียมสำหรับธุรกิจยุคใหม่">
                    Crafted software solutions for modern businesses.
                </p>
            </div>

            <div class="footer-section menu-section">
                <div class="footer-link-stack">
                    <a href="{{ url('/') }}" class="footer-main-link">
                        <i class="fa-solid fa-chevron-right icon-static"></i> Home
                    </a>
                    <div class="dropdown-group">
                        <div class="footer-main-link dropdown-trigger-footer" style="cursor: pointer;">
                            <i class="fa-solid fa-chevron-right icon-static"></i>
                            <span data-en="Services" data-th="บริการ">Services</span>
                            <i class="fa-solid fa-chevron-down icon-arrow"></i>
                        </div>

                        <div class="footer-sub-list">
                            <a href="{{ route('services.show', 'custom-solution') }}">Custom Solution</a>
                            <a href="{{ route('services.show', 'web-application') }}">Web Application</a>
                            <a href="{{ route('services.show', 'mobile-application') }}">Mobile Application</a>
                            <a href="{{ route('services.show', 'system-integration') }}">System Integration</a>
                        </div>
                    </div>

                    <a href="{{ url('/#portfolio') }}" class="footer-main-link">
                        <i class="fa-solid fa-chevron-right icon-static"></i> Portfolio
                    </a>
                    <a href="{{ url('/about') }}" class="footer-main-link">
                        <i class="fa-solid fa-chevron-right icon-static"></i> About Us
                    </a>
                    <a href="{{ url('/contact') }}" class="footer-main-link">
                        <i class="fa-solid fa-chevron-right icon-static"></i> Contact
                    </a>
                    <div class="dropdown-group">
                        <div class="footer-main-link">
                            <i class="fa-solid fa-chevron-right icon-static"></i>
                            <span data-en="Tools" data-th="เครื่องมือ">Tools</span>
                            <i class="fa-solid fa-chevron-down icon-arrow"></i>
                        </div>
                        <div class="footer-sub-list">
                            <a href="{{ route('tools.qrcode') }}">QR Generator</a>
                            <a href="{{ route('tools.remove-bg') }}">Remove BG</a>
                            <a href="{{ route('tools.image-convert') }}">Image Converter</a>
                            <a href="{{ route('tools.shortlink') }}">Short Link</a>
                            <a href="{{ route('tools.json-tool') }}">Beautify JSON</a>
                            <a href="{{ route('tools.json-encode-decode') }}">JSON Encoder & Decoder php</a>
                            <a href="{{ route('tools.image-resize') }}">Image Resizer </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="footer-section">
                <h3 data-en="Contact Info" data-th="ข้อมูลติดต่อ">Contact Info</h3>

                <div class="footer-contact">
                    <div class="contact-item-footer">
                        <div class="contact-icon-footer">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <p>
                            999/21 Moo 8, Muang Kao Sub-district,<br>
                            Mueang Khon Kaen District,<br>
                            Khon Kaen 40000, Thailand
                        </p>
                    </div>

                    <div class="contact-item-footer">
                        <div class="contact-icon-footer">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <p><a href="mailto:sale@alexiasoft.co">sale@alexiasoft.co</a></p>
                    </div>

                    <div class="contact-item-footer">
                        <div class="contact-icon-footer">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <p><a href="tel:0616975959">061-697-5959</a></p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-divider"></div>
            <p>&copy; 2025 AlexiaSoft Co., Ltd.
                <span data-en="All rights reserved." data-th="สงวนลิขสิทธิ์ทั้งหมด">
                    All rights reserved.
                </span>
            </p>
        </div>
    </div>
</footer>