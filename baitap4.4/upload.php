<!DOCTYPE html>
<html>
<head>
    <title>Upload File - Form Luôn Hiển Thị</title>
    <style>
        body {
            background: #f0f0f0;
            padding: 50px;
            font-family: Arial, sans-serif;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: auto;
        }
        h2 { color: #333; }
        .result {
            background: #e8f5e9;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 5px solid #4CAF50;
        }
        .error {
            background: #ffebee;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 5px solid #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📤 Upload File</h2>
        
        <?php
        // XỬ LÝ UPLOAD - PHẦN PHP
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["myfile"]) && $_FILES["myfile"]["error"] == 0) {
                $file = $_FILES["myfile"];
                
                // Tạo thư mục uploads nếu chưa có
                $targetDir = "uploads/";
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
                
                $targetFile = $targetDir . basename($file["name"]);
                
                // Kiểm tra file đã tồn tại chưa
                if (file_exists($targetFile)) {
                    echo '<div class="error">⚠️ File đã tồn tại!</div>';
                } else {
                    // Di chuyển file
                    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                        echo '<div class="result">';
                        echo '✅ <strong>Upload thành công!</strong><br>';
                        echo '<strong>Tên file:</strong> ' . htmlspecialchars($file["name"]) . '<br>';
                        echo '<strong>Dung lượng:</strong> ' . number_format($file["size"]) . ' bytes<br>';
                        echo '<strong>Đường dẫn:</strong> ' . htmlspecialchars($targetFile) . '<br>';
                        echo '<strong>Loại file:</strong> ' . $file["type"] . '<br>';
                        echo '</div>';
                    } else {
                        echo '<div class="error">❌ Upload thất bại!</div>';
                    }
                }
            } elseif (isset($_FILES["myfile"])) {
                echo '<div class="error">❌ Lỗi upload: ' . $_FILES["myfile"]["error"] . '</div>';
            }
        }
        ?>
        
        <!-- FORM UPLOAD - LUÔN HIỂN THỊ -->
        <hr>
        <h3>Chọn file để upload:</h3>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="myfile" required style="padding: 10px; border: 2px dashed #ccc; width: 100%; margin: 10px 0;">
            <br><br>
            <button type="submit" style="background: #4CAF50; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                📤 Upload File
            </button>
        </form>
        
        <!-- HIỂN THỊ DANH SÁCH FILE ĐÃ UPLOAD -->
        <?php
        $uploadDir = "uploads/";
        if (is_dir($uploadDir)) {
            $files = scandir($uploadDir);
            $fileCount = count($files) - 2; // trừ . và ..
            
            if ($fileCount > 0) {
                echo '<hr><h3>📁 Files đã upload (' . $fileCount . '):</h3>';
                echo '<ul>';
                foreach ($files as $file) {
                    if ($file != "." && $file != "..") {
                        $filePath = $uploadDir . $file;
                        $fileSize = filesize($filePath);
                        echo '<li>';
                        echo '<strong>' . htmlspecialchars($file) . '</strong>';
                        echo ' (' . number_format($fileSize) . ' bytes)';
                        echo ' - <a href="' . $filePath . '" target="_blank">Xem</a>';
                        echo '</li>';
                    }
                }
                echo '</ul>';
            }
        }
        ?>
    </div>
</body>
</html>