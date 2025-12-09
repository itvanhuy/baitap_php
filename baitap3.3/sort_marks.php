<?php
// Biến lưu dữ liệu
$input = '';
$original_array = [];
$sorted_array = [];
$message = '';
$has_result = false;

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $input = trim($_POST['numbers'] ?? '');
    $sort_type = $_POST['sort_type'] ?? '';
    
    // Kiểm tra dữ liệu
    if (empty($input)) {
        $message = '❌ Vui lòng nhập dãy số!';
    } else {
        // Chuyển chuỗi thành mảng
        $numbers = explode(',', $input);
        $original_array = [];
        
        // Lọc và chuyển đổi thành số
        foreach ($numbers as $number) {
            $num = trim($number);
            if (is_numeric($num)) {
                $original_array[] = (float)$num;
            }
        }
        
        // Kiểm tra mảng hợp lệ
        if (empty($original_array)) {
            $message = '❌ Không có số hợp lệ trong dãy!';
        } else {
            // Sao chép mảng để sắp xếp
            $sorted_array = $original_array;
            
            // Sắp xếp theo loại đã chọn
            if ($sort_type == 'asc') {
                sort($sorted_array);
                $message = '✅ Đã sắp xếp tăng dần';
            } elseif ($sort_type == 'desc') {
                rsort($sorted_array);
                $message = '✅ Đã sắp xếp giảm dần';
            }
            
            $has_result = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sắp xếp mảng số</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }
        
        .message {
            padding: 10px;
            border-radius: 5px;
            margin: 15px 0;
            text-align: center;
            font-weight: bold;
        }
        
        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
        }
        
        input[type="text"]:focus {
            border-color: #667eea;
            outline: none;
        }
        
        .radio-group {
            display: flex;
            gap: 20px;
            margin: 15px 0;
        }
        
        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s;
        }
        
        button:hover {
            background: #45a049;
        }
        
        .result-section {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }
        
        .array-display {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 15px 0;
        }
        
        .number {
            background: #667eea;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            font-weight: bold;
            min-width: 40px;
            text-align: center;
        }
        
        .comparison {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }
        
        .array-box {
            background: white;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }
        
        .array-title {
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        
        .example {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 Sắp xếp mảng số</h1>
        
        <?php if ($message): ?>
            <div class="message <?php echo strpos($message, '❌') !== false ? 'error' : 'success'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label for="numbers">Nhập các số cách nhau bằng dấu phẩy:</label>
                <input type="text" 
                       id="numbers" 
                       name="numbers" 
                       value="<?php echo htmlspecialchars($input); ?>"
                       placeholder="Ví dụ: 12, 45, 23, 67, 89">
            </div>
            
            <div class="form-group">
                <label>Chọn kiểu sắp xếp:</label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" 
                               id="asc" 
                               name="sort_type" 
                               value="asc" 
                               <?php echo (!isset($_POST['sort_type']) || $_POST['sort_type'] == 'asc') ? 'checked' : ''; ?>>
                        <label for="asc">📈 Tăng dần (sort)</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" 
                               id="desc" 
                               name="sort_type" 
                               value="desc"
                               <?php echo (isset($_POST['sort_type']) && $_POST['sort_type'] == 'desc') ? 'checked' : ''; ?>>
                        <label for="desc">📉 Giảm dần (rsort)</label>
                    </div>
                </div>
            </div>
            
            <button type="submit">Sắp xếp</button>
        </form>
        
        <?php if ($has_result): ?>
        <div class="result-section">
            <h2>Kết quả:</h2>
            
            <div class="comparison">
                <div class="array-box">
                    <div class="array-title">Mảng gốc:</div>
                    <div class="array-display">
                        <?php foreach ($original_array as $number): ?>
                            <span class="number"><?php echo $number; ?></span>
                        <?php endforeach; ?>
                    </div>
                    <p><small>[<?php echo implode(', ', $original_array); ?>]</small></p>
                </div>
                
                <div class="array-box">
                    <div class="array-title">Mảng đã sắp xếp <?php echo $sort_type == 'asc' ? 'tăng dần' : 'giảm dần'; ?>:</div>
                    <div class="array-display">
                        <?php foreach ($sorted_array as $number): ?>
                            <span class="number"><?php echo $number; ?></span>
                        <?php endforeach; ?>
                    </div>
                    <p><small>[<?php echo implode(', ', $sorted_array); ?>]</small></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="example">
            <strong>📝 Hướng dẫn:</strong>
            <ul style="margin-top: 10px; padding-left: 20px;">
                <li>Nhập các số cách nhau bằng dấu phẩy (ví dụ: 12, 45, 23)</li>
                <li>Chọn kiểu sắp xếp: Tăng dần (nhỏ → lớn) hoặc Giảm dần (lớn → nhỏ)</li>
                <li>Nhấn nút "Sắp xếp" để xem kết quả</li>
                <li>Hàm PHP sử dụng: <code>sort()</code> cho tăng dần, <code>rsort()</code> cho giảm dần</li>
            </ul>
        </div>
    </div>
</body>
</html>