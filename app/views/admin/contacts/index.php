<style>
    /* ================================================== */
    /* BỘ CSS SCI-FI CHO TRANG QUẢN LÝ LIÊN HỆ           */
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

    /* Badge trạng thái (Neon Glow) */
    .badge {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
        display: inline-block;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .badge.unread {
        background: rgba(255, 0, 60, 0.1);
        color: #ff003c;
        border: 1px solid #ff003c;
        box-shadow: 0 0 10px rgba(255, 0, 60, 0.3);
    }

    .badge.read {
        background: rgba(255, 204, 0, 0.1);
        color: #ffcc00;
        border: 1px solid #ffcc00;
        box-shadow: 0 0 10px rgba(255, 204, 0, 0.3);
    }

    .badge.replied {
        background: rgba(0, 255, 136, 0.1);
        color: #00ff88;
        border: 1px solid #00ff88;
        box-shadow: 0 0 10px rgba(0, 255, 136, 0.3);
    }

    /* Nút bấm Sci-Fi */
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

    /* Modal Sci-Fi */
    .modal {
        display: none;
        position: fixed;
        z-index: 2000;
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
        max-width: 600px;
        border: 1px solid rgba(0, 242, 255, 0.3);
        box-shadow: 0 0 30px rgba(0, 242, 255, 0.2);
        color: #e2e8f0;
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

    .modal-header button {
        color: #ff003c;
        text-shadow: 0 0 5px #ff003c;
        transition: 0.3s;
        background: none;
        border: none;
        font-size: 28px;
        cursor: pointer;
    }

    .modal-header button:hover {
        transform: scale(1.2);
    }

    #modalBody p {
        color: #94a3b8;
        margin-bottom: 10px;
    }

    #modalBody strong {
        color: #00f2ff;
        font-family: 'Orbitron', sans-serif;
        letter-spacing: 1px;
        font-size: 12px;
        margin-right: 5px;
    }

    hr {
        border-color: rgba(0, 242, 255, 0.2);
        margin: 20px 0;
    }

    /* Box tin nhắn như màn hình console */
    #m_message {
        background: rgba(0, 0, 0, 0.5) !important;
        border: 1px solid rgba(0, 242, 255, 0.2);
        padding: 15px;
        border-radius: 8px;
        white-space: pre-wrap;
        color: #00f2ff;
        font-family: 'Courier New', monospace;
        box-shadow: inset 0 0 10px rgba(0, 242, 255, 0.1);
    }
</style>

<div class="admin-card">
    <div class="card-header-actions">
        <h2 class="card-title"><i class="fas fa-satellite-dish"></i> QUẢN LÝ LIÊN HỆ KHÁCH HÀNG</h2>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>KHÁCH HÀNG</th>
                    <th>TIÊU ĐỀ</th>
                    <th>TRẠNG THÁI</th>
                    <th class="text-center">THAO TÁC</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <?php
                    $status = $contact['status'] ?? 'unread';
                    $viewBtnClass = ($status == 'unread') ? 'btn-danger' : 'btn-success';
                    ?>
                    <tr>
                        <td style="color:#00f2ff; font-weight:bold;">#<?= $contact['id'] ?></td>
                        <td>
                            <strong style="color:white;"><?= htmlspecialchars($contact['fullname'] ?? $contact['name']) ?></strong><br>
                            <small style="color:#94a3b8;"><?= htmlspecialchars($contact['email']) ?></small>
                        </td>
                        <td><?= htmlspecialchars($contact['subject']) ?></td>
                        <td>
                            <span class="badge <?= $status ?>">
                                <?= ($status == 'New') ? 'Chưa đọc' : (($status == 'read') ? 'Đã đọc' : 'Đã phản hồi') ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <div style="display: flex; gap: 8px; justify-content: center;">
                                <button onclick='openViewModal(<?= json_encode($contact) ?>)' class="btn <?= $viewBtnClass ?> btn-sm">
                                    <i class="fas fa-eye"></i> XEM
                                </button>

                                <form action="<?= BASE_URL ?>admin/updateContactStatus" method="POST">
                                    <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                                    <input type="hidden" name="status" value="replied">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-check-double"></i> ĐÃ PHẢN HỒI
                                    </button>
                                </form>

                                <form action="<?= BASE_URL ?>admin/deleteContact" method="POST" onsubmit="return confirm('Xóa dữ liệu liên hệ này khỏi hệ thống?')">
                                    <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> XÓA
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="contactModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>CHI TIẾT LỜI NHẮN</h3>
            <button onclick="closeModal()">&times;</button>
        </div>

        <div id="modalBody">
            <p><strong>KHÁCH HÀNG:</strong> <span id="m_name" style="color:white;"></span></p>
            <p><strong>ĐIỆN THOẠI:</strong> <span id="m_phone" style="color:white;"></span></p>
            <hr>
            <p><strong>NỘI DUNG TRUYỀN TẢI:</strong></p>
            <div id="m_message"></div>
        </div>

        <form action="<?= BASE_URL ?>admin/updateContactStatus" method="POST" style="margin-top:25px;">
            <input type="hidden" name="id" id="m_id">
            <input type="hidden" name="status" value="read">
            <div style="display:flex; justify-content: flex-end; gap:15px;">
                <button type="button" onclick="closeModal()" class="btn btn-secondary"><i class="fas fa-times"></i> ĐÓNG</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> ĐÁNH DẤU ĐÃ ĐỌC</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('contactModal');

    function openViewModal(contact) {
        document.getElementById('m_id').value = contact.id;
        document.getElementById('m_name').innerText = contact.fullname || contact.name;
        document.getElementById('m_phone').innerText = contact.phone || 'Không có dữ liệu';
        document.getElementById('m_message').innerText = contact.message;
        modal.classList.add('active');
    }

    function closeModal() {
        modal.classList.remove('active');
    }

    window.onclick = function(event) {
        if (event.target == modal) closeModal();
    }
</script>