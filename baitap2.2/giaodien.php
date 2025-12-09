<!DOCTYPE html>
<html>
<head>
    <title>Xếp loại học lực</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Xếp loại học lực</h1>
    
    <form method="POST" action="xeploai.php">
        <h2>Nhập điểm trung bình</h2>
        <input type="number" name="diem" step="0.1" min="0" max="10" required>
        <br>
        <input type="submit" value="Xếp loại">
    </form>

    <div class="rules">
        <h3>Quy tắc xếp loại</h3>
        <ul>
            <li>≥ 8.0: <strong style="color: #28a745;">Giỏi</strong></li>
            <li>6.5 – 7.9: <strong style="color: #17a2b8;">Khá</strong></li>
            <li>5.0 – 6.4: <strong style="color: #ffc107;">Trung bình</strong></li>
            <li>&lt; 5.0: <strong style="color: #dc3545;">Yếu</strong></li>
        </ul>
    </div>
</body>
</html>