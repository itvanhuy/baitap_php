<?php

function isPerfect($num) {
    if ($num < 2) return false;

    $sum = 1; 
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            $sum += $i;
            if ($i != $num / $i) {
                $sum += $num / $i;
            }
        }
    }
    return $sum == $num;
}

function factorial($n) {
    $f = 1;
    for ($i = 1; $i <= $n; $i++) {
        $f *= $i;
    }
    return $f;
}

function isStrong($num) {
    $temp = $num;
    $sum = 0;

    while ($temp > 0) {
        $digit = $temp % 10;
        $sum += factorial($digit);
        $temp = intval($temp / 10);
    }

    return $sum == $num;
}

$perfectNumbers = [];
$strongNumbers  = [];

for ($i = 1; $i <= 10000; $i++) {
    if (isPerfect($i)) {
        $perfectNumbers[] = $i;
    }
    if (isStrong($i)) {
        $strongNumbers[] = $i;
    }
}

echo "SỐ HOÀN HẢO (1 - 10000):<br>";
echo implode(", ", $perfectNumbers) . "<br><br>";

echo "SỐ MẠNH MẼ (STRONG NUMBERS) (1 - 10000):<br>";
echo implode(", ", $strongNumbers) . "<br>";

?>
