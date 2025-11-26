<!DOCTYPE html>
<html>
<head>
    <title>Ngày trong tuần</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tra cứu ngày trong tuần</h1>
    
    <form method="POST" action="thutu.php">
        <h2>Nhập số (1-7)</h2>
        <input type="number" name="so" min="1" max="7"  >
        <br>
        <input type="submit" value="Xem kết quả">
    </form>

    <div class="rules">
        <h3>Quy ước số</h3>
        <ul>
            <li>1: Chủ nhật</li>
            <li>2: Thứ hai</li>
            <li>3: Thứ ba</li>
            <li>4: Thứ tư</li>
            <li>5: Thứ năm</li>
            <li>6: Thứ sáu</li>
            <li>7: Thứ bảy</li>
        </ul>
    </div>
</body>
</html>