<html>

<body>
    <table>
        <?php
        echo "Bảng Fibonacci <br>";
        $n = 6;
        function fibonacci($n)
        {
            if ($n < 0) {
                return -1;
            } else if ($n == 0 || $n == 1) {
                return $n;
            } else {
                return fibonacci($n - 1) + fibonacci($n - 2);
            }
        }
        echo ("STT  ||  Giá trị<br>");
        for ($i = 0; $i < $n; $i++) {

            echo ("$i&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
            echo (fibonacci($i) . " <br>");
        }
        ?>
    </table>

</body>

</html>