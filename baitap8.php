<?php

function factorial($n) {
   $cache = [];

    if (isset($cache[$n])) {
        return $cache[$n];
    }

    $f = 1;
    for ($i = 1; $i <= $n; $i++) {
        $f *= $i;
    }

    return $cache[$n] = $f;
}

function isStrongNumber($num) {
    $temp = $num;
    $sum = 0;

    while ($temp > 0) {
        $digit = $temp % 10;
        $sum += factorial($digit);
        $temp = intval($temp / 10);
    }

    return $sum == $num;
}

$strongNumbers = [];

for ($i = 1; $i < 100000; $i++) {
    if (isStrongNumber($i)) {
        $strongNumbers[] = $i;
    }
}


echo "Các số mạnh mẽ (Strong Numbers) nhỏ hơn 100000:<br>";
echo implode(", ", $strongNumbers);

?>
