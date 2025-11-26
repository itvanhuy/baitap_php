<?php
if ($_POST) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    
    if (empty($name) || empty($comment)) {
        echo "Lỗi: Vui lòng nhập đầy đủ thông tin!";
    } else {
        // Kiểm tra nếu có mã HTML/JavaScript nguy hiểm
        if ($name !== htmlspecialchars($name) || $comment !== htmlspecialchars($comment)) {
            echo "Lỗi: Nội dung chứa mã HTML/JavaScript không cho phép!";
        } else {
            // Nội dung an toàn
            echo "Bình luận an toàn:<br><br>";
            echo "<strong>Họ tên:</strong> $name<br>";
            echo "<strong>Bình luận:</strong> $comment";
        }
    }
}
?>