<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đọc File VIP</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }
        
        .vip-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 90%;
            max-width: 800px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        h3 {
            color: #6d28d9;
            font-size: 28px;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid;
            border-image: linear-gradient(to right, #667eea, #764ba2) 1;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        h3:before {
            content: "📁";
            font-size: 36px;
        }
        
        .content-box {
            background: linear-gradient(145deg, #f8fafc, #f1f5f9);
            padding: 30px;
            border-radius: 15px;
            border-left: 5px solid #6d28d9;
            font-family: 'Fira Code', monospace;
            font-size: 16px;
            line-height: 1.8;
            color: #333;
            max-height: 500px;
            overflow-y: auto;
            box-shadow: inset 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .content-box br {
            display: block;
            margin: 10px 0;
            content: "";
        }
        
        /* Hiệu ứng cho text */
        .content-box::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(to right, #667eea, #764ba2, #ec4899);
            border-radius: 3px;
        }
        
        /* Thanh cuộn đẹp */
        .content-box::-webkit-scrollbar {
            width: 8px;
        }
        
        .content-box::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        
        .content-box::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #667eea, #764ba2);
            border-radius: 4px;
        }
        
        /* Hiệu ứng đổ bóng */
        .vip-container:before {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
            background-size: 400%;
            z-index: -1;
            filter: blur(20px);
            opacity: 0.5;
            animation: glowing 20s linear infinite;
            border-radius: 30px;
        }
        
        @keyframes glowing {
            0% { background-position: 0 0; }
            50% { background-position: 400% 0; }
            100% { background-position: 0 0; }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .vip-container {
                padding: 20px;
                margin: 20px;
            }
            
            h3 {
                font-size: 24px;
            }
            
            .content-box {
                padding: 20px;
                font-size: 14px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="vip-container">
        <?php
        // Cách 1: Đọc toàn bộ file cùng lúc
        $content = file_get_contents("vdfile.txt");
        // In ra nội dung file
        echo "<h3>Nội dung file:</h3>";
        echo "<div class='content-box'>" . nl2br($content) . "</div>";
        ?>
    </div>
</body>
</html>