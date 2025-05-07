<?php
session_start();
ob_start();
include "../../ketnoi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hóa đơn</title>
    <?php
    // if($_SESSION["lgadmin"] == null || $_SESSION["lgadmin"]="")
    // {
    //     header("location:Dangnhap_admin.php");
    // }
    ?>
    <link rel="stylesheet" href="../../Header/header.css">
    <link rel="stylesheet" href="../menuAD/menuCon.css">
    <link rel="stylesheet" href="../../Footer/footer.css">
    <link rel="stylesheet" href="./hoadon.css">
</head>

<body>
<?php
    $i = 0;
    $db = "SELECT order_details.detail_id as id,
    order_details.quantity as sl, order_details.price as gia, 
    order_details.subtotal as tong, users.Hoten as tenkh 
    FROM order_details
    INNER JOIN orders ON order_details.order_id = orders.order_id
    INNER JOIN users ON orders.user_id = users.user_id";
    $result = mysqli_query($conn, $db);
    if (mysqli_num_rows($result) == 0) {
        echo "Chưa có đơn hàng nào";
    }
    include "../../Header/header.php";
    include "../menuAD/menuNgang.php";
    ?>
    <table cellspacing="0" cellpadding="5px" border="1" style="width:100%">
        <caption>
            <h2 style="font-style: bold; font-size:30px">DANH SÁCH HÓA ĐƠN</h2>
        </caption>
        <thead>
            <tr style=" font-size: 20px; ">
                <th>STT</th>
                <th>Mã hóa đơn</th>
                <th>Tên khách hàng</th>
                <th>Số Lượng</th>
                <th>Đơn giá</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr style="text-align: center; font-size: 20px;">
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['tenkh']; ?></td>
                <td><?php echo $row['sl']; ?></td>
                <td><?php echo $row['gia']; ?></td>
                <td><?php echo $row['tong']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
        include "../../Footer/footer.php";
    ?>
</body>

</html>