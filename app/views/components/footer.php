    <!-- Footer -->
    <footer class="footer mt-5" role="contentinfo" aria-label="footer navigation">
        <div class="footer-top">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-col footer-brand">
                        <h5 id="about-heading">SachHay</h5>
                        <p class="footer-text">Gợi ý sách hay, đặt mua nhanh, hỗ trợ rõ ràng và trải nghiệm đọc tốt hơn mỗi ngày.</p>
                        <ul class="list-unstyled footer-links" aria-labelledby="about-heading">
                            <li><a href="<?= BASE_URL ?>home/about"><i class="fas fa-circle-info" aria-hidden="true"></i> Giới thiệu</a></li>
                            <li><a href="#"><i class="fas fa-briefcase" aria-hidden="true"></i> Tuyển dụng</a></li>
                            <li><a href="#"><i class="fas fa-shield-halved" aria-hidden="true"></i> Bảo mật</a></li>
                            <li><a href="#"><i class="fas fa-file-lines" aria-hidden="true"></i> Điều khoản</a></li>
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h5 id="support-heading">Hỗ trợ</h5>
                        <ul class="list-unstyled footer-links" aria-labelledby="support-heading">
                            <li><a href="<?= BASE_URL ?>home/qa"><i class="fas fa-circle-question" aria-hidden="true"></i> Hỏi / Đáp</a></li>
                            <li><a href="#"><i class="fas fa-rotate-left" aria-hidden="true"></i> Đổi trả</a></li>
                            <li><a href="#"><i class="fas fa-credit-card" aria-hidden="true"></i> Thanh toán</a></li>
                            <li><a href="#"><i class="fas fa-book-open-reader" aria-hidden="true"></i> Hướng dẫn mua hàng</a></li>
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h5 id="contact-heading">Liên hệ</h5>
                        <ul class="list-unstyled footer-contact" aria-labelledby="contact-heading">
                            <li><i class="fas fa-location-dot" aria-hidden="true"></i> 268 Lý Thường Kiệt, Quận 10, TP.HCM</li>
                            <li><i class="fas fa-phone-volume" aria-hidden="true"></i> <a href="tel:19006656">1900-6656</a></li>
                            <li><i class="fas fa-envelope" aria-hidden="true"></i> info@sachhay.vn</li>
                        </ul>
                    </div>

                    <div class="footer-col footer-social">
                        <h5 id="social-heading">Kết nối</h5>
                        <div class="social-links" aria-labelledby="social-heading">
                            <a href="#" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            <a href="#" class="social-icon" aria-label="Instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" class="social-icon" aria-label="YouTube"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                            <a href="#" class="social-icon" aria-label="TikTok"><i class="fab fa-tiktok" aria-hidden="true"></i></a>
                        </div>
                        <div class="payment-block mt-3">
                            <h6 id="payment-heading">Thanh toán</h6>
                            <div class="payment-methods" aria-labelledby="payment-heading">
                                <i class="fab fa-cc-visa" aria-label="Visa" role="img"></i>
                                <i class="fab fa-cc-mastercard" aria-label="MasterCard" role="img"></i>
                                <i class="fas fa-money-bill-wave" aria-label="Tiền mặt" role="img"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container text-center">
                <p class="mb-0" role="contentinfo">&copy; 2026 <?= APP_NAME ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <style>
        .footer {
            background: linear-gradient(180deg, #3a261b 0%, #271911 100%);
            color: white;
            margin-top: 30px;
            border-top: 3px solid #5c3d2e;
        }

        .footer-top {
            padding: 24px 0;
        }

        .footer-grid {
            display: flex;
            gap: 22px;
            align-items: flex-start;
        }

        .footer-col {
            flex: 1;
            min-width: 0;
            padding-left: 18px;
            border-left: 1px solid rgba(215, 176, 125, 0.22);
        }

        .footer-col:first-child {
            padding-left: 0;
            border-left: none;
        }

        .footer-brand {
            flex: 1.15;
        }

        .footer h5 {
            color: #d7b07d;
            margin-bottom: 10px;
            font-weight: 700;
            font-size: 16px;
            letter-spacing: 0.2px;
        }

        .footer h6 {
            color: #f2e6d6;
            font-size: 13px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .footer-text {
            color: #d7d0cb;
            font-size: 12px;
            line-height: 1.6;
            margin-bottom: 12px;
        }

        .footer-links,
        .footer-contact {
            margin: 0;
        }

        .footer-links li,
        .footer-contact li {
            margin-bottom: 8px;
            color: #cfc6bf;
            font-size: 12px;
            line-height: 1.45;
        }

        .footer-links a,
        .footer-contact a {
            color: #cfc6bf;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-links a:hover,
        .footer-contact a:hover {
            color: #f1d2a5;
        }

        .footer-links i,
        .footer-contact i {
            color: #d7b07d;
            margin-right: 8px;
            width: 14px;
            text-align: center;
        }

        .social-links {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.08);
            color: #fff;
            text-decoration: none;
            transition: transform 0.2s ease, background-color 0.2s ease, color 0.2s ease;
        }

        .social-icon:hover {
            background-color: #c89b5c;
            color: #fff;
            transform: translateY(-2px);
        }

        .payment-methods {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .payment-methods i {
            font-size: 26px;
            color: #d7b07d;
        }

        .footer-bottom {
            background-color: rgba(0, 0, 0, 0.18);
            padding: 14px 0;
        }

        .footer-bottom p {
            color: #b7aea8;
            font-size: 12px;
            letter-spacing: 0.4px;
        }

        @media (max-width: 991px) {
            .footer-grid {
                flex-wrap: wrap;
            }

            .footer-col {
                min-width: calc(50% - 11px);
            }
        }

        @media (max-width: 767px) {
            .footer-col {
                min-width: 100%;
                padding-left: 0;
                border-left: none;
                border-top: 1px solid rgba(215, 176, 125, 0.18);
                padding-top: 16px;
            }

            .footer-col:first-child {
                border-top: none;
                padding-top: 0;
            }

            .footer-top {
                padding: 20px 0;
            }
        }
    </style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Global site scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('img:not([loading])');
            images.forEach(img => {
                img.setAttribute('loading', 'lazy');
            });

            if ('requestIdleCallback' in window) {
                requestIdleCallback(function() {
                    const links = document.querySelectorAll('a');
                    links.forEach(link => {
                        if (link.hostname !== window.location.hostname && !link.getAttribute('target')) {
                            link.setAttribute('target', '_blank');
                            link.setAttribute('rel', 'noopener');
                        }
                    });
                });
            }
        });
    </script>
    <script>
        document.addEventListener('click', function(e) {
            const btn = e.target.closest('.btn-wishlist');
            if (!btn) return;
            e.preventDefault();
            e.stopPropagation();

            const pid = btn.getAttribute('data-product-id');
            if (!pid) return;

            btn.disabled = true;
            const orig = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

            fetch('<?= BASE_URL ?>customer/addWishlist', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'product_id=' + encodeURIComponent(pid)
                })
                .then(r => r.json())
                .then(res => {
                    btn.disabled = false;
                    btn.innerHTML = orig;
                    if (res.success) {
                        btn.classList.remove('btn-outline-danger');
                        btn.classList.add('text-danger');
                        btn.innerHTML = '<i class="fas fa-heart"></i>';
                        showToast('Đã thêm vào yêu thích');
                    } else if (res.need_login) {
                        window.location.href = '<?= BASE_URL ?>auth/login';
                    } else if (res.guest) {
                        btn.classList.add('text-danger');
                        btn.innerHTML = '<i class="fas fa-heart"></i>';
                        showToast('Đã thêm tạm vào yêu thích (guest)');
                    } else {
                        showToast(res.message || 'Thêm thất bại', 'danger');
                    }
                })
                .catch(() => {
                    btn.disabled = false;
                    btn.innerHTML = orig;
                    showToast('Lỗi kết nối', 'danger');
                });
        });
    </script>
    </body>

    </html>