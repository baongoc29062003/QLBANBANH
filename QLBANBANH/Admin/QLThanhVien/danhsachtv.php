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
    <title>Quản lý Thành Viên</title>
    <?php
    // if($_SESSION["lgadmin"] == null || $_SESSION["lgadmin"]="")
    // {
    //     header("location:Dangnhap_admin.php");
    // }
    ?>
    <link rel="stylesheet" href="../../Header/header.css">
    <link rel="stylesheet" href="../menuAD/menuCon.css">
    <link rel="stylesheet" href="../../Footer/footer.css">
    <link rel="stylesheet" href="./thanhvien.css">
</head>

<body>
<?php
    $i = 0;
    $db = "SELECT * FROM users ";
    $result = mysqli_query($conn, $db);

    include "../../Header/header.php";
    include "../menuAD/menuNgang.php";
    ?>
    <table cellspacing="0" cellpadding="5px" border="1" style="width:100%">
        <caption>
            <h2 style="font-style: bold; font-size:30px">QUẢN LÝ THÀNH VIÊN</h2>
        </caption>
        <thead>
            <tr style=" font-size: 20px; ">
                <th>STT</th>
                <th>ID</th>
                <th>Tài Khoản</th>
                <th>Mật Khẩu</th>
                <th>Họ Tên</th>
                <th>Địa Chỉ</th>
                <th>Điện Thoại</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (!$result) {
                    die("Lỗi truy vấn: " . mysqli_error($conn));
                }
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr style="text-align: center; font-size: 20px;">
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['Hoten']; ?></td>
                        <td><?php echo $row['Diachi']; ?></td>
                        <td><?php echo $row['Dienthoai']; ?></td>
                        <td>
                            <a href="SuaTV.php?user_id=<?php echo $row['user_id']; ?>" style="text-decoration: none;">Edit</a>
                        </td>
                        <td>
                            <a href="XoaTV.php?user_id=<?php echo $row['user_id']; ?>" style="text-decoration: none;"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa thành viên này không?')">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
        </tbody>
    </table>

    </br></br>
    <?php
    include "../../Footer/footer.php";
    ?>
</body>

</html>