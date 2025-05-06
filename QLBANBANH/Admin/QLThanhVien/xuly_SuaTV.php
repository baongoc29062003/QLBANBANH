<?php
include "../../ketnoi.php";

// Khởi tạo biến
$id = $user = $pass = $ht = $dc = $dt = $role = "";
$errorMessage = "";

// Xử lý dữ liệu gửi từ form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST["txtid"]);
    $user = mysqli_real_escape_string($conn, $_POST["txtuser"]);
    $pass = mysqli_real_escape_string($conn, $_POST["txtpass"]);
    $ht = mysqli_real_escape_string($conn, $_POST["txthoten"]);
    $dc = mysqli_real_escape_string($conn, $_POST["txtdiachi"]);
    $dt = mysqli_real_escape_string($conn, $_POST["txtdt"]);
    $role = mysqli_real_escape_string($conn, $_POST["selrole"]);

    // Kiểm tra số điện thoại hợp lệ
    if (!preg_match('/^(\+84|0)[0-9]{9}$/', $dt)) {
        $errorMessage = "Số điện thoại không hợp lệ. Vui lòng nhập đúng định dạng (VD: 0123456789 hoặc +84987654321).";
    } else {
        // Cập nhật dữ liệu người dùng
        $sql = "UPDATE users SET 
                    username = '$user',
                    password = '$pass',
                    Hoten = '$ht',
                    Diachi = '$dc',
                    DienThoai = '$dt',
                    role_id = '$role'
                WHERE user_id = '$id'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
                    alert("Sửa thành viên thành công!");
                    window.location = "Danhsachtv.php";
                </script>';
        } else {
            $errorMessage = "Có lỗi xảy ra khi sửa thành viên: " . mysqli_error($conn);
        }
    }
}

// Hiển thị thông báo lỗi (nếu có)
if (!empty($errorMessage)) {
    echo "<p style='color:red; font-weight:bold;'>$errorMessage</p>";
}
?>
