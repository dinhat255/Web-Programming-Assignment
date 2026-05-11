<?php
/**
 * NEWS CONTROLLER
 * Trang Danh sách bài viết và Chi tiết bài viết
 */

class NewsController extends Controller {

    private $newsModel;
    private $commentModel; 

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->newsModel = $this->model('NewsModel');
        $this->commentModel = $this->model('CommentModel'); 
    }

    /**
     * Trang danh sách bài viết
     */
    public function index() {
        $search = trim($_GET['search'] ?? '');
        $category = $_GET['category'] ?? '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 9; 
        $offset = ($page - 1) * $limit;

        $options = [
            'search' => $search,
            'category' => $category,
            'limit' => $limit,
            'offset' => $offset
        ];

        $articles = $this->newsModel->getFilteredNews($options);
        $totalArticles = $this->newsModel->countFilteredNews($options);
        $totalPages = ceil($totalArticles / $limit);
        $categories = $this->newsModel->getAllCategories();
                $latestNews = $this->newsModel->getLatestNews(3);
        $hotNews = $this->newsModel->getHotNews(5);

        $data = [
            'title' => 'Tin tức - ' . APP_NAME,
            'page' => 'news',
            'articles' => $articles,
            'categories' => $categories,
            'search' => $search,
            'selectedCategory' => $category,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'totalArticles' => $totalArticles,
            'latestNews' => $latestNews, 
            'hotNews' => $hotNews       
        ];

        $this->view('news/index', $data);
    }

    /**
     * Trang chi tiết bài viết
     */
    public function detail($id) {
        // Lấy bài viết từ database
        $article = $this->newsModel->getNewsById($id);

        if (!$article) {
            // Nếu không tìm thấy bài viết, chuyển hướng về trang danh sách
            header('Location: ' . BASE_URL . 'news');
            exit;
        }

        // Tăng lượt xem
        $this->newsModel->incrementViews($id);

        // Lấy bài viết liên quan (cùng danh mục)
        $relatedArticles = [];
        if (!empty($article['category'])) {
            $relatedArticles = $this->newsModel->getRelatedNews($article['category'], $id, 3);
        }

        $comments = $this->commentModel->getCommentsByNewsId($id);

        $data = [
            'title' => $article['title'] . ' - ' . APP_NAME,
            'page' => 'news',
            'article' => $article,
            'relatedArticles' => $relatedArticles,
            'comments' => $comments
        ];

        $this->view('news/detail', $data);
    }

    public function addComment() {
        header('Content-Type: application/json');
    
        // 1. Kiểm tra đăng nhập
        if (!isset($_SESSION['users_id'])) {
            echo json_encode(['success' => false, 'message' => 'Bạn cần đăng nhập để gửi bình luận!']);
            return;
        }
    
        // 2. Kiểm tra đúng phương thức POST không
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Phương thức không hợp lệ.']);
            return;
        }

        // Dùng try-catch để BẮT TOÀN BỘ LỖI CHẾT NGƯỜI (Fatal Errors / SQL Exceptions)
        try {
            $newsId = isset($_POST['news_id']) ? (int)$_POST['news_id'] : 0;
            $content = isset($_POST['content']) ? trim($_POST['content']) : '';
            $userId = $_SESSION['users_id'];
    
            // Validate cơ bản
            if (empty($content) || $newsId <= 0) {
                echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ. Có thể bạn thiếu News ID. Giá trị nhận được: ' . $newsId]);
                return;
            }
    
            // 3. Gọi Model để lưu vào Database
            $isInserted = $this->commentModel->addComment($newsId, $userId, $content);
    
            if ($isInserted) {
                echo json_encode(['success' => true, 'message' => 'Bình luận của bạn đã được gửi thành công!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Lệnh chạy thành công nhưng dữ liệu không vào DB. Vui lòng thử lại!']);
            }

        } catch (PDOException $e) {
            // Bắt lỗi liên quan đến Database (Sai bảng, thiếu cột, lỗi khóa ngoại...)
            echo json_encode(['success' => false, 'message' => 'LỖI CƠ SỞ DỮ LIỆU: ' . $e->getMessage()]);
        } catch (Error $e) {
            // Bắt lỗi cú pháp PHP (Ví dụ: Class CommentModel không tồn tại, sai tên hàm...)
            echo json_encode(['success' => false, 'message' => 'LỖI CODE PHP: ' . $e->getMessage()]);
        } catch (Exception $e) {
            // Bắt các lỗi chung khác
            echo json_encode(['success' => false, 'message' => 'LỖI HỆ THỐNG: ' . $e->getMessage()]);
        }
    }
}

