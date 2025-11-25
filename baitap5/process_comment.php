<?php
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    
    if (empty($name) || empty($comment)) {
        echo "Lỗi: Vui lòng nhập đầy đủ thông tin!";
    } else {
        $safe_name = htmlspecialchars($name);
        $safe_comment = htmlspecialchars($comment);
        
        echo "Bình luận an toàn:<br><br>";
        echo "<strong>Họ tên:</strong> $safe_name<br>";
        echo "<strong>Bình luận:</strong> $safe_comment";
    }
?>