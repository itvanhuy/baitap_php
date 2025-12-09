    </div> <!-- Đóng container từ header -->
    
    <footer style="
        background: #333;
        color: white;
        text-align: center;
        padding: 30px 0;
        margin-top: 50px;
        border-top: 5px solid #667eea;
    ">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <p style="font-size: 1.2rem; margin-bottom: 10px;">
                © <?php echo date('Y'); ?> - HỆ THỐNG QUẢN LÝ. All rights reserved.
            </p>
            <p style="opacity: 0.8; margin-bottom: 15px;">
                Địa chỉ: 123 Nguyễn Văn Linh, Quận 7, TP. HCM
            </p>
            <p style="opacity: 0.8; margin-bottom: 15px;">
                📞 Hotline: 1900 1234 | 📧 Email: info@hethongquanly.com
            </p>
            
            <div style="margin-top: 20px;">
                <a href="#" style="color: white; margin: 0 10px; text-decoration: none;">📘 Facebook</a>
                <a href="#" style="color: white; margin: 0 10px; text-decoration: none;">🐦 Twitter</a>
                <a href="#" style="color: white; margin: 0 10px; text-decoration: none;">📷 Instagram</a>
                <a href="#" style="color: white; margin: 0 10px; text-decoration: none;">💼 LinkedIn</a>
            </div>
            
            <p style="margin-top: 20px; font-size: 0.9rem; opacity: 0.6;">
                Thiết kế bởi Nhóm PHP | Phiên bản 1.0.0
            </p>
        </div>
    </footer>
    
    <script>
        // JavaScript cho toàn bộ trang
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Trang đã tải xong!');
            
            // Hiệu ứng cho năm copyright
            const yearSpan = document.querySelector('footer p:first-child');
            if (yearSpan) {
                yearSpan.innerHTML = yearSpan.innerHTML.replace(
                    '© <?php echo date("Y"); ?>',
                    `© <span style="color: #667eea; font-weight: bold;"><?php echo date("Y"); ?></span>`
                );
            }
        });
    </script>
</body>
</html>