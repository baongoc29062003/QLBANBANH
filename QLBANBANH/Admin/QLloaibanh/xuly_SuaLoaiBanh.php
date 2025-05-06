<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "../../ketnoi.php";
    $tenloaibanh =  $maloaibanh = "";
    if (!empty($_POST)) {
        $maloaibanh = $_POST["txtMaLoaiBanh"];
        $tenloaibanh = $_POST["txtTenLoaiBanh"];
    }

        $them = "UPDATE loaibanh SET Tenloaibanh = '" . $tenloaibanh . "' WHERE
        Maloaibanh = '" . $maloaibanh . "'";
        $result = mysqli_query($conn, $them);
        if ($result) {
            echo '<script language="javascript">alert("Sửa loại bánh thành công!");
                window.location="./Danhsachloaibanh.php";
                </script>';
        } else {
            echo '<script language="javascript">alert("Có lỗi, mời nhập lại!");
                window.location="ThemLoaiBanh.php";
                </script>';
        }
    ?>
</body>
<script language="javascript">
    alert("");
    window.location = "Danhsachbanh.php";
</script>

</html>