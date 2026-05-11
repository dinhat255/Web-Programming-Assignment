<?php
/**
 * Dashboard chính (index.php) – Giao diện phong cách Cyber/Glass phù hợp với admin.php
 * Các biến $totalProducts, $totalOrders được truyền từ controller
 */
?>
<style>
    /* ========== DASHBOARD STYLE - KHỚP VỚI admin.php ========== */
    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: rgba(15, 23, 42, 0.65);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(0, 242, 255, 0.2);
        border-radius: 20px;
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 20px;
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    }

    .stat-card:hover {
        transform: translateY(-4px);
        border-color: rgba(0, 242, 255, 0.6);
        box-shadow: 0 15px 30px rgba(0, 242, 255, 0.1);
        background: rgba(20, 30, 55, 0.8);
    }

    .stat-icon {
        width: 64px;
        height: 64px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: white;
        transition: transform 0.2s;
    }

    .stat-icon.products {
        background: linear-gradient(135deg, #667eea, #764ba2);
        box-shadow: 0 0 12px rgba(102, 126, 234, 0.5);
    }

    .stat-icon.orders {
        background: linear-gradient(135deg, #f093fb, #f5576c);
        box-shadow: 0 0 12px rgba(245, 87, 108, 0.5);
    }

    .stat-info {
        flex: 1;
    }

    .stat-label {
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #94a3b8;
        font-family: 'Orbitron', monospace;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 36px;
        font-weight: 800;
        color: #f1f5f9;
        font-family: 'Orbitron', sans-serif;
        text-shadow: 0 0 5px rgba(0, 242, 255, 0.3);
        line-height: 1.2;
    }

    /* Welcome Card – hiệu ứng neon đỏ + viền sáng */
    .welcome-card {
        background: linear-gradient(135deg, rgba(201, 33, 39, 0.85) 0%, rgba(160, 27, 32, 0.9) 100%);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 0, 60, 0.5);
        border-radius: 24px;
        padding: 32px 36px;
        margin-bottom: 40px;
        box-shadow: 0 15px 35px rgba(255, 0, 60, 0.2);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }

    .welcome-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -20%;
        width: 140%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        transform: rotate(25deg);
        pointer-events: none;
    }

    .welcome-card h2 {
        font-size: 28px;
        font-weight: 700;
        font-family: 'Orbitron', monospace;
        letter-spacing: 1px;
        margin-bottom: 12px;
        color: white;
        text-shadow: 0 0 8px rgba(0, 0, 0, 0.5);
    }

    .welcome-card p {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 400;
        letter-spacing: 0.3px;
    }

    /* Responsive nhỏ gọn */
    @media (max-width: 640px) {
        .dashboard-stats {
            gap: 16px;
        }
        .stat-card {
            padding: 16px 18px;
        }
        .stat-value {
            font-size: 28px;
        }
        .welcome-card {
            padding: 24px 20px;
        }
        .welcome-card h2 {
            font-size: 22px;
        }
    }

    /* animation nhẹ cho số liệu */
    .stat-value {
        transition: all 0.2s;
    }
    .stat-card:hover .stat-value {
        color: #00f2ff;
        text-shadow: 0 0 6px #00f2ff;
    }
</style>

<div class="welcome-card">
    <h2>🚀 Chào mừng trở lại, <?= htmlspecialchars($_SESSION['user_name'] ?? 'Admin') ?>!</h2>
    <p>✨ Tổng quan hệ thống SachHay – điều khiển mọi thứ từ đây với bảng điều khiển vũ trụ.</p>
</div>

<div class="dashboard-stats">
    <div class="stat-card">
        <div class="stat-icon products">
            <i class="fa-solid fa-box"></i>
        </div>
        <div class="stat-info">
            <div class="stat-label">Tổng sản phẩm</div>
            <div class="stat-value"><?= number_format($totalProducts ?? 0) ?></div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon orders">
            <i class="fa-solid fa-shopping-cart"></i>
        </div>
        <div class="stat-info">
            <div class="stat-label">Đơn hàng</div>
            <div class="stat-value"><?= number_format($totalOrders ?? 0) ?></div>
        </div>
    </div>
</div>