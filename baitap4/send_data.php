<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form Gửi Dữ Liệu</title>
</head>
<body>
    <h2>Form Gửi Dữ Liệu</h2>
    
    <form action="process.php" method="get">
        <h3>Gửi bằng GET</h3>
        <div>
            <label>Nhập dữ liệu:</label>
            <input type="text" name="data">
        </div>
        <br>
        <button type="submit">Gửi bằng GET</button>
    </form>
    
    <hr>
    
    <form action="process.php" method="post">
        <h3>Gửi bằng POST</h3>
        <div>
            <label>Nhập dữ liệu:</label>
            <input type="text" name="data">
        </div>
        <br>
        <button type="submit">Gửi bằng POST</button>
    </form>
</body>
</html>