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
    <title>Quản lý Loại Bánh</title>
    <?php
    // if($_SESSION["lgadmin"] == null || $_SESSION["lgadmin"]="")
    // {
    //     header("location:Dangnhap_admin.php");
    // }
    ?>
    <link rel="stylesheet" href="../../Header/header.css">
    <link rel="stylesheet" href="../menuAD/menuCon.css">
    <link rel="stylesheet" href="../../Footer/footer.css">
</head>

<body>
    <?php
    $i = 0;
    $db = "SELECT * FROM loaibanh";
    $result = mysqli_query($conn, $db);
    if (mysqli_num_rows($result) == "") {
        echo "Chưa có sản phẩm nào";
    }
    include "../../Header/header.php";
    include "../menuAD/menuNgang.php";
    ?>
    <table cellspacing="0" cellpadding="5px" border="1" style="width:100%">
        <caption>
            <h2 style="font-style: bold; color:#0000FF; font-size:30px">QUẢN LÝ LOẠI BÁNH</h2>
        </caption>
        <thead>
            <tr style="background-color: #ccc; font-size: 20px; color: #FF00FF;">
                <th>STT</th>
                <th>Mã Loại bánh</th>
                <th>Tên Loại bánh</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr style="text-align: center; font-size: 20px;"></tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['Maloaibanh']; ?></td>
                <td><?php echo $row['Tenloaibanh']; ?></td>
                <td>
                    <a href="Sualoaibanh.php?Maloaibanh=<?php echo $row['Maloaibanh']; ?>" style="text-decoration: none;">Edit</a>
                </td>
                <td>
                    <a href="XoaLoaiBanh.php?Maloaibanh=<?php echo $row['Maloaibanh']; ?>" style="text-decoration: none;"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa loại này không?')">Delete</a>
                </td>
            <?php
            }
            ?>
        </tbody>
    </table>
    </br> </br> </br> </br>

    <?php
    include "../../Footer/footer.php";
    ?>
</body>

</html>