 <html>
 <link rel="stylesheet" href="style.css">

 </html>
 <div class="button-group">
     <a href="giaodien.php" class="back-btn">← Quay lại</a>
     <a href="http://localhost/baitap_php/baitap2.7/giaodien.php" class="back-btn">Menu chính</a>
 </div>
<?php
if ($_POST) {
    $so = $_POST['so'];

    echo "<h2>Số bạn nhập: $so</h2>";

    if ($so == 1) {
        echo "<p class='sunday'>Chủ nhật</p>";
    } else if ($so == 2) {
        echo "<p class='monday'>Thứ hai</p>";
    } else if ($so == 3) {
        echo "<p class='tuesday'>Thứ ba</p>";
    } else if ($so == 4) {
        echo "<p class='wednesday'>Thứ tư</p>";
    } else if ($so == 5) {
        echo "<p class='thursday'>Thứ năm</p>";
    } else if ($so == 6) {
        echo "<p class='friday'>Thứ sáu</p>";
    } else if ($so == 7) {
        echo "<p class='saturday'>Thứ bảy</p>";
    } else {
        echo "<p class='invalid'>Số không hợp lệ! Vui lòng nhập số từ 1-7</p>";
    }
}
