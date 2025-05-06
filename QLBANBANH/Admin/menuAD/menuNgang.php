<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Ngang</title>
    <link rel="stylesheet" href="/BTLNHOM14/Menu/menuCon.css">
</head>

<body>
    <nav>
        <ul style="padding-left: 50px;">
            <li><a href="">Quản lý</a>
                <ul class="vmenu">
                    <li><a href="">Quản Lý Bánh</a>
                        <ul>
                            <li><a href="/BTLNHOM14/Admin/TrangchuAdmin.php">Danh Sách Bánh</a></li>
                            <li><a href="/BTLNHOM14/Admin/QLbanh/ThemBanh.php">Thêm Bánh</a></li>
                        </ul>
                    </li>
                    <li><a href="">Quản Lý Loại Bánh</a>
                        <ul>
                            <li><a href="/BTLNHOM14/Admin/QLloaibanh/Danhsachloaibanh.php">Danh Sách Loại Bánh</a></li>
                            <li><a href="/BTLNHOM14/Admin/QLloaibanh/Themloaibanh.php">Thêm Loại Bánh</a></li>
                        </ul>
                    </li>
                    <li><a href="">Quản Lý Hãng Sản Xuất</a>
                        <ul>
                            <li><a href="/BTLNHOM14/Admin/Hangsanxuat/index.php">Danh Sách Hãng Sản Xuất</a></li>
                            <li><a href="/BTLNHOM14/Admin/Hangsanxuat/Themhangsanxuat.php">Thêm Hãng Sản Xuất</a></li>
                        </ul>
                    </li>
                    <li><a href="">Quản Lý Khách Hàng</a>
                        <ul>
                            <li><a href="/BTLNHOM14/Admin/QLThanhVien/Danhsachtv.php">Danh Sách Thành Viên</a></li>
                            
                        </ul>
                    </li>
                    <li><a href="">Quản Lý Tin Tức</a>
                        <ul>
                            <li><a href="/BTLNHOM14/Admin/QLtintuc/danhsachtin.php">Danh Sách Tin Tức</a></li>
                            <li><a href="/BTLNHOM14/Admin/QLtintuc/add_new.php">Thêm Bài Viết</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="/BTLNHOM14/Trangchu/trangchu_user.php">Trang chủ User</a></li>
            <li><a href="/BTLNHOM14/Admin/QLOrder/Danhsach_order.php">Đơn hàng</a></li>
            <li><a href="/BTLNHOM14/Admin/Phanhoi/Phanhoi.php">Phản Hồi</a></li>
            <li><a href="/BTLNHOM14/lienhe.php">Liên hệ</a></li>
        </ul>
        <div class="chao">
            <span style="color: #FFFFFF; padding-left:7px;">Chào bạn:</span>
            <span class="tim"> <?php echo $_SESSION["username"]; ?></span> | 
            <a href="/BTLNHOM14/Login/Logout.php" style="text-decoration: none; color: white;">Đăng Xuất</a>
        </div>
    </nav>
</body>

</html>
