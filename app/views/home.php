<?php require_once APP_ROOT . '/views/components/header.php'; ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<style>
    html { scroll-behavior: smooth; }
    body { overflow-x: hidden; }

    /* 1. HERO BANNER */
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?= BASE_URL ?>images/home-page/library.jpg') no-repeat center center;
        background-size: cover; height: 420px; display: flex; align-items: center; color: white;
        border-radius: 15px; margin: 20px 0; position: relative;
    }
    .hero-title { font-size: 2.8rem; font-weight: 800; text-shadow: 2px 2px 10px rgba(0,0,0,0.5); }
    .scroll-down { position: absolute; bottom: 15px; left: 50%; transform: translateX(-50%); animation: bounce 2s infinite; font-size: 25px; color: white; }
    @keyframes bounce { 0%, 20%, 50%, 80%, 100% {transform: translateY(0) translateX(-50%);} 40% {transform: translateY(-10px) translateX(-50%);} }

    /* 2. VOUCHER SECTION */
    .voucher-card {
        background: #fff; border: 1px dashed #8B5E3C; border-radius: 10px; padding: 15px;
        display: flex; align-items: center; justify-content: space-between; transition: 0.3s;
    }
    .voucher-card:hover { transform: scale(1.02); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .btn-copy { background: #8B5E3C; color: #white; border: none; padding: 5px 15px; border-radius: 20px; font-size: 12px; color: white; }

    /* 3. BẢNG XẾP HẠNG BÁN CHẠY (STYLE FAHASA) */
    .ranking-container { background: #fff; border-radius: 12px; padding: 20px; border: 1px solid #eee; }
    .ranking-item { 
        display: flex; align-items: center; padding: 15px 0; 
        border-bottom: 1px solid #f1f1f1; transition: 0.3s; text-decoration: none; color: inherit;
    }
    .ranking-item:last-child { border-bottom: none; }
    .ranking-item:hover { background: #fffcf9; }
    .rank-number { 
        font-size: 24px; font-weight: 900; width: 40px; color: #ccc; 
        font-family: 'Orbitron', sans-serif; /* Style số hiện đại */
    }
    .rank-1 { color: #F52F32; font-size: 32px; } /* Top 1 màu đỏ nổi bật */
    .rank-2 { color: #FF8C00; }
    .rank-3 { color: #FFD700; }
    .rank-img { width: 60px; height: 80px; object-fit: contain; margin: 0 15px; }
    .rank-info h4 { font-size: 14px; font-weight: 700; margin: 0; line-height: 1.4; }
    .rank-price { color: #F52F32; font-weight: 800; font-size: 15px; margin-top: 5px; }

    /* 4. COMPACT PRODUCT CARDS */
    .product-card {
        background: #fff; border-radius: 8px; border: 1px solid #eee; 
        padding: 10px; transition: 0.3s; text-decoration: none; color: inherit; display: block;
    }
    .product-card:hover { border-color: #8B5E3C; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transform: translateY(-5px); }
    .product-img-box { height: 140px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px; }
    .product-img-box img { max-height: 100%; transition: 0.3s; }
    .product-card h3 { font-size: 13px; font-weight: 700; height: 32px; overflow: hidden; margin-bottom: 5px; text-align: center; }
    .product-p { color: #F52F32; font-weight: 800; text-align: center; margin: 0; }

    .section-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-left: 4px solid #8B5E3C; padding-left: 15px; }
    .section-head h2 { font-size: 20px; font-weight: 800; text-transform: uppercase; margin: 0; }

    /* QUICK CATEGORIES (TEXT ONLY) */
    .quick-categories {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 40px;
        padding: 10px 0;
    }

    .category-tag {
        background: #fff;
        color: #8B5E3C;
        border: 1px solid #8B5E3C;
        padding: 8px 20px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .category-tag:hover {
        background: #8B5E3C;
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(139, 94, 60, 0.3);
    }

    /* Hiệu ứng Cyber Mode cho Category Tag */
    body.cyber-mode .category-tag {
        background: transparent;
        color: #00f2ff;
        border-color: #00f2ff;
        box-shadow: 0 0 10px rgba(0,242,255,0.1);
    }
    body.cyber-mode .category-tag:hover {
        background: #00f2ff;
        color: #000;
        box-shadow: 0 0 20px #00f2ff;
    }


</style>

<div class="container">
    <div class="hero-section" data-aos="fade-in">
        <div class="p-5">
            <h1 class="hero-title" data-aos="fade-right" data-aos-delay="300">Thế giới sách trong<br>tầm tay bạn</h1>
            <p data-aos="fade-right" data-aos-delay="500">Hàng ngàn đầu sách mới đang chờ bạn khám phá.</p>
            <a href="<?= BASE_URL ?>index.php?url=product" class="btn-hero" data-aos="zoom-in" data-aos-delay="700">Mua ngay</a>
        </div>
        <div class="quick-categories" data-aos="fade-up" data-aos-delay="200">
        <a href="<?= BASE_URL ?>index.php?url=product&cat=new" class="category-tag">Sách mới</a>
        <a href="<?= BASE_URL ?>index.php?url=product&cat=old" class="category-tag">Sách cũ</a>
        <a href="<?= BASE_URL ?>index.php?url=product&cat=toy" class="category-tag">Đồ chơi</a>
        <a href="<?= BASE_URL ?>index.php?url=product&cat=office" class="category-tag">Văn phòng phẩm</a>
        <a href="<?= BASE_URL ?>index.php?url=product&cat=gift" class="category-tag">Quà tặng</a>
        <a href="<?= BASE_URL ?>index.php?url=product&cat=accessary" class="category-tag">Phụ kiện</a>
    </div>
        <a href="#vouchers" class="scroll-down"><i class="fas fa-chevron-down"></i></a>
    </div>

    <div id="vouchers" class="row mb-5" data-aos="fade-up">
        <div class="col-md-4 mb-3">
            <div class="voucher-card">
                <div><small>Giảm 20K</small><br><b>SACHHAY20</b></div>
                <button class="btn-copy" onclick="copyCode('SACHHAY20', this)">Copy</button>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="voucher-card">
                <div><small>Freeship</small><br><b>FREE300</b></div>
                <button class="btn-copy" onclick="copyCode('FREE300', this)">Copy</button>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="voucher-card" style="border-style: solid; background: #fffcf0;">
                <div><small>Đặc biệt</small><br><b>LUCKY10</b></div>
                <button class="btn-copy" onclick="copyCode('LUCKY10', this)">Copy</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 mb-5" data-aos="fade-right">
            <div class="section-head"><h2>BXH Bán Chạy</h2></div>
            <div class="ranking-container">
                <?php
                $ranking = [
                    ['id'=>1, 't'=>'Đắc Nhân Tâm', 'p'=>'85,000đ', 'img'=>'dac-nhan-tam.jpg'],
                    ['id'=>2, 't'=>'Nhà Giả Kim', 'p'=>'75,000đ', 'img'=>'nha-gia-kim.jpg'],
                    ['id'=>3, 't'=>'Dám Bị Ghét', 'p'=>'85,000đ', 'img'=>'dam-bi-ghet.jpg'],
                    ['id'=>7, 't'=>'Hiểu Về Trái Tim', 'p'=>'75,000đ', 'img'=>'hieu-ve-trai-tim.jpg'],
                    ['id'=>4, 't'=>'Đời Ngắn Đừng Ngủ Dài', 'p'=>'88,000đ', 'img'=>'doi-ngan-dung-ngu-dai.jpg']
                ];
                foreach($ranking as $i => $r): ?>
                <a href="<?= BASE_URL ?>index.php?url=product/detail&id=<?= $r['id'] ?>" class="ranking-item" data-aos="fade-up" data-aos-delay="<?= $i*100 ?>">
                    <div class="rank-number <?= ($i<3)?'rank-'.($i+1):'' ?>">0<?= $i+1 ?></div>
                    <img src="<?= BASE_URL ?>images/home-page/<?= $r['img'] ?>" class="rank-img">
                    <div class="rank-info">
                        <h4><?= $r['t'] ?></h4>
                        <div class="rank-price"><?= $r['p'] ?></div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-lg-8" data-aos="fade-left">
            <div class="section-head">
                <h2>Danh mục sản phẩm</h2>
                <button onclick="pickRandomBook()" class="btn btn-sm btn-dark" style="border-radius:20px;"><i class="fas fa-dice"></i> Gợi ý sách</button>
            </div>
            
            <div class="row">
                <?php
                $cats = [
                    ['id'=>5, 't'=>'Tư Duy Nhanh & Chậm', 'p'=>'120,000đ', 'img'=>'tu-duy-nhanh-va-cham.jpg'],
                    ['id'=>6, 't'=>'Tư Duy Tích Cực', 'p'=>'92,000đ', 'img'=>'tu-duy-tich-cuc.jpg'],
                    ['id'=>8, 't'=>'Dám Bị Ghét', 'p'=>'85,000đ', 'img'=>'dam-bi-ghet.jpg'],
                    ['id'=>1, 't'=>'Đắc Nhân Tâm', 'p'=>'85,000đ', 'img'=>'dac-nhan-tam.jpg'],
                    ['id'=>2, 't'=>'Nhà Giả Kim', 'p'=>'75,000đ', 'img'=>'nha-gia-kim.jpg'],
                    ['id'=>4, 't'=>'Đời Ngắn Đừng Ngủ Dài', 'p'=>'88,000đ', 'img'=>'doi-ngan-dung-ngu-dai.jpg']
                ];
                foreach($cats as $idx => $c): ?>
                <div class="col-md-4 col-6 mb-4" data-aos="zoom-in" data-aos-delay="<?= $idx*50 ?>">
                    <a href="<?= BASE_URL ?>index.php?url=product/detail&id=<?= $c['id'] ?>" class="product-card book-item" data-title="<?= $c['t'] ?>" data-image="<?= BASE_URL ?>images/home-page/<?= $c['img'] ?>" data-url="<?= BASE_URL ?>index.php?url=product/detail&id=<?= $c['id'] ?>">
                        <div class="product-img-box"><img src="<?= BASE_URL ?>images/home-page/<?= $c['img'] ?>"></div>
                        <h3><?= $c['t'] ?></h3>
                        <p class="product-p"><?= $c['p'] ?></p>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // 1. Khởi tạo hiệu ứng lướt AOS
    AOS.init({ duration: 800, easing: 'ease-in-out', once: true });

    // 2. Hàm Copy Voucher
    function copyCode(code, btn) {
        navigator.clipboard.writeText(code);
        const oldText = btn.innerText;
        btn.innerText = "Đã lưu!";
        btn.style.background = "#28a745";
        setTimeout(() => { btn.innerText = oldText; btn.style.background = ""; }, 2000);
    }

    // 3. Gợi ý sách ngẫu nhiên
    function pickRandomBook() {
        const books = document.querySelectorAll('.book-item');
        const rand = Math.floor(Math.random() * books.length);
        const b = books[rand];
        
        Swal.fire({
            title: 'Hôm nay bạn nên đọc:',
            text: b.getAttribute('data-title'),
            imageUrl: b.getAttribute('data-image'),
            imageHeight: 200,
            showCancelButton: true,
            confirmButtonText: 'Xem chi tiết',
            cancelButtonText: 'Quay lại',
            confirmButtonColor: '#8B5E3C'
        }).then((result) => {
            if (result.isConfirmed) window.location.href = b.getAttribute('data-url');
        });
    }
</script>

<?php require_once APP_ROOT . '/views/components/footer.php'; ?>