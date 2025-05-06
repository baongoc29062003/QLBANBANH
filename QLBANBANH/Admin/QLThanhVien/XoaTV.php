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
    <title>Xóa Thành Viên</title>
    <?php
    // if($_SESSION["lgadmin"] == null || $_SESSION["lgadmin"]=="")
    // {
    //     header("location:Dangnhap_admin.php");
    // }
    ?>
</head>

<body>
    <?php
    $id = isset($_GET['user_id']) ? $_GET['user_id'] : 0;
    $db = "DELETE FROM users WHERE user_id = '" . $id . "'";
    $xoa = mysqli_query($conn, $db);
    if ($xoa) {
        echo '<script language="javascript">alert("Thành viên này đã bị xóa");
       window.location="../TrangchuAdmin.php";
       </script>';
    }
    mysqli_close($conn);
    ?>
</body>

</html>