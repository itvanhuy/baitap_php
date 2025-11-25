<?php
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    if (empty($email)) {
        echo "<p>Vui lòng nhập email</p>";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Email không đúng định dạng</p>";
    }
    else if (empty($password)) {
        echo "<p>Vui lòng nhập mật khẩu</p>";
    }
    else if (strlen($password) < 6) {
        echo "<p>Mật khẩu phải có ít nhất 6 ký tự</p>";
    }
    else {
        echo "<p>Thông tin hợp lệ.</p>";
    }
?>