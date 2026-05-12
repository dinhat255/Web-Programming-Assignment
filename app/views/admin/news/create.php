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

    .image-preview {
        max-width: 200px; max-height: 200px; margin-top: 10px; border-radius: 6px;
        border: 1px solid rgba(0, 242, 255, 0.3); display: none; box-shadow: 0 0 10px rgba(0,242,255,0.1);
    }
</style>

<div class="admin-card">
    <div class="card-header-actions">
        <h2 class="card-title"><i class="fas fa-plus-circle"></i> THÊM BÀI VIẾT MỚI</h2>
        <a href="<?= BASE_URL ?>admin/news" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> QUAY LẠI
        </a>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="mb-4">
                <label class="sci-fi-label">Tiêu đề bài viết <span class="text-danger">*</span></label>
                <input type="text" class="sci-fi-input" name="title" required placeholder="Nhập tiêu đề bài viết...">
                <div class="help-text">Tiêu đề nên ngắn gọn, súc tích và thu hút</div>
            </div>

            <div class="row" style="display:flex; gap: 20px; margin-bottom: 20px;">
                <div style="flex: 1;">
                    <label class="sci-fi-label">Danh mục <span class="text-danger">*</span></label>
                    <select class="sci-fi-input" name="category" required>
                        <option value="">-- Chọn danh mục --</option>
                        <option value="kien-thuc">Kiến thức</option>
                        <option value="sach-hay">Sách hay</option>
                        <option value="van-hoa">Văn hóa đọc</option>
                        <option value="giao-duc">Giáo dục</option>
                        <option value="cong-nghe">Công nghệ</option>
                        <option value="ky-nang">Kỹ năng sống</option>
                    </select>
                </div>
                <div style="flex: 1;">
                    <label class="sci-fi-label">Ngày đăng</label>
                    <input type="date" class="sci-fi-input" name="published_date" value="<?= date('Y-m-d') ?>">
                    <div class="help-text">Mặc định là ngày hôm nay</div>
                </div>
            </div>

            <div class="mb-4">
                <label class="sci-fi-label">Hình ảnh đại diện</label>
                <input type="file" class="sci-fi-input" name="image" accept="image/*" onchange="previewImage(this)">
                <div class="help-text">Định dạng: JPG, PNG, GIF. Kích thước tối đa: 2MB</div>
                <img id="imagePreview" class="image-preview" alt="Preview">
            </div>

            <div class="mb-4">
                <label class="sci-fi-label">Tóm tắt ngắn <span class="text-danger">*</span></label>
                <textarea class="sci-fi-input" name="summary" rows="3" required placeholder="Nhập tóm tắt ngắn gọn về bài viết..."></textarea>
                <div class="help-text">Tóm tắt hiển thị trong danh sách bài viết (khoảng 150-200 ký tự)</div>
            </div>

            <div class="mb-4">
                <label class="sci-fi-label">Nội dung chi tiết <span class="text-danger">*</span></label>
                <textarea class="sci-fi-input" name="content" rows="12" required placeholder="Nhập nội dung chi tiết bài viết (hỗ trợ HTML)..."></textarea>
                <div class="help-text">Bạn có thể sử dụng HTML để định dạng nội dung. Ví dụ: &lt;p&gt;, &lt;strong&gt;, &lt;em&gt;, &lt;ul&gt;, &lt;ol&gt;, &lt;h2&gt;, &lt;h3&gt;</div>
            </div>
        </div>

        <div class="card-footer">
            <a href="<?= BASE_URL ?>admin/news" class="btn btn-secondary">
                <i class="fas fa-times"></i> HỦY BỎ
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> ĐĂNG BÀI
            </button>
        </div>
    </form>
</div>

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