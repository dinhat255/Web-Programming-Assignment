<?php
$products = $products ?? [];
?>

<style>
    /* ================================================== */
    /* BỘ CSS SCI-FI CHO TRANG QUẢN LÝ SẢN PHẨM           */
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

    .btn {
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        background: transparent;
        font-family: 'Orbitron', sans-serif;
        text-decoration: none;
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

    .badge {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
        display: inline-block;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .bg-success {
        background: rgba(0, 255, 136, 0.1);
        color: #00ff88;
        border: 1px solid #00ff88;
        box-shadow: 0 0 10px rgba(0, 255, 136, 0.3);
    }

    .bg-danger {
        background: rgba(255, 0, 60, 0.1);
        color: #ff003c;
        border: 1px solid #ff003c;
        box-shadow: 0 0 10px rgba(255, 0, 60, 0.3);
    }

    .bg-azure {
        background: rgba(0, 242, 255, 0.1);
        color: #00f2ff;
        border: 1px solid #00f2ff;
        box-shadow: 0 0 10px rgba(0, 242, 255, 0.3);
    }

    .bg-secondary {
        background: rgba(148, 163, 184, 0.1);
        color: #94a3b8;
        border: 1px solid #94a3b8;
        box-shadow: 0 0 10px rgba(148, 163, 184, 0.3);
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

    .text-decoration-line-through {
        text-decoration: line-through;
    }

    .text-muted {
        color: #94a3b8;
    }

    .fw-bold {
        font-weight: 600;
    }

    .rounded {
        border-radius: 6px;
    }

    .text-center {
        text-align: center;
    }
</style>

<div class="admin-card">
    <div class="card-header-actions">
        <h2 class="card-title">Danh sách sản phẩm</h2>
        <a href="<?= BASE_URL ?>admin/createProduct" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm sản phẩm
        </a>
    </div>

    <!-- Search & Filter -->
    <div class="filter-bar">
        <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 250px;">
                <input type="text"
                    id="searchProduct"
                    placeholder="🔍 Tìm kiếm theo ID, tên sản phẩm hoặc tác giả..."
                    class="filter-control">
            </div>
            <div style="min-width: 180px;">
                <select id="filterCategory"
                    class="filter-control">
                    <option value="">Tất cả danh mục</option>
                    <?php
                    $categories = [];
                    foreach ($products as $p) {
                        if (!empty($p['category_name']) && !in_array($p['category_name'], $categories)) {
                            $categories[] = $p['category_name'];
                        }
                    }
                    foreach ($categories as $cat):
                    ?>
                        <option value="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div style="min-width: 150px;">
                <select id="filterStock"
                    class="filter-control">
                    <option value="">Tất cả tồn kho</option>
                    <option value="in-stock">Còn hàng</option>
                    <option value="out-of-stock">Hết hàng</option>
                </select>
            </div>
            <button onclick="resetFilters()"
                class="filter-button">
                <i class="fas fa-redo"></i> Reset
            </button>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th class="w-1">ID</th>
                    <th>Ảnh</th>
                    <th>Tên sách</th>
                    <th>Tác giả</th>
                    <th>Giá bán</th>
                    <th>Giá gốc</th>
                    <th>Tồn kho</th>
                    <th>Danh mục</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $p): ?>
                        <tr>
                            <td><?= $p['product_id'] ?></td>
                            <td>
                                <?php if (!empty($p['image_url'])): ?>
                                    <img src="<?= BASE_URL . $p['image_url'] ?>" class="rounded" style="width: 40px; height: 50px; object-fit: cover;">
                                <?php else: ?>
                                    <img src="<?= BASE_URL ?>images/default-book.jpg" class="rounded" style="width: 40px; height: 50px; object-fit: cover;">
                                <?php endif; ?>
                            </td>
                            <td class="fw-bold"><?= htmlspecialchars($p['title']) ?></td>
                            <td><?= htmlspecialchars($p['author'] ?? 'N/A') ?></td>
                            <td class="text-danger fw-bold"><?= number_format($p['price']) ?>đ</td>
                            <td class="text-decoration-line-through text-muted">
                                <?= $p['old_price'] ? number_format($p['old_price']) . 'đ' : '-' ?>
                            </td>
                            <td>
                                <span class="badge <?= $p['stock_quantity'] > 0 ? 'bg-success' : 'bg-danger' ?>">
                                    <?= $p['stock_quantity'] ?>
                                </span>
                            </td>
                            <td>
                                <?php if (!empty($p['category_name'])): ?>
                                    <span class="badge bg-azure"><?= htmlspecialchars($p['category_name']) ?></span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Chưa phân loại</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= BASE_URL ?>admin/editProduct/<?= $p['product_id'] ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <a href="<?= BASE_URL ?>admin/deleteProduct?id=<?= $p['product_id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                    <i class="fas fa-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if (empty($products)): ?>
                    <tr class="no-results-row">
                        <td colspan="9" class="text-center" style="padding: 40px;">Chưa có sản phẩm nào</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Search and Filter functionality
    const searchInput = document.getElementById('searchProduct');
    const categoryFilter = document.getElementById('filterCategory');
    const stockFilter = document.getElementById('filterStock');
    const tbody = document.querySelector('tbody');
    const tableRows = Array.from(tbody.querySelectorAll('tr')).filter(row => !row.classList.contains('no-results-row'));

    function filterProducts() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value.toLowerCase();
        const selectedStock = stockFilter.value;

        let visibleCount = 0;

        tableRows.forEach(row => {
            // Get row data
            const productId = row.cells[0]?.textContent.toLowerCase() || '';
            const title = row.cells[2]?.textContent.toLowerCase() || '';
            const author = row.cells[3]?.textContent.toLowerCase() || '';
            const category = row.cells[7]?.textContent.toLowerCase() || '';
            const stockBadge = row.cells[6]?.querySelector('.badge');
            const stockQuantity = stockBadge ? parseInt(stockBadge.textContent) : 0;

            // Check search term (ID, title or author)
            const matchesSearch = !searchTerm ||
                productId.includes(searchTerm) ||
                title.includes(searchTerm) ||
                author.includes(searchTerm);

            // Check category filter
            const matchesCategory = !selectedCategory || category.includes(selectedCategory);

            // Check stock filter
            let matchesStock = true;
            if (selectedStock === 'in-stock') {
                matchesStock = stockQuantity > 0;
            } else if (selectedStock === 'out-of-stock') {
                matchesStock = stockQuantity === 0;
            }

            // Show/hide row
            if (matchesSearch && matchesCategory && matchesStock) {
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

    function resetFilters() {
        searchInput.value = '';
        categoryFilter.value = '';
        stockFilter.value = '';
        filterProducts();
    }

    // Add event listeners
    searchInput.addEventListener('input', filterProducts);
    categoryFilter.addEventListener('change', filterProducts);
    stockFilter.addEventListener('change', filterProducts);
</script>