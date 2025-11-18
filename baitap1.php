<html>

<body>
    <p style="color: blue;"><?php
    echo "Kiểm tra xem số nhập vào có chia hết cho 5 không?<br>";
    $so = 6;
    if ($so % 5 == 0)
        echo "$so chia hết cho 5<br>";
    else
        echo "$so không chia hết cho 5<br>";
    ?></p>
    <p style="color: aquamarine;"><?php
    echo "Kiểm tra xem số đó là số lẻ hay số chẵn<br>";
    if ($so % 2 == 0)
        echo "$so là số chẵn<br>";
    else
        echo "$so là số lẻ<br>";
    ?></p>
    <p style="color: bisque;"><?php
    $diem = 2.0;
    echo "Kiểm tra xem điểm $so là học sinh gì<br>";
    if ($so >= 8)
        echo "Giỏi<br>";
    elseif ($so > 6.5 && $so < 7.9)
        echo "Khá<br>";
    elseif ($so > 5.0 && $so < 6.4)
        echo "Trung bình<br>";
    elseif ($so < 5.0)
        echo "Yếu<br>";
    ?></p>
</body>

</html>