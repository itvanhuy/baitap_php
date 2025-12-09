<?php
// Bắt đầu session để lưu mảng
session_start();

// Khởi tạo mảng màu nếu chưa có trong session
if (!isset($_SESSION['colors'])) {
    $_SESSION['colors'] = [];
}

// Lấy mảng từ session
$colors = $_SESSION['colors'];

// Xử lý khi form được gửi
if ($_POST) {
    // Lấy dữ liệu từ form
    $new_color = trim($_POST['new_color']);
    $delete_index = $_POST['delete_index'];
    
    // Biến lưu thông báo
    $message = '';
    $message_type = '';
    
    // THÊM màu mới nếu có
    if ($new_color) {
        // Kiểm tra không được nhập số
        if (is_numeric($new_color)) {
            $message = "Lỗi: Không được nhập số! Vui lòng nhập tên màu.";
            $message_type = 'error';
        } else {
            array_push($colors, $new_color);
            $_SESSION['colors'] = $colors; // Lưu vào session
            $message = "✅ Đã thêm màu: <strong>$new_color</strong>";
            $message_type = 'success';
        }
    }
    
    // XÓA phần tử nếu có chỉ số
    if ($delete_index !== '' && $delete_index !== null) {
        // Kiểm tra vị trí xóa có phải số không
        if (!is_numeric($delete_index)) {
            $message = "Lỗi: Vị trí xóa phải là số!";
            $message_type = 'error';
        } else {
            $index = (int)$delete_index;
            
            // Kiểm tra vị trí có tồn tại không
            if ($index >= 0 && $index < count($colors)) {
                $removed_color = $colors[$index];
                
                // Tạo mảng mới không bao gồm phần tử cần xóa
                $new_array = [];
                for ($i = 0; $i < count($colors); $i++) {
                    if ($i != $index) {
                        $new_array[] = $colors[$i];
                    }
                }
                
                $colors = $new_array;
                $_SESSION['colors'] = $colors; // Lưu vào session
                $message .= ($message ? "<br>" : "") . "🗑️ Đã xóa màu '<strong>$removed_color</strong>' ở vị trí $index";
                $message_type = $message_type ?: 'warning';
            } else if (count($colors) > 0) {
                $message .= ($message ? "<br>" : "") . "Lỗi: Vị trí $index không tồn tại trong mảng!";
                $message_type = 'error';
            }
        }
    }
}

// Thêm nút reset mảng
if (isset($_POST['reset'])) {
    $_SESSION['colors'] = [];
    $colors = [];
    $message = "🔄 Đã reset mảng về trạng thái rỗng";
    $message_type = 'warning';
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý mảng màu</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .container {
            width: 100%;
            max-width: 900px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(90deg, #4a6bff, #6a8bff);
            color: white;
            padding: 30px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header h1 {
            font-size: 32px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .header h1 i {
            font-size: 36px;
        }
        
        .content {
            padding: 30px;
        }
        
        .message {
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 10px;
            font-weight: 500;
            animation: slideDown 0.5s ease;
        }
        
        .message.success {
            background: #e8f5e9;
            border-left: 5px solid #4CAF50;
            color: #2e7d32;
        }
        
        .message.error {
            background: #ffebee;
            border-left: 5px solid #f44336;
            color: #c62828;
        }
        
        .message.warning {
            background: #fff3e0;
            border-left: 5px solid #ff9800;
            color: #ef6c00;
        }
        
        .form-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .form-box {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 15px;
            border: 2px solid #e9ecef;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .form-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .form-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            color: #333;
            font-size: 20px;
        }
        
        .form-title i {
            font-size: 24px;
            color: #4a6bff;
        }
        
        .input-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus {
            border-color: #4a6bff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 107, 255, 0.1);
        }
        
        .buttons-container {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .submit-btn {
            background: linear-gradient(90deg, #4a6bff, #6a8bff);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            flex: 1;
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .reset-btn {
            background: linear-gradient(90deg, #ff6b6b, #ff5252);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            flex: 0.5;
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .submit-btn:hover, .reset-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .array-display {
            background: white;
            border-radius: 15px;
            padding: 30px;
            border: 2px solid #e9ecef;
            margin-top: 20px;
        }
        
        .array-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            color: #333;
            font-size: 22px;
        }
        
        .array-title i {
            font-size: 26px;
            color: #4a6bff;
        }
        
        .color-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }
        
        .color-item {
            padding: 15px;
            border-radius: 10px;
            color: white;
            font-weight: bold;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            animation: fadeIn 0.5s ease;
        }
        
        .color-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        
        .color-index {
            background: rgba(0, 0, 0, 0.2);
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 14px;
        }
        
        .color-name {
            font-size: 18px;
            margin-top: 5px;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #888;
            font-style: italic;
            font-size: 18px;
        }
        
        .instructions {
            background: #e3f2fd;
            border-radius: 15px;
            padding: 25px;
            margin-top: 30px;
            border-left: 5px solid #2196f3;
        }
        
        .instructions h3 {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            color: #1565c0;
        }
        
        .instructions ul {
            list-style-type: none;
            padding-left: 0;
        }
        
        .instructions li {
            padding: 10px 0;
            border-bottom: 1px dashed #90caf9;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .instructions li:before {
            content: "→";
            color: #2196f3;
            font-weight: bold;
        }
        
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        /* Màu sắc cho các màu phổ biến */
        .color-item[data-color*="red"] { background: linear-gradient(135deg, #ff6b6b, #ee5a52); }
        .color-item[data-color*="blue"] { background: linear-gradient(135deg, #4a6bff, #3b5bdb); }
        .color-item[data-color*="green"] { background: linear-gradient(135deg, #51cf66, #40c057); }
        .color-item[data-color*="yellow"] { background: linear-gradient(135deg, #ffd93d, #fcc419); color: #333; }
        .color-item[data-color*="orange"] { background: linear-gradient(135deg, #ff922b, #fd7e14); }
        .color-item[data-color*="purple"] { background: linear-gradient(135deg, #cc5de8, #be4bdb); }
        .color-item[data-color*="pink"] { background: linear-gradient(135deg, #f06595, #e64980); }
        .color-item[data-color*="black"] { background: linear-gradient(135deg, #495057, #343a40); }
        .color-item[data-color*="white"] { background: linear-gradient(135deg, #f8f9fa, #e9ecef); color: #333; border: 2px solid #dee2e6; }
        .color-item[data-color*="brown"] { background: linear-gradient(135deg, #dda15e, #bc6c25); }
        .color-item:not([data-color*="red"]):not([data-color*="blue"]):not([data-color*="green"]):not([data-color*="yellow"]):not([data-color*="orange"]):not([data-color*="purple"]):not([data-color*="pink"]):not([data-color*="black"]):not([data-color*="white"]):not([data-color*="brown"]) { 
            background: linear-gradient(135deg, #748ffc, #5c7cfa); 
        }
        
        .current-index {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1>
                    <i>🎨</i> Quản lý Mảng Màu
                </h1>
                <p>Thêm và xóa màu sắc trong mảng</p>
            </div>
            <div class="current-index">
                Chỉ số hiện tại: 0 đến <?php echo max(0, count($colors) - 1); ?>
            </div>
        </div>
        
        <div class="content">
            <?php if ($message): ?>
                <div class="message <?php echo $message_type; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            
            <form method="post">
                <div class="form-container">
                    <div class="form-box">
                        <div class="form-title">
                            <i>➕</i> Thêm màu mới
                        </div>
                        <div class="input-group">
                            <label for="new_color">Tên màu:</label>
                            <input type="text" id="new_color" name="new_color" 
                                   placeholder="Ví dụ: red, blue, green" 
                                   value="<?php echo htmlspecialchars($_POST['new_color'] ?? ''); ?>">
                        </div>
                        <div class="instructions" style="margin-top: 15px; padding: 15px; font-size: 14px;">
                            <strong>⚠️ Lưu ý:</strong> Không được nhập số, chỉ nhập tên màu bằng chữ.
                        </div>
                    </div>
                    
                    <div class="form-box">
                        <div class="form-title">
                            <i>🗑️</i> Xóa màu theo vị trí
                        </div>
                        <div class="input-group">
                            <label for="delete_index">Vị trí (index):</label>
                            <input type="text" id="delete_index" name="delete_index" 
                                   placeholder="Ví dụ: 0, 1, 2"
                                   value="<?php echo htmlspecialchars($_POST['delete_index'] ?? ''); ?>">
                        </div>
                        <div class="instructions" style="margin-top: 15px; padding: 15px; font-size: 14px;">
                            <strong>ℹ️ Thông tin:</strong> Mảng hiện có <?php echo count($colors); ?> màu<br>
                            Nhập số từ 0 đến <?php echo max(0, count($colors) - 1); ?>
                        </div>
                    </div>
                </div>
                
                <div class="buttons-container">
                    <button type="submit" name="action" value="update" class="submit-btn">
                        <i>⚡</i> Cập nhật mảng
                    </button>
                    
                    <button type="submit" name="reset" value="1" class="reset-btn">
                        <i>🔄</i> Reset mảng
                    </button>
                </div>
            </form>
            
            <div class="array-display">
                <div class="array-title">
                    <i>📊</i> Mảng hiện tại (<?php echo count($colors); ?> màu)
                </div>
                
                <?php if (count($colors) > 0): ?>
                    <div class="color-grid">
                        <?php foreach ($colors as $index => $color): 
                            $color_lower = strtolower($color);
                        ?>
                            <div class="color-item" data-color="<?php echo $color_lower; ?>">
                                <div class="color-index">Vị trí [<?php echo $index; ?>]</div>
                                <div class="color-name"><?php echo htmlspecialchars($color); ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div style="margin-top: 25px; padding: 15px; background: #f8f9fa; border-radius: 10px;">
                        <strong>📈 Thống kê:</strong><br>
                        Tổng số màu: <?php echo count($colors); ?><br>
                        Chỉ số hiện tại: 0 đến <?php echo count($colors) - 1; ?><br>
                        Màu cuối cùng: <?php echo end($colors); ?><br>
                        <?php reset($colors); ?>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <div style="font-size: 48px; margin-bottom: 10px;">🌈</div>
                        <p>Mảng đang trống. Hãy thêm màu đầu tiên!</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="instructions">
                <h3>
                    <i>📋</i> Hướng dẫn sử dụng
                </h3>
                <ul>
                    <li><strong>Thêm màu:</strong> Nhập tên màu bằng chữ (không nhập số)</li>
                    <li><strong>Xóa màu:</strong> Nhập số vị trí (0, 1, 2,...) để xóa màu</li>
                    <li><strong>Vị trí (index):</strong> Bắt đầu từ 0, tăng dần khi thêm mới</li>
                    <li><strong>Lưu ý:</strong> Mảng được lưu tự động giữa các lần submit</li>
                    <li><strong>Reset:</strong> Dùng nút "Reset mảng" để xóa tất cả</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>