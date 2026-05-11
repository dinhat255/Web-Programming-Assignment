<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-comments"></i> Quản lý Bình luận</h2>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Người dùng</th>
                        <th>Bài viết</th>
                        <th width="40%">Nội dung</th>
                        <th>Thời gian</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($comments)): ?>
                        <?php foreach ($comments as $cmt): ?>
                            <tr>
                                <td><?= $cmt['id'] ?></td>
                                <td><strong><?= htmlspecialchars($cmt['fullname']) ?></strong></td>
                                <td><small><?= htmlspecialchars($cmt['news_title']) ?></small></td>
                                <td><?= nl2br(htmlspecialchars($cmt['content'])) ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($cmt['created_at'])) ?></td>
                                <td>
                                    <a href="<?= BASE_URL ?>admin/deleteComment?id=<?= $cmt['id'] ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')">
                                        <i class="fas fa-trash"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center">Chưa có bình luận nào.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>