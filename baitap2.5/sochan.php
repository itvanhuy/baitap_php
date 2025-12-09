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
            echo "<h2>Các số nguyên chẵn từ 1 đến $n</h2>";
            
            for ($i = 1; $i <= $n; $i++) {
                if ($i % 2 == 0) {
                    echo "$i ";
                }
            }
        }
    }
?>