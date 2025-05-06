<?php
session_start();
ob_start();
include "../../ketnoi.php";

// Kiểm tra quyền truy cập
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../../Login/Dangnhap.php");
    exit();
}

// Xử lý xóa tin tức
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']); // Đảm bảo sử dụng đúng biến $id

    // Kiểm tra xem bài viết có tồn tại không
    $checkQuery = "SELECT * FROM news WHERE id = '$id'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Thực hiện xóa
        $deleteQuery = "DELETE FROM news WHERE id = '$id'";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if ($deleteResult) {
            echo '<script language="javascript">alert("Bài viết đã được xóa thành công!");
            window.location="./danhsachtin.php";
            </script>';
        } else {
            echo '<script language="javascript">alert("Lỗi khi xóa bài viết! Vui lòng thử lại.");
            window.history.back();
            </script>';
        }
    } else {
        echo '<script language="javascript">alert("Mã tin không tồn tại!");
        window.history.back();
        </script>';
    }
} else {
    echo '<script language="javascript">alert("Không tìm thấy mã tin!");
    window.history.back();
    </script>';
}

mysqli_close($conn);
?>
