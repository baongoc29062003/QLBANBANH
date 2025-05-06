<?php
include('../ketnoi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $hoten = mysqli_real_escape_string($conn, $_POST['txtHoten']);
    $username = mysqli_real_escape_string($conn, $_POST['txtUser']);
    $password = mysqli_real_escape_string($conn, $_POST['txtPass']);
    $diachi = mysqli_real_escape_string($conn, $_POST['txtDiachi']);
    $dienthoai = mysqli_real_escape_string($conn, $_POST['txtDienthoai']);

    // Mặc định role_id là 2 (thành viên)
    $role_id = 2;

    // Thêm dữ liệu vào bảng users
    $query = "INSERT INTO users (username, password, role_id, Hoten, Diachi, Dienthoai) 
              VALUES ('$username', '$password', $role_id, '$hoten', '$diachi', '$dienthoai')";

    // Thực thi câu lệnh SQL
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Đăng ký thành công!"); window.location="../Login/Dangnhap.php";</script>';
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>
