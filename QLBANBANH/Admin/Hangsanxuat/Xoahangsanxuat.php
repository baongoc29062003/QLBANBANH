<?php
session_start();
include('../ketnoi.php');

if (isset($_GET['mahangsx'])) {
    $maHangSX = $_GET['mahangsx'];

    $checkSql = "SELECT * FROM banh WHERE Mahangsx = ?";
    if ($checkStmt = $conn->prepare($checkSql)) {
        $checkStmt->bind_param("s", $maHangSX);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            $_SESSION['error'] = "Không thể xóa nhà sản xuất vì vẫn còn sản phẩm liên quan.";
        } else {
            $sql = "DELETE FROM hangsx WHERE Mahangsx = ?";
            if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $maHangSX);
            if ($stmt->execute()) {
                $_SESSION['message'] = "Xóa nhà sản xuất thành công!";
            } else {
                $_SESSION['error'] = $stmt->error;
            }
            $stmt->close();
        } else {
            $_SESSION['error'] = $conn->error;
        }
    }
    $checkStmt->close();
    } else {
        $_SESSION['message'] = $conn->error;
    }
} else {
    $_SESSION['error'] = "Mã hãng sản xuất không hợp lệ.";
}

$conn->close();
header("Location: index.php");
exit();
?>