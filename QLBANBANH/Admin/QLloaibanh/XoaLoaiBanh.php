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
    <title>Xóa Loại Bánh</title>
    <?php
    // if($_SESSION["lgadmin"] == null || $_SESSION["lgadmin"]=="")
    // {
    //     header("location:Dangnhap_admin.php");
    // }
    ?>
</head>

<body>
    <?php
    $Maloaibanh = isset($_GET['Maloaibanh']) ? $_GET['Maloaibanh'] : 0;
    $db = "DELETE FROM loaibanh WHERE Maloaibanh = '" . $Maloaibanh . "'";
    $xoa = mysqli_query($conn, $db);
    if ($xoa) {
        echo '<script language="javascript">alert("Loại bánh này đã bị xóa");
       window.location="Danhsachloaibanh.php";
       </script>';
    }
    mysqli_close($conn);
    ?>
</body>

</html>