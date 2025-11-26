 <html>
 <link rel="stylesheet" href="style.css">

 </html>
 <div class="button-group">
     <a href="giaodien.php" class="back-btn">← Quay lại</a>
     <a href="http://localhost/baitap_php/baitap2.7/giaodien.php" class="back-btn">Menu chính</a>
 </div>
<?php
if ($_POST) {
    $diem = $_POST['diem'];

    echo "<h2>Điểm trung bình: $diem</h2>";

    if ($diem >= 8.0) {
        echo "<p class='excellent'>🎓 Xếp loại: GIỎI</p>";
    } else if ($diem >= 6.5) {
        echo "<p class='good'>📚 Xếp loại: KHÁ</p>";
    } else if ($diem >= 5.0) {
        echo "<p class='average'>📖 Xếp loại: TRUNG BÌNH</p>";
    } else {
        echo "<p class='weak'>⚠️ Xếp loại: YẾU</p>";
    }
}
