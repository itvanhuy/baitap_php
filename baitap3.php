<html>
<body>
    <p style="color: blue;">
        <?php
        echo "In ra các số từ 1 đến 10<br>";

        for ($i = 1; $i <= 10; $i++) {
            echo $i . " ";
        }
        ?>
    </p>
     <p style="color: green;">
        <?php
        echo "Tính tổng các số từ 1 đến 100<br>";

        $sum = 0;
        for ($i = 1; $i <= 100; $i++) {
            $sum += $i;
        }

        echo "Tổng = $sum<br>";
        ?>
    </p>
    <p style="color: purple;">
        <?php
        echo "In bảng cửu chương của một số bất kỳ<br>";

        $n = 7; // bạn muốn đổi bảng số nào thì đổi số này

        echo "Bảng cửu chương của $n<br>";

        for ($i = 1; $i <= 10; $i++) {
            echo "$n x $i = " . ($n * $i) . "<br>";
        }
        ?>
    </p>
</body>
</html>