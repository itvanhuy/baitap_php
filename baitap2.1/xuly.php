 <html>
 <link rel="stylesheet" href="style.css">

 </html>
 <div class="button-group">
     <a href="giaodien.php" class="back-btn">← Quay lại</a>
     <a href="http://localhost/baitap_php/baitap2.7/giaodien.php" class="back-btn">Menu chính</a>
 </div>
 <?php
    if ($_POST) {
        $number = $_POST['number'];

        echo "<h2>Số bạn nhập: $number</h2>";

        if ($number > 0) {
            echo "<p class='positive'>Đây là số DƯƠNG</p>";
        } else if ($number < 0) {
            echo "<p class='negative'>Đây là số ÂM</p>";
        } else {
            echo "<p class='zero'>Đây là số 0 ( số 0 không âm hoặc không dương)</p>";
        }
    }
    ?>