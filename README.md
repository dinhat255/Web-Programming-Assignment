# SachHay - Website Bán Sách Trực Tuyến

> Dự án bài tập lớn môn Lập Trình Web: xây dựng website bán sách trực tuyến theo mô hình MVC tự viết.

[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-777BB4?logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?logo=bootstrap&logoColor=white)](https://getbootstrap.com/)

## Mô tả dự án

SachHay là website bán sách trực tuyến cho phép người dùng tìm kiếm, xem chi tiết, thêm vào giỏ hàng và đặt mua. Hệ thống có phần quản trị để quản lý sản phẩm, danh mục, đơn hàng, người dùng và nội dung bài viết.

## Tính năng chính

**Khách/Thành viên:**

- Xem danh sách sách, tìm kiếm, lọc, sắp xếp
- Xem chi tiết sản phẩm và sản phẩm liên quan
- Giỏ hàng, đặt hàng, theo dõi đơn hàng
- Đăng ký, đăng nhập, cập nhật thông tin
- Trang giới thiệu, hỏi đáp, liên hệ, tin tức

**Quản trị:**

- Dashboard tổng quan
- Quản lý sản phẩm, danh mục
- Quản lý đơn hàng và trạng thái
- Quản lý khách hàng
- Quản lý tin tức, hỏi đáp, liên hệ
- Cấu hình thông tin website

## Công nghệ sử dụng

- Frontend: HTML5, CSS3, Bootstrap 5.3, JavaScript, AJAX
- Backend: PHP 7.4+ (MVC tự xây dựng)
- Database: MySQL/MariaDB
- Môi trường: Apache (XAMPP/WAMP/LAMP)

## Kiến trúc MVC

Luồng xử lý:

1. Request vào entry point [public/index.php](public/index.php)
2. Router ở [app/router.php](app/router.php) và core [app/core/App.php](app/core/App.php) phân tích URL
3. Controller gọi Model truy vấn DB qua [app/core/DB.php](app/core/DB.php)
4. Controller render View và trả HTML/JSON

## Cấu trúc thư mục

```
BTL_SachHay/
|-- app/      # Controllers, Models, Views, Core, Config
|-- public/   # Entry point và tài nguyên tĩnh
|-- db/       # SQL dump
```

## Hướng dẫn cài đặt

**Yêu cầu:** PHP >= 7.4, MySQL/MariaDB, Apache, PDO, PDO_MySQL.

1. Clone hoặc tải về source
2. Cấu hình DocumentRoot trỏ đến thư mục [public](public)
3. Tạo database `sachhay_db` và import dump từ [db/sachhay_db.sql](db/sachhay_db.sql)
4. Cập nhật kết nối DB trong [app/config/config.php](app/config/config.php)
5. Bật Apache và MySQL, truy cập `http://localhost/`

**Tài khoản admin (demo):**

```
Email/SDT: admin@sachhay.vn
Mật khẩu: admin
```

## Database

Schema được định nghĩa trong [db/sachhay_db.sql](db/sachhay_db.sql) với các bảng chính: `users`, `product`, `orders`, `order_product`, `cart_items`, `user_addresses`, `news`, `qa`, `contacts`.

## Đóng góp thành viên

Phân công và đóng góp được tổng hợp trong báo cáo, gồm các nhóm việc: giao diện, chức năng sản phẩm/đơn hàng, tin tức/qa, và quản trị.

- Custom MVC Framework tự xây dựng
- PDO (PHP Data Objects) cho database abstraction
- Session-based authentication

**Database:**

- MySQL 8.0+ / MariaDB
- Thiết kế schema chuẩn hóa với foreign keys
- Indexing cho tối ưu hiệu năng

**Frontend:**

- HTML5 với semantic elements
- CSS3 (Custom styles + Bootstrap 5.3)
- JavaScript (Vanilla JS + AJAX)
- Bootstrap 5.3 - Responsive grid system
- Font Awesome 6 - Icons
- Google Fonts (Roboto)

**Công cụ phát triển:**

- XAMPP (Apache + PHP + MySQL)
- Git & GitHub cho version control
- Visual Studio Code / PhpStorm
- LaTeX (Overleaf) cho documentation

**Kiến trúc & thiết kế:**

- MVC (Model-View-Controller)
- Repository Pattern cho data access
- Front Controller Pattern (Router)
- Dependency Injection (DI) cơ bản

**Bảo mật:**

- PDO Prepared Statements (chống SQL Injection)
- Password Hashing với `password_hash()` (bcrypt)
- XSS Prevention với `htmlspecialchars()`
- Session Security & Role-based Access Control
- HTTPS ready (SSL/TLS support)

---

## ✨ Đặc điểm nổi bật

### 🏗️ Kiến trúc MVC tự xây dựng

- **Không sử dụng framework** - Code từ đầu để hiểu sâu về MVC
- **Router linh hoạt** - URL-friendly với .htaccess rewriting
- **Base Controller** - Kế thừa và tái sử dụng code
- **Database Abstraction** - PDO wrapper cho truy vấn an toàn

### 🎨 Giao diện & UX

- **Responsive Design** - Tương thích mobile, tablet, desktop
- **Bootstrap 5** - Grid system và components hiện đại
- **SachHay-inspired** - Màu sắc và layout theo phong cách ấm áp, phù hợp dự án
- **Font Awesome Icons** - Hơn 2000 icons miễn phí
- **Smooth Animations** - Transitions và hover effects

### 🔒 Bảo mật

- **SQL Injection Protection** - 100% queries dùng prepared statements
- **XSS Prevention** - Escape output trong views
- **Password Security** - Bcrypt hashing với cost factor 10
- **Session Management** - Secure session handling
- **Role-based Access** - Phân quyền user/admin rõ ràng

### 🔍 SEO (Search Engine Optimization)

- **Meta Tags** - Title, Description, Keywords động theo từng trang
- **Open Graph Tags** - Tối ưu khi share lên Facebook, Zalo
- **Twitter Cards** - Hiển thị đẹp khi share lên Twitter
- **Canonical URLs** - Tránh duplicate content
- **robots.txt** - Hướng dẫn search engines crawl website
- **Semantic HTML** - Sử dụng thẻ HTML5 semantic
- **Alt text** - Mô tả cho images (accessibility + SEO)
- **URL-friendly** - Clean URLs với slug

### ⚡ Hiệu năng

- **Lazy Loading** - Tải ảnh khi cần
- **CSS/JS Minification** - Giảm kích thước file
- **Database Indexing** - Tối ưu truy vấn
- **Session Cart** - Giỏ hàng nhanh, không cần database

### 📱 Tính năng nổi bật

- **AJAX Cart** - Cập nhật giỏ hàng không reload trang
- **Search & Filter** - Tìm kiếm và lọc sản phẩm real-time
- **Wishlist** - Lưu sản phẩm yêu thích
- **Order Tracking** - Theo dõi đơn hàng với nhiều trạng thái
- **News System** - Hệ thống tin tức với categories
- **Admin Dashboard** - Panel quản trị đầy đủ tính năng

---

## 🚀 Hướng dẫn cài đặt

### Yêu cầu hệ thống

- PHP >= 7.4
- MySQL/MariaDB
- Apache Server (hoặc XAMPP/WAMP/LAMP)
- Extension: PDO, PDO_MySQL

### Bước 1: Clone/Download dự án

```bash
# Clone từ Git
git clone https://github.com/dinhat255/Web-Programming-Assignment.git
```

Mở `httpd.conf` và chỉnh `DocumentRoot` trỏ vào thư mục `public` của dự án:

```apache
DocumentRoot "D:/duong-dan/BTL_SachHay/public"
<Directory "D:/duong-dan/BTL_SachHay/public">
    AllowOverride All
    Require all granted
</Directory>
```

### Bước 2: Import Database

1. Mở phpMyAdmin
2. Tạo database mới tên `sachhay_db`
3. Import file `db/sachhay_db.sql`

```sql
# Hoặc chạy lệnh SQL:
CREATE DATABASE sachhay_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sachhay_db;
SOURCE db/sachhay_db.sql;
```

### Bước 3: Cấu hình Database

Mở file `app/config/config.php` và sửa thông tin database:

```php
// Dòng 10-15: Cấu hình database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');           // ← Sửa username MySQL của bạn
define('DB_PASS', '');               // ← Sửa password MySQL của bạn
define('DB_NAME', 'sachhay_db');     // ← Tên database
define('DB_PORT', 3306);             // ← Sửa port nếu khác (mặc định: 3306)

// Dòng 23: Sửa tên thư mục dự án
define('PROJECT_NAME', 'BTL_SachHay'); // ← Tên thư mục trong web root
```

### Bước 4: Tạo thư mục upload (nếu chưa có)

```bash
# Tạo thư mục lưu ảnh upload
mkdir public/images/uploads
chmod 755 public/images/uploads
```

### Bước 5: Khởi động server

1. Bật **Apache** và **MySQL** trong XAMPP Control Panel
2. Truy cập: `http://localhost/`

### Bước 6: Đăng nhập Admin (tùy chọn)

Sau khi import database, sử dụng tài khoản admin:

```
Email/SĐT: admin@sachhay.vn
Mật khẩu: admin
```

---

## 📁 Cấu trúc thư mục

```
BTL_SachHay/
├── app/                          # Thư mục chứa code chính
│   ├── config/
│   │   └── config.php           # Cấu hình database, URL, constants
│   ├── controllers/             # Controllers xử lý logic
│   │   ├── HomeController.php   # Trang chủ, giới thiệu, QA
│   │   ├── ProductController.php # Sản phẩm, chi tiết, tìm kiếm
│   │   ├── CartController.php   # Giỏ hàng
│   │   ├── AuthController.php   # Đăng nhập/Đăng ký
│   │   ├── CustomerController.php # Trang cá nhân khách hàng
│   │   ├── AdminController.php  # Quản trị viên
│   │   ├── NewsController.php   # Tin tức
│   │   ├── ContactController.php # Liên hệ
│   │   └── ...
│   ├── core/                    # Core classes của MVC
│   │   ├── App.php             # Router chính, xử lý URL
│   │   ├── Controller.php      # Base Controller
│   │   └── DB.php              # Database wrapper (PDO)
│   ├── models/                  # Models tương tác database
│   │   ├── User.php            # Model User
│   │   ├── Admin.php           # Model Admin
│   │   └── ...
│   ├── views/                   # Views hiển thị giao diện
│   │   ├── components/         # Header, Footer
│   │   ├── home.php            # Trang chủ
│   │   ├── product/            # Trang sản phẩm
│   │   ├── cart/               # Giỏ hàng
│   │   ├── auth/               # Đăng nhập/Đăng ký
│   │   ├── customer/           # Trang cá nhân
│   │   ├── admin/              # Admin panel
│   │   └── ...
│   └── router.php              # Load config và core classes
├── db/                          # Database files
│   └── sachhay_db.sql          # File SQL dump
├── public/                      # Thư mục public (document root)
│   ├── css/                    # Stylesheets
│   ├── js/                     # JavaScript files
│   ├── images/                 # Hình ảnh
│   │   └── uploads/           # Ảnh upload từ admin
│   ├── .htaccess              # URL rewriting
│   └── index.php              # Entry point
└── README.md                   # File này
```

## 🔗 Cấu trúc URL & Routing

### Trang công khai

| Chức năng         | URL                            | Controller        | Method    |
| ----------------- | ------------------------------ | ----------------- | --------- |
| Trang chủ         | `/public/` hoặc `/public/home` | HomeController    | index()   |
| Giới thiệu        | `/public/home/about`           | HomeController    | about()   |
| Hỏi/Đáp           | `/public/home/qa`              | HomeController    | qa()      |
| Liên hệ           | `/public/contact`              | ContactController | index()   |
| Sản phẩm          | `/public/product`              | ProductController | index()   |
| Chi tiết SP       | `/public/product/detail/1`     | ProductController | detail(1) |
| Tin tức           | `/public/news`                 | NewsController    | index()   |
| Chi tiết bài viết | `/public/news/detail/1`        | NewsController    | detail(1) |

### Giỏ hàng

| Chức năng         | URL                           | Method      |
| ----------------- | ----------------------------- | ----------- |
| Xem giỏ hàng      | `/public/cart`                | GET         |
| Cập nhật số lượng | `/public/cart/updateQuantity` | POST (AJAX) |
| Xóa sản phẩm      | `/public/cart/removeFromCart` | POST (AJAX) |

### Xác thực

| Chức năng | URL                     | Yêu cầu      |
| --------- | ----------------------- | ------------ |
| Đăng nhập | `/public/auth/login`    | -            |
| Đăng ký   | `/public/auth/register` | -            |
| Đăng xuất | `/public/auth/logout`   | Đã đăng nhập |

### Trang khách hàng (yêu cầu đăng nhập)

| Chức năng           | URL                              |
| ------------------- | -------------------------------- |
| Thông tin tài khoản | `/public/customer`               |
| Đơn hàng của tôi    | `/public/customer/orders`        |
| Sản phẩm yêu thích  | `/public/customer/wishlist`      |
| Thông báo           | `/public/customer/notifications` |

### Trang Admin (yêu cầu role='admin')

| Chức năng        | URL                      |
| ---------------- | ------------------------ |
| Dashboard        | `/public/admin`          |
| Quản lý sản phẩm | `/public/admin/products` |
| Quản lý tin tức  | `/public/admin/news`     |
| Quản lý Q&A      | `/public/admin/qa`       |
| Quản lý liên hệ  | `/public/admin/contacts` |
| Cấu hình         | `/public/admin/settings` |

---

## 🏗️ Kiến trúc MVC

### Flow hoạt động

```
User Request
    ↓
public/index.php (Entry point)
    ↓
app/router.php (Load config & core)
    ↓
app/core/App.php (Parse URL → Controller/Method/Params)
    ↓
app/controllers/*Controller.php (Xử lý logic)
    ↓
app/models/*.php (Tương tác database) ←→ Database
    ↓
app/views/*.php (Render giao diện)
    ↓
Response to User
```

### Core Classes

**1. App.php** - Router chính

- Parse URL thành `[controller, method, params]`
- Load controller tương ứng
- Gọi method với parameters
- Redirect về landing nếu không tìm thấy

**2. Controller.php** - Base Controller

- `model($name)` - Load model
- `view($view, $data)` - Render view
- `redirect($path)` - Chuyển hướng
- `isPost()`, `isGet()` - Kiểm tra request method

**3. DB.php** - Database wrapper

- PDO với prepared statements
- `query($sql, $params)` - Thực thi truy vấn
- `single($sql, $params)` - Lấy 1 dòng
- `all($sql, $params)` - Lấy tất cả dòng

---

## 🔒 Bảo mật

### Các biện pháp đã áp dụng

✅ **SQL Injection Prevention**

- Sử dụng PDO Prepared Statements
- Bind parameters cho mọi query

✅ **Password Security**

- Hash password với `password_hash()` (bcrypt)
- Verify với `password_verify()`

✅ **XSS Prevention**

- Escape output với `htmlspecialchars()` trong views
- Function helper `e($value)` trong header.php

✅ **Session Security**

- Session-based authentication
- Role-based access control (admin/user)
- Middleware check trong constructor của AdminController và CustomerController

✅ **CSRF Protection (cần bổ sung)**

- Chưa implement CSRF token cho forms

---

## 📊 Cấu trúc Database

### ERD - Entity Relationship Diagram

Database được thiết kế chuẩn hóa đến dạng chuẩn 3NF (Third Normal Form) với 15+ bảng chính.

### Các bảng chính

**1. users - Quản lý người dùng**

```sql
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(15),
    password VARCHAR(255) NOT NULL,  -- bcrypt hashed
    address TEXT,
    gender ENUM('male', 'female', 'other'),
    birthday DATE,
    role ENUM('user', 'admin') DEFAULT 'user',
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_role (role)
);
```

**2. products - Sản phẩm**

```sql
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    slug VARCHAR(200) UNIQUE,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    old_price DECIMAL(10,2),
    discount_percent INT DEFAULT 0,
    image VARCHAR(255),
    category_id INT,
    stock INT DEFAULT 0,
    sold INT DEFAULT 0,
    rating DECIMAL(2,1) DEFAULT 0,
    view_count INT DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(category_id),
    INDEX idx_category (category_id),
    INDEX idx_price (price),
    INDEX idx_status (status)
);
```

**3. categories - Danh mục sản phẩm**

```sql
CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE,
    description TEXT,
    parent_id INT NULL,
    sort_order INT DEFAULT 0,
    FOREIGN KEY (parent_id) REFERENCES categories(category_id)
);
```

**4. orders - Đơn hàng**

```sql
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    total DECIMAL(12,2) NOT NULL,
    status ENUM('pending', 'processing', 'shipping', 'completed', 'cancelled')
           DEFAULT 'pending',
    payment_method ENUM('cod', 'bank_transfer', 'vnpay', 'momo'),
    shipping_address TEXT NOT NULL,
    shipping_phone VARCHAR(15),
    note TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(user_id),
    INDEX idx_customer (customer_id),
    INDEX idx_status (status),
    INDEX idx_created (created_at)
);
```

**5. order_details - Chi tiết đơn hàng**

```sql
CREATE TABLE order_details (
    detail_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);
```

**6. cart - Giỏ hàng**

```sql
CREATE TABLE cart (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
    UNIQUE KEY unique_cart_item (customer_id, product_id)
);
```

**7. wishlist - Sản phẩm yêu thích**

```sql
CREATE TABLE wishlist (
    wishlist_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    product_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
    UNIQUE KEY unique_wishlist_item (customer_id, product_id)
);
```

**8. news - Tin tức/Bài viết**

```sql
CREATE TABLE news (
    news_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(200) UNIQUE,
    content TEXT,
    image VARCHAR(255),
    author_id INT,
    category VARCHAR(50),
    view_count INT DEFAULT 0,
    status ENUM('draft', 'published') DEFAULT 'draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(user_id),
    INDEX idx_status (status),
    INDEX idx_category (category)
);
```

**9. notifications - Thông báo**

```sql
CREATE TABLE notifications (
    notification_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    title VARCHAR(100),
    content TEXT,
    type ENUM('order', 'promotion', 'system'),
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(user_id) ON DELETE CASCADE,
    INDEX idx_customer_read (customer_id, is_read)
);
```

**10. contacts - Liên hệ**

```sql
CREATE TABLE contacts (
    contact_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15),
    subject VARCHAR(200),
    message TEXT NOT NULL,
    status ENUM('new', 'processing', 'resolved') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_status (status)
);
```

### Quan hệ giữa các bảng

```
users (1) ----< (N) orders
users (1) ----< (N) cart
users (1) ----< (N) wishlist
users (1) ----< (N) notifications
users (1) ----< (N) news (as author)

products (1) ----< (N) order_details
products (1) ----< (N) cart
products (1) ----< (N) wishlist
products (N) ----< (1) categories

orders (1) ----< (N) order_details
```

### Indexes cho tối ưu hiệu năng

- **Primary Keys:** Tự động indexed
- **Foreign Keys:** Indexed cho JOIN queries
- **Search Fields:** email, slug, status
- **Date Fields:** created_at cho sắp xếp theo thời gian

---

## 🎨 Frontend Stack

### Libraries & Frameworks

- **Bootstrap 5.3** - CSS Framework
- **Font Awesome 6** - Icons
- **Google Fonts** - Roboto font
- **Vanilla JavaScript** - AJAX requests

### Color Scheme (SachHay Style)

```css
--sachhay-red: #8b5e3c /* Nâu chủ đạo */ --sachhay-orange: #c89b5c
  /* Vàng đồng phụ */ --sachhay-dark: #2b211b /* Màu chữ */
  --sachhay-gray: #7a6a5e /* Màu phụ */ --sachhay-light-gray: #f6efe8
  /* Nền sáng */;
```

---

## 📝 Quy ước đặt tên

### Controllers

- `{Name}Controller.php`

### Models

- `{Name}.php`

### Views

- File: `lowercase.php`

### Database

- Table: `snake_case`, plural
- Column: `snake_case`

---

## ⚙️ Lưu ý quan trọng

### Cấu hình

1. ✅ **Chỉ cần sửa** `app/config/config.php`
2. ✅ Tên thư mục phải khớp với `PROJECT_NAME`
3. ✅ Bật Apache + MySQL trong XAMPP
4. ✅ Import database `db/sachhay_db.sql` trước khi chạy
5. ✅ Tạo thư mục `public/images/uploads/` và chmod 755

### Session Cart

- Giỏ hàng lưu trong `$_SESSION['cart']`
- Format: `[product_id => quantity]`
- Không cần đăng nhập để thêm vào giỏ

### Admin Access

- Kiểm tra `$_SESSION['users_role'] === 'admin'` trong constructor
- Redirect về home nếu không phải admin

---

## 🆘 Xử lý lỗi thường gặp

### ❌ Lỗi "Failed to open stream" / "No such file"

**Nguyên nhân:** Sai tên thư mục hoặc sai cấu hình `PROJECT_NAME`

**Giải pháp:**

1. Kiểm tra tên thư mục trong htdocs: `C:/xampp/htdocs/BTL_SachHay`
2. Mở `app/config/config.php`, sửa dòng 23:
   ```php
    define('PROJECT_NAME', 'BTL_SachHay'); // Tên phải khớp với thư mục
   ```

---

### ❌ Lỗi "View does not exist"

**Nguyên nhân:** Đường dẫn view không đúng

**Giải pháp:**

1. Kiểm tra file view có tồn tại trong `app/views/`
2. Kiểm tra tên file view trong controller:
   ```php
   $this->view('product/index', $data); // ← Tìm app/views/product/index.php
   ```

---

### ❌ Lỗi "Connection failed" / Database error

**Nguyên nhân:** Chưa khởi động MySQL hoặc sai thông tin database

**Giải pháp:**

1. Bật MySQL trong XAMPP Control Panel
2. Kiểm tra port MySQL (mặc định 3306)
3. Mở `app/config/config.php`, kiểm tra:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');           // Password MySQL
    define('DB_NAME', 'sachhay_db'); // Tên database
    define('DB_PORT', 3306);         // Port
   ```
4. Đảm bảo đã import file `db/sachhay_db.sql` vào phpMyAdmin

---

### ❌ Lỗi "Call to undefined method"

**Nguyên nhân:** Model không có method được gọi

**Giải pháp:**

1. Kiểm tra method có tồn tại trong Model
2. Kiểm tra tên method có đúng không (phân biệt hoa/thường)

---

### ❌ Lỗi 404 / Blank page

**Nguyên nhân:** URL rewriting không hoạt động

**Giải pháp:**

1. Kiểm tra file `public/.htaccess` có tồn tại
2. Bật `mod_rewrite` trong Apache:
   - Mở `httpd.conf` trong XAMPP
   - Tìm dòng `#LoadModule rewrite_module modules/mod_rewrite.so`
   - Xóa dấu `#` để uncomment
   - Restart Apache

---

### ❌ Lỗi upload ảnh

**Nguyên nhân:** Thư mục uploads không tồn tại hoặc không có quyền ghi

**Giải pháp:**

1. Tạo thư mục: `public/images/uploads/`
2. Cấp quyền ghi (Linux/Mac):
   ```bash
   chmod 755 public/images/uploads
   ```
3. Windows: Click phải → Properties → Security → Cho phép Write

---

## 🚀 Phát triển tiếp

### Các tính năng cần bổ sung

- [ ] Tích hợp payment gateway (VNPay, MoMo)
- [ ] Email notification (PHPMailer)
- [ ] CSRF protection
- [ ] Rate limiting
- [ ] Search optimization (Full-text search)
- [ ] Product reviews & ratings
- [ ] Coupon/Voucher system
- [ ] Order tracking
- [ ] Export reports (Excel/PDF)

### Cải tiến hiệu năng

- [ ] Caching (Redis, Memcached)
- [ ] Database indexing
- [ ] Image optimization
- [ ] Lazy loading
- [ ] CDN cho static assets

---

## 🎯 Mục tiêu dự án

### Mục tiêu học tập:

1. ✅ Hiểu và áp dụng kiến trúc **MVC (Model-View-Controller)** trong PHP
2. ✅ Nắm vững các công nghệ frontend: **HTML5, CSS3, JavaScript, Bootstrap 5**
3. ✅ Thực hành xây dựng ứng dụng web **full-stack** hoàn chỉnh
4. ✅ Hiểu về quy trình phát triển phần mềm theo nhóm và Git workflow
5. ✅ Áp dụng các biện pháp **bảo mật web** cơ bản (SQL Injection, XSS, Password Hashing)

### Sản phẩm cuối cùng:

- ✅ Website thương mại điện tử bán sách hoàn chỉnh
- ✅ Source code có cấu trúc rõ ràng, dễ bảo trì
- ✅ Database schema được thiết kế chuẩn hóa

---

## 👤 Thông tin dự án

- **Repository owner:** @dinhat255

---

## 🙏 Lời cảm ơn

Chúng em xin gửi lời cảm ơn chân thành đến:

- **Thầy Nguyễn Hữu Hiếu** - Giảng viên hướng dẫn
- **Khoa Khoa học và Kỹ thuật Máy tính** - BK ĐHQG TP.HCM
- **Mô hình nhà sách online** - Nguồn cảm hứng cho giao diện
- **Cộng đồng PHP & Web Development** - Tài liệu và hỗ trợ

---

## 📞 Liên hệ & Hỗ trợ

### Gặp vấn đề?

1. ✅ Kiểm tra phần **[Xử lý lỗi thường gặp](#-xử-lý-lỗi-thường-gặp)** ở trên
2. 📖 Đọc **[Hướng dẫn cài đặt](#-hướng-dẫn-cài-đặt)** chi tiết
3. 🔍 Tìm kiếm trong **Issues** đã có
4. 📝 Tạo **Issue mới** trên GitHub với thông tin chi tiết:
   - Mô tả lỗi
   - Screenshot (nếu có)
   - Môi trường (OS, PHP version, XAMPP version)
   - Steps to reproduce

### GitHub Repository

- **URL:** https://github.com/dinhat255/Web-Programming-Assignment
- **Issues:** https://github.com/dinhat255/Web-Programming-Assignment/issues
- **Pull Requests:** Welcome!

### Liên hệ

- **Email:** nguyenduynhat.250505@gmail.com
- **Facebook Group:** [Link]

---

<div align="center">

**🎉 Chúc bạn triển khai thành công! 🎉**

Made with ❤️ by **Dinhat255**

[⬆ Back to top](#-btl-sachhay---website-bán-sách-trực-tuyến)

</div>
