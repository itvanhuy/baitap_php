<?php
$n = 5;

for ($i = 1; $i <= $n; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}
?>
<?php
$n = 5; 

for ($i = 1; $i <= $n; $i++) {

    for ($s = 1; $s <= $n - $i; $s++) {
        echo "&nbsp;&nbsp;";
    }


    for ($j = 1; $j <= 2*$i - 1; $j++) {
        echo "*";
    }

    echo "<br>";
}
?>
<?php
$n = 6;

for ($i = 1; $i <= $n; $i++) {

    // Dòng đầu + dòng cuối
    if ($i == 1 || $i == $n) {
        for ($j = 1; $j <= $n; $j++) {
            echo "* ";
        }
        echo "<br>";
        continue;
    }

    // Dòng giữa
    echo "* "; // cạnh trái

    for ($s = 1; $s <= $n; $s++) {
        echo "&nbsp;&nbsp;"; // khoảng trống đúng 2 &nbsp;
    }

    echo "* <br>"; // cạnh phải
}
?>


