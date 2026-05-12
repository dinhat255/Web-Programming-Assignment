<?php
$orders = $orders ?? [];
$stats = $stats ?? [];
?>

<style>
    /* ================================================== */
    /* BỘ CSS SCI-FI CHO TRANG QUẢN LÝ ĐƠN HÀNG           */
    /* ================================================== */
    .admin-card {
        background: rgba(30, 41, 59, 0.6) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 242, 255, 0.2) !important;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        overflow: hidden;
        margin-bottom: 30px;
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

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: rgba(30, 41, 59, 0.6);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 242, 255, 0.2);
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        text-align: center;
        padding: 20px;
    }

    .stat-value {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
        color: #00f2ff;
        text-shadow: 0 0 10px rgba(0, 242, 255, 0.4);
    }

    .stat-label {
        font-size: 12px;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-family: 'Orbitron', sans-serif;
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

    tr:hover td {
        background: rgba(0, 242, 255, 0.05);
    }

    .badge {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 11px;
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

    .badge.payment {
        background: rgba(0, 242, 255, 0.08);
        color: #00f2ff;
        border: 1px solid rgba(0, 242, 255, 0.4);
        box-shadow: 0 0 10px rgba(0, 242, 255, 0.2);
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

    .btn-info {
        color: #00f2ff;
        border: 1px solid #00f2ff;
    }

    .btn-info:hover {
        background: #00f2ff;
        color: #000;
        box-shadow: 0 0 15px #00f2ff;
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

    .btn-sm {
        padding: 6px 10px;
        font-size: 11px;
    }

    .filter-bar {
        padding: 20px 25px;
        border-bottom: 1px solid rgba(0, 242, 255, 0.2);
        background: rgba(15, 23, 42, 0.6);
    }

    .filter-control {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid rgba(0, 242, 255, 0.2);
        border-radius: 8px;
        font-size: 14px;
        color: #e2e8f0;
        background: rgba(15, 23, 42, 0.85);
    }

    .filter-control:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(0, 242, 255, 0.2);
    }

    .filter-button {
        padding: 10px 20px;
        background: transparent;
        color: #94a3b8;
        border: 1px solid #94a3b8;
        border-radius: 8px;
        cursor: pointer;
        font-size: 12px;
        font-family: 'Orbitron', sans-serif;
    }

    .filter-button:hover {
        background: #94a3b8;
        color: #000;
        box-shadow: 0 0 15px #94a3b8;
    }

    .text-danger {
        color: #ff4d6d;
    }

    .fw-bold {
        font-weight: 600;
    }

    .text-center {
        text-align: center;
    }

    .text-muted {
        color: #94a3b8;
    }
</style>

<!-- Stats Cards -->
<div class="stats-grid">
    <div class="stat-card primary">
        <div class="stat-value"><?= $stats['total_orders'] ?? 0 ?></div>
        <div class="stat-label">Tổng đơn hàng</div>
    </div>
    <div class="stat-card warning">
        <div class="stat-value"><?= $stats['pending_orders'] ?? 0 ?></div>
        <div class="stat-label">Chờ xử lý</div>
    </div>
    <div class="stat-card info">
        <div class="stat-value"><?= $stats['processing_orders'] ?? 0 ?></div>
        <div class="stat-label">Đang xử lý</div>
    </div>
    <div class="stat-card success">
        <div class="stat-value"><?= $stats['completed_orders'] ?? 0 ?></div>
        <div class="stat-label">Hoàn thành</div>
    </div>
    <div class="stat-card danger">
        <div class="stat-value"><?= $stats['cancelled_orders'] ?? 0 ?></div>
        <div class="stat-label">Đã hủy</div>
    </div>
    <div class="stat-card primary">
        <div class="stat-value"><?= number_format($stats['total_revenue'] ?? 0) ?>đ</div>
        <div class="stat-label">Tổng doanh thu</div>
    </div>
</div>

<!-- Orders Table -->
<div class="admin-card">
    <div class="card-header-actions">
        <h2 class="card-title">Danh sách đơn hàng</h2>
    </div>

    <!-- Search & Filter -->
    <div class="filter-bar">
        <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 250px;">
                <input type="text"
                    id="searchOrder"
                    placeholder="🔍 Tìm kiếm theo Mã ĐH, tên khách hàng, email hoặc SĐT..."
                    class="filter-control">
            </div>
            <div style="min-width: 180px;">
                <select id="filterStatus"
                    class="filter-control">
                    <option value="">Tất cả trạng thái</option>
                    <option value="pending">Chờ xử lý</option>
                    <option value="processing">Đang xử lý</option>
                    <option value="shipped">Đang giao</option>
                    <option value="completed">Hoàn thành</option>
                    <option value="cancelled">Đã hủy</option>
                </select>
            </div>
            <div style="min-width: 180px;">
                <select id="filterPayment"
                    class="filter-control">
                    <option value="">Tất cả thanh toán</option>
                    <?php
                    $paymentMethods = [];
                    foreach ($orders as $o) {
                        if (!empty($o['payment_method']) && !in_array($o['payment_method'], $paymentMethods)) {
                            $paymentMethods[] = $o['payment_method'];
                        }
                    }
                    foreach ($paymentMethods as $method):
                    ?>
                        <option value="<?= htmlspecialchars($method) ?>"><?= htmlspecialchars($method) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button onclick="resetOrderFilters()"
                class="filter-button">
                <i class="fas fa-redo"></i> Reset
            </button>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Mã ĐH</th>
                    <th>Khách hàng</th>
                    <th>Liên hệ</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Phí ship</th>
                    <th>Thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td class="fw-bold">#<?= $order['order_id'] ?></td>
                            <td><?= htmlspecialchars($order['customer_name'] ?? 'N/A') ?></td>
                            <td>
                                <div><?= htmlspecialchars($order['customer_phone'] ?? 'N/A') ?></div>
                                <div class="text-muted" style="font-size: 12px;"><?= htmlspecialchars($order['customer_email'] ?? '') ?></div>
                            </td>
                            <td><?= date('d/m/Y', strtotime($order['created_date'])) ?></td>
                            <td class="text-danger fw-bold"><?= number_format($order['total']) ?>đ</td>
                            <td><?= number_format($order['shipping_fee']) ?>đ</td>
                            <td>
                                <span class="badge payment">
                                    <?= htmlspecialchars($order['payment_method'] ?? 'N/A') ?>
                                </span>
                            </td>
                            <td>
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
                            </td>
                            <td>
                                <a href="<?= BASE_URL ?>admin/orderDetail/<?= $order['order_id'] ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Chi tiết
                                </a>
                                <a href="<?= BASE_URL ?>admin/deleteOrder?id=<?= $order['order_id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')">
                                    <i class="fas fa-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if (empty($orders)): ?>
                    <tr class="no-results-row">
                        <td colspan="9" class="text-center" style="padding: 40px;">Chưa có đơn hàng nào</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Search and Filter functionality for Orders
    const searchOrderInput = document.getElementById('searchOrder');
    const statusFilter = document.getElementById('filterStatus');
    const paymentFilter = document.getElementById('filterPayment');
    const tbody = document.querySelector('tbody');
    const orderRows = Array.from(tbody.querySelectorAll('tr')).filter(row => !row.classList.contains('no-results-row'));

    function filterOrders() {
        const searchTerm = searchOrderInput.value.toLowerCase();
        const selectedStatus = statusFilter.value.toLowerCase();
        const selectedPayment = paymentFilter.value.toLowerCase();

        let visibleCount = 0;

        orderRows.forEach(row => {
            // Get row data
            const orderId = row.cells[0]?.textContent.toLowerCase() || '';
            const customerName = row.cells[1]?.textContent.toLowerCase() || '';
            const contactInfo = row.cells[2]?.textContent.toLowerCase() || '';
            const paymentMethod = row.cells[6]?.textContent.toLowerCase() || '';
            const statusBadge = row.cells[7]?.querySelector('.badge');
            const statusClass = statusBadge?.classList[1] || '';

            // Check search term (order ID, customer name, email, or phone)
            const matchesSearch = !searchTerm ||
                orderId.includes(searchTerm) ||
                customerName.includes(searchTerm) ||
                contactInfo.includes(searchTerm);

            // Check status filter
            const matchesStatus = !selectedStatus || statusClass === selectedStatus;

            // Check payment filter
            const matchesPayment = !selectedPayment || paymentMethod.includes(selectedPayment);

            // Show/hide row
            if (matchesSearch && matchesStatus && matchesPayment) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Update or create "no results" message
        let noResultsRow = tbody.querySelector('.no-results-row');

        if (visibleCount === 0) {
            // Create no results row only if it doesn't exist
            if (!noResultsRow) {
                noResultsRow = document.createElement('tr');
                noResultsRow.className = 'no-results-row';
                noResultsRow.innerHTML = '<td colspan="9" class="text-center" style="padding: 40px;">Không có kết quả phù hợp</td>';
                tbody.appendChild(noResultsRow);
            }
            noResultsRow.style.display = '';
        } else {
            // Hide no results row if it exists
            if (noResultsRow) {
                noResultsRow.style.display = 'none';
            }
        }
    }

    function resetOrderFilters() {
        searchOrderInput.value = '';
        statusFilter.value = '';
        paymentFilter.value = '';
        filterOrders();
    }

    // Add event listeners
    searchOrderInput.addEventListener('input', filterOrders);
    statusFilter.addEventListener('change', filterOrders);
    paymentFilter.addEventListener('change', filterOrders);
</script>