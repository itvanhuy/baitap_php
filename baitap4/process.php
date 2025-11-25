<?php
if ($_GET) {
    $method = 'GET';
    $data = $_GET['data'];
} else if ($_POST) {
    $method = 'POST';
    $data = $_POST['data'];
}

if (empty($data)) {
    echo "Lỗi: Vui lòng nhập dữ liệu!";
} else {
    echo "Bạn đã gửi dữ liệu bằng $method: $data";
}
?>