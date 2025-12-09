<!DOCTYPE html>
<html>
<head>
    <title>Bài Tập PHP - Menu Tổng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>BÀI TẬP PHP</h1>
        <p class="subtitle">Chọn bài tập để thực hiện</p>
        
        <div class="menu-grid">
            <!-- Bài 1 -->
            <div class="menu-card">
                <div class="card-icon">🔢</div>
                <h3>Bài 1: Kiểm tra số dương</h3>
                <p>Kiểm tra số nhập vào là số dương, âm hay zero</p>
                <form method="POST" action="/baitap_php/baitap2.1/giaodien.php">
                    <button type="submit" class="card-button">Thực hiện</button>
                </form>
            </div>

            <!-- Bài 2 -->
            <div class="menu-card">
                <div class="card-icon">📊</div>
                <h3>Bài 2: Xếp loại học lực</h3>
                <p>Xếp loại học lực dựa trên điểm trung bình</p>
                <form method="POST" action="/baitap_php/baitap2.2/giaodien.php">
                    <button type="submit" class="card-button">Thực hiện</button>
                </form>
            </div>

            <!-- Bài 3 -->
            <div class="menu-card">
                <div class="card-icon">📅</div>
                <h3>Bài 3: Ngày trong tuần</h3>
                <p>Hiển thị thứ trong tuần dựa trên số nhập vào</p>
                <form method="POST" action="/baitap_php/baitap2.3/giaodien.php">
                    <button type="submit" class="card-button">Thực hiện</button>
                </form>
            </div>

            <!-- Bài 4 -->
            <div class="menu-card">
                <div class="card-icon">➕</div>
                <h3>Bài 4: Tính tổng số nguyên</h3>
                <p>Tính tổng các số nguyên từ 1 đến n</p>
                <form method="POST" action="/baitap_php/baitap2.4/giaodien.php">
                    <button type="submit" class="card-button">Thực hiện</button>
                </form>
            </div>

            <!-- Bài 5 -->
            <div class="menu-card">
                <div class="card-icon">🔵</div>
                <h3>Bài 5: In số chẵn</h3>
                <p>In các số nguyên chẵn từ 1 đến n</p>
                <form method="POST" action="/baitap_php/baitap2.5/giaodien.php">
                    <button type="submit" class="card-button">Thực hiện</button>
                </form>
            </div>

            <!-- Bài 6 -->
            <div class="menu-card">
                <div class="card-icon">🔁</div>
                <h3>Bài 6: In số ngược</h3>
                <p>In các số nguyên từ n đến 1</p>
                <form method="POST" action="/baitap_php/baitap2.6/giaodien.php">
                    <button type="submit" class="card-button">Thực hiện</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>