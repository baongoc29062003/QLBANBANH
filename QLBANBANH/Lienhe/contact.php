<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<?php
include('../ketnoi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    

    $query = "INSERT INTO contacts (name, email, phone, message) 
              VALUES ('$name', '$email', '$phone', '$message')";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm.");</script>';
    } else {
        echo '<script>alert("Đã xảy ra lỗi. Vui lòng thử lại sau.");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="../Header/header.css">
    <link rel="stylesheet" href="../Menu/menu.css">
    <link rel="stylesheet" href="../Footer/footer.css">
</head>


<body>
    <?php
    include('../Header/header.php');
    include('../Menu/menu.php');
    ?>
    <div class="container">
        <div class="header">
            <h1>Liên Hệ</h1>
            <p>Chúng tôi rất vui khi nhận được ý kiến đóng góp của bạn!</p>
        </div>
        <form action="" method="post" class="contact-form">
            <div class="form-group">
                <label for="name">Họ và tên</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="message">Lời nhắn</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Gửi</button>
            </div>
        </form>
    </div>
    <?php
    include('../Footer/footer.php'); ?>
</body>

</html>
