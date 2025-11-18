<!DOCTYPE html>
<html>
<body>
    <p style="color: blue;">
        <?php
        echo "Nhập vào một số từ 1–7, in ra thứ trong tuần<br>";
        $day = 5;

        switch ($day) {
            case 1:
                echo "Chủ nhật<br>";
                break;
            case 2:
                echo "Thứ hai<br>";
                break;
            case 3:
                echo "Thứ ba<br>";
                break;
            case 4:
                echo "Thứ tư<br>";
                break;
            case 5:
                echo "Thứ năm<br>";
                break;
            case 6:
                echo "Thứ sáu<br>";
                break;
            case 7:
                echo "Thứ bảy<br>";
                break;
            default:
                echo "Số không hợp lệ. Vui lòng nhập từ 1 đến 7<br>";
        }
        ?>
    </p>
     <p style="color: green;">
        <?php
        echo "Nhập vào tên tháng (1–12), in ra số ngày tương ứng<br>";
        $month = 2;

        switch ($month) {
            case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                echo "Tháng $month có 31 ngày<br>";
                break;

            case 4: case 6: case 9: case 11:
                echo "Tháng $month có 30 ngày<br>";
                break;

            case 2:
                echo "Tháng 2 có 28 hoặc 29 ngày (năm nhuận)<br>";
                break;

            default:
                echo "Tháng không hợp lệ. Vui lòng nhập từ 1 đến 12<br>";
        }
        ?>
    </p>
</body>
</html>
