<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            background:#000;
            padding:50px;
            font-family:monospace
        }
        .neon-box{
            background:rgba(0,0,0,0.8);
            border:2px solid;
            padding:40px;
            border-radius:20px;
            max-width:800px;
            margin:auto;
            border-image:linear-gradient(45deg,#ff00ff,#00ffff)1;
            box-shadow:0 0 40px #ff00ff44,
                      0 0 80px #00ffff33,
                      inset 0 0 40px #000
        }
        h3{
            color:#0ff;
            text-shadow:0 0 10px #0ff;
            font-size:30px;
            border-bottom:3px solid #f0f;
            padding-bottom:15px
        }
        /* CSS tự động áp dụng cho output PHP */
        body>*{
            background:#111;
            color:#0f0;
            padding:20px;
            margin:15px 0;
            border-left:4px solid #f0f;
            border-right:4px solid #0ff;
            border-radius:10px;
            box-shadow:0 0 20px #0ff22
        }
        body>*:hover{
            background:#222;
            transform:translateX(10px);
            box-shadow:0 0 30px #f0f44
        }
    </style>
</head>
<body>
    <div class="neon-box">
        <?php
        $lines = file("vdfile.txt");
        echo "<h3>Danh sách các dòng trong file:</h3>";
        foreach ($lines as $index => $line) {
            echo "Dòng " . ($index + 1) . ": " . $line . "<br>";
        }
        ?>
    </div>
</body>
</html>