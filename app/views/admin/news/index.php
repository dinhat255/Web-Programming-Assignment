<style>
    /* BỘ CSS SCI-FI CHO TRANG QUẢN LÝ TIN TỨC */
    .admin-card {
        background: rgba(30, 41, 59, 0.6) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 242, 255, 0.2) !important;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.4);
        overflow: hidden;
        margin-bottom: 30px;
    }
    .card-header-actions {
        display: flex; justify-content: space-between; align-items: center;
        padding: 20px 25px;
        border-bottom: 1px solid rgba(0, 242, 255, 0.2);
    }
    .card-title {
        font-family: 'Orbitron', sans-serif;
        color: #00f2ff;
        font-size: 18px; font-weight: 700; margin: 0;
        letter-spacing: 1px;
        text-shadow: 0 0 10px rgba(0, 242, 255, 0.4);
        text-transform: uppercase;
    }
    .table-container { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; }
    th {
        padding: 15px; text-align: left; font-weight: 600; font-size: 13px;
        color: #00f2ff; text-transform: uppercase;
        border-bottom: 1px solid rgba(0, 242, 255, 0.2);
        font-family: 'Orbitron', sans-serif;
    }
    td {
        padding: 15px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        vertical-align: middle;
        color: #e2e8f0;
    }
    tr:hover td { background: rgba(0, 242, 255, 0.05); }

    .badge { padding: 6px 12px; border-radius: 6px; font-size: 11px; font-weight: 700; display: inline-block; text-transform: uppercase; letter-spacing: 1px;}
    .badge.bg-green-lt { background: rgba(0, 255, 136, 0.1); color: #00ff88; border: 1px solid #00ff88; box-shadow: 0 0 10px rgba(0, 255, 136, 0.3); }

    .btn {
        padding: 8px 16px; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s;
        display: inline-flex; align-items: center; gap: 6px; font-size: 12px; background: transparent;
        font-family: 'Orbitron', sans-serif; text-decoration: none;
    }
    .btn-primary { color: #00f2ff; border: 1px solid #00f2ff; }
    .btn-primary:hover { background: #00f2ff; color: #000; box-shadow: 0 0 15px #00f2ff; }
    
    .btn-danger { color: #ff003c; border: 1px solid #ff003c; }
    .btn-danger:hover { background: #ff003c; color: #000; box-shadow: 0 0 15px #ff003c; }

    .btn-sm { padding: 6px 10px; font-size: 11px; }

    .sci-fi-input {
        background: rgba(15, 23, 42, 0.8);
        border: 1px solid rgba(0, 242, 255, 0.3);
        color: #00f2ff;
        border-radius: 8px;
        padding: 12px 15px;
        width: 100%;
        transition: all 0.3s;
        font-family: 'Courier New', Courier, monospace;
    }
    .sci-fi-input:focus { outline: none; border-color: #00f2ff; box-shadow: 0 0 15px rgba(0, 242, 255, 0.2); }
    .sci-fi-input::placeholder { color: rgba(0, 242, 255, 0.3); }
    .search-bar { padding: 20px 25px; border-bottom: 1px solid rgba(0, 242, 255, 0.2); display: flex; gap: 15px; }
</style>

<div class="admin-card">
    <div class="card-header-actions">
        <h2 class="card-title"><i class="fas fa-newspaper"></i> QUẢN LÝ TIN TỨC</h2>
        <a href="<?= BASE_URL ?>admin/createNews" class="btn btn-primary">
            <i class="fas fa-plus"></i> THÊM BÀI VIẾT
        </a>
    </div>

    <div class="search-bar">
        <div style="flex: 1; position: relative;">
            <input type="text" id="newsSearchInput" class="sci-fi-input" placeholder="TÌM KIẾM BÀI VIẾT THEO TIÊU ĐỀ HOẶC DANH MỤC...">
            <i class="fas fa-search" style="position: absolute; right: 15px; top: 15px; color: #00f2ff;"></i>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th class="w-1">ID</th>
                    <th>HÌNH ẢNH</th>
                    <th>TIÊU ĐỀ</th>
                    <th>DANH MỤC</th>
                    <th>NGÀY ĐĂNG</th>
                    <th class="text-center">THAO TÁC</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($articles as $item): ?>
                <tr>
                    <td style="color:#00f2ff; font-weight:bold;">#<?= $item['id'] ?></td>
                    <td>
                        <?php if (!empty($item['image_url'])): ?>
                            <img src="<?= BASE_URL . $item['image_url'] ?>" class="rounded" style="width: 60px; height: 40px; object-fit: cover; border: 1px solid rgba(0,242,255,0.3);">
                        <?php else: ?>
                            <div class="rounded d-flex align-items-center justify-content-center" style="width: 60px; height: 40px; background: rgba(255,255,255,0.1); border: 1px solid rgba(0,242,255,0.3);">
                                <i class="fas fa-image" style="color: rgba(0,242,255,0.5);"></i>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td class="text-wrap" style="max-width: 300px;">
                        <div style="color:white; font-weight:bold; margin-bottom: 5px;"><?= htmlspecialchars($item['title']) ?></div>
                        <div style="color:#94a3b8; font-size:12px;" class="text-truncate"><?= htmlspecialchars($item['summary'] ?? '') ?></div>
                    </td>
                    <td><span class="badge bg-green-lt"><?= $item['category'] ?? 'N/A' ?></span></td>
                    <td style="color:#94a3b8;"><?= !empty($item['published_date']) ? date('d/m/Y', strtotime($item['published_date'])) : date('d/m/Y', strtotime($item['created_at'])) ?></td>
                    <td class="text-center">
                        <div style="display: flex; gap: 8px; justify-content: center;">
                            <a href="<?= BASE_URL ?>admin/editNews?id=<?= $item['id'] ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> SỬA
                            </a>
                            <a href="<?= BASE_URL ?>admin/deleteNews?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">
                                <i class="fas fa-trash"></i> XÓA
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.getElementById('newsSearchInput').addEventListener('keyup', function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll('table tbody tr');

    rows.forEach(row => {
        let title = row.cells[2] ? row.cells[2].textContent.toLowerCase() : '';
        let category = row.cells[3] ? row.cells[3].textContent.toLowerCase() : '';
        
        if (title.includes(value) || category.includes(value)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>