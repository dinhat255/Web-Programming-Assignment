<style>
    /* ================================================== */
    /* BỘ CSS SCI-FI CHO CHI TIẾT ĐƠN HÀNG                 */
    /* ================================================== */
    .admin-card {
        background: rgba(30, 41, 59, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 242, 255, 0.2);
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        margin-bottom: 20px;
        overflow: hidden;
    }

    .card-header {
        padding: 20px 25px;
        border-bottom: 1px solid rgba(0, 242, 255, 0.2);
        background: rgba(15, 23, 42, 0.6);
    }

    .card-header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 25px;
        border-bottom: 1px solid rgba(0, 242, 255, 0.2);
    }

    .card-title {
        font-family: 'Orbitron', sans-serif;
        color: #00f2ff;
        font-size: 18px;
        font-weight: 700;
        margin: 0;
        letter-spacing: 1px;
        text-shadow: 0 0 10px rgba(0, 242, 255, 0.4);
    }

    .card-body {
        padding: 25px;
        color: #e2e8f0;
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .order-id {
        font-size: 24px;
        font-weight: 700;
        color: #00f2ff;
        text-shadow: 0 0 10px rgba(0, 242, 255, 0.4);
    }

    .badge {
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 700;
        display: inline-block;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .badge.pending {
        background: rgba(255, 204, 0, 0.1);
        color: #ffcc00;
        border: 1px solid #ffcc00;
        box-shadow: 0 0 10px rgba(255, 204, 0, 0.3);
    }

    .badge.processing {
        background: rgba(0, 242, 255, 0.1);
        color: #00f2ff;
        border: 1px solid #00f2ff;
        box-shadow: 0 0 10px rgba(0, 242, 255, 0.3);
    }

    .badge.completed {
        background: rgba(0, 255, 136, 0.1);
        color: #00ff88;
        border: 1px solid #00ff88;
        box-shadow: 0 0 10px rgba(0, 255, 136, 0.3);
    }

    .badge.cancelled {
        background: rgba(255, 0, 60, 0.1);
        color: #ff003c;
        border: 1px solid #ff003c;
        box-shadow: 0 0 10px rgba(255, 0, 60, 0.3);
    }

    .badge.shipped {
        background: rgba(148, 163, 184, 0.1);
        color: #94a3b8;
        border: 1px solid #94a3b8;
        box-shadow: 0 0 10px rgba(148, 163, 184, 0.3);
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        margin-bottom: 30px;
    }

    .info-section {
        background: rgba(15, 23, 42, 0.6);
        padding: 20px;
        border-radius: 8px;
        border: 1px solid rgba(0, 242, 255, 0.2);
    }

    .info-section h3 {
        font-size: 12px;
        font-weight: 700;
        color: #00f2ff;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 15px;
        font-family: 'Orbitron', sans-serif;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid rgba(0, 242, 255, 0.1);
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        color: #94a3b8;
        font-size: 13px;
    }

    .info-value {
        font-weight: 600;
        font-size: 13px;
        text-align: right;
        color: #e2e8f0;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        font-size: 13px;
        color: #00f2ff;
        text-transform: uppercase;
        border-bottom: 1px solid rgba(0, 242, 255, 0.2);
        font-family: 'Orbitron', sans-serif;
    }

    td {
        padding: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        vertical-align: middle;
        color: #e2e8f0;
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .product-img {
        width: 60px;
        height: 75px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid rgba(0, 242, 255, 0.2);
    }

    .product-name {
        font-weight: 600;
        font-size: 14px;
    }

    .btn {
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        background: transparent;
        font-family: 'Orbitron', sans-serif;
    }

    .btn-secondary {
        color: #94a3b8;
        border: 1px solid #94a3b8;
    }

    .btn-secondary:hover {
        background: #94a3b8;
        color: #000;
        box-shadow: 0 0 15px #94a3b8;
    }

    .btn-primary {
        color: #00f2ff;
        border: 1px solid #00f2ff;
    }

    .btn-primary:hover {
        background: #00f2ff;
        color: #000;
        box-shadow: 0 0 15px #00f2ff;
    }

    .btn-success {
        color: #00ff88;
        border: 1px solid #00ff88;
    }

    .btn-success:hover {
        background: #00ff88;
        color: #000;
        box-shadow: 0 0 15px #00ff88;
    }

    .btn-warning {
        color: #ffcc00;
        border: 1px solid #ffcc00;
    }

    .btn-warning:hover {
        background: #ffcc00;
        color: #000;
        box-shadow: 0 0 15px #ffcc00;
    }

    .btn-danger {
        color: #ff003c;
        border: 1px solid #ff003c;
    }

    .btn-danger:hover {
        background: #ff003c;
        color: #000;
        box-shadow: 0 0 15px #ff003c;
    }

    .status-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .order-summary {
        background: rgba(15, 23, 42, 0.6);
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
        border: 1px solid rgba(0, 242, 255, 0.2);
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        font-size: 14px;
    }

    .summary-row.total {
        border-top: 1px solid rgba(0, 242, 255, 0.3);
        margin-top: 10px;
        padding-top: 15px;
        font-size: 18px;
        font-weight: 700;
        color: #00f2ff;
    }

    .text-muted {
        color: #94a3b8;
    }
</style>

<div class="card-header-actions">
    <h2 class="card-title">Chi tiết đơn hàng #<?= $order['order_id'] ?></h2>
    <a href="<?= BASE_URL ?>admin/orders" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Quay lại
    </a>
</div>

<div class="admin-card">
    <div class="card-body">
        <div class="order-header">
            <div class="order-id">Đơn hàng #<?= $order['order_id'] ?></div>
            <div>
                <?php
                $statusClass = match ($order['status']) {
                    'pending' => 'pending',
                    'processing' => 'processing',
                    'shipped' => 'shipped',
                    'completed' => 'completed',
                    'cancelled' => 'cancelled',
                    default => 'pending'
                };
                $statusText = match ($order['status']) {
                    'pending' => 'Chờ xử lý',
                    'processing' => 'Đang xử lý',
                    'shipped' => 'Đang giao',
                    'completed' => 'Hoàn thành',
                    'cancelled' => 'Đã hủy',
                    default => $order['status']
                };
                ?>
                <span class="badge <?= $statusClass ?>"><?= $statusText ?></span>
            </div>
        </div>

        <div class="info-grid">
            <!-- Thông tin khách hàng -->
            <div class="info-section">
                <h3>Thông tin khách hàng</h3>
                <div class="info-row">
                    <span class="info-label">Họ tên:</span>
                    <span class="info-value"><?= htmlspecialchars($order['recipient_name'] ?? 'N/A') ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Số điện thoại:</span>
                    <span class="info-value"><?= htmlspecialchars($order['recipient_phone'] ?? 'N/A') ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Địa chỉ:</span>
                    <span class="info-value"><?= htmlspecialchars($order['shipping_address'] ?? 'N/A') ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Ghi chú: </span>
                    <span class="info-value"><?= htmlspecialchars($order['note'] ?? 'N/A') ?></span>
                </div>
            </div>

            <!-- Thông tin đơn hàng -->
            <div class="info-section">
                <h3>Thông tin đơn hàng</h3>
                <div class="info-row">
                    <span class="info-label">Ngày đặt:</span>
                    <span class="info-value"><?= date('d/m/Y H:i', strtotime($order['created_date'])) ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Phương thức thanh toán:</span>
                    <span class="info-value"><?= htmlspecialchars($order['payment_method'] ?? 'N/A') ?></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Điểm sử dụng:</span>
                    <span class="info-value">In progress</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Điểm tích lũy:</span>
                    <span class="info-value">In Progress</span>
                </div>
            </div>
        </div>

        <?php if (!empty($order['note'])): ?>
            <div class="info-section">
                <h3>Ghi chú</h3>
                <p style="margin: 0; padding: 10px 0;"><?= nl2br(htmlspecialchars($order['note'])) ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Danh sách sản phẩm -->
<div class="admin-card">
    <div class="card-header">
        <h3 class="card-title">Sản phẩm trong đơn hàng</h3>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($items)): ?>
                    <?php
                    $subtotal = 0;
                    foreach ($items as $item):
                        $subtotal += $item['subtotal'];
                    ?>
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img src="<?= BASE_URL . ($item['image_url'] ?? 'images/default-book.jpg') ?>"
                                        alt="<?= htmlspecialchars($item['title']) ?>"
                                        class="product-img">
                                    <div class="product-name"><?= htmlspecialchars($item['title']) ?></div>
                                </div>
                            </td>
                            <td><?= number_format($item['price']) ?>đ</td>
                            <td><?= $item['quantity'] ?></td>
                            <td style="font-weight: 600;"><?= number_format($item['subtotal']) ?>đ</td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">Không có sản phẩm</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if (!empty($items)): ?>
        <div class="order-summary">
            <div class="summary-row">
                <span>Tạm tính:</span>
                <span><?= number_format($subtotal) ?>đ</span>
            </div>
            <div class="summary-row">
                <span>Phí vận chuyển:</span>
                <span><?= number_format($order['shipping_fee']) ?>đ</span>
            </div>
            <div class="summary-row total">
                <span>Tổng cộng:</span>
                <span><?= number_format($order['total']) ?>đ</span>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Cập nhật trạng thái -->
<div class="admin-card">
    <div class="card-body">
        <h3 style="margin-bottom: 20px;">Cập nhật trạng thái đơn hàng</h3>
        <form action="<?= BASE_URL ?>admin/updateOrderStatus" method="POST">
            <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
            <input type="hidden" name="return_to_detail" value="1">

            <div class="status-actions">
                <?php if ($order['status'] == 'pending'): ?>
                    <button type="submit" name="status" value="processing" class="btn btn-primary">
                        <i class="fas fa-check"></i> Xác nhận đơn hàng
                    </button>
                    <button type="submit" name="status" value="cancelled" class="btn btn-danger">
                        <i class="fas fa-times"></i> Hủy đơn hàng
                    </button>
                <?php elseif ($order['status'] == 'processing'): ?>
                    <button type="submit" name="status" value="shipped" class="btn btn-warning">
                        <i class="fas fa-shipping-fast"></i> Giao cho đơn vị vận chuyển
                    </button>
                    <button type="submit" name="status" value="cancelled" class="btn btn-danger">
                        <i class="fas fa-times"></i> Hủy đơn hàng
                    </button>
                <?php elseif ($order['status'] == 'shipped'): ?>
                    <button type="submit" name="status" value="completed" class="btn btn-success">
                        <i class="fas fa-check-circle"></i> Hoàn thành đơn hàng
                    </button>
                <?php elseif ($order['status'] == 'completed'): ?>
                    <div style="color: #10b981; font-weight: 600;">
                        <i class="fas fa-check-circle"></i> Đơn hàng đã hoàn thành
                    </div>
                <?php elseif ($order['status'] == 'cancelled'): ?>
                    <div style="color: #ef4444; font-weight: 600;">
                        <i class="fas fa-times-circle"></i> Đơn hàng đã bị hủy
                    </div>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>