<?php
session_start();
include('../ketnoi.php');

// Lấy session_id của người dùng
$session_id = session_id();
$user_id = $_SESSION['user_id'] ?? null;

// Xử lý xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['Mabanh'])) {
    $mabanh = mysqli_real_escape_string($conn, $_GET['Mabanh']);
    $deleteQuery = "DELETE FROM cart WHERE session_id = '$session_id' AND Mabanh = '$mabanh'";
    mysqli_query($conn, $deleteQuery);
    header("Location: giohang.php");
    exit();
}

// Lấy danh sách sản phẩm trong giỏ hàng
$query = "SELECT cart.quantity, banh.*
          FROM cart
          INNER JOIN banh ON cart.Mabanh = banh.Mabanh
          WHERE cart.session_id = '$session_id'";
$result = mysqli_query($conn, $query);

// Tính tổng tiền
$totalPrice = 0;
$cart_items = [];
while ($row = mysqli_fetch_assoc($result)) {
    $subtotal = $row['Dongia'] * $row['quantity'];
    $totalPrice += $subtotal;
    $cart_items[] = [
        'Mabanh' => $row['Mabanh'],
        'Tenbanh' => $row['Tenbanh'],
        'quantity' => $row['quantity'],
        'price' => $row['Dongia'],
        'image' => $row['Hinh'],
        'subtotal' => $subtotal
    ];
}

// Xử lý thanh toán
if (isset($_POST['checkout']) && $user_id) {
    // Tạo hóa đơn
    $insertOrder = "INSERT INTO orders (user_id, total_price) VALUES ('$user_id', '$totalPrice')";
    if (mysqli_query($conn, $insertOrder)) {
        $order_id = mysqli_insert_id($conn);

        // Lưu chi tiết hóa đơn
        foreach ($cart_items as $item) {
            $insertDetails = "INSERT INTO order_details (order_id, Mabanh, quantity, price, subtotal)
                              VALUES ('$order_id', '{$item['Mabanh']}', '{$item['quantity']}', '{$item['price']}', '{$item['subtotal']}')";
            mysqli_query($conn, $insertDetails);
        }

        // Xóa giỏ hàng
        $deleteCart = "DELETE FROM cart WHERE session_id = '$session_id'";
        mysqli_query($conn, $deleteCart);

        echo '<script>alert("Thanh toán thành công! Đơn hàng của bạn đã được ghi nhận.");</script>';
        header("Location: ../Trangchu/trangchu.php");
        exit();
    } else {
        echo '<script>alert("Đã xảy ra lỗi trong quá trình thanh toán.");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="./giohang1.css">
    <link rel="stylesheet" href="../Header/header.css">
    <link rel="stylesheet" href="../Menu/menu.css">
    <link rel="stylesheet" href="../Footer/footer.css">
</head>
<body>
<?php include('../Header/header.php'); include('../Menu/menu.php'); ?>

<div class="cart-container">
    <div class="sp">
        <h1>Giỏ Hàng (<?php echo count($cart_items); ?> sản phẩm)</h1>
        <?php if (!empty($cart_items)): ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><img src="../Img/<?php echo $item['image']; ?>" alt="<?php echo $item['Tenbanh']; ?>" class="product-image"></td>
                            <td><?php echo $item['Tenbanh']; ?></td>
                            <td><?php echo number_format($item['price']); ?> đ</td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo number_format($item['subtotal']); ?> đ</td>
                            <td>
                                <a href="giohang.php?action=delete&Mabanh=<?php echo $item['Mabanh']; ?>" class="delete-btn" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="tt">
            <div class="cart-summary">
                <p><strong>Tổng tiền:</strong> <?php echo number_format($totalPrice); ?> đ</p>
                <form method="post">
                    <button type="submit" name="checkout" class="checkout-btn">Thanh toán ngay</button>
                    <button type="button" class="continue-btn" onclick="window.location.href='../Trangchu/trangchu.php'">Tiếp tục mua hàng</button>
                </form>
            </div>
        <?php else: ?>
            <p>Giỏ hàng của bạn đang trống.</p>
            <button class="continue-btn" onclick="window.location.href='../Trangchu/trangchu.php'">Tiếp tục mua hàng</button>
        <?php endif; ?>
        </div>
    </div>
</div>

<?php include('../Footer/footer.php'); ?>
</body>
</html>
