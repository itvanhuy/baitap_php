<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Nhập mảng số</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i>🔢</i> Xử lý Mảng Số</h1>
            <p>Nhập dãy số để tính toán thống kê</p>
        </div>
        
        <div class="form-section">
            <form action="result.php" method="post">
                <div class="form-box">
                    <div class="form-title">
                        <i>📝</i> Nhập dãy số
                    </div>
                    
                    <div class="input-group">
                        <label for="numbers">Nhập các số cách nhau bằng dấu phẩy:</label>
                        <input type="text" id="numbers" name="numbers" 
                               placeholder="Ví dụ: 12, 45, 23, 67, 89"
                               required>
                    </div>
                    
                    <button type="submit" class="submit-btn">
                        <i>⚡</i> Xử lý mảng
                    </button>
                </div>
                
                <div class="examples">
                    <h4><i>💡</i> Ví dụ hợp lệ:</h4>
                    <div>
                        <span class="example-item" onclick="fillExample('12,45,23,67,89')">12,45,23,67,89</span>
                        <span class="example-item" onclick="fillExample('1,2,3,4,5')">1,2,3,4,5</span>
                        <span class="example-item" onclick="fillExample('10.5,20.75,30.25')">10.5,20.75,30.25</span>
                        <span class="example-item" onclick="fillExample('-5,10,-15,20')">-5,10,-15,20</span>
                    </div>
                </div>
                
                <div class="instructions">
                    <h3><i>📋</i> Hướng dẫn:</h3>
                    <ul>
                        <li>Phải nhập các số cách nhau bằng dấu phẩy (,)</li>
                        <li>Không được để trống giữa các dấu phẩy</li>
                        <li>Chỉ được nhập số (số nguyên, số thập phân, số âm)</li>
                        <li>Không được nhập chữ hoặc ký tự đặc biệt</li>
                        <li>Có thể có khoảng trắng trước/sau dấu phẩy</li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        function fillExample(value) {
            document.getElementById('numbers').value = value;
            document.getElementById('numbers').focus();
        }
    </script>
</body>
</html>