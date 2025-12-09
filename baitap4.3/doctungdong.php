<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            background:#000;
            margin:0;
            padding:30px;
            font-family:'Courier New',monospace;
            color:#0f0;
            overflow-x:hidden
        }
        body::before{
            content:'';
            position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:linear-gradient(
                to bottom,
                transparent 95%,
                #0f02 100%
            );
            pointer-events:none;
            animation:matrixRain 0.1s linear infinite
        }
        @keyframes matrixRain{
            0%{background-position:0 0}
            100%{background-position:0 10px}
        }
        .container{
            background:rgba(0,30,0,0.8);
            border:2px solid #0f0;
            padding:40px;
            border-radius:10px;
            box-shadow:0 0 50px #0f04,
                      inset 0 0 50px #0f01;
            max-width:800px;
            margin:auto;
            position:relative;
            z-index:1
        }
        ul{
            list-style:none;
            padding:0;
            margin:0;
            border-left:3px solid #0f0;
            padding-left:20px
        }
        li{
            background:rgba(0,60,0,0.3);
            margin:15px 0;
            padding:20px;
            border-radius:5px;
            border:1px solid #0f04;
            position:relative;
            transition:0.3s;
            font-size:18px;
            text-shadow:0 0 5px #0f0
        }
        li:hover{
            background:rgba(0,100,0,0.5);
            transform:translateX(20px);
            border-color:#0f0;
            box-shadow:0 0 30px #0f06
        }
        li::before{
            content:'>';
            position:absolute;
            left:-25px;
            color:#0f0;
            animation:blink 1s infinite
        }
        @keyframes blink{
            0%,100%{opacity:1}
            50%{opacity:0}
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (file_exists("note.txt")) {
            $lines = file("note.txt");
            echo "<ul>";
            foreach ($lines as $line) {
                $line = trim($line);
                if (!empty($line)) {
                    echo "<li>" . htmlspecialchars($line) . "</li>";
                }
            }
            echo "</ul>";
        }
        ?>
    </div>
</body>
</html>