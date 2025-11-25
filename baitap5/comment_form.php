<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form Bình Luận</title>
</head>
<body>
    <h2>Form Bình Luận</h2>
    
    <form action="process_comment.php" method="post">
        <div>
            <label>Họ tên:</label>
            <input type="text" name="name">
        </div>
        <br>
        <div>
            <label>Bình luận:</label><br>
            <textarea name="comment" rows="4" cols="50"></textarea>
        </div>
        <br>
        <button type="submit">Gửi bình luận</button>
    </form>
</body>
</html>