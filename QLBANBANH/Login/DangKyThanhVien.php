<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('../ketnoi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hoten = $_POST['txtHoten'];
    $username = $_POST['txtUser'];
    $password = $_POST['txtPass'];
    $diachi = $_POST['txtDiachi'];
    $dienthoai = $_POST['txtDienthoai'];
    $role_id = 2; // Mặc định là thành viên

    // Thêm người dùng vào cơ sở dữ liệu
    $query = "INSERT INTO users (username, password, Hoten, Diachi, Dienthoai, role_id)
              VALUES ('$username', '$password', '$hoten', '$diachi', '$dienthoai', $role_id)";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Đăng ký thành công!"); window.location="./Dangnhap.php";</script>';
    } else {
        echo '<script>alert("Có lỗi xảy ra, vui lòng thử lại!");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký thành viên</title>
    <link rel="stylesheet" href="./dangky1.css">
    <script>
        // Hàm validate số điện thoại
        function validateForm() {
            const phone = document.getElementById('txtDienthoai').value;
            const phoneRegex = /^(0[3|5|7|8|9])+([0-9]{8})$/;
            if (!phoneRegex.test(phone)) {
                alert("Số điện thoại không hợp lệ. Vui lòng nhập lại!");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Đăng ký thành viên</h1>
            <p>Trở thành một phần của gia đình bánh ngọt ngay hôm nay!</p>
        </div>
        <form action="" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="txtHoten">Họ và tên</label>
                <input type="text" id="txtHoten" name="txtHoten" required>
            </div>
            <div class="form-group">
                <label for="txtUser">Tên đăng nhập</label>
                <input type="text" id="txtUser" name="txtUser" required>
            </div>
            <div class="form-group">
                <label for="txtPass">Mật khẩu</label>
                <input type="password" id="txtPass" name="txtPass" required>
            </div>
            <div class="form-group">
                <label for="txtDiachi">Địa chỉ</label>
                <input type="text" id="txtDiachi" name="txtDiachi" required>
            </div>
            <div class="form-group">
                <label for="txtDienthoai">Số điện thoại</label>
                <input type="text" id="txtDienthoai" name="txtDienthoai" required>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn-submit">Đăng ký</button>
            </div>
        </form>
    </div>
</body>

</html>
