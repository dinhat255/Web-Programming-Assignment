<?php require_once APP_ROOT . '/views/components/header.php'; ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    /* =========================================
       CUSTOM STYLES THÊM VÀO ĐỂ LÀM ĐẸP GIAO DIỆN
       ========================================= */
    .section-title {
        color: var(--sachhay-red);
        font-weight: 700;
        margin-bottom: 30px;
        position: relative;
        padding-bottom: 15px;
        text-align: center;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: linear-gradient(to right, var(--sachhay-red), var(--sachhay-orange));
        border-radius: 2px;
    }

    /* --- Hero Slider (Swiper) --- */
    .hero-swiper {
        width: 100%;
        height: 500px;
        border-radius: 12px;
        margin-bottom: 40px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .hero-slide {
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        position: relative;
    }

    .hero-slide::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to right, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 100%);
    }

    .hero-content {
        position: relative;
        z-index: 10;
        color: white;
        padding: 0 50px;
        max-width: 700px;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 15px;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
    }

    .hero-subtitle {
        font-size: 1.2rem;
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .btn-hero {
        background-color: var(--sachhay-orange);
        color: white;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
        display: inline-block;
    }

    .btn-hero:hover {
        background-color: var(--sachhay-red);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(200, 155, 92, 0.4);
    }

    /* --- Category Cards --- */
    .category-section {
        background-color: white;
        padding: 40px 0;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .category-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        border-radius: 10px;
        transition: 0.3s;
        text-decoration: none;
        color: var(--sachhay-dark);
        border: 1px solid #f0f0f0;
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(139, 94, 60, 0.1);
        border-color: var(--sachhay-orange);
    }

    .category-icon {
        font-size: 2.5rem;
        color: var(--sachhay-red);
        margin-bottom: 10px;
        transition: 0.3s;
    }

    .category-card:hover .category-icon {
        transform: scale(1.1);
    }

    /* --- Product Cards --- */
    .product-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        transition: 0.3s;
        display: flex;
        flex-direction: column;
        height: 100%;
        text-decoration: none;
        color: inherit;
        border: 1px solid #eee;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.1);
        border-color: var(--sachhay-orange);
    }

    .product-image {
        height: 250px;
        padding: 20px;
        background: #fdfbf9;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-image img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
        transition: 0.5s;
    }

    .product-card:hover .product-image img {
        transform: scale(1.05);
    }

    .product-info {
        padding: 15px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-title {
        font-weight: bold;
        font-size: 1.1rem;
        margin-bottom: 5px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-author {
        color: #777;
        font-size: 0.9rem;
        margin-bottom: 10px;
    }

    .product-price-wrap {
        margin-top: auto;
    }

    .product-price {
        color: var(--sachhay-red);
        font-weight: 700;
        font-size: 1.2rem;
    }

    .product-old-price {
        text-decoration: line-through;
        color: #aaa;
        font-size: 0.9rem;
        margin-left: 10px;
    }

    /* --- Parallax Promotion Section --- */
    .promotion-parallax {
        background: linear-gradient(rgba(139, 94, 60, 0.85), rgba(43, 33, 27, 0.85)), url('<?= BASE_URL ?>images/home-page/library.jpg') center center;
        background-attachment: fixed; /* Tạo hiệu ứng Parallax */
        background-size: cover;
        color: white;
        padding: 80px 0;
        border-radius: 12px;
        text-align: center;
        margin: 60px 0;
    }

    .counter-item h3 {
        font-size: 3rem;
        font-weight: 900;
        color: var(--sachhay-orange);
        margin-bottom: 5px;
    }

    /* --- News Cards --- */
    .news-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: 0.3s;
    }
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    .news-card img {
        height: 200px;
        object-fit: cover;
    }
</style>

<div class="container mt-4">
    
    <div class="swiper hero-swiper" data-aos="fade-in">
        <div class="swiper-wrapper">
            <div class="swiper-slide hero-slide" style="background-image: url('<?= BASE_URL ?>images/home-page/library.jpg');">
                <div class="hero-content">
                    <h1 class="hero-title" data-aos="slide-right" data-aos-delay="200">SachHay <br> Tri thức cho cuộc sống</h1>
                    <p class="hero-subtitle" data-aos="slide-right" data-aos-delay="400">Hệ thống nhà sách trực tuyến hàng đầu Việt Nam. Hàng ngàn đầu sách đa dạng, giao hàng nhanh chóng, ưu đãi ngập tràn.</p>
                    <a href="<?= BASE_URL ?>product" class="btn-hero" data-aos="zoom-in" data-aos-delay="600">Mua sắm ngay <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="swiper-slide hero-slide" style="background-image: url('<?= BASE_URL ?>images/home-page/doc-sach-hieu-qua.jpg');">
                <div class="hero-content">
                    <h1 class="hero-title">Đánh thức tiềm năng của bạn</h1>
                    <p class="hero-subtitle">Khám phá kho tàng sách phát triển bản thân và kỹ năng sống giúp bạn trở thành phiên bản tốt nhất của chính mình.</p>
                    <a href="<?= BASE_URL ?>product" class="btn-hero">Khám phá <i class="fas fa-book-open ms-2"></i></a>
                </div>
            </div>
        </div>
        <div class="swiper-button-next" style="color: var(--sachhay-orange);"></div>
        <div class="swiper-button-prev" style="color: var(--sachhay-orange);"></div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="category-section mb-5" data-aos="fade-up">
        <h2 class="section-title">Danh mục nổi bật</h2>
        <div class="row px-4">
            <div class="col-lg-2 col-md-4 col-6 mb-3" data-aos="zoom-in" data-aos-delay="100">
                <a href="#" class="category-card">
                    <i class="fas fa-book category-icon"></i>
                    <span class="fw-bold">Văn học</span>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3" data-aos="zoom-in" data-aos-delay="200">
                <a href="#" class="category-card">
                    <i class="fas fa-briefcase category-icon"></i>
                    <span class="fw-bold">Kinh tế</span>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3" data-aos="zoom-in" data-aos-delay="300">
                <a href="#" class="category-card">
                    <i class="fas fa-brain category-icon"></i>
                    <span class="fw-bold">Tâm lý</span>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3" data-aos="zoom-in" data-aos-delay="400">
                <a href="#" class="category-card">
                    <i class="fas fa-child category-icon"></i>
                    <span class="fw-bold">Thiếu nhi</span>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3" data-aos="zoom-in" data-aos-delay="500">
                <a href="#" class="category-card">
                    <i class="fas fa-language category-icon"></i>
                    <span class="fw-bold">Ngoại ngữ</span>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3" data-aos="zoom-in" data-aos-delay="600">
                <a href="#" class="category-card">
                    <i class="fas fa-graduation-cap category-icon"></i>
                    <span class="fw-bold">Giáo khoa</span>
                </a>
            </div>
        </div>
    </div>

    <div class="mb-5" data-aos="fade-up">
        <h2 class="section-title">Sản phẩm bán chạy</h2>
        <div class="swiper product-swiper" style="padding: 15px 5px;">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#" class="product-card">
                        <div class="product-image">
                            <img src="<?= BASE_URL ?>images/home-page/dac-nhan-tam.jpg" alt="Đắc Nhân Tâm" loading="lazy">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Đắc Nhân Tâm</h3>
                            <div class="product-author">Dale Carnegie</div>
                            <div class="product-price-wrap">
                                <span class="product-price">85,000đ</span>
                                <span class="product-old-price">100,000đ</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="product-card">
                        <div class="product-image">
                            <img src="<?= BASE_URL ?>images/home-page/nha-gia-kim.jpg" alt="Nhà Giả Kim" loading="lazy">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Nhà Giả Kim</h3>
                            <div class="product-author">Paulo Coelho</div>
                            <div class="product-price-wrap">
                                <span class="product-price">75,000đ</span>
                                <span class="product-old-price">90,000đ</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="product-card">
                        <div class="product-image">
                            <img src="<?= BASE_URL ?>images/home-page/nha-lanh-dao-khong-chuc-danh.jpg" alt="Nhà Lãnh Đạo Không Chức Danh" loading="lazy">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Nhà Lãnh Đạo Không Chức Danh</h3>
                            <div class="product-author">Robin Sharma</div>
                            <div class="product-price-wrap">
                                <span class="product-price">95,000đ</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="product-card">
                        <div class="product-image">
                            <img src="<?= BASE_URL ?>images/home-page/doi-ngan-dung-ngu-dai.jpg" alt="Đời Ngắn Đừng Ngủ Dài" loading="lazy">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Đời Ngắn Đừng Ngủ Dài</h3>
                            <div class="product-author">Robin Sharma</div>
                            <div class="product-price-wrap">
                                <span class="product-price">88,000đ</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="product-card">
                        <div class="product-image">
                            <img src="<?= BASE_URL ?>images/home-page/tu-duy-nhanh-va-cham.jpg" alt="Tư Duy Nhanh và Chậm" loading="lazy">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Tư Duy Nhanh Và Chậm</h3>
                            <div class="product-author">Daniel Kahneman</div>
                            <div class="product-price-wrap">
                                <span class="product-price">120,000đ</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="swiper-pagination position-relative mt-3"></div>
        </div>
    </div>

    <div class="promotion-parallax" data-aos="fade-up">
        <div class="container">
            <h2 class="mb-3 fw-bold" style="font-size: 2.5rem;">Tháng Hội Sách - Giảm Giá Sập Sàn</h2>
            <p class="mb-5 fs-5">Nhập mã <strong>SACHHAY50</strong> để được giảm ngay 50% cho tất cả đầu sách ngoại văn.</p>
            
            <div class="row text-center mt-4">
                <div class="col-md-3 col-6 counter-item mb-4" data-aos="fade-up" data-aos-delay="100">
                    <h3>100+</h3>
                    <p>Cửa hàng toàn quốc</p>
                </div>
                <div class="col-md-3 col-6 counter-item mb-4" data-aos="fade-up" data-aos-delay="200">
                    <h3>50K+</h3>
                    <p>Tựa sách đa dạng</p>
                </div>
                <div class="col-md-3 col-6 counter-item mb-4" data-aos="fade-up" data-aos-delay="300">
                    <h3>1M+</h3>
                    <p>Khách hàng tin dùng</p>
                </div>
                <div class="col-md-3 col-6 counter-item mb-4" data-aos="fade-up" data-aos-delay="400">
                    <h3>24/7</h3>
                    <p>Hỗ trợ khách hàng</p>
                </div>
            </div>
            
            <a href="#" class="btn-hero mt-3">Săn mã giảm giá ngay</a>
        </div>
    </div>

    <div class="mb-5">
        <h2 class="section-title" data-aos="fade-up">Tin tức & Bài viết</h2>
        <div class="row">
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card news-card h-100">
                    <img src="<?= BASE_URL ?>images/home-page/loi-ich-doc-sach.jpg" class="card-img-top" alt="Lợi ích đọc sách" loading="lazy">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Lợi ích của việc đọc sách mỗi ngày</h5>
                        <p class="card-text text-muted">Đọc sách không chỉ giúp mở rộng kiến thức mà còn cải thiện trí nhớ, tăng khả năng tập trung hiệu quả...</p>
                        <a href="#" class="btn btn-outline-danger mt-auto align-self-start">Đọc tiếp <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card news-card h-100">
                    <img src="<?= BASE_URL ?>images/home-page/top-10-cuon-sach-nen-doc.jpg" class="card-img-top" alt="Top 10 sách" loading="lazy">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Top 10 cuốn sách nên đọc trong đời</h5>
                        <p class="card-text text-muted">Danh sách 10 cuốn sách kinh điển mà mỗi người nên đọc ít nhất một lần để thay đổi tư duy và cuộc sống...</p>
                        <a href="#" class="btn btn-outline-danger mt-auto align-self-start">Đọc tiếp <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card news-card h-100">
                    <img src="<?= BASE_URL ?>images/home-page/doc-sach-hieu-qua.jpg" class="card-img-top" alt="Đọc sách hiệu quả" loading="lazy">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Phương pháp đọc sách siêu tốc</h5>
                        <p class="card-text text-muted">Làm thế nào để đọc một cuốn sách trong thời gian ngắn mà vẫn ghi nhớ được toàn bộ nội dung quan trọng?</p>
                        <a href="#" class="btn btn-outline-danger mt-auto align-self-start">Đọc tiếp <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Khởi tạo AOS Animation (Chỉ chạy 1 lần khi cuộn tới)
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });

        // 2. Khởi tạo Hero Slider
        const heroSwiper = new Swiper('.hero-swiper', {
            loop: true,
            effect: 'fade',
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        // 3. Khởi tạo Product Carousel (Vuốt ngang trên điện thoại, hiển thị 4 cột trên PC)
        const productSwiper = new Swiper('.product-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoplay: {
                delay: 3000,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                // Trên điện thoại (Mobile)
                576: {
                    slidesPerView: 2,
                },
                // Trên iPad (Tablet)
                768: {
                    slidesPerView: 3,
                },
                // Trên PC
                992: {
                    slidesPerView: 4,
                }
            }
        });
    });
</script>

<?php require_once APP_ROOT . '/views/components/footer.php'; ?>