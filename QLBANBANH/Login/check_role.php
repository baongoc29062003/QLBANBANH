<?php


if (!isset($_SESSION['role_id'])) {
    header('Location: Dangnhap.php');
    exit();
}

function checkRole($required_role) {
    if ($_SESSION['role_id'] != $required_role) {
        echo "Bạn không có quyền truy cập trang này.";
        exit();
    }
}
?>
