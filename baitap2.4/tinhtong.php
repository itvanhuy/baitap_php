 <html>
 <link rel="stylesheet" href="style.css">

 </html>
 <div class="button-group">
     <a href="giaodien.php" class="back-btn">← Quay lại</a>
     <a href="http://localhost/baitap_php/baitap2.7/giaodien.php" class="back-btn">Menu chính</a>
 </div>
<?php
if ($_POST) {
    $n = $_POST['n'];

    if ($n > 0) {
        echo "<h2>Tính tổng các số nguyên từ 1 đến $n</h2>";

        $tong_for = 0;
        $day_so = "";

        for ($i = 1; $i <= $n; $i++) {
            $tong_for += $i;
            $day_so .= $i;
            if ($i < $n) {
                $day_so .= " + ";
            }
        }

        echo "<div class='calculation'>";
        echo "<p><strong>Dãy số:</strong> $day_so</p>";
        echo "<p><strong>Tổng:</strong> $tong_for</p>";
        echo "</div>";

    } else {
        echo "<p class='error'>Vui lòng nhập số nguyên dương!</p>";
    }
}
