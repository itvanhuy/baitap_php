<html>
<body>
    <p style="color: blue;">
        <?php
        echo "Các số chẵn từ 1 đến 20:<br>";

        for ($i = 1; $i <= 20; $i++) {
            if ($i % 2 == 0) {
                echo $i . " ";
            }
        }
        ?>
    </p>
     <p style="color: green;">
        <?php
        echo "Tổng các số lẻ nhỏ hơn 100:<br>";

        $sum = 0;
        for ($i = 1; $i < 100; $i += 2) {
            $sum += $i;
        }

        echo "Tổng = $sum<br>";
        ?>
    </p>
     <p style="color: purple;">
        <?php
        echo "In ra các số nhỏ hơn n cho đến khi gặp số âm<br>";

        $n = 5;

        do {
            echo $n . "<br>";
            $n--;
        } while ($n >= 0);
        ?>
    </p>
</body>
</html>