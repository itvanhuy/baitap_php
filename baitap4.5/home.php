<?php
// Thiết lập tiêu đề trang
$pageTitle = "Trang Chủ - Hệ Thống Quản Lý";
?>

<?php include 'header.php'; ?>

    <h2 style="color: #333; border-bottom: 3px solid #667eea; padding-bottom: 10px;">
        🏠 Chào mừng đến với Trang Chủ
    </h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 30px;">
        
        <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <h3 style="color: #667eea;">📊 Thống Kê Hệ Thống</h3>
            <ul style="line-height: 1.8;">
                <li><strong>Tổng người dùng:</strong> 1,250</li>
                <li><strong>Sản phẩm hiện có:</strong> 560</li>
                <li><strong>Đơn hàng hôm nay:</strong> 89</li>
                <li><strong>Doanh thu tháng:</strong> 250 triệu VND</li>
            </ul>
        </div>
        
        <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <h3 style="color: #667eea;">🚀 Tính Năng Nổi Bật</h3>
            <ul style="line-height: 1.8;">
                <li>✅ Quản lý người dùng</li>
                <li>✅ Quản lý sản phẩm</li>
                <li>✅ Quản lý đơn hàng</li>
                <li>✅ Báo cáo thống kê</li>
                <li>✅ Hệ thống phân quyền</li>
            </ul>
        </div>
        
        <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            <h3 style="color: #667eea;">📅 Hoạt Động Gần Đây</h3>
            <ul style="line-height: 1.8;">
                <li>🕒 10:30 - Người dùng mới đăng ký</li>
                <li>🕒 11:15 - Đơn hàng #2456 được tạo</li>
                <li>🕒 13:45 - Cập nhật sản phẩm mới</li>
                <li>🕒 15:20 - Báo cáo tháng được tạo</li>
            </ul>
        </div>
        
    </div>
    
    <div style="margin-top: 40px; background: #f8f9fa; padding: 25px; border-radius: 10px;">
        <h3 style="color: #333;">📝 Giới Thiệu Hệ Thống</h3>
        <p style="line-height: 1.6;">
            Hệ thống quản lý của chúng tôi cung cấp giải pháp toàn diện cho việc quản lý doanh nghiệp. 
            Với giao diện thân thiện và tính năng mạnh mẽ, hệ thống giúp bạn quản lý mọi khía cạnh 
            của doanh nghiệp một cách hiệu quả.
        </p>
        <p style="line-height: 1.6;">
            Các tính năng chính bao gồm quản lý người dùng, quản lý sản phẩm, theo dõi đơn hàng, 
            tạo báo cáo thống kê và nhiều tính năng hữu ích khác.
        </p>
        
        <button style="
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        ">
            🚀 Bắt Đầu Sử Dụng
        </button>
    </div>

<?php include 'footer.php'; ?>