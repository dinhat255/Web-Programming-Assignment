<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title ?? 'Admin Dashboard' ?> - SachHay</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Plus+Jakarta+Sans:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --neon-cyan: #00f2ff;
            --neon-purple: #7000ff;
            --neon-red: #ff003c;
            --space-bg: #030712;
            --glass-bg: rgba(15, 23, 42, 0.9);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--space-bg);
            background-image: radial-gradient(circle at 50% 50%, #111827 0%, #030712 100%);
            color: #e2e8f0;
            display: flex;
            flex-direction: column;
            /* Chuyển sang bố cục dọc */
            min-height: 100vh;
        }

        /* 1. THANH DASHBOARD NẰM NGANG (TOP NAV) */
        .admin-sidebar {
            width: 100% !important;
            height: 70px !important;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(0, 242, 255, 0.3);
            z-index: 1100;
            display: flex !important;
            flex-direction: row !important;
            /* Dàn hàng ngang */
            align-items: center;
            padding: 0 2%;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
        }

        .sidebar-header {
            padding: 0 20px !important;
            border: none !important;
            background: transparent !important;
        }

        .sidebar-logo-text {
            font-family: 'Orbitron', sans-serif;
            color: var(--neon-cyan) !important;
            font-size: 18px;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(0, 242, 255, 0.5);
        }

        .sidebar-toggle {
            display: none !important;
        }

        /* Ẩn nút toggle vì không cần thu gọn */

        /* DÀN MENU NGANG */
        .sidebar-nav {
            display: flex !important;
            flex-direction: row !important;
            flex: 1;
            padding: 0 !important;
            margin-left: 20px;
        }

        .nav-section {
            display: flex;
            align-items: center;
            margin: 0 !important;
        }

        .nav-section-title {
            display: none !important;
        }

        /* Ẩn tiêu đề nhóm */

        .nav-section ul {
            display: flex !important;
            flex-direction: row !important;
            list-style: none;
        }

        .nav-link {
            padding: 10px 15px !important;
            gap: 8px !important;
            font-size: 13px;
            color: #94a3b8 !important;
            text-transform: uppercase;
            font-family: 'Orbitron', sans-serif;
            border: none !important;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--neon-cyan) !important;
            background: rgba(0, 242, 255, 0.05) !important;
            text-shadow: 0 0 8px rgba(0, 242, 255, 0.4);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 15%;
            width: 70%;
            height: 2px;
            background: var(--neon-cyan);
            box-shadow: 0 0 10px var(--neon-cyan);
        }

        /* 2. HIỆU ỨNG CHỮ ĐĂNG XUẤT (GLITCH NEON RED) */
        .sidebar-footer {
            margin-left: auto;
            padding: 0 !important;
            border: none !important;
        }

        .logout-link {
            font-family: 'Orbitron', sans-serif;
            color: var(--neon-red) !important;
            text-decoration: none;
            padding: 8px 16px;
            border: 1px solid rgba(255, 0, 60, 0.3);
            border-radius: 4px;
            position: relative;
            animation: logout-glow 2s infinite;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        @keyframes logout-glow {

            0%,
            100% {
                box-shadow: 0 0 5px rgba(255, 0, 60, 0.2);
                text-shadow: 0 0 5px rgba(255, 0, 60, 0.2);
            }

            50% {
                box-shadow: 0 0 15px rgba(255, 0, 60, 0.6);
                text-shadow: 0 0 10px rgba(255, 0, 60, 0.8);
            }
        }

        .logout-link:hover {
            background: var(--neon-red);
            color: white !important;
            box-shadow: 0 0 20px var(--neon-red);
        }

        /* 3. ĐIỀU CHỈNH NỘI DUNG CHÍNH */
        .admin-main {
            margin-left: 0 !important;
            /* Xóa lề trái */
            padding-top: 70px;
            /* Đẩy xuống để không bị menu đè */
        }

        .admin-header {
            background: rgba(15, 23, 42, 0.4);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 20px 40px !important;
        }

        .admin-content {
            padding: 30px 5%;
        }

        /* Card phong cách hiện đại */
        .card,
        .admin-card {
            background: rgba(30, 41, 59, 0.6) !important;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 12px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        /* Responsive admin layout */
        @media (max-width: 991.98px) {
            .admin-sidebar {
                height: auto !important;
                flex-wrap: wrap;
                padding: 10px 12px;
            }

            .sidebar-header {
                padding: 0 !important;
                margin-right: 12px;
            }

            .sidebar-logo-text {
                font-size: 14px;
            }

            .sidebar-nav {
                width: 100%;
                margin-left: 0;
                overflow-x: auto;
                padding: 6px 0 !important;
            }

            .nav-section {
                margin-right: 12px;
            }

            .nav-section ul {
                flex-wrap: nowrap;
                gap: 6px;
            }

            .nav-link {
                font-size: 12px;
                padding: 8px 10px !important;
                display: inline-flex;
                align-items: center;
                white-space: nowrap;
            }

            .sidebar-footer {
                width: 100%;
                margin-top: 6px;
            }

            .logout-link {
                padding: 6px 10px;
                font-size: 12px;
            }

            .admin-main {
                padding-top: 120px;
            }

            .admin-content .row {
                flex-direction: column !important;
                gap: 16px !important;
            }

            .admin-content .col-md-4,
            .admin-content .col-md-6,
            .admin-content .col-md-8 {
                width: 100% !important;
                flex: 1 1 100% !important;
            }

            .admin-content .card-header-actions {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .admin-content .filter-bar {
                padding: 16px 18px;
            }

            .admin-content .filter-bar>div {
                flex-wrap: wrap;
            }

            .admin-content .table-container {
                overflow-x: auto;
            }

            .admin-content table {
                min-width: 640px;
            }
        }

        @media (max-width: 575.98px) {
            .admin-sidebar {
                align-items: flex-start;
            }

            .sidebar-header {
                width: 100%;
                margin-bottom: 6px;
            }

            .sidebar-logo-text {
                display: none;
            }

            .sidebar-nav {
                width: 100%;
                overflow-x: visible;
            }

            .nav-section {
                width: 100%;
                margin-right: 0;
            }

            .nav-section ul {
                width: 100%;
                flex-wrap: wrap;
                gap: 8px;
            }

            .nav-link-text {
                display: none;
            }

            .nav-link {
                width: 44px;
                height: 36px;
                padding: 0 !important;
                justify-content: center;
            }

            .nav-link i {
                font-size: 16px;
            }

            .admin-main {
                padding-top: 140px;
            }

            .admin-content {
                padding: 20px 4%;
            }

            .admin-content .btn,
            .admin-content .filter-button {
                width: 100%;
                justify-content: center;
            }

            .sidebar-footer {
                width: 100%;
                margin-top: 8px;
            }

            .logout-link {
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-header">
            <a href="<?= BASE_URL ?>admin" class="sidebar-logo">
                <i class="fa-solid fa-book"></i>
                <span class="sidebar-logo-text">SACHHAY ADMIN</span>
            </a>
            <button class="sidebar-toggle" onclick="toggleSidebar()">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">Main</div>
                <ul>
                    <li class="nav-item">
                        <a class="nav-link <?= ($page ?? '') == 'dashboard' ? 'active' : '' ?>" href="<?= BASE_URL ?>admin">
                            <i class="fa-solid fa-home"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="nav-section">
                <div class="nav-section-title">Quản lý</div>
                <ul>
                    <li class="nav-item">
                        <a class="nav-link <?= ($page ?? '') == 'products' ? 'active' : '' ?>" href="<?= BASE_URL ?>admin/products">
                            <i class="fa-solid fa-box"></i>
                            <span class="nav-link-text">Sản phẩm</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($page ?? '') == 'categories' ? 'active' : '' ?>" href="<?= BASE_URL ?>admin/categories">
                            <i class="fa-solid fa-tags"></i>
                            <span class="nav-link-text">Danh mục</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($page ?? '') == 'orders' ? 'active' : '' ?>" href="<?= BASE_URL ?>admin/orders">
                            <i class="fa-solid fa-shopping-cart"></i>
                            <span class="nav-link-text">Đơn hàng</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($page ?? '') == 'customers' ? 'active' : '' ?>" href="<?= BASE_URL ?>admin/customers">
                            <i class="fa-solid fa-users"></i>
                            <span class="nav-link-text">Khách hàng</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($page ?? '') == 'news' ? 'active' : '' ?>" href="<?= BASE_URL ?>admin/news">
                            <i class="fa-solid fa-newspaper"></i>
                            <span class="nav-link-text">Tin tức</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="nav-section">
                <div class="nav-section-title">Cấu hình</div>
                <ul>

                    <li class="nav-item">
                        <a class="nav-link <?= ($page ?? '') == 'contacts' ? 'active' : '' ?>" href="<?= BASE_URL ?>admin/contacts">
                            <i class="fa-solid fa-envelope"></i>
                            <span class="nav-link-text">Liên hệ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($page ?? '') == 'qa' ? 'active' : '' ?>" href="<?= BASE_URL ?>admin/qa">
                            <i class="fa-solid fa-circle-question"></i>
                            <span class="nav-link-text">Hỏi đáp</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($page ?? '') == 'settings' ? 'active' : '' ?>" href="<?= BASE_URL ?>admin/settings">
                            <i class="fa-solid fa-cog"></i>
                            <span class="nav-link-text">Cài đặt</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="sidebar-footer">
            <a href="<?= BASE_URL ?>auth/logout" class="logout-link" onclick="return confirm('Bạn có chắc muốn đăng xuất?')">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span class="nav-link-text">Đăng xuất</span>
            </a>
        </div>
    </aside>

    <div class="admin-main">
        <!-- <header class="admin-header">
            <h1 class="page-title-header"><?= $title ?? 'Admin Dashboard' ?></h1>
            <div class="user-info">
                <div class="user-avatar"><?= strtoupper(substr($_SESSION['user_name'] ?? 'A', 0, 1)) ?></div>
                <div class="user-details">
                    <div class="user-name"><?= $_SESSION['user_name'] ?? 'Admin' ?></div>
                    <div class="user-role">Administrator</div>
                </div>
            </div>
        </header> -->

        <main class="admin-content">
            <?php
            // Load nội dung trang
            if (isset($contentFile) && file_exists($contentFile)) {
                require_once $contentFile;
            } else {
                echo '<div style="background:white;padding:20px;border-radius:8px;">Không tìm thấy trang!</div>';
            }
            ?>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            sidebar.classList.toggle('collapsed');
            localStorage.setItem('adminSidebarCollapsed', sidebar.classList.contains('collapsed'));
        }
        document.addEventListener('DOMContentLoaded', function() {
            if (localStorage.getItem('adminSidebarCollapsed') === 'true') {
                document.getElementById('adminSidebar').classList.add('collapsed');
            }
        });
    </script>

</body>

</html>