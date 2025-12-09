<?php
// Xử lý upload ảnh
$uploadOk = 0;
$message = "";
$imagePath = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $file = $_FILES["image"];
    
    // Kiểm tra có lỗi upload không
    if ($file["error"] != 0) {
        $message = "❌ Lỗi upload: " . $file["error"];
    } else {
        $fileName = basename($file["name"]);
        $fileSize = $file["size"];
        $fileTmp = $file["tmp_name"];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Tạo thư mục upload nếu chưa có
        $uploadDir = "uploads/images/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        // Tạo tên file duy nhất
        $newFileName = uniqid() . "_" . date("Ymd_His") . "." . $fileType;
        $targetFile = $uploadDir . $newFileName;
        
        // 1. Kiểm tra định dạng file (chỉ JPG/JPEG/PNG)
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($fileType, $allowedTypes)) {
            $message = "❌ Chỉ chấp nhận file ảnh JPG, JPEG, PNG hoặc GIF!";
        }
        // 2. Kiểm tra dung lượng (dưới 2MB)
        elseif ($fileSize > 2 * 1024 * 1024) {
            $message = "❌ File quá lớn! Dung lượng tối đa là 2MB.";
        }
        // 3. Kiểm tra file đã tồn tại chưa
        elseif (file_exists($targetFile)) {
            $message = "❌ File đã tồn tại!";
        }
        // 4. Kiểm tra có phải là ảnh thật không (kiểm tra MIME type)
        else {
            $check = getimagesize($fileTmp);
            if ($check === false) {
                $message = "❌ File không phải là ảnh!";
            } else {
                // Tất cả kiểm tra đều OK, tiến hành upload
                if (move_uploaded_file($fileTmp, $targetFile)) {
                    $uploadOk = 1;
                    $message = "✅ Upload ảnh thành công!";
                    $imagePath = $targetFile;
                } else {
                    $message = "❌ Có lỗi xảy ra khi upload file!";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Ảnh - Kiểm Tra Định Dạng</title>
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
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 900px;
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .header p {
            opacity: 0.9;
            font-size: 1.1rem;
        }
        
        .content {
            padding: 40px;
        }
        
        .upload-area {
            border: 3px dashed #4facfe;
            border-radius: 15px;
            padding: 50px;
            text-align: center;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            background: #f8fafc;
        }
        
        .upload-area:hover {
            background: #f0f9ff;
            border-color: #667eea;
        }
        
        .upload-icon {
            font-size: 4rem;
            color: #4facfe;
            margin-bottom: 20px;
        }
        
        .upload-text {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 10px;
        }
        
        .upload-hint {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
        
        .file-input {
            display: none;
        }
        
        .file-label {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }
        
        .file-label:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.3s ease;
            width: 200px;
        }
        
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(245, 87, 108, 0.4);
        }
        
        .submit-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .message {
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: center;
            font-weight: 600;
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
        
        .image-preview {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            background: #f8fafc;
            border-radius: 15px;
        }
        
        .image-preview img {
            max-width: 100%;
            max-height: 400px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 5px solid white;
        }
        
        .file-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        
        .file-info table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .file-info th {
            text-align: left;
            padding: 10px;
            background: #e9ecef;
            border-bottom: 2px solid #dee2e6;
        }
        
        .file-info td {
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }
        
        .requirements {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
        }
        
        .requirements h3 {
            color: #856404;
            margin-bottom: 10px;
        }
        
        .requirements ul {
            list-style: none;
            padding-left: 20px;
        }
        
        .requirements li {
            padding: 5px 0;
            color: #856404;
        }
        
        .requirements li:before {
            content: "✓ ";
            color: #28a745;
            font-weight: bold;
        }
        
        .gallery {
            margin-top: 40px;
        }
        
        .gallery h2 {
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #4facfe;
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .gallery-item:hover {
            transform: scale(1.05);
        }
        
        .gallery-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            display: block;
        }
        
        .gallery-item .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(255, 0, 0, 0.7);
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .gallery-item:hover .delete-btn {
            opacity: 1;
        }
        
        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }
            
            .upload-area {
                padding: 30px 20px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📸 Upload Ảnh</h1>
            <p>Chỉ hỗ trợ JPG, JPEG, PNG, GIF - Tối đa 2MB</p>
        </div>
        
        <div class="content">
            <!-- Hiển thị thông báo -->
            <?php if ($message): ?>
                <div class="message <?php echo $uploadOk ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            
            <!-- Form upload -->
            <form method="POST" enctype="multipart/form-data" id="uploadForm">
                <div class="upload-area">
                    <div class="upload-icon">📁</div>
                    <div class="upload-text">Kéo thả ảnh vào đây hoặc click để chọn</div>
                    <div class="upload-hint">Chỉ chấp nhận: JPG, JPEG, PNG, GIF | Tối đa 2MB</div>
                    
                    <label class="file-label">
                        <input type="file" name="image" id="imageInput" class="file-input" 
                               accept=".jpg,.jpeg,.png,.gif,.webp" required>
                        📂 Chọn Ảnh
                    </label>
                    
                    <!-- Hiển thị tên file đã chọn -->
                    <div id="fileName" style="margin-top: 15px; color: #666;"></div>
                    
                    <!-- Hiển thị preview ảnh -->
                    <div id="imagePreview" style="margin-top: 20px; display: none;">
                        <img id="preview" src="" alt="Preview" style="max-width: 200px; border-radius: 10px;">
                    </div>
                </div>
                
                <div style="text-align: center;">
                    <button type="submit" class="submit-btn" id="submitBtn">🚀 Upload Ảnh</button>
                </div>
            </form>
            
            <!-- Hiển thị thông tin file sau khi upload thành công -->
            <?php if ($uploadOk && $imagePath): ?>
                <div class="file-info">
                    <h3>📋 Thông tin ảnh đã upload:</h3>
                    <table>
                        <tr>
                            <th>Tên file gốc:</th>
                            <td><?php echo htmlspecialchars($_FILES["image"]["name"]); ?></td>
                        </tr>
                        <tr>
                            <th>Tên file lưu:</th>
                            <td><?php echo basename($imagePath); ?></td>
                        </tr>
                        <tr>
                            <th>Dung lượng:</th>
                            <td><?php echo number_format($_FILES["image"]["size"]) . " bytes (" . round($_FILES["image"]["size"]/1024, 2) . " KB)"; ?></td>
                        </tr>
                        <tr>
                            <th>Loại file:</th>
                            <td><?php echo $_FILES["image"]["type"]; ?></td>
                        </tr>
                        <tr>
                            <th>Đường dẫn:</th>
                            <td><?php echo $imagePath; ?></td>
                        </tr>
                    </table>
                </div>
                
                <div class="image-preview">
                    <h3>🖼️ Ảnh đã upload:</h3>
                    <img src="<?php echo $imagePath; ?>" alt="Ảnh đã upload" 
                         onerror="this.src='https://via.placeholder.com/600x400/cccccc/969696?text=Không+thể+hiển+thị+ảnh'">
                </div>
            <?php endif; ?>
            
            <!-- Yêu cầu upload -->
            <div class="requirements">
                <h3>📌 Yêu cầu upload:</h3>
                <ul>
                    <li>Chỉ chấp nhận định dạng: JPG, JPEG, PNG, GIF</li>
                    <li>Dung lượng tối đa: 2MB (2048KB)</li>
                    <li>Ảnh phải là file ảnh thật (không giả mạo định dạng)</li>
                    <li>Hệ thống sẽ tự động đổi tên file để tránh trùng lặp</li>
                </ul>
            </div>
            
            <!-- Gallery ảnh đã upload -->
            <div class="gallery">
                <h2>📷 Ảnh đã upload</h2>
                <?php
                $imageDir = "uploads/images/";
                if (is_dir($imageDir)) {
                    $images = scandir($imageDir);
                    $imageFiles = array_filter($images, function($file) {
                        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        return in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']) && $file != "." && $file != "..";
                    });
                    
                    if (count($imageFiles) > 0) {
                        echo '<div class="gallery-grid">';
                        foreach ($imageFiles as $image) {
                            $imageUrl = $imageDir . $image;
                            echo '<div class="gallery-item">';
                            echo '<img src="' . $imageUrl . '" alt="' . htmlspecialchars($image) . '" 
                                  onerror="this.src=\'https://via.placeholder.com/150/cccccc/969696?text=Lỗi+ảnh\'">';
                            echo '<button class="delete-btn" onclick="deleteImage(\'' . $image . '\')">×</button>';
                            echo '</div>';
                        }
                        echo '</div>';
                    } else {
                        echo '<p style="text-align: center; color: #666;">Chưa có ảnh nào được upload.</p>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    
    <script>
        // JavaScript cho preview ảnh và validation
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const fileNameDisplay = document.getElementById('fileName');
            const previewDiv = document.getElementById('imagePreview');
            const previewImg = document.getElementById('preview');
            const submitBtn = document.getElementById('submitBtn');
            
            if (file) {
                // Hiển thị tên file
                fileNameDisplay.textContent = `📄 Đã chọn: ${file.name} (${(file.size/1024).toFixed(2)} KB)`;
                
                // Kiểm tra dung lượng
                if (file.size > 2 * 1024 * 1024) {
                    fileNameDisplay.innerHTML += `<br><span style="color: red;">⚠️ File quá lớn (tối đa 2MB)</span>`;
                    submitBtn.disabled = true;
                } else {
                    submitBtn.disabled = false;
                }
                
                // Kiểm tra định dạng
                const validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                const fileExt = file.name.split('.').pop().toLowerCase();
                if (!validExtensions.includes(fileExt)) {
                    fileNameDisplay.innerHTML += `<br><span style="color: red;">⚠️ Định dạng không được hỗ trợ</span>`;
                    submitBtn.disabled = true;
                }
                
                // Hiển thị preview ảnh
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewDiv.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                fileNameDisplay.textContent = '';
                previewDiv.style.display = 'none';
                submitBtn.disabled = true;
            }
        });
        
        // Xác nhận trước khi submit
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            const fileInput = document.getElementById('imageInput');
            if (!fileInput.files[0]) {
                e.preventDefault();
                alert('Vui lòng chọn ảnh trước khi upload!');
                return false;
            }
            
            const file = fileInput.files[0];
            if (file.size > 2 * 1024 * 1024) {
                e.preventDefault();
                alert('File quá lớn! Dung lượng tối đa là 2MB.');
                return false;
            }
            
            // Hiển thị loading
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.innerHTML = '⏳ Đang upload...';
            submitBtn.disabled = true;
        });
        
        // Function xóa ảnh (cần tạo file delete.php để xử lý)
        function deleteImage(filename) {
            if (confirm('Bạn có chắc chắn muốn xóa ảnh này?')) {
                fetch('delete_image.php?file=' + encodeURIComponent(filename))
                    .then(response => response.text())
                    .then(result => {
                        alert(result);
                        location.reload();
                    })
                    .catch(error => {
                        alert('Lỗi khi xóa ảnh: ' + error);
                    });
            }
        }
        
        // Drag and drop
        const uploadArea = document.querySelector('.upload-area');
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.background = '#e3f2fd';
            this.style.borderColor = '#2196f3';
        });
        
        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.style.background = '#f8fafc';
            this.style.borderColor = '#4facfe';
        });
        
        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.style.background = '#f8fafc';
            this.style.borderColor = '#4facfe';
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                document.getElementById('imageInput').files = files;
                document.getElementById('imageInput').dispatchEvent(new Event('change'));
            }
        });
    </script>
</body>
</html>