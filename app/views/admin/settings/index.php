<style>
    /* CSS dành riêng cho form Cài đặt chuẩn Sci-Fi */
    .settings-card {
        background: rgba(30, 41, 59, 0.6) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 242, 255, 0.2) !important;
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    }
    .settings-title {
        color: #00f2ff;
        font-family: 'Orbitron', sans-serif;
        margin-bottom: 30px;
        border-bottom: 1px solid rgba(0, 242, 255, 0.2);
        padding-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    .sci-fi-label {
        color: #94a3b8;
        font-weight: 600;
        letter-spacing: 1px;
        margin-bottom: 10px;
        display: block;
        font-family: 'Orbitron', sans-serif;
        font-size: 13px;
    }
    .sci-fi-input {
        background: rgba(15, 23, 42, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #00f2ff; /* Chữ khi gõ sẽ là màu xanh Neon phát sáng, rất dễ đọc */
        border-radius: 8px;
        padding: 15px;
        width: 100%;
        transition: all 0.3s;
        font-family: 'Courier New', Courier, monospace;
        font-size: 16px;
        font-weight: bold;
    }
    .sci-fi-input:focus {
        outline: none;
        border-color: #00f2ff;
        box-shadow: 0 0 15px rgba(0, 242, 255, 0.2);
        background: rgba(3, 7, 18, 0.9);
    }
    .sci-fi-input::placeholder {
        color: rgba(255, 255, 255, 0.3);
        font-weight: normal;
    }
    .btn-container {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }
    .sci-fi-btn {
        background: transparent;
        border: 1px solid #00f2ff;
        color: #00f2ff;
        padding: 12px 30px;
        border-radius: 8px;
        font-family: 'Orbitron', sans-serif;
        font-weight: bold;
        transition: all 0.3s;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }
    .sci-fi-btn:hover {
        background: #00f2ff;
        color: #000;
        box-shadow: 0 0 20px rgba(0, 242, 255, 0.6);
    }
    .btn-cancel {
        border-color: #ef4444;
        color: #ef4444;
    }
    .btn-cancel:hover {
        background: #ef4444;
        color: white;
        box-shadow: 0 0 20px rgba(239, 68, 68, 0.6);
    }
</style>

<div class="row">
    <div class="col-md-8 mx-auto mt-4"> <div class="settings-card">
            <h3 class="settings-title"><i class="fas fa-sliders-h"></i> Cấu hình thông tin chung</h3>
            
            <form method="POST" action="">
                <div class="mb-4">
                    <label class="sci-fi-label">Hotline (Tổng đài)</label>
                    <input type="text" class="sci-fi-input" name="phone" value="<?= htmlspecialchars($settings['phone'] ?? '') ?>" placeholder="Nhập số hotline...">
                </div>
                
                <div class="mb-4">
                    <label class="sci-fi-label">Email liên hệ</label>
                    <input type="email" class="sci-fi-input" name="email" value="<?= htmlspecialchars($settings['email'] ?? '') ?>" placeholder="Nhập email...">
                </div>
                
                <div class="mb-4">
                    <label class="sci-fi-label">Địa chỉ trụ sở</label>
                    <input type="text" class="sci-fi-input" name="address" value="<?= htmlspecialchars($settings['address'] ?? '') ?>" placeholder="Nhập địa chỉ công ty...">
                </div>

                <div class="btn-container">
                    <button type="submit" class="sci-fi-btn">
                        <i class="fas fa-save"></i> LƯU THAY ĐỔI
                    </button>
                    <a href="<?= BASE_URL ?>admin" class="sci-fi-btn btn-cancel">
                        <i class="fas fa-times"></i> HỦY BỎ
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>