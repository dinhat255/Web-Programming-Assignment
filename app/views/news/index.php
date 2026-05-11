<?php require_once APP_ROOT . '/views/components/header.php'; ?>

<style>
    /* BREADCRUMB & TITLE */
    .breadcrumb-section { background-color: var(--sachhay-light-gray); padding: 15px 0; margin-bottom: 30px; }
    .breadcrumb { margin-bottom: 0; padding: 0; background: none; }
    .breadcrumb-item a { color: var(--sachhay-gray); text-decoration: none; }
    .page-title { color: var(--sachhay-red); font-weight: 700; margin-bottom: 30px; padding-bottom: 15px; position: relative; }
    .page-title::after { content: ''; position: absolute; bottom: 0; left: 0; width: 80px; height: 3px; background-color: var(--sachhay-orange); }

    /* LỌC & TÌM KIẾM TỔNG QUAN */
    .filter-search-wrapper { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 40px; display: flex; flex-wrap: wrap; gap: 20px; align-items: center; justify-content: space-between; }
    .search-input { position: relative; flex: 1; min-width: 250px; }
    .search-input input { width: 100%; padding: 12px 45px 12px 20px; border: 1px solid #e0e0e0; border-radius: 30px; font-size: 15px; outline: none; transition: border-color 0.3s; }
    .search-input input:focus { border-color: var(--sachhay-orange); }
    .search-input button { position: absolute; right: 5px; top: 5px; background: var(--sachhay-red); border: none; color: white; width: 38px; height: 38px; border-radius: 50%; cursor: pointer; transition: 0.3s; }
    .search-input button:hover { background: #a81b20; transform: scale(1.05); }
    
    .category-filter { display: flex; gap: 10px; flex-wrap: wrap; flex: 2; }
    .category-btn { padding: 8px 18px; background-color: var(--sachhay-light-gray); border: none; border-radius: 20px; color: var(--sachhay-dark); font-size: 14px; cursor: pointer; transition: all 0.3s; text-decoration: none; }
    .category-btn:hover, .category-btn.active { background-color: var(--sachhay-red); color: white; box-shadow: 0 4px 10px rgba(201, 33, 39, 0.3); }

    .fahasa-banner-wrapper { border-radius: 12px; overflow: hidden; margin-bottom: 40px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); position: relative; }
    .fahasa-banner-item { position: relative; height: 380px; width: 100%; display: block; }
    .fahasa-banner-img { width: 100%; height: 100%; object-fit: cover; }
    
    .fahasa-banner-overlay { position: absolute; bottom: 0; left: 0; right: 0; padding: 40px 30px 25px; background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%); color: white; }
    .fahasa-banner-title { font-size: 22px; font-weight: 700; margin-bottom: 5px; color: white; text-shadow: 1px 1px 3px rgba(0,0,0,0.6); display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; }
    .fahasa-banner-meta { font-size: 13px; opacity: 0.9; }

    .fahasa-indicators { bottom: 10px; margin-bottom: 0; }
    .fahasa-indicators button { width: 10px !important; height: 10px !important; border-radius: 50% !important; background-color: white !important; opacity: 0.6 !important; margin: 0 5px !important; border: none !important; transition: all 0.3s ease !important; }
    .fahasa-indicators button.active { width: 30px !important; border-radius: 10px !important; background-color: var(--sachhay-red) !important; opacity: 1 !important; }

    .fahasa-control { width: 45px; height: 45px; background: rgba(255,255,255,0.9); border-radius: 50%; top: 50%; transform: translateY(-50%); opacity: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.2); transition: all 0.3s; z-index: 10; }
    .fahasa-banner-wrapper:hover .fahasa-control { opacity: 1; }
    .fahasa-control-prev { left: 20px; }
    .fahasa-control-next { right: 20px; }
    .fahasa-control:hover { background: white; box-shadow: 0 4px 12px rgba(0,0,0,0.3); }
    .fahasa-control-icon { color: #555; font-size: 18px; }

    @media (max-width: 768px) {
        .fahasa-banner-item { height: 200px; }
        .fahasa-banner-title { font-size: 16px; }
        .fahasa-control { display: none;  }
    }

    /* GRID & THẺ TIN TỨC */
    .news-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px; margin-bottom: 40px; }
    .news-card { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s; text-decoration: none; color: inherit; display: flex; flex-direction: column; height: 100%; }
    .news-card:hover { transform: translateY(-8px); box-shadow: 0 12px 25px rgba(0,0,0,0.15); }
    
    /* Hiệu ứng Image Zoom */
    .news-image-wrapper { height: 220px; overflow: hidden; position: relative; }
    .news-image { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
    .news-card:hover .news-image { transform: scale(1.1); }
    .news-category-badge { position: absolute; top: 15px; left: 15px; background: rgba(201, 33, 39, 0.9); color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; backdrop-filter: blur(4px); z-index: 2; }
    
    .news-content { padding: 25px; display: flex; flex-direction: column; flex: 1; }
    .news-meta-top { font-size: 13px; color: var(--sachhay-gray); margin-bottom: 10px; display: flex; justify-content: space-between; }
    .news-title { font-weight: 700; font-size: 1.25rem; margin-bottom: 15px; color: var(--sachhay-dark); line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; transition: color 0.2s; }
    .news-card:hover .news-title { color: var(--sachhay-red); }
    .news-summary { color: var(--sachhay-gray); font-size: 14px; line-height: 1.6; margin-bottom: 20px; flex: 1; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    
    .news-footer { display: flex; justify-content: space-between; align-items: center; padding-top: 15px; border-top: 1px solid #f0f0f0; }
    .author-info { display: flex; align-items: center; gap: 10px; font-size: 13px; font-weight: 600; color: var(--sachhay-dark); }
    .author-avatar { width: 30px; height: 30px; background: var(--sachhay-light-gray); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--sachhay-red); }
    .read-more-btn { color: var(--sachhay-red); font-size: 14px; font-weight: 600; display: flex; align-items: center; gap: 5px; }
    .news-card:hover .read-more-btn i { transform: translateX(5px); transition: 0.3s; }

    /* SIDEBAR - TIN ĐỌC NHIỀU */
    .sidebar-widget { background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 30px; }
    .widget-title { font-size: 18px; font-weight: 700; color: var(--sachhay-dark); margin-bottom: 20px; position: relative; padding-bottom: 10px; border-bottom: 2px solid #f0f0f0; display: flex; align-items: center; gap: 10px; }
    .widget-title i { color: var(--sachhay-red); }
    .widget-title::after { content: ''; position: absolute; left: 0; bottom: -2px; width: 40px; height: 2px; background: var(--sachhay-red); }
    
    .hot-news-list { display: flex; flex-direction: column; gap: 15px; }
    .hot-news-item { display: flex; gap: 15px; text-decoration: none; align-items: center; group: hover; }
    .hot-news-number { font-size: 32px; font-weight: 800; color: var(--sachhay-light-gray); line-height: 1; transition: 0.3s; }
    .hot-news-item:hover .hot-news-number { color: var(--sachhay-orange); }
    .hot-news-info { flex: 1; }
    .hot-news-title { font-size: 14px; font-weight: 600; color: var(--sachhay-dark); line-height: 1.4; margin-bottom: 5px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; transition: 0.2s; }
    .hot-news-item:hover .hot-news-title { color: var(--sachhay-red); }
    .hot-news-meta { font-size: 12px; color: var(--sachhay-gray); }

    /* NEWSLETTER WIDGET */
    .newsletter-widget { background: linear-gradient(135deg, var(--sachhay-red) 0%, var(--sachhay-orange) 100%); color: white; text-align: center; }
    .newsletter-widget .widget-title { color: white; border-bottom-color: rgba(255,255,255,0.2); }
    .newsletter-widget .widget-title::after { background: white; }
    .newsletter-input { width: 100%; padding: 12px; border: none; border-radius: 8px; margin: 15px 0; outline: none; }
    .newsletter-btn { width: 100%; padding: 12px; background: var(--sachhay-dark); color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s; }
    .newsletter-btn:hover { background: white; color: var(--sachhay-red); }

    /* PAGINATION */
    .pagination { display: flex; justify-content: center; margin-top: 30px; gap: 8px; }
    .page-link { display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50% !important; border: 1px solid #e0e0e0; color: var(--sachhay-dark); font-weight: 600; transition: all 0.3s; }
    .page-item.active .page-link, .page-link:hover { background-color: var(--sachhay-red); color: white; border-color: var(--sachhay-red); box-shadow: 0 4px 10px rgba(201, 33, 39, 0.3); }

    @media (max-width: 991px) {
        .hero-news-item { height: 350px; }
        .hero-title { font-size: 20px; }
    }
</style>


<div class="container">
    
    <div class="filter-search-wrapper">
        <div class="category-filter">
            <a href="?category=all" class="category-btn <?= !isset($selectedCategory) || $selectedCategory == 'all' || $selectedCategory == '' ? 'active' : '' ?>">Tất cả</a>
            <a href="?category=kien-thuc" class="category-btn <?= (isset($selectedCategory) && $selectedCategory == 'kien-thuc') ? 'active' : '' ?>">Kiến thức</a>
            <a href="?category=sach-hay" class="category-btn <?= (isset($selectedCategory) && $selectedCategory == 'sach-hay') ? 'active' : '' ?>">Sách hay</a>
            <a href="?category=van-hoa" class="category-btn <?= (isset($selectedCategory) && $selectedCategory == 'van-hoa') ? 'active' : '' ?>">Văn hóa đọc</a>
            <a href="?category=giao-duc" class="category-btn <?= (isset($selectedCategory) && $selectedCategory == 'giao-duc') ? 'active' : '' ?>">Giáo dục</a>
            <a href="?category=cong-nghe" class="category-btn <?= (isset($selectedCategory) && $selectedCategory == 'cong-nghe') ? 'active' : '' ?>">Công nghệ</a>
            <a href="?category=ky-nang" class="category-btn <?= (isset($selectedCategory) && $selectedCategory == 'ky-nang') ? 'active' : '' ?>">Kỹ năng sống</a>
        </div>
        
        <form method="GET" action="<?= BASE_URL ?>news" class="search-input">
            <input type="text" name="search" placeholder="Tìm kiếm bài viết..." value="<?= htmlspecialchars($search ?? '') ?>">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <?php if (empty($search) && empty($selectedCategory) && $currentPage == 1 && !empty($latestNews)): ?>
    <div id="featuredNewsCarousel" class="carousel slide hero-news-slider carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-indicators">
            <?php foreach($latestNews as $index => $news): ?>
                <button type="button" data-bs-target="#featuredNewsCarousel" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>"></button>
            <?php endforeach; ?>
        </div>
        
        <div class="carousel-inner">
            <?php foreach($latestNews as $index => $news): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <a href="<?= BASE_URL ?>news/detail/<?= $news['id'] ?>" class="hero-news-item d-block">
                    <img src="<?= BASE_URL . ($news['image_url'] ?? 'images/news-page/default.jpg') ?>" class="hero-news-img" alt="<?= htmlspecialchars($news['title']) ?>">
                    <div class="hero-news-overlay">
                        <span class="hero-badge"><i class="fas fa-bolt"></i> Mới nhất</span>
                        <h2 class="hero-title"><?= htmlspecialchars($news['title']) ?></h2>
                        <div class="hero-meta">
                            <span><i class="fas fa-user-edit"></i> <?= htmlspecialchars($news['author_name'] ?? 'Admin') ?></span>
                            <span><i class="far fa-calendar-alt"></i> <?= date('d/m/Y', strtotime($news['published_date'] ?? $news['created_at'])) ?></span>
                            <span><i class="far fa-eye"></i> <?= $news['views'] ?? 0 ?> lượt xem</span>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#featuredNewsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#featuredNewsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="page-title mb-0">Bài viết mới</h1>
                <div class="results-info text-muted">
                    Tìm thấy <strong><?= $totalArticles ?></strong> bài viết
                </div>
            </div>

            <?php if (!empty($articles)): ?>
                <div class="news-grid" style="grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));">
                    <?php foreach ($articles as $article): 
                        // Ước tính thời gian đọc (giả sử 250 từ/phút)
                        $wordCount = str_word_count(strip_tags($article['content'] ?? ''));
                        $readTime = max(1, ceil($wordCount / 250));
                    ?>
                        <a href="<?= BASE_URL ?>news/detail/<?= $article['id'] ?>" class="news-card">
                            <div class="news-image-wrapper">
                                <span class="news-category-badge"><?= ucfirst(str_replace('-', ' ', ($article['category'] ?? 'Tin tức'))) ?></span>
                                <img src="<?= BASE_URL . ($article['image_url'] ?? 'images/news-page/default.jpg') ?>" class="news-image" alt="<?= htmlspecialchars($article['title']) ?>">
                            </div>
                            <div class="news-content">
                                <div class="news-meta-top">
                                    <span><i class="far fa-calendar-alt"></i> <?= date('d/m/Y', strtotime($article['published_date'] ?? $article['created_at'])) ?></span>
                                    <span><i class="far fa-clock"></i> <?= $readTime ?> phút đọc</span>
                                </div>
                                <h3 class="news-title"><?= htmlspecialchars($article['title']) ?></h3>
                                <p class="news-summary"><?= htmlspecialchars($article['summary'] ?? '') ?></p>
                                
                                <div class="news-footer">
                                    <div class="author-info">
                                        <div class="author-avatar"><i class="fas fa-pen-nib"></i></div>
                                        <?= htmlspecialchars($article['author_name'] ?? 'Admin') ?>
                                    </div>
                                    <span class="read-more-btn">Đọc tiếp <i class="fas fa-arrow-right"></i></span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>

                <?php if ($totalPages > 1): ?>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?><?= !empty($search) ? '&search=' . urlencode($search) : '' ?><?= !empty($selectedCategory) ? '&category=' . urlencode($selectedCategory) : '' ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                <?php endif; ?>

            <?php else: ?>
                <div class="text-center py-5" style="background: white; border-radius: 12px; border: 1px dashed #e0e0e0;">
                    <i class="fas fa-search-minus fa-4x text-muted mb-3"></i>
                    <h4>Không tìm thấy bài viết nào</h4>
                    <p class="text-muted">Thử thay đổi từ khóa hoặc bộ lọc xem sao bạn nhé!</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-lg-4 mt-5 mt-lg-0">
            
            <div class="sidebar-widget">
                <h3 class="widget-title"><i class="fas fa-fire-alt"></i> Đang được quan tâm</h3>
                <div class="hot-news-list">
                    <?php if(!empty($hotNews)): ?>
                        <?php foreach($hotNews as $index => $hot): ?>
                            <a href="<?= BASE_URL ?>news/detail/<?= $hot['id'] ?>" class="hot-news-item">
                                <div class="hot-news-number">0<?= $index + 1 ?></div>
                                <div class="hot-news-info">
                                    <h4 class="hot-news-title"><?= htmlspecialchars($hot['title']) ?></h4>
                                    <div class="hot-news-meta">
                                        <span><i class="far fa-eye"></i> <?= $hot['views'] ?? 0 ?> lượt xem</span>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted mb-0">Chưa có dữ liệu thống kê.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="sidebar-widget newsletter-widget">
                <h3 class="widget-title justify-content-center"><i class="fas fa-envelope-open-text"></i> Đăng ký nhận bản tin</h3>
                <p style="font-size: 14px; opacity: 0.9; margin-top: 15px;">Để lại email để không bỏ lỡ các tin tức ra mắt sách và ưu đãi đặc biệt từ SachHay nhé!</p>
                <form onsubmit="event.preventDefault(); alert('Cảm ơn bạn đã đăng ký!'); this.reset();">
                    <input type="email" class="newsletter-input" placeholder="Nhập email của bạn..." required>
                    <button type="submit" class="newsletter-btn">Đăng ký ngay</button>
                </form>
            </div>

            <div class="sidebar-widget">
                <h3 class="widget-title"><i class="fas fa-tags"></i> Tìm kiếm phổ biến</h3>
                <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                    <a href="?search=Sách ngoại văn" class="category-btn" style="background: white; border: 1px solid #e0e0e0;">#Sách ngoại văn</a>
                    <a href="?search=Self-help" class="category-btn" style="background: white; border: 1px solid #e0e0e0;">#Self-help</a>
                    <a href="?search=Giải thưởng" class="category-btn" style="background: white; border: 1px solid #e0e0e0;">#Giải thưởng</a>
                    <a href="?search=Tác giả mới" class="category-btn" style="background: white; border: 1px solid #e0e0e0;">#Tác giả mới</a>
                </div>
            </div>

        </div>
    </div>
</div>
<?php if (empty($search) && (empty($selectedCategory) || $selectedCategory == 'all') && $currentPage == 1 && !empty($hotNews)): ?>    
    <div id="hotNewsFahasaBanner" class="carousel slide fahasa-banner-wrapper" data-bs-ride="carousel" data-bs-interval="3500">
        
        <div class="carousel-indicators fahasa-indicators">
            <?php foreach($hotNews as $index => $news): ?>
                <button type="button" data-bs-target="#hotNewsFahasaBanner" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" aria-label="Slide <?= $index + 1 ?>"></button>
            <?php endforeach; ?>
        </div>
        
        <div class="carousel-inner">
            <?php foreach($hotNews as $index => $news): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <a href="<?= BASE_URL ?>news/detail/<?= $news['id'] ?>" class="fahasa-banner-item">
                    <img src="<?= BASE_URL . ($news['image_url'] ?? 'images/news-page/default-banner.jpg') ?>" class="fahasa-banner-img" alt="<?= htmlspecialchars($news['title']) ?>">
                    
                    <div class="fahasa-banner-overlay">
                        <h2 class="fahasa-banner-title"><?= htmlspecialchars($news['title']) ?></h2>
                        <div class="fahasa-banner-meta">
                            <span><i class="far fa-eye"></i> <?= $news['views'] ?? 0 ?> lượt xem quan tâm</span>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>

        <button class="carousel-control-prev fahasa-control fahasa-control-prev" type="button" data-bs-target="#hotNewsFahasaBanner" data-bs-slide="prev">
            <span class="fahasa-control-icon"><i class="fas fa-chevron-left"></i></span>
        </button>
        <button class="carousel-control-next fahasa-control fahasa-control-next" type="button" data-bs-target="#hotNewsFahasaBanner" data-bs-slide="next">
            <span class="fahasa-control-icon"><i class="fas fa-chevron-right"></i></span>
        </button>
    </div>
    <?php endif; ?>

<?php require_once APP_ROOT . '/views/components/footer.php'; ?>
