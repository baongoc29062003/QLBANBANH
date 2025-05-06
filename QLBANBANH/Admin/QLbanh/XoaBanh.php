<?php
session_start();
ob_start();
include "../../ketnoi.php";

// Kiểm tra quyền truy cập
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../../Login/Dangnhap.php");
    exit();
}

// Xử lý xóa bánh
if (isset($_GET['Mabanh'])) {
    $Mabanh = mysqli_real_escape_string($conn, $_GET['Mabanh']);

    // Kiểm tra xem sản phẩm có tồn tại không
    $checkQuery = "SELECT * FROM banh WHERE Mabanh = '$Mabanh'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Thực hiện xóa
        $db = "DELETE FROM banh WHERE Mabanh = '$Mabanh'";
        $xoa = mysqli_query($conn, $db);

        if ($xoa) {
            echo '<script language="javascript">alert("Mặt hàng bánh này đã bị xóa thành công!");
            window.location="../TrangchuAdmin.php";
            </script>';
        } else {
            echo '<script language="javascript">alert("Lỗi khi xóa bánh! Vui lòng thử lại.");
            window.history.back();
            </script>';
        }
    } else {
        echo '<script language="javascript">alert("Mã bánh không tồn tại!");
        window.history.back();
        </script>';
    }
} else {
    echo '<script language="javascript">alert("Không tìm thấy mã bánh!");
    window.history.back();
    </script>';
}

mysqli_close($conn);
?>
