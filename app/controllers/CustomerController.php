<?php
// app/controllers/CustomerController.php
class CustomerController extends Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
    }

    // Profile page
    public function index()
    {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['users_id']) || empty($_SESSION['users_id'])) {
            header('Location: ' . BASE_URL . 'auth/login');
            exit();
        }

        // Lấy thông tin user từ database
        $userModel = $this->model('UserModel');
        $user = $userModel->getById($_SESSION['users_id']);

        if (!$user) {
            // Nếu không tìm thấy user, logout
            session_destroy();
            header('Location: ' . BASE_URL . 'auth/login');
            exit();
        }

        $data = [
            'title' => 'Thông tin tài khoản - ' . APP_NAME,
            'page' => 'customer',
            'user' => $user
        ];

        $this->view('customer/index', $data);
    }

    // API cập nhật thông tin cá nhân
    public function updateProfile()
    {
        // Kiểm tra method
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->jsonResponse(['success' => false, 'message' => 'Method not allowed']);
            return;
        }

        // Kiểm tra đăng nhập
        if (!isset($_SESSION['users_id']) || empty($_SESSION['users_id'])) {
            $this->jsonResponse(['success' => false, 'message' => 'Vui lòng đăng nhập']);
            return;
        }

        $userId = $_SESSION['users_id'];

        // Lấy dữ liệu từ POST
        $fullname = trim($_POST['fullname'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');

        // Validate
        if (empty($fullname)) {
            $this->jsonResponse(['success' => false, 'message' => 'Vui lòng nhập họ tên']);
            return;
        }

        if (empty($email)) {
            $this->jsonResponse(['success' => false, 'message' => 'Vui lòng nhập email']);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->jsonResponse(['success' => false, 'message' => 'Email không hợp lệ']);
            return;
        }

        // Kiểm tra email đã tồn tại chưa
        $userModel = $this->model('UserModel');
        if ($userModel->isEmailExists($email, $userId)) {
            $this->jsonResponse(['success' => false, 'message' => 'Email đã được sử dụng']);
            return;
        }

        // Kiểm tra phone đã tồn tại chưa (nếu có nhập)
        if (!empty($phone) && $userModel->isPhoneExists($phone, $userId)) {
            $this->jsonResponse(['success' => false, 'message' => 'Số điện thoại đã được sử dụng']);
            return;
        }

        // Cập nhật thông tin
        $data = [
            'fullname' => $fullname,
            'email' => $email,
            'phone' => $phone
        ];

        $result = $userModel->updateProfile($userId, $data);

        if ($result) {
            $this->jsonResponse(['success' => true, 'message' => 'Cập nhật thông tin thành công!']);
        } else {
            $this->jsonResponse(['success' => false, 'message' => 'Cập nhật thất bại, vui lòng thử lại']);
        }
    }

    /**
     * Trang đơn hàng của tôi
     */
    public function orders()
    {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user_id']) && !isset($_SESSION['users_id'])) {
            header('Location: ' . BASE_URL . 'auth/login');
            exit();
        }

        $userId = $_SESSION['user_id'] ?? $_SESSION['users_id'] ?? null;

        // Load Order model
        require_once APP_ROOT . '/models/Order.php';
        $orderModel = new Order();

        // Lấy danh sách đơn hàng
        $ordersData = $orderModel->getOrdersByUserId($userId, 20, 0);

        // Format data cho view
        $orders = [];
        foreach ($ordersData as $order) {
            // Lấy sản phẩm trong đơn hàng
            $items = $orderModel->getOrderProducts($order['order_id']);

            // Format items
            $formattedItems = [];
            foreach ($items as $item) {
                $formattedItems[] = [
                    'product_id' => $item['product_id'],
                    'product_name' => $item['title'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['subtotal'],
                    'image' => $item['image_url'] ?? 'images/product-page/default.jpg',
                    'author' => $item['author'] ?? 'N/A'
                ];
            }

            // Map status text
            $statusMap = [
                'pending' => 'Chờ xử lý',
                'processing' => 'Đang xử lý',
                'shipped' => 'Đang giao',
                'completed' => 'Hoàn thành',
                'cancelled' => 'Đã hủy'
            ];

            $orders[] = [
                'order_id' => $order['order_id'],
                'order_date' => $order['created_at'],
                'status' => $order['status'],
                'status_text' => $statusMap[$order['status']] ?? $order['status'],
                'total' => $order['total_amount'],
                'shipping_fee' => $order['shipping_fee'],
                'subtotal' => $order['subtotal'],
                'payment_method' => $order['payment_method'],
                'shipping_address' => $order['shipping_address'],
                'note' => $order['note'],
                'items' => $formattedItems
            ];
        }

        $data = [
            'title' => 'Đơn hàng của tôi - ' . APP_NAME,
            'page' => 'customer',
            'orders' => $orders
        ];

        $this->view('customer/orders', $data);
    }

    // Notifications
    public function notifications()
    {
        if (isset($_SESSION['users_id']) && !empty($_SESSION['users_id'])) {
            $nm = $this->model('NotificationModel');
            $notes = $nm->getByUserId($_SESSION['users_id']);
        } else {
            // guest notifications: none (or mock)
            $notes = $_SESSION['guest_notifications'] ?? [];
        }
        $this->view('customer/notifications', ['notifications' => $notes]);
    }

    // Mark single notification read (AJAX)
    public function markNotificationRead()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->jsonResponse(['success' => false]);
            return;
        }

        $nid = (int)($_POST['id'] ?? 0);
        if ($nid <= 0) {
            $this->jsonResponse(['success' => false]);
            return;
        }

        if (isset($_SESSION['users_id']) && !empty($_SESSION['users_id'])) {
            $nm = $this->model('NotificationModel');
            $ok = $nm->markRead($nid, $_SESSION['users_id']);
            $this->jsonResponse(['success' => (bool)$ok]);
            return;
        }

        // Guest: mark in session
        if (isset($_SESSION['guest_notifications']) && is_array($_SESSION['guest_notifications'])) {
            foreach ($_SESSION['guest_notifications'] as &$n) {
                if ((int)($n['id'] ?? 0) === $nid) {
                    $n['is_read'] = 1;
                    $this->jsonResponse(['success' => true]);
                    return;
                }
            }
        }
        $this->jsonResponse(['success' => false]);
    }

    // Mark all notifications read (AJAX)
    public function markAllNotificationsRead()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->jsonResponse(['success' => false]);
            return;
        }

        if (isset($_SESSION['users_id']) && !empty($_SESSION['users_id'])) {
            $nm = $this->model('NotificationModel');
            $ok = $nm->markAllRead($_SESSION['users_id']);
            $this->jsonResponse(['success' => (bool)$ok]);
            return;
        }

        // Guest
        if (isset($_SESSION['guest_notifications']) && is_array($_SESSION['guest_notifications'])) {
            foreach ($_SESSION['guest_notifications'] as &$n) $n['is_read'] = 1;
            $this->jsonResponse(['success' => true]);
            return;
        }

        $this->jsonResponse(['success' => false]);
    }

    // Wishlist page (reads DB for logged users, session for guests)
    public function wishlist()
    {
        $list = [];
        $productModel = $this->model('ProductModel');

        if (isset($_SESSION['users_id']) && !empty($_SESSION['users_id'])) {
            $wm = $this->model('WishlistModel');
            $rows = $wm->getByUserId($_SESSION['users_id']);
            foreach ($rows as $r) {
                $list[] = [
                    'product_id' => $r['product_id'],
                    'product_name' => $r['product_name'],
                    'image' => $r['image'] ?? 'images/product-page/default.jpg',
                    'price' => $r['price'],
                    'original_price' => $r['original_price'] ?? 0,
                    'author' => $r['author'] ?? 'Chưa có thông tin',
                    'discount' => (isset($r['original_price']) && $r['original_price'] > $r['price']) ? round(100 - ($r['price'] / $r['original_price'] * 100)) : 0
                ];
            }
        } else {
            // guest: use session list of product IDs
            $guest = $_SESSION['guest_wishlist'] ?? [];
            if (!empty($guest)) {
                // Sử dụng ProductModel để lấy sản phẩm
                if (method_exists($productModel, 'getProductsByIds')) {
                    $products = $productModel->getProductsByIds($guest);
                } else {
                    $products = [];
                }
                foreach ($products as $p) {
                    $list[] = [
                        'product_id' => $p['product_id'],
                        'product_name' => $p['title'],
                        'image' => $p['image_url'] ?? 'images/product-page/default.jpg',
                        'price' => $p['price'],
                        'original_price' => $p['old_price'] ?? 0,
                        'author' => $p['author'] ?? 'Chưa có thông tin',
                        'discount' => (isset($p['old_price']) && $p['old_price'] > $p['price']) ? round(100 - ($p['price'] / $p['old_price'] * 100)) : 0
                    ];
                }
            }
        }

        $data = [
            'title' => 'Sản phẩm yêu thích - ' . APP_NAME,
            'page' => 'customer',
            'wishlist' => $list
        ];

        $this->view('customer/wishlist', $data);
    }

    // API add wishlist (POST)
    public function addWishlist()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->jsonResponse(['success' => false, 'message' => 'Method not allowed']);
            return;
        }
        $pid = (int)($_POST['product_id'] ?? 0);
        if ($pid <= 0) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid product']);
            return;
        }

        if (isset($_SESSION['users_id']) && !empty($_SESSION['users_id'])) {
            $wm = $this->model('WishlistModel');
            $exists = $wm->exists($_SESSION['users_id'], $pid);
            if ($exists) {
                $this->jsonResponse([
                    'success' => true,
                    'state' => true,
                    'message' => 'Sản phẩm đã có trong yêu thích'
                ]);
                return;
            }
            $ok = $wm->add($_SESSION['users_id'], $pid);
            $this->jsonResponse([
                'success' => (bool)$ok,
                'state' => (bool)$ok,
                'message' => $ok ? 'Đã thêm vào yêu thích' : 'Không thể thêm vào yêu thích'
            ]);
            return;
        }

        // guest: add to session array
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['guest_wishlist']) || !is_array($_SESSION['guest_wishlist'])) $_SESSION['guest_wishlist'] = [];
        $exists = in_array($pid, $_SESSION['guest_wishlist']);
        if (!$exists) $_SESSION['guest_wishlist'][] = $pid;
        $_SESSION['guest_wishlist'] = array_values(array_unique($_SESSION['guest_wishlist']));
        $this->jsonResponse([
            'success' => true,
            'guest' => true,
            'state' => true,
            'count' => count($_SESSION['guest_wishlist']),
            'message' => $exists ? 'Sản phẩm đã có trong yêu thích' : 'Đã thêm vào yêu thích'
        ]);
    }

    // API remove wishlist (POST)
    public function removeWishlist()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->jsonResponse(['success' => false, 'message' => 'Method not allowed']);
            return;
        }
        $pid = (int)($_POST['product_id'] ?? 0);
        if ($pid <= 0) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid product']);
            return;
        }

        if (isset($_SESSION['users_id']) && !empty($_SESSION['users_id'])) {
            $wm = $this->model('WishlistModel');
            $exists = $wm->exists($_SESSION['users_id'], $pid);
            if (!$exists) {
                $this->jsonResponse([
                    'success' => true,
                    'state' => false,
                    'message' => 'Sản phẩm đã được xóa khỏi yêu thích'
                ]);
                return;
            }
            $ok = $wm->remove($_SESSION['users_id'], $pid);
            $this->jsonResponse([
                'success' => (bool)$ok,
                'state' => !$ok ? true : false,
                'message' => $ok ? 'Đã xóa khỏi yêu thích' : 'Không thể xóa khỏi yêu thích'
            ]);
            return;
        }

        // guest: remove from session
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['guest_wishlist']) || !is_array($_SESSION['guest_wishlist'])) {
            $this->jsonResponse(['success' => true, 'guest' => true, 'state' => false, 'count' => 0, 'message' => 'Sản phẩm đã được xóa khỏi yêu thích']);
            return;
        }
        $_SESSION['guest_wishlist'] = array_values(array_diff($_SESSION['guest_wishlist'], [$pid]));
        $this->jsonResponse([
            'success' => true,
            'guest' => true,
            'state' => false,
            'count' => count($_SESSION['guest_wishlist']),
            'message' => 'Đã xóa khỏi yêu thích'
        ]);
    }

    /**
     * Helper: sạch sẽ trả về JSON (dọn buffer trước, set header)
     */
    private function jsonResponse(array $data): void
    {
        while (ob_get_level() > 0) {
            ob_end_clean();
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
}
