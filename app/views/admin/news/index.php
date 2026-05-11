

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Quản lý Tin tức</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="<?= BASE_URL ?>admin/createNews" class="btn btn-primary d-none d-sm-inline-block">
                    <i class="fas fa-plus"></i> Thêm bài viết
                </a>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
<<<<<<< HEAD
=======
        <div class="row mb-3">
    <div class="col-md-6">
        <div class="input-group">
            <input type="text" id="newsSearchInput" class="form-control" placeholder="Tìm kiếm bài viết theo tiêu đề hoặc danh mục...">
            <span class="input-group-text"><i class="fas fa-search"></i></span>
        </div>
    </div>
</div>
>>>>>>> master
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="w-1">ID</th>
                            <th>Hình ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Danh mục</th>
                            <th>Ngày đăng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($articles as $item): ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td>
                                <?php if (!empty($item['image_url'])): ?>
                                    <img src="<?= BASE_URL . $item['image_url'] ?>" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <i class="fas fa-image text-white"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="text-wrap" style="max-width: 300px;">
                                <div class="font-weight-medium"><?= htmlspecialchars($item['title']) ?></div>
                                <div class="text-muted small text-truncate"><?= htmlspecialchars($item['summary'] ?? '') ?></div>
                            </td>
                            <td><span class="badge bg-green-lt"><?= $item['category'] ?? 'N/A' ?></span></td>
                            <td><?= !empty($item['published_date']) ? date('d/m/Y', strtotime($item['published_date'])) : date('d/m/Y', strtotime($item['created_at'])) ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>admin/editNews?id=<?= $item['id'] ?>" class="btn btn-primary btn-sm">Sửa</a>
                                <a href="<?= BASE_URL ?>admin/deleteNews?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')">Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======

<script>
document.getElementById('newsSearchInput').addEventListener('keyup', function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll('table tbody tr');

    rows.forEach(row => {
        // Tìm kiếm ở cột Tiêu đề (cột 2) và Danh mục (cột 3)
        let title = row.cells[1] ? row.cells[1].textContent.toLowerCase() : '';
        let category = row.cells[2] ? row.cells[2].textContent.toLowerCase() : '';
        
        if (title.includes(value) || category.includes(value)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>
>>>>>>> master
