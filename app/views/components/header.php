<?php
// views/components/header.php

// Khởi tạo session nếu chưa có
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Helper: an toàn khi echo
function e(string $v): string
{
    return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}

// Cart count - lấy từ database nếu đã đăng nhập
$cartCount = 0;
if (isset($_SESSION['users_id'])) {
    require_once APP_ROOT . '/models/CartModel.php';
    $cartModel = new CartModel();
    $cartCount = max(0, $cartModel->getCartCount($_SESSION['users_id']));
}

// User info
$user = null;
if (isset($_SESSION['users_id'])) {
    $user = [
        'id' => $_SESSION['users_id'],
        'name' => $_SESSION['users_username'] ?? 'User',
        'email' => $_SESSION['users_email'] ?? '',
        'role' => $_SESSION['users_role'] ?? 'user'
    ];
}

// BASE_URL constant phải được định nghĩa ở config (bạn đã dùng trước đó)
$base = defined('BASE_URL') ? rtrim(BASE_URL, '/') . '/' : '/';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title & Description -->
    <title><?= e($title ?? 'SachHay - Website Bán Sách Trực Tuyến') ?></title>
    <meta name="description" content="<?= e($description ?? 'SachHay - Website bán sách trực tuyến với hàng ngàn đầu sách đa dạng. Mua sách online giá tốt, giao hàng nhanh chóng, ưu đãi hấp dẫn.') ?>">
    <meta name="keywords" content="<?= e($keywords ?? 'mua sách online, bán sách trực tuyến, sachhay, sách giáo khoa, văn học, self-help, tiểu thuyết, sách thiếu nhi') ?>">
    <meta name="author" content="Nhóm L01_6 - HCMUT">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= e($ogUrl ?? BASE_URL) ?>">
    <meta property="og:title" content="<?= e($ogTitle ?? $title ?? 'SachHay - Website Bán Sách Trực Tuyến') ?>">
    <meta property="og:description" content="<?= e($ogDescription ?? $description ?? 'Website bán sách trực tuyến với hàng ngàn đầu sách đa dạng') ?>">
    <meta property="og:image" content="<?= e($ogImage ?? BASE_URL . 'images/og-default.jpg') ?>">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:site_name" content="SachHay">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?= e($ogUrl ?? BASE_URL) ?>">
    <meta name="twitter:title" content="<?= e($ogTitle ?? $title ?? 'SachHay') ?>">
    <meta name="twitter:description" content="<?= e($ogDescription ?? $description ?? 'Website bán sách trực tuyến') ?>">
    <meta name="twitter:image" content="<?= e($ogImage ?? BASE_URL . 'images/og-default.jpg') ?>">

    <!-- Canonical URL -->
    <link rel="canonical" href="<?= e($canonical ?? BASE_URL . ltrim($_SERVER['REQUEST_URI'] ?? '', '/')) ?>">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sachhay-red: #8B5E3C;
            --sachhay-orange: #C89B5C;
            --sachhay-dark: #2B211B;
            --sachhay-gray: #7A6A5E;
            --sachhay-light-gray: #F6EFE8;
            --page-bg: #FDF8F2;
            --card-bg: #FFF9F3;
            --warm-border: #E5D3C2;
        }

        body {
            font-family: 'Roboto', sans-serif;
            color: var(--sachhay-dark);
            background: linear-gradient(180deg, #fffaf5 0%, var(--page-bg) 100%);
        }

        /* Header Styles */
        .main-header {
            background-color: rgba(255, 251, 246, 0.95);
            box-shadow: 0 10px 24px rgba(80, 48, 26, 0.08);
            padding: 12px 0;
            border-bottom: 1px solid #e9d8c8;
            border-radius: 0 0 18px 18px;
            backdrop-filter: blur(8px);
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 28px;
            font-weight: 700;
            color: var(--sachhay-red);
            text-decoration: none;
        }

        .logo:hover {
            color: var(--sachhay-orange);
        }

        .header-phone {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            border-radius: 999px;
            background: #fff7f0;
            border: 1px solid #ead5c3;
            color: var(--sachhay-red);
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            box-shadow: 0 4px 10px rgba(80, 48, 26, 0.06);
        }

        .header-phone:hover {
            color: #704526;
            background: #fff0e2;
        }

        .search-box {
            position: relative;
        }

        .search-box input[type="search"] {
            border: 2px solid var(--warm-border);
            border-radius: 10px;
            padding: 10px 50px 10px 15px;
            background: #fffdf9;
        }

        .search-box button {
            position: absolute;
            right: 2px;
            top: 50%;
            transform: translateY(-50%);
            background-color: var(--sachhay-red);
            border: none;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
        }

        .search-box button:hover {
            background-color: #704526;
        }

        .nav-menu {
            background: linear-gradient(90deg, var(--sachhay-light-gray) 0%, #ffffff 100%);
            padding: 10px 0 12px;
        }

        .nav-menu .nav-link {
            color: var(--sachhay-dark);
            font-weight: 500;
            padding: 6px 14px;
            font-size: 15px;
            text-decoration: none;
            transition: color 0.2s, background-color 0.2s, border-color 0.2s;
            border-radius: 999px;
            border-bottom: 3px solid transparent;
            background-color: rgba(255, 255, 255, 0.75);
        }

        .nav-menu .nav-link:hover,
        .nav-menu .nav-link.active {
            color: var(--sachhay-red);
            background-color: #fff6ef;
            border-bottom-color: var(--sachhay-red);
        }

        .header-icons .dropdown-menu a {
            margin-left: 0;
            font-size: 14px;
            padding: 8px 16px;
            width: 100%;
        }


        .header-icons .dropdown-menu a:not(:hover) {
            color: var(--sachhay-dark);
        }

        .header-actions {
            display: inline-flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap;
        }

        .header-icons>a,
        .header-icons .btn-group>.btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            border-radius: 999px;
        }

        .header-icons>a {
            width: 42px;
            height: 42px;
            background-color: #fff7f0;
            border: 1px solid #ead5c3;
            color: var(--sachhay-red);
            box-shadow: 0 4px 10px rgba(80, 48, 26, 0.06);
        }

        .header-icons>a:hover {
            background-color: #fff0e2;
            color: #704526;
        }

        .header-icons>a.cart-link {
            margin-left: 0;
        }

        .header-icons .btn-group>.btn {
            background-color: #fff7f0;
            border: 1px solid #ead5c3;
            color: var(--sachhay-dark);
            padding: 0 14px;
            box-shadow: 0 4px 10px rgba(80, 48, 26, 0.06);
        }

        .header-icons .btn-group>.btn:hover {
            background-color: #fff0e2;
            color: var(--sachhay-red);
        }

        .header-icons .btn-group .dropdown-toggle::after {
            margin-left: 8px;
        }

        .cart-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background-color: var(--sachhay-red);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Account dropdown */
        .account-name {
            font-weight: 500;
            margin-left: 8px;
            color: var(--sachhay-dark);
        }

        .header-wrapper {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            z-index: 1020;
            background-color: rgba(255, 251, 246, 0.92);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        }


        /* Responsive tweaks */
        @media (max-width: 767px) {
            .search-box input[type="search"] {
                padding-right: 44px;
            }

            .header-brand {
                gap: 10px;
            }

            .header-phone {
                font-size: 12px;
                padding: 5px 12px;
            }

            .header-actions {
                justify-content: flex-start;
            }

            .logo {
                font-size: 24px;
            }
        }
    </style>

    <script>
        // Global variables for JavaScript
        const BASE_URL = '<?= BASE_URL ?>';
        window.isLoggedIn = <?= isset($_SESSION['users_id']) ? 'true' : 'false' ?>;
        window.needSyncCart = <?= isset($_SESSION['need_sync_cart']) ? 'true' : 'false' ?>;

        <?php if (isset($_SESSION['need_sync_cart'])): ?>
            // Xóa flag sau khi đã set
            <?php unset($_SESSION['need_sync_cart']); ?>
        <?php endif; ?>

        // Hàm kiểm tra đăng nhập trước khi đi tới giỏ hàng
        function goToCart() {
            if (!window.isLoggedIn) {
                window.location.href = BASE_URL + 'auth/login';
                return;
            }
            window.location.href = BASE_URL + 'cart';
        }
    </script>

    <!-- Load cart.js -->
    <script src="<?= BASE_URL ?>js/cart.js"></script>


</head>

<body>

    <div class="header-wrapper">
        <!-- Main Header -->
        <header class="main-header" role="navigation" aria-label="Main navigation">
            <div class="container">
                <div class="row align-items-center g-3">

                    <div class="col-12 col-md-5">
                        <div class="header-brand">
                            <a href="<?= $base ?>" class="logo" aria-label="Trang chủ SachHay">
                                <i class="fas fa-book-bookmark" aria-hidden="true"></i> SachHay
                            </a>
                            <a href="tel:19009999" class="header-phone" aria-label="Gọi hotline 1900 9999">
                                <i class="fas fa-phone-volume" aria-hidden="true"></i>
                                <span>1900 9999</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-md-7 d-flex justify-content-md-end align-items-center">
                        <div class="header-actions">
                            <div class="header-icons d-inline-flex align-items-center">
                                <?php if ($user): ?>
                                    <div class="btn-group d-none d-md-inline-flex">
                                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-circle-user" aria-hidden="true"></i>
                                            <span class="account-name"><?= e($user['name'] ?? $user['email']) ?></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="<?= $base ?>customer"><i class="fas fa-user me-2"></i>Thông tin tài khoản</a></li>
                                            <li><a class="dropdown-item" href="<?= $base ?>customer/orders"><i class="fas fa-box me-2"></i>Đơn hàng của tôi</a></li>
                                            <li><a class="dropdown-item" href="<?= $base ?>customer/wishlist"><i class="fas fa-heart me-2"></i>Sản phẩm yêu thích</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item text-danger" href="<?= $base ?>auth/logout"><i class="fas fa-sign-out-alt me-2"></i>Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <div class="d-none d-md-inline-flex align-items-center gap-2 me-1">
                                        <a href="<?= $base ?>auth/login" class="btn btn-sm btn-outline-secondary px-3" aria-label="Đăng nhập">
                                            <i class="fas fa-right-to-bracket me-1" aria-hidden="true"></i>Đăng nhập
                                        </a>
                                        <a href="<?= $base ?>auth/register" class="btn btn-sm btn-outline-secondary px-3" aria-label="Đăng ký">
                                            <i class="fas fa-user-plus me-1" aria-hidden="true"></i>Đăng ký
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <a href="javascript:void(0)" onclick="goToCart()" title="Giỏ hàng" aria-label="Giỏ hàng" class="position-relative cart-link">
                                    <i class="fas fa-basket-shopping" aria-hidden="true"></i>
                                    <?php if ($cartCount > 0): ?>
                                        <span class="cart-badge" aria-live="polite" aria-atomic="true"><?= e($cartCount) ?></span>
                                    <?php endif; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Navigation Menu -->
        <nav class="nav-menu" aria-label="Danh mục chính">
            <div class="container">
                <div class="d-flex flex-wrap gap-2">
                    <a href="<?= $base ?>home" class="nav-link <?= ($page ?? '') == 'home' ? 'active' : '' ?>" aria-current="<?= ($page ?? '') == 'home' ? 'page' : 'false' ?>">
                        <i class="fas fa-house" aria-hidden="true"></i> Trang chủ
                    </a>
                    <a href="<?= $base ?>home/about" class="nav-link <?= ($page ?? '') == 'about' ? 'active' : '' ?>">
                        <i class="fas fa-circle-info" aria-hidden="true"></i> Giới thiệu
                    </a>
                    <a href="<?= $base ?>home/qa" class="nav-link <?= ($page ?? '') == 'qa' ? 'active' : '' ?>">
                        <i class="fas fa-comments" aria-hidden="true"></i> Hỏi/Đáp
                    </a>
                    <a href="<?= $base ?>product" class="nav-link <?= ($page ?? '') == 'product' ? 'active' : '' ?>">
                        <i class="fas fa-boxes-stacked" aria-hidden="true"></i> Sản phẩm
                    </a>
                    <a href="<?= $base ?>news" class="nav-link <?= ($page ?? '') == 'news' ? 'active' : '' ?>">
                        <i class="fas fa-newspaper" aria-hidden="true"></i> Tin tức
                    </a>
                    <a href="<?= $base ?>contact" class="nav-link <?= ($page ?? '') == 'contact' ? 'active' : '' ?>">
                        <i class="fas fa-phone-flip" aria-hidden="true"></i> Liên hệ
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Scripts: Bootstrap JS (popper)
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Accessibility: add keyboard focus styles for nav links if needed
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('focus', () => link.classList.add('focused'));
                link.addEventListener('blur', () => link.classList.remove('focused'));
            });

            // Improve clickable phone for mobile by ensuring tel: link exists (handled in markup)
        });
    </script> -->
</body>

</html>