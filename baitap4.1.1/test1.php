<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đọc Từng Dòng VIP</title>
    <style>
        /* CSS SIÊU VIP - KHÔNG CHẠM VÀO CODE PHP */
        body {
            margin: 0;
            padding: 20px;
            background: linear-gradient(45deg, 
                #ff6b6b, #4ecdc4, #45b7d1, 
                #96ceb4, #feca57, #ff9ff3);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .vip-container {
            max-width: 900px;
            margin: 40px auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            padding: 40px;
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.4);
            position: relative;
            overflow: hidden;
        }
        
        .vip-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, 
                #ff0000, #ff7300, #fffb00, 
                #48ff00, #00ffd5, #002bff, 
                #7a00ff, #ff00c8, #ff0000);
            background-size: 400%;
            z-index: -1;
            filter: blur(25px);
            opacity: 0.7;
            animation: glow 20s linear infinite;
            border-radius: 27px;
        }
        
        @keyframes glow {
            0% { background-position: 0 0; }
            50% { background-position: 400% 0; }
            100% { background-position: 0 0; }
        }
        
        h3 {
            color: #6d28d9;
            font-size: 2.5rem;
            margin: 0 0 30px 0;
            padding-bottom: 20px;
            border-bottom: 3px solid;
            border-image: linear-gradient(90deg, 
                #ff6b6b, #4ecdc4, #45b7d1) 1;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        h3::before {
            content: '🔥';
            font-size: 2rem;
            animation: fire 2s infinite;
        }
        
        @keyframes fire {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }
        
        /* Áp dụng cho tất cả dòng được echo ra */
        body > * {
            background: linear-gradient(145deg, 
                #f8fafc 0%, #f1f5f9 100%);
            padding: 25px;
            margin: 15px 0;
            border-radius: 15px;
            border-left: 6px solid #6d28d9;
            font-family: 'Fira Code', 'Cascadia Code', monospace;
            font-size: 1.1rem;
            line-height: 1.8;
            color: #2d3748;
            box-shadow: 
                0 4px 6px rgba(0, 0, 0, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
            position: relative;
            counter-increment: line;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        
        body > *:hover {
            transform: translateX(10px);
            background: linear-gradient(145deg, 
                #e3f2fd 0%, #f3e8ff 100%);
            box-shadow: 
                0 10px 25px rgba(109, 40, 217, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }
        
        body > *::before {
            content: counter(line);
            position: absolute;
            left: -45px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, 
                #667eea 0%, #764ba2 100%);
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.4);
        }
        
        br {
            display: block;
            content: "";
            margin: 8px 0;
        }
        
        /* Footer */
        .vip-footer {
            margin-top: 40px;
            padding: 20px;
            background: rgba(109, 40, 217, 0.1);
            border-radius: 15px;
            text-align: center;
            border: 2px dashed rgba(109, 40, 217, 0.3);
            color: #6d28d9;
            font-weight: 600;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .vip-container {
                margin: 20px;
                padding: 25px;
            }
            
            h3 {
                font-size: 2rem;
            }
            
            body > * {
                padding: 20px;
                margin: 10px 0;
                font-size: 1rem;
            }
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="vip-container">
        <?php
        // Code PHP gốc - KHÔNG THAY ĐỔI
        $handle = fopen("vdfile.txt", "r");
        echo "<h3>Đọc từng dòng:</h3>";
        while (!feof($handle)) {
            $line = fgets($handle);
            echo $line . "<br>";
        }
        fclose($handle);
        ?>
        
    </div>
</body>
</html>