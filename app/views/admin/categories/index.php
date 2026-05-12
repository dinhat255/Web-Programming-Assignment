<style>
    /* ================================================== */
    /* BỘ CSS SCI-FI CHO TRANG QUẢN LÝ DANH MỤC           */
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

    .badge {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
        display: inline-block;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .badge.primary {
        background: rgba(0, 242, 255, 0.1);
        color: #00f2ff;
        border: 1px solid #00f2ff;
        box-shadow: 0 0 10px rgba(0, 242, 255, 0.3);
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

    .btn-danger {
        color: #ff003c;
        border: 1px solid #ff003c;
    }

    .btn-danger:hover {
        background: #ff003c;
        color: #000;
        box-shadow: 0 0 15px #ff003c;
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

    .btn-primary {
        color: #00f2ff;
        border: 1px solid #00f2ff;
    }

    .btn-primary:hover {
        background: #00f2ff;
        color: #000;
        box-shadow: 0 0 15px #00f2ff;
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

    .fw-bold {
        font-weight: 600;
    }

    .text-center {
        text-align: center;
    }

    .text-muted {
        color: #94a3b8;
    }

    /* Modal Sci-Fi */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(3, 7, 18, 0.8);
        backdrop-filter: blur(5px);
    }

    .modal.active {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: rgba(15, 23, 42, 0.95);
        padding: 30px;
        border-radius: 12px;
        width: 90%;
        max-width: 500px;
        border: 1px solid rgba(0, 242, 255, 0.3);
        box-shadow: 0 0 30px rgba(0, 242, 255, 0.2);
        color: #e2e8f0;
        animation: slideUp 0.3s;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        border-bottom: 1px solid rgba(0, 242, 255, 0.2);
        padding-bottom: 15px;
    }

    .modal-header h3 {
        font-family: 'Orbitron', sans-serif;
        color: #00f2ff;
        text-transform: uppercase;
        margin: 0;
        text-shadow: 0 0 8px rgba(0, 242, 255, 0.4);
    }

    .close-btn {
        color: #ff003c;
        text-shadow: 0 0 5px #ff003c;
        transition: 0.3s;
        background: none;
        border: none;
        font-size: 28px;
        cursor: pointer;
    }

    .close-btn:hover {
        transform: scale(1.2);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 12px;
        color: #00f2ff;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-family: 'Orbitron', sans-serif;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid rgba(0, 242, 255, 0.2);
        border-radius: 8px;
        font-size: 14px;
        font-family: inherit;
        color: #e2e8f0;
        background: rgba(15, 23, 42, 0.85);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 80px;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(0, 242, 255, 0.2);
    }

    .modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 25px;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(30px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>

<div class="admin-card">
    <div class="card-header-actions">
        <h2 class="card-title">Danh sách danh mục sản phẩm</h2>
        <button onclick="openCreateModal()" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm danh mục
        </button>
    </div>

    <!-- Search -->
    <div class="filter-bar">
        <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 250px;">
                <input type="text"
                    id="searchCategory"
                    placeholder="🔍 Tìm kiếm theo ID hoặc tên danh mục..."
                    class="filter-control">
            </div>
            <button onclick="resetCategoryFilters()"
                class="filter-button">
                <i class="fas fa-redo"></i> Reset
            </button>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Số sản phẩm</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $cat): ?>
                        <tr>
                            <td class="fw-bold"><?= $cat['category_id'] ?></td>
                            <td class="fw-bold"><?= htmlspecialchars($cat['category_name']) ?></td>
                            <td class="text-muted"><?= htmlspecialchars($cat['description'] ?? 'Chưa có mô tả') ?></td>
                            <td>
                                <span class="badge primary"><?= $cat['total_products'] ?? 0 ?> sản phẩm</span>
                            </td>
                            <td>
                                <button onclick='openEditModal(<?= json_encode($cat) ?>)' class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Sửa
                                </button>
                                <a href="<?= BASE_URL ?>admin/deleteCategory?id=<?= $cat['category_id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc muốn xóa danh mục này? Các sản phẩm thuộc danh mục sẽ bị ảnh hưởng!')">
                                    <i class="fas fa-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if (empty($categories)): ?>
                    <tr class="no-results-row">
                        <td colspan="5" class="text-center" style="padding: 40px;">Chưa có danh mục nào</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Create/Edit Modal -->
<div id="categoryModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">Thêm danh mục mới</h3>
            <button class="close-btn" onclick="closeModal()">&times;</button>
        </div>
        <form id="categoryForm" method="POST">
            <input type="hidden" name="category_id" id="category_id">

            <div class="form-group">
                <label for="category_name">Tên danh mục <span style="color: #ef4444;">*</span></label>
                <input type="text" name="category_name" id="category_name" required placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="description" placeholder="Nhập mô tả cho danh mục (tùy chọn)"></textarea>
            </div>

            <div class="modal-actions">
                <button type="button" onclick="closeModal()" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Hủy
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Lưu
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Search functionality
    const searchInput = document.getElementById('searchCategory');
    const tbody = document.querySelector('tbody');
    const categoryRows = Array.from(tbody.querySelectorAll('tr')).filter(row => !row.classList.contains('no-results-row'));

    function filterCategories() {
        const searchTerm = searchInput.value.toLowerCase();
        let visibleCount = 0;

        categoryRows.forEach(row => {
            const categoryId = row.cells[0]?.textContent.toLowerCase() || '';
            const categoryName = row.cells[1]?.textContent.toLowerCase() || '';
            const description = row.cells[2]?.textContent.toLowerCase() || '';

            const matchesSearch = !searchTerm ||
                categoryId.includes(searchTerm) ||
                categoryName.includes(searchTerm) ||
                description.includes(searchTerm);

            if (matchesSearch) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        let noResultsRow = tbody.querySelector('.no-results-row');

        if (visibleCount === 0) {
            if (!noResultsRow) {
                noResultsRow = document.createElement('tr');
                noResultsRow.className = 'no-results-row';
                noResultsRow.innerHTML = '<td colspan="5" class="text-center" style="padding: 40px;">Không có kết quả phù hợp</td>';
                tbody.appendChild(noResultsRow);
            }
            noResultsRow.style.display = '';
        } else {
            if (noResultsRow) {
                noResultsRow.style.display = 'none';
            }
        }
    }

    function resetCategoryFilters() {
        searchInput.value = '';
        filterCategories();
    }

    searchInput.addEventListener('input', filterCategories);

    // Modal functions
    const modal = document.getElementById('categoryModal');
    const modalTitle = document.getElementById('modalTitle');
    const categoryForm = document.getElementById('categoryForm');

    function openCreateModal() {
        modalTitle.textContent = 'Thêm danh mục mới';
        categoryForm.action = '<?= BASE_URL ?>admin/createCategory';
        document.getElementById('category_id').value = '';
        document.getElementById('category_name').value = '';
        document.getElementById('description').value = '';
        modal.classList.add('active');
    }

    function openEditModal(category) {
        modalTitle.textContent = 'Sửa danh mục';
        categoryForm.action = '<?= BASE_URL ?>admin/updateCategory';
        document.getElementById('category_id').value = category.category_id;
        document.getElementById('category_name').value = category.category_name;
        document.getElementById('description').value = category.description || '';
        modal.classList.add('active');
    }

    function closeModal() {
        modal.classList.remove('active');
    }

    // Close modal when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close modal on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeModal();
        }
    });
</script>