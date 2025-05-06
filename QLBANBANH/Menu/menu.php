<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu ngang</title>
    <link rel="stylesheet" href="./menu.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="#">Sản Phẩm</a>
                <ul class="vmenu">
                    <li><a href="../Danhsachsp/Trangdanhsachsp.php">Tất cả sản phẩm</a></li>
                    <li><a href="../Danhsachsp/Trangdsbanhkem.php">Bánh kem</a></li>
                    <li><a href="../Danhsachsp/Trangdsbanhmi.php">Bánh mì</a></li>
                    <li><a href="../Danhsachsp/Trangdsbanhngot.php">Bánh ngọt</a></li>
                    <li><a href="../Danhsachsp/Trangdsbanhquy.php">Bánh quy</a></li>
                </ul>
            </li>
            <li><a href="../Trangchu/Trangchu.php">Trang Chủ </a></li>
            <li><a href="../Tintuc/news.php">Tin tức</a></li>
            <li><a href="../Lienhe/contact.php">Liên Hệ</a></li>
        </ul>
        <div class="chao">
            <div>
                <?php if (isset($_SESSION["username"])): ?>
                    Chào bạn: <?php echo htmlspecialchars($_SESSION["username"], ENT_QUOTES, 'UTF-8'); ?> | 
                    <a href="../Login/Logout.php" style="text-decoration: none; color: white;">Đăng xuất</a>
                <?php else: ?>
                    <a href="../Login/Login.php" style="text-decoration: none; color: white;">Đăng nhập</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</body>

</html>
