<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Trang Chủ'; ?></title>
    <style>
        /* CSS cho header */
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .header h1 {
            margin: 0;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
        }
        
        nav {
            background: #333;
            padding: 15px;
            margin-top: 10px;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 20px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        nav a:hover {
            background: #667eea;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>🖥️ HỆ THỐNG QUẢN LÝ</h1>
        <p>Chào mừng đến với website của chúng tôi</p>
        
        <nav>
            <a href="home.php">🏠 Trang Chủ</a>
            <a href="about.php">ℹ️ Giới Thiệu</a>
            <a href="contact.php">📞 Liên Hệ</a>
            <a href="products.php">🛒 Sản Phẩm</a>
        </nav>
    </header>
    
    <div class="container" style="max-width: 1200px; margin: 20px auto; padding: 20px;"></div>