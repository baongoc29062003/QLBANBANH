<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập
if (!isset($_SESSION['user_id'])) {
    // Chuyển hướng về trang đăng nhập
    header('Location: /BTLNHOM14/Login/Dangnhap.php');
    exit();
}
?>
