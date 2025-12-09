<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Ghi File VIP Style</title>
    <style>
        /* CSS SIÊU VIP - KHÔNG CHẠM CODE PHP */
        
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: 
                linear-gradient(45deg, 
                    #000000 0%, 
                    #1a1a2e 25%, 
                    #16213e 50%, 
                    #0f3460 75%, 
                    #533483 100%);
            background-size: 400% 400%;
            animation: galaxy 15s ease infinite;
            font-family: 'Segoe UI', system-ui, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        @keyframes galaxy {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        /* Stars effect */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(2px 2px at 20px 30px, #eee, transparent),
                radial-gradient(2px 2px at 40px 70px, #fff, transparent),
                radial-gradient(3px 3px at 50px 160px, #ddd, transparent),
                radial-gradient(2px 2px at 90px 40px, #fff, transparent),
                radial-gradient(3px 3px at 130px 80px, #fff, transparent),
                radial-gradient(1px 1px at 160px 120px, #fff, transparent);
            background-repeat: repeat;
            animation: twinkle 4s infinite alternate;
            z-index: -1;
        }
        
        @keyframes twinkle {
            from { opacity: 0.5; }
            to { opacity: 1; }
        }
        
        .cosmic-container {
            width: 90%;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 50px 40px;
            margin: 30px;
            border: 2px solid;
            border-image: linear-gradient(45deg, 
                #00dbde, #fc00ff, #00dbde) 1;
            box-shadow: 
                0 0 50px rgba(0, 219, 222, 0.3),
                0 0 100px rgba(252, 0, 255, 0.2),
                0 0 150px rgba(0, 219, 222, 0.1),
                inset 0 0 30px rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
            transform: perspective(1000px) rotateX(5deg);
            transition: transform 0.5s ease;
        }
        
        .cosmic-container:hover {
            transform: perspective(1000px) rotateX(0deg);
        }
        
        .cosmic-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(
                from 0deg,
                transparent,
                rgba(0, 219, 222, 0.1),
                rgba(252, 0, 255, 0.1),
                rgba(0, 219, 222, 0.1),
                transparent 30%
            );
            animation: rotate 10s linear infinite;
            z-index: -1;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Form styling */
        form {
            position: relative;
            z-index: 2;
        }
        
        textarea[name="content"] {
            width: 100%;
            min-height: 200px;
            background: rgba(0, 0, 0, 0.6);
            border: 3px solid;
            border-image: linear-gradient(45deg, 
                #00dbde, #fc00ff) 1;
            border-radius: 15px;
            padding: 25px;
            font-family: 'Fira Code', 'Cascadia Code', monospace;
            font-size: 18px;
            color: #fff;
            line-height: 1.6;
            resize: vertical;
            transition: all 0.3s ease;
            outline: none;
            box-shadow: 
                inset 0 0 20px rgba(0, 219, 222, 0.2),
                0 10px 30px rgba(0, 0, 0, 0.5);
        }
        
        textarea[name="content"]:focus {
            background: rgba(0, 0, 0, 0.8);
            border-image: linear-gradient(45deg, 
                #00ff88, #00dbde) 1;
            box-shadow: 
                inset 0 0 30px rgba(0, 219, 222, 0.3),
                0 0 40px rgba(0, 219, 222, 0.4);
            transform: translateY(-5px);
        }
        
        textarea[name="content"]::placeholder {
            color: rgba(255, 255, 255, 0.5);
            font-style: italic;
        }
        
        input[name="submit"] {
            background: linear-gradient(45deg, 
                #00dbde 0%, 
                #fc00ff 100%);
            color: white;
            border: none;
            padding: 18px 50px;
            font-size: 20px;
            font-weight: bold;
            border-radius: 12px;
            cursor: pointer;
            margin-top: 30px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
            overflow: hidden;
            box-shadow: 
                0 10px 30px rgba(0, 219, 222, 0.4),
                0 5px 15px rgba(252, 0, 255, 0.3);
        }
        
        input[name="submit"]:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 
                0 15px 40px rgba(0, 219, 222, 0.6),
                0 10px 25px rgba(252, 0, 255, 0.5);
            background: linear-gradient(45deg, 
                #00ff88 0%, 
                #00dbde 100%);
        }
        
        input[name="submit"]:active {
            transform: translateY(0) scale(0.98);
        }
        
        input[name="submit"]::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.4),
                transparent
            );
            transition: 0.5s;
        }
        
        input[name="submit"]:hover::before {
            left: 100%;
        }
        
        br {
            margin: 15px 0;
            display: block;
        }
        
        /* Message styling */
        body > *:not(form):not(.cosmic-container) {
            background: linear-gradient(45deg, 
                rgba(0, 255, 136, 0.2), 
                rgba(0, 219, 222, 0.2));
            color: #00ff88;
            padding: 20px 30px;
            border-radius: 15px;
            margin: 25px 0;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            border: 2px solid;
            border-image: linear-gradient(45deg, 
                #00ff88, #00dbde) 1;
            animation: pulse 2s infinite;
            text-shadow: 0 0 10px rgba(0, 255, 136, 0.5);
            box-shadow: 
                0 0 30px rgba(0, 255, 136, 0.3),
                inset 0 0 20px rgba(0, 255, 136, 0.1);
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }
        
        /* Title */
        .cosmic-title {
            color: white;
            font-size: 3rem;
            text-align: center;
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: 3px;
            position: relative;
            text-shadow: 
                0 0 20px rgba(0, 219, 222, 0.8),
                0 0 40px rgba(252, 0, 255, 0.6);
            font-weight: 900;
        }
        
        .cosmic-title::before {
            content: '✍️';
            position: absolute;
            left: -60px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2.5rem;
            filter: drop-shadow(0 0 10px #00dbde);
        }
        
        .cosmic-title::after {
            content: '📁';
            position: absolute;
            right: -60px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2.5rem;
            filter: drop-shadow(0 0 10px #fc00ff);
        }
        
        /* Footer */
        .cosmic-footer {
            margin-top: 40px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .cosmic-container {
                padding: 30px 20px;
                margin: 20px;
                transform: none;
            }
            
            .cosmic-title {
                font-size: 2rem;
            }
            
            .cosmic-title::before,
            .cosmic-title::after {
                display: none;
            }
            
            textarea[name="content"] {
                font-size: 16px;
                padding: 20px;
            }
            
            input[name="submit"] {
                width: 100%;
                padding: 15px;
            }
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="cosmic-container">
        <h1 class="cosmic-title">Ghi File</h1>
        
        <?php
        if (isset($_POST['submit'])) {
            $content = $_POST['content'];
            
            if (!empty($content)) {
                // Ghi nối tiếp vào file note.txt
                file_put_contents("note.txt", $content . PHP_EOL, FILE_APPEND);
                echo "Đã ghi thành công!";
            }
        }
        ?>
        
        <form method="POST">
            <textarea name="content" rows="4" cols="50" placeholder="✍️ Nhập nội dung để ghi vào file note.txt..."></textarea><br>
            <input type="submit" name="submit" value="Ghi vào file">
        </form>
        
    </div>
</body>
</html>