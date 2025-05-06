<?php
session_start();
include('../ketnoi.php');

// Kiểm tra kết nối cơ sở dữ liệu
if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

$error = ""; // Biến lưu thông báo lỗi

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy thông tin từ form
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $password = trim($_POST['password']);

    // Sử dụng Prepared Statements để tránh SQL Injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // So sánh trực tiếp mật khẩu dạng plaintext
        if ($password === $user['password']) {
            // Lưu thông tin vào session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role_id'] = $user['role_id'];

            // Điều hướng dựa trên vai trò
            if ($user['role_id'] == 1) {
                header('Location: /BTLNHOM14/Admin/TrangchuAdmin.php'); // Trang quản trị
            } else {
                header('Location: /BTLNHOM14/Trangchu/Trangchu.php'); // Trang thành viên
            }
            exit();
        } else {
            $error = "Mật khẩu không chính xác!";
        }
    } else {
        $error = "Tên đăng nhập không tồn tại!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG NHẬP</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style1.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('../Img/slider_image_4.jpeg');
            background-size: cover;
            margin: 0;
        }

        .khung {
            width: 350px;
            padding: 20px;
            background-color: #c0d434;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            width: 100%;
            height: 30px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: white;
            background-color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .khung a {
            color: #007bff;
            text-decoration: none;
        }

        .khung a:hover {
            text-decoration: underline;
        }

        .error-message {
            margin-top: 10px;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="khung">
        <?php
        // Hiển thị thông báo lỗi
        if (!empty($error)) {
            echo "<div class='error-message'>$error</div>";
        }
        ?>

        <h2>ĐĂNG NHẬP</h2>
        <form action="" method="post">
            <div class="form-group">
                <label class="label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="button">ĐĂNG NHẬP</button>
            </div>
        </form>
        <div style="margin-top: 30px;">Bạn chưa có tài khoản, bấm vào đây để:
            <a href="DangKyThanhVien.php"><b>Đăng Ký</b></a>.
        </div>
        <div style="margin: 5px 0;">Quên mật khẩu, bấm vào đây để: <a href="Quenmatkhau.php">Lấy Lại</a>.</div>
    </div>
</body>

</html>
