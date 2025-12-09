<?php
// Xử lý dữ liệu POST
if ($_POST) {
    $input = $_POST['numbers'];
    
    // Bao toàn bộ HTML trong PHP echo
    echo "<!DOCTYPE html>
    <html lang='vi'>
    <head>
        <meta charset='UTF-8'>
        <title>Kết quả</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>";
    
    if (empty($input)) {
        // Trường hợp 1: Không nhập gì
        echo "<div class='container'>
                <div class='header'>
                    <h1><i>❌</i> Lỗi nhập liệu</h1>
                </div>
                <div class='result-section'>
                    <div class='error-box'>
                        <h3><i>⚠️</i> Lỗi</h3>
                        <p>Vui lòng nhập dãy số!</p>
                    </div>
                    <a href='form.php' class='back-btn'><i>↩</i> Quay lại nhập</a>
                </div>
            </div>";
    } else {
        // Kiểm tra dấu phẩy
        if (strpos($input, ',') === false) {
            echo "<div class='container'>
                    <div class='header'>
                        <h1><i>❌</i> Lỗi nhập liệu</h1>
                    </div>
                    <div class='result-section'>
                        <div class='error-box'>
                            <h3><i>⚠️</i> Lỗi</h3>
                            <p>Phải nhập các số cách nhau bằng dấu phẩy (,)</p>
                        </div>
                        <a href='form.php' class='back-btn'><i>↩</i> Quay lại nhập</a>
                    </div>
                </div>";
        } else {
            // Kiểm tra ký tự hợp lệ
            $has_invalid_char = false;
            $invalid_char = '';
            $valid_chars = "0123456789,.- ";
            
            for ($i = 0; $i < strlen($input); $i++) {
                $char = $input[$i];
                if (strpos($valid_chars, $char) === false && $char != ' ') {
                    $has_invalid_char = true;
                    $invalid_char = $char;
                    break;
                }
            }
            
            if ($has_invalid_char) {
                echo "<div class='container'>
                        <div class='header'>
                            <h1><i>❌</i> Lỗi nhập liệu</h1>
                        </div>
                        <div class='result-section'>
                            <div class='error-box'>
                                <h3><i>⚠️</i> Lỗi</h3>
                                <p>Không được nhập ký tự '$invalid_char'. Chỉ được nhập số và dấu phẩy!</p>
                            </div>
                            <a href='form.php' class='back-btn'><i>↩</i> Quay lại nhập</a>
                        </div>
                    </div>";
            } else {
                // Xử lý mảng
                $array = explode(',', $input);
                $has_error = false;
                $error_message = "";
                $numbers = [];
                
                foreach ($array as $value) {
                    $num = trim($value);
                    
                    if ($num === '') {
                        $has_error = true;
                        $error_message = "Lỗi: Không được để trống giữa các dấu phẩy!";
                        break;
                    }
                    
                    if (is_numeric($num)) {
                        $numbers[] = (float)$num;
                    } else {
                        $has_error = true;
                        $error_message = "Lỗi: '$num' không phải là số hợp lệ!";
                        break;
                    }
                }
                
                if ($has_error) {
                    echo "<div class='container'>
                            <div class='header'>
                                <h1><i>❌</i> Lỗi nhập liệu</h1>
                            </div>
                            <div class='result-section'>
                                <div class='error-box'>
                                    <h3><i>⚠️</i> Lỗi</h3>
                                    <p>$error_message</p>
                                </div>
                                <a href='form.php' class='back-btn'><i>↩</i> Quay lại nhập</a>
                            </div>
                        </div>";
                } else if (count($numbers) == 0) {
                    echo "<div class='container'>
                            <div class='header'>
                                <h1><i>❌</i> Lỗi nhập liệu</h1>
                            </div>
                            <div class='result-section'>
                                <div class='error-box'>
                                    <h3><i>⚠️</i> Lỗi</h3>
                                    <p>Không có số hợp lệ!</p>
                                </div>
                                <a href='form.php' class='back-btn'><i>↩</i> Quay lại nhập</a>
                            </div>
                        </div>";
                } else {
                    // Tính toán kết quả
                    $sum = 0;
                    $max = $numbers[0];
                    $min = $numbers[0];
                    $even_numbers = [];
                    
                    foreach ($numbers as $num) {
                        $sum += $num;
                        if ($num > $max) $max = $num;
                        if ($num < $min) $min = $num;
                        if ($num % 2 == 0) $even_numbers[] = $num;
                    }
                    
                    $count = count($numbers);
                    $average = $sum / $count;
                    
                    // Hiển thị kết quả thành công
                    echo "<div class='container'>
                            <div class='header'>
                                <h1><i>✅</i> Kết quả xử lý mảng</h1>
                                <p>Thống kê dãy số</p>
                            </div>
                            <div class='result-section'>
                                <div class='success-box'>
                                    <h3><i>📊</i> Dữ liệu đã nhập</h3>
                                    <div class='input-display'>$input</div>
                                </div>
                                
                                <div class='stats-bar'>
                                    <div class='stat-item'>
                                        <div class='stat-value'>$count</div>
                                        <div class='stat-label'>Phần tử</div>
                                    </div>
                                    <div class='stat-item'>
                                        <div class='stat-value'>$sum</div>
                                        <div class='stat-label'>Tổng</div>
                                    </div>
                                    <div class='stat-item'>
                                        <div class='stat-value'>" . number_format($average, 2) . "</div>
                                        <div class='stat-label'>Trung bình</div>
                                    </div>
                                </div>
                                
                                <div class='result-grid'>
                                    <div class='result-card'>
                                        <div class='result-title'><i>🔢</i> Mảng số</div>
                                        <div class='result-value'>[" . implode(', ', $numbers) . "]</div>
                                    </div>
                                    
                                    <div class='result-card'>
                                        <div class='result-title'><i>➕</i> Tổng các số</div>
                                        <div class='result-value highlight'>$sum</div>
                                    </div>
                                    
                                    <div class='result-card'>
                                        <div class='result-title'><i>📏</i> Số lượng phần tử</div>
                                        <div class='result-value highlight'>$count</div>
                                    </div>
                                    
                                    <div class='result-card'>
                                        <div class='result-title'><i>📈</i> Phần tử lớn nhất</div>
                                        <div class='result-value highlight'>$max</div>
                                    </div>
                                    
                                    <div class='result-card'>
                                        <div class='result-title'><i>📉</i> Phần tử nhỏ nhất</div>
                                        <div class='result-value highlight'>$min</div>
                                    </div>
                                    
                                    <div class='result-card'>
                                        <div class='result-title'><i>🎯</i> Các phần tử chẵn</div>";
                    
                    if (count($even_numbers) > 0) {
                        echo "<div class='even-numbers'>" . implode(', ', $even_numbers) . "</div>";
                    } else {
                        echo "<div class='result-value' style='color: #95a5a6;'>Không có số chẵn</div>";
                    }
                    
                    echo "              </div>
                                </div>
                                
                                <a href='form.php' class='back-btn'><i>↩</i> Quay lại nhập mới</a>
                            </div>
                        </div>";
                }
            }
        }
    }
    
    echo "</body></html>";
} else {
    // Nếu không có POST, quay về form
    header("Location: form.php");
    exit;
}
?>