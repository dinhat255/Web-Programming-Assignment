<?php

/**
 * File cấu hình chính của ứng dụng
 * Chứa tất cả các thiết lập và hằng số toàn cục
 */

// =================================
// CẤU HÌNH DATABASE
// =================================
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sachhay_db');
//use port 3306
define('DB_PORT', 3306);

// =================================
// CẤU HÌNH ỨNG DỤNG
// =================================
define('APP_NAME', 'SachHay');

// QUAN TRỌNG: DocumentRoot đã set là /public nên BASE_URL chỉ cần /
define('PROJECT_NAME', 'SachHay');
define('BASE_URL', 'http://localhost/');

// Đường dẫn tuyệt đối
define('APP_ROOT', dirname(dirname(__FILE__))); // app/
define('ROOT', dirname(APP_ROOT));
define('PUBLIC_PATH', ROOT . '/public/');

// =================================
// CẤU HÌNH MÔI TRƯỜNG
// =================================
define('ENVIRONMENT', 'development'); // development hoặc production

// Bật/tắt hiển thị lỗi
if (ENVIRONMENT === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// =================================
// CẤU HÌNH KHÁC
// =================================
date_default_timezone_set('Asia/Ho_Chi_Minh'); // Múi giờ VN
define('CHARSET', 'UTF-8');

