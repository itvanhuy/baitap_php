<?php
// Mở file để đọc
$handle = fopen("data.txt", "r");

// Đọc từng dòng và hiển thị
while (!feof($handle)) {
    $line = fgets($handle);
    echo $line . "<br>";
}

// Đóng file
fclose($handle);
?>