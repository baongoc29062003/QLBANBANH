<?php
session_start();
if (!isset($_SESSION['session_id'])) {
    $_SESSION['session_id'] = session_id();
}
include('../ketnoi.php');

// Kiểm tra kết nối CSDL
if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Lấy thông tin sản phẩm
$mabanh = isset($_GET['Mabanh']) ? mysqli_real_escape_string($conn, $_GET['Mabanh']) : null;

if ($mabanh) {
    $query = "SELECT banh.*, loaibanh.Tenloaibanh, hangsx.Tenhangsx
              FROM banh
              LEFT JOIN loaibanh ON banh.Maloaibanh = loaibanh.Maloaibanh
              LEFT JOIN hangsx ON banh.Mahangsx = hangsx.Mahangsx
              WHERE Mabanh = '$mabanh'";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
}

// Xử lý thêm sản phẩm vào giỏ hàng
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $session_id = $_SESSION['session_id'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

    // Kiểm tra xem sản phẩm đã có trong giỏ chưa
    $checkQuery = "SELECT * FROM cart WHERE session_id = '$session_id' AND Mabanh = '$mabanh'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Tăng số lượng nếu sản phẩm đã tồn tại
        $updateQuery = "UPDATE cart SET quantity = quantity + $quantity WHERE session_id = '$session_id' AND Mabanh = '$mabanh'";
        mysqli_query($conn, $updateQuery);
    } else {
        // Thêm sản phẩm mới vào giỏ
        $insertQuery = "INSERT INTO cart (session_id, Mabanh, quantity) VALUES ('$session_id', '$mabanh', $quantity)";
        mysqli_query($conn, $insertQuery);
    }

    // Chuyển hướng về giỏ hàng
    header("Location: /BTLNHOM14/Cart/giohang.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="stylesheet" href="./chitiet.css">
    <link rel="stylesheet" href="../Header/header.css">
    <link rel="stylesheet" href="../Menu/menu.css">
    <link rel="stylesheet" href="../Footer/footer.css">
    <link rel="stylesheet" href="../Cart/giohang.css">
</head>
<body>
<?php include('../Header/header.php'); include('../Menu/menu.php'); ?>

<div class="product-detail-container">
    <?php if ($product): ?>
        <div class="product-image">
            <img src="../Img/<?php echo $product['Hinh']; ?>" alt="<?php echo $product['Tenbanh']; ?>">
        </div>
        <div class="product-info">
            <p><?php echo $product['Tenloaibanh']; ?></p>
            <h1><?php echo $product['Tenbanh']; ?></h1>
            <h3>Mô tả</h3>
            <p><?php echo $product['Mota']; ?></p>
            <p><strong>Chất liệu:</strong> <?php echo $product['Nguyenlieu']; ?></p>
            <p><strong>Thương hiệu:</strong> <?php echo $product['Tenhangsx']; ?></p>
            <div class="product-price">
                <span><?php echo number_format($product['Dongia']); ?> đ</span>
            </div>
            <form action="" method="post">
                <input type="hidden" name="Mabanh" value="<?php echo $product['Mabanh']; ?>">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
                </br></br>
                <button type="submit" name="add_to_cart" class="add-to-cart">Thêm vào giỏ hàng</button>
            </form>
        </div>
    <?php else: ?>
        <p>Không tìm thấy sản phẩm.</p>
    <?php endif; ?>
</div>

<?php include('../Footer/footer.php'); ?>
</body>
</html>
