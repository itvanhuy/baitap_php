    <?php
    if ($_POST) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        if (empty($username) || empty($password)) {
            echo "<p>Vui lòng nhập đầy đủ thông tin</p>";
        } else {
            echo "<p>Đăng nhập thành công</p>";
        }
    }
    ?>