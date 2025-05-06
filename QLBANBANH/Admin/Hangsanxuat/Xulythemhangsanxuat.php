<?php
session_start();
include('../ketnoi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maHangSX = $_POST['code'];
    $tenHangSX = $_POST['name'];
    $diaChi = $_POST['address'];
    $sdt = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO hangsx (Mahangsx, Tenhangsx, Diachi, Email, Sdt) VALUES (?, ?, ?, ?, ?)";
    
    $checkSql = "SELECT * FROM hangsx WHERE Mahangsx = ?";
    if ($checkStmt = $conn->prepare($checkSql)) {
        $checkStmt->bind_param("s", $maHangSX);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            $errorMessage = "Lỗi: Mã hãng sản xuất đã tồn tại!";
        } else {
            $sql = "INSERT INTO hangsx (Mahangsx, Tenhangsx, Diachi, Email, Sdt) VALUES (?, ?, ?, ?, ?)";
            
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sssss", $maHangSX, $tenHangSX, $diaChi, $email, $sdt);
                if ($stmt->execute()) {
                    $_SESSION['message'] = "Thêm hãng sản xuất thành công!";
                    header("Location: index.php");
                    exit();
                } else {
                    $errorMessage = "Lỗi: " . $stmt->error; 
                }
                $stmt->close();
            } else {
                $errorMessage = "Lỗi: " . $conn->error;
            }
        }
        $checkStmt->close();
    } else {
        $errorMessage = "Lỗi: " . $conn->error;
    }
}

$conn->close();
?>