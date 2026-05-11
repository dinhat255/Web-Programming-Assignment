<?php require_once APP_ROOT . '/views/components/header.php'; ?>

<style>
    /* CSS Bổ sung cho trang chủ */
    .hero-section {
        background: linear-gradient(rgba(15, 23, 42, 0.6), rgba(15, 23, 42, 0.6)), url('<?= BASE_URL ?>images/home-page/library.jpg') no-repeat center center;
        background-size: cover; height: 400px; display: flex; align-items: center; color: white;
        border-radius: 16px; margin-bottom: 40px; margin-top: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    body.cyber-mode .hero-section { border: 1px solid #00f2ff; box-shadow: 0 0 20px rgba(0,242,255,0.2); }

    .hero-title { font-size: 3rem; font-weight: 800; margin-bottom: 15px; text-shadow: 2px 2px 8px rgba(0,0,0,0.8); }
    .hero-subtitle { font-size: 1.2rem; margin-bottom: 30px; text-shadow: 1px 1px 4px rgba(0,0,0,0.8); }

    .btn-hero { background-color: var(--sachhay-orange); color: white; padding: 12px 30px; border-radius: 30px; font-weight: 600; text-decoration: none; transition: 0.3s; display: inline-block; }
    .btn-hero:hover { background-color: #fff; color: var(--sachhay-dark); transform: translateY(-3px); }

    .section-title { color: var(--sachhay-red); font-weight: 700; margin-bottom: 30px; text-align: center; position: relative; padding-bottom: 15px; }
    .section-title::after { content: ''; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80px; height: 4px; background: var(--sachhay-red); border-radius: 2px; }

    /* ---- THẺ SÁCH SIÊU GỌN CHUYÊN NGHIỆP ---- */
    .product-card {
        background: var(--card-bg); border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: 0.3s; display: block; text-decoration: none; color: inherit; position: relative; border: 1px solid rgba(0,0,0,0.05);
    }
    .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); border-color: var(--sachhay-orange); }
    
    body.cyber-mode .product-card { border-color: rgba(0,242,255,0.2); }
    body.cyber-mode .product-card:hover { box-shadow: 0 10px 25px rgba(0,242,255,0.3); border-color: #00f2ff; }

    /* Badge "HOT" */
    .product-card::before {
        content: 'HOT'; position: absolute; top: 10px; left: 10px; background: #ef4444; color: white;
        font-size: 10px; font-weight: bold; padding: 4px 8px; border-radius: 15px; z-index: 5;
    }

    .product-image { height: 160px; padding: 15px; display: flex; align-items: center; justify-content: center; background: #fff; }
    body.cyber-mode .product-image { background: #0f172a; }
    .product-image img { max-height: 130px; object-fit: contain; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1)); transition: 0.3s; }
    .product-card:hover .product-image img { transform: scale(1.08); }

    .product-info { padding: 15px; text-align: center; }
    .product-title { font-weight: 700; font-size: 0.95rem; height: 1.2em; -webkit-line-clamp: 1; overflow: hidden; margin-bottom: 5px; }
    .product-author { color: var(--sachhay-gray); font-size: 0.8rem; margin-bottom: 8px; height: 1.2em; overflow: hidden; }
    .product-price { color: var(--sachhay-red); font-weight: 800; font-size: 1.1rem; }

    /* Vòng quay may mắn Button */
    .lucky-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; color: white;
        padding: 12px 30px; border-radius: 50px; font-weight: bold; cursor: pointer; transition: 0.3s; box-shadow: 0 5px 15px rgba(118, 75, 162, 0.4);
    }
    .lucky-btn:hover { transform: scale(1.05); box-shadow: 0 8px 25px rgba(118, 75, 162, 0.6); }
    body.cyber-mode .lucky-btn { background: linear-gradient(135deg, #00f2ff 0%, #7000ff 100%); box-shadow: 0 0 15px #00f2ff; }
</style>

<div class="container overflow-hidden">
    <div class="hero-section" data-aos="zoom-out" data-aos-duration="1000">
        <div class="hero-content p-5">
            <h1 class="hero-title">Kho tàng tri thức vô tận</h1>
            <p class="hero-subtitle">Hơn 50,000 đầu sách đang chờ bạn khám phá. Giao hàng thần tốc 2h.</p>
            <a href="<?= BASE_URL ?>product" class="btn-hero"><i class="fas fa-shopping-bag"></i> Khám phá ngay</a>
        </div>
    </div>

    <div class="text-center mb-5" data-aos="fade-up">
        <button onclick="pickRandomBook()" class="lucky-btn">
            <i class="fas fa-dice"></i> Hôm nay đọc gì? (Gợi ý ngẫu nhiên)
        </button>
    </div>

    <div class="row mb-5" data-aos="fade-up">
        <div class="col-md-12"><h2 class="section-title">Sản phẩm bán chạy</h2></div>
        
        <?php
        // Mảng sách tự tạo (Dùng index làm ID giả)
        $books = [
            ['id' => 1, 'title' => 'Đắc Nhân Tâm', 'author' => 'Dale Carnegie', 'price' => '85,000đ', 'img' => 'dac-nhan-tam.jpg'],
            ['id' => 2, 'title' => 'Nhà Giả Kim', 'author' => 'Paulo Coelho', 'price' => '75,000đ', 'img' => 'nha-gia-kim.jpg'],
            ['id' => 3, 'title' => 'Nhà Lãnh Đạo Không Chức Danh', 'author' => 'Robin Sharma', 'price' => '95,000đ', 'img' => 'nha-lanh-dao-khong-chuc-danh.jpg'],
            ['id' => 4, 'title' => 'Đời Ngắn Đừng Ngủ Dài', 'author' => 'Robin Sharma', 'price' => '88,000đ', 'img' => 'doi-ngan-dung-ngu-dai.jpg']
        ];
        foreach($books as $idx => $b): ?>
        <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="<?= $idx * 100 ?>">
            <a href="<?= BASE_URL ?>product/detail?id=<?= $b['id'] ?>" 
               class="product-card book-item" 
               data-title="<?= $b['title'] ?>"
               data-image="<?= BASE_URL ?>images/home-page/<?= $b['img'] ?>"
               data-url="<?= BASE_URL ?>product/detail?id=<?= $b['id'] ?>">
                <div class="product-image">
                    <img src="<?= BASE_URL ?>images/home-page/<?= $b['img'] ?>" alt="<?= $b['title'] ?>">
                </div>
                <div class="product-info">
                    <h3 class="product-title"><?= $b['title'] ?></h3>
                    <div class="product-author"><?= $b['author'] ?></div>
                    <div class="product-price"><?= $b['price'] ?></div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="row mb-5" data-aos="fade-up">
        <div class="col-md-12"><h2 class="section-title">Sách mới phát hành</h2></div>
        
        <?php
        $newBooks = [
            ['id' => 5, 'title' => 'Tư Duy Nhanh và Chậm', 'author' => 'Daniel Kahneman', 'price' => '120,000đ', 'img' => 'tu-duy-nhanh-va-cham.jpg'],
            ['id' => 6, 'title' => 'Tư Duy Tích Cực', 'author' => 'Trần Đình Hoành', 'price' => '92,000đ', 'img' => 'tu-duy-tich-cuc.jpg'],
            ['id' => 7, 'title' => 'Hiểu Về Trái Tim', 'author' => 'Minh Niệm', 'price' => '75,000đ', 'img' => 'hieu-ve-trai-tim.jpg'],
            ['id' => 8, 'title' => 'Dám Bị Ghét', 'author' => 'Kishimi Ichiro', 'price' => '85,000đ', 'img' => 'dam-bi-ghet.jpg']
        ];
        foreach($newBooks as $idx => $nb): ?>
        <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="<?= $idx * 100 ?>">
            <a href="<?= BASE_URL ?>product/detail?id=<?= $nb['id'] ?>" 
               class="product-card book-item" 
               data-title="<?= $nb['title'] ?>"
               data-image="<?= BASE_URL ?>images/home-page/<?= $nb['img'] ?>"
               data-url="<?= BASE_URL ?>product/detail?id=<?= $nb['id'] ?>">
                <div class="product-image">
                    <img src="<?= BASE_URL ?>images/home-page/<?= $nb['img'] ?>" alt="<?= $nb['title'] ?>">
                </div>
                <div class="product-info">
                    <h3 class="product-title"><?= $nb['title'] ?></h3>
                    <div class="product-author"><?= $nb['author'] ?></div>
                    <div class="product-price"><?= $nb['price'] ?></div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ once: true, offset: 50 });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function pickRandomBook() {
        const books = document.querySelectorAll('.book-item');
        if(books.length === 0) return;
        
        // Random 1 cuốn sách
        const randomIdx = Math.floor(Math.random() * books.length);
        const selectedBook = books[randomIdx];
        
        // Lấy Dữ liệu từ thẻ HTML
        const title = selectedBook.getAttribute('data-title');
        const imageUrl = selectedBook.getAttribute('data-image');
        const detailUrl = selectedBook.getAttribute('data-url');
        
        const isCyber = document.body.classList.contains('cyber-mode');

        // Hiện Popup tích hợp Hình ảnh và Nút
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: 'Hôm nay bạn nên đọc:',
                text: title,
                imageUrl: imageUrl,       // Hiện ảnh sách
                imageHeight: 200,         
                imageAlt: title,
                showCancelButton: true,   // Hiện nút Hủy/Quay lại
                confirmButtonText: '<i class="fas fa-book-open"></i> Xem chi tiết',
                cancelButtonText: 'Quay lại',
                confirmButtonColor: isCyber ? '#7000ff' : '#8B5E3C',
                cancelButtonColor: '#6c757d',
                background: isCyber ? '#1e293b' : '#fff',
                color: isCyber ? '#00f2ff' : '#000'
            }).then((result) => {
                // Nếu bấm nút "Xem chi tiết", tự động chuyển trang
                if (result.isConfirmed) {
                    window.location.href = detailUrl;
                }
            });
        } else {
            if(confirm("Hôm nay bạn nên đọc: " + title + "\nBạn có muốn xem chi tiết cuốn sách này không?")) {
                window.location.href = detailUrl;
            }
        }
    }
</script>

<?php require_once APP_ROOT . '/views/components/footer.php'; ?>