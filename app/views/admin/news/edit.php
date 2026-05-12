<style>
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
    .card-body { padding: 25px; }
    .card-footer { 
        padding: 20px 25px; 
        border-top: 1px solid rgba(0, 242, 255, 0.2); 
        display: flex; justify-content: flex-end; gap: 15px; 
    }

    .sci-fi-label {
        color: #94a3b8; font-weight: 600; letter-spacing: 1px; margin-bottom: 10px; display: block;
        font-family: 'Orbitron', sans-serif; font-size: 12px; text-transform: uppercase;
    }
    .sci-fi-label .text-danger { color: #ff003c !important; text-shadow: 0 0 5px #ff003c; margin-left: 3px; }

    .sci-fi-input {
        background: rgba(15, 23, 42, 0.8);
        border: 1px solid rgba(0, 242, 255, 0.3);
        color: #00f2ff;
        border-radius: 8px; padding: 12px 15px; width: 100%; transition: all 0.3s;
        font-family: 'Courier New', Courier, monospace; font-size: 14px;
    }
    .sci-fi-input:focus { outline: none; border-color: #00f2ff; box-shadow: 0 0 15px rgba(0, 242, 255, 0.2); background: rgba(3, 7, 18, 0.9); }
    .sci-fi-input::placeholder { color: rgba(0, 242, 255, 0.3); font-weight: normal; }
    select.sci-fi-input option { background: #0f172a; color: #00f2ff; }
    textarea.sci-fi-input { resize: vertical; }

    .help-text { font-size: 11px; color: #64748b; margin-top: 5px; font-family: 'Courier New', Courier, monospace; }

    .btn {
        padding: 10px 20px; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s;
        display: inline-flex; align-items: center; gap: 8px; font-size: 13px; background: transparent;
        font-family: 'Orbitron', sans-serif; text-decoration: none;
    }
    .btn-primary { color: #00f2ff; border: 1px solid #00f2ff; }
    .btn-primary:hover { background: #00f2ff; color: #000; box-shadow: 0 0 15px #00f2ff; }
    .btn-secondary { color: #94a3b8; border: 1px solid #94a3b8; }
    .btn-secondary:hover { background: #94a3b8; color: #000; box-shadow: 0 0 15px #94a3b8; }
    .btn-danger { color: #ff003c; border: 1px solid #ff003c; }
    .btn-danger:hover { background: #ff003c; color: #000; box-shadow: 0 0 15px #ff003c; }

    .current-image, .image-preview {
        max-width: 200px; max-height: 200px; margin-top: 10px; border-radius: 6px;
        border: 1px solid rgba(0, 242, 255, 0.3); box-shadow: 0 0 10px rgba(0,242,255,0.1);
    }
    .image-preview { display: none; }

    .alert-info {
        background: rgba(0, 242, 255, 0.05); border: 1px solid rgba(0, 242, 255, 0.3);
        color: #00f2ff; padding: 15px; border-radius: 8px; margin-bottom: 20px;
        font-family: 'Courier New', Courier, monospace; font-size: 13px;
    }

    /* Comment Section Styling */
    .table-comments { width: 100%; border-collapse: collapse; }
    .table-comments th {
        padding: 12px 15px; text-align: left; font-weight: 600; font-size: 12px;
        color: #00f2ff; text-transform: uppercase; border-bottom: 1px solid rgba(0, 242, 255, 0.2);
    }
    .table-comments td {
        padding: 12px 15px; border-bottom: 1px solid rgba(255,255,255,0.05);
        color: #e2e8f0; font-size: 13px;
    }
</style>

<?php if (empty($article)): ?>
    <div class="admin-card" style="padding: 40px; text-align: center;">
        <div style="color: #ff003c; font-family: 'Orbitron', sans-serif; font-size: 20px; margin-bottom: 20px;">
            <i class="fas fa-exclamation-triangle"></i> KHÔNG TÌM THẤY BÀI VIẾT NÀY!
        </div>
        <a href="<?= BASE_URL ?>admin/news" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> QUAY LẠI DANH SÁCH
        </a>
    </div>
<?php else: ?>

    <div class="admin-card">
        <div class="card-header-actions">
            <h2 class="card-title"><i class="fas fa-edit"></i> CHỈNH SỬA BÀI VIẾT #<?= $article['id'] ?></h2>
            <a href="<?= BASE_URL ?>admin/news" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> QUAY LẠI
            </a>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>HỆ THỐNG:</strong>
                    Tạo lúc: <?= !empty($article['created_at']) ? date('d/m/Y H:i', strtotime($article['created_at'])) : 'N/A' ?>
                    <?php if (!empty($article['updated_at'])): ?>
                        | Cập nhật: <?= date('d/m/Y H:i', strtotime($article['updated_at'])) ?>
                    <?php endif; ?>
                    | Lượt xem: <?= $article['views'] ?? 0 ?>
                </div>

                <div class="mb-4">
                    <label class="sci-fi-label">Tiêu đề bài viết <span class="text-danger">*</span></label>
                    <input type="text" class="sci-fi-input" name="title" required value="<?= htmlspecialchars($article['title'] ?? '') ?>" placeholder="Nhập tiêu đề bài viết...">
                </div>

                <div class="row" style="display:flex; gap: 20px; margin-bottom: 20px;">
                    <div style="flex: 1;">
                        <label class="sci-fi-label">Danh mục <span class="text-danger">*</span></label>
                        <select class="sci-fi-input" name="category" required>
                            <option value="">-- Chọn danh mục --</option>
                            <option value="kien-thuc" <?= ($article['category'] ?? '') == 'kien-thuc' ? 'selected' : '' ?>>Kiến thức</option>
                            <option value="sach-hay" <?= ($article['category'] ?? '') == 'sach-hay' ? 'selected' : '' ?>>Sách hay</option>
                            <option value="van-hoa" <?= ($article['category'] ?? '') == 'van-hoa' ? 'selected' : '' ?>>Văn hóa đọc</option>
                            <option value="giao-duc" <?= ($article['category'] ?? '') == 'giao-duc' ? 'selected' : '' ?>>Giáo dục</option>
                            <option value="cong-nghe" <?= ($article['category'] ?? '') == 'cong-nghe' ? 'selected' : '' ?>>Công nghệ</option>
                            <option value="ky-nang" <?= ($article['category'] ?? '') == 'ky-nang' ? 'selected' : '' ?>>Kỹ năng sống</option>
                        </select>
                    </div>
                    <div style="flex: 1;">
                        <label class="sci-fi-label">Ngày đăng</label>
                        <input type="date" class="sci-fi-input" name="published_date" value="<?= $article['published_date'] ?? date('Y-m-d') ?>">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="sci-fi-label">Hình ảnh đại diện</label>
                    <?php if (!empty($article['image_url'])): ?>
                        <div class="mb-2">
                            <div class="help-text mb-1" style="color: #00f2ff;">[ẢNH HIỆN TẠI]</div>
                            <img src="<?= BASE_URL . $article['image_url'] ?>" class="current-image" alt="Current image">
                        </div>
                    <?php endif; ?>

                    <input type="file" class="sci-fi-input" name="image" accept="image/*" onchange="previewImage(this)">
                    <div class="help-text">Chọn ảnh mới để thay đổi (bỏ trống nếu giữ nguyên). Định dạng JPG/PNG/GIF.</div>
                    <img id="imagePreview" class="image-preview" alt="Preview">
                </div>

                <div class="mb-4">
                    <label class="sci-fi-label">Tóm tắt ngắn <span class="text-danger">*</span></label>
                    <textarea class="sci-fi-input" name="summary" rows="3" required placeholder="Nhập tóm tắt ngắn gọn..."><?= htmlspecialchars($article['summary'] ?? '') ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="sci-fi-label">Nội dung chi tiết <span class="text-danger">*</span></label>
                    <textarea class="sci-fi-input" name="content" rows="12" required placeholder="Nội dung bài viết (hỗ trợ HTML)..."><?= htmlspecialchars($article['content'] ?? '') ?></textarea>
                </div>
            </div>

            <div class="card-footer">
                <a href="<?= BASE_URL ?>admin/news" class="btn btn-secondary">
                    <i class="fas fa-times"></i> HỦY BỎ
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> LƯU THAY ĐỔI
                </button>
            </div>
        </form>
    </div>

    <div class="admin-card">
        <div class="card-header-actions">
            <h2 class="card-title"><i class="fas fa-comments"></i> QUẢN LÝ BÌNH LUẬN</h2>
        </div>
        <div class="card-body">
            <table class="table-comments">
                <thead>
                    <tr>
                        <th width="20%">NGƯỜI DÙNG</th>
                        <th width="45%">NỘI DUNG</th>
                        <th width="20%">THỜI GIAN</th>
                        <th width="15%" style="text-align: center;">THAO TÁC</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($comments) && !empty($comments)): ?>
                        <?php foreach ($comments as $cmt): ?>
                            <tr>
                                <td><strong style="color: #00f2ff;"><?= htmlspecialchars($cmt['fullname']) ?></strong></td>
                                <td style="color: #94a3b8;"><?= nl2br(htmlspecialchars($cmt['content'])) ?></td>
                                <td style="color: #64748b; font-family: monospace;"><?= date('d/m/Y H:i', strtotime($cmt['created_at'])) ?></td>
                                <td style="text-align: center;">
                                    <a href="<?= BASE_URL ?>admin/deleteArticleComment?id=<?= $cmt['id'] ?>&article_id=<?= $article['id'] ?>" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Xác nhận xóa bình luận này?');">
                                        <i class="fas fa-trash"></i> XÓA
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align: center; color: #64748b; padding: 30px;">
                                KHÔNG CÓ BÌNH LUẬN NÀO ĐƯỢC GHI NHẬN.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php endif; ?>

<script>
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
        }
    }
</script>