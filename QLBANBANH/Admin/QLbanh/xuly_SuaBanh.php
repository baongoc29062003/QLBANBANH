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
    $chen1;
    $tensua =  $masua =  $loiIch =  $hinh = "";
    $trongluong =  $dongia = 0;
    $hangsua = $loaisua =  $tpdd = "";
    if (!empty($_POST)) {
        $mabanh = $_POST["txtMaBanh"];
        $tenbanh = $_POST["txtTenBanh"];
        $tenhang = $_POST["selTenHang"];
        $tenloai = $_POST["selTenLoai"];
        $nguyenlieu = $_POST["txtNguyenLieu"];
        $dongia = $_POST["txtDonGia"];
        $mota = $_POST["txtMota"];
    }
    if (isset($_POST["filHinh"])) {
        $hinh = $_POST["filHinh"];
    }
    if ($hinh == "") {
        $chen1 = "UPDATE banh SET Tenbanh = '" . $tenbanh . "',
        Mahangsx = '" . $tenhang . "', Maloaibanh= '" . $tenloai . "',
        Nguyenlieu = '" . $nguyenlieu . "',
        Dongia = '" . $dongia . "', Mota = '" . $mota . "' 
        WHERE Mabanh = '" . $mabanh . "'";
    } else {
        $hinh = 'images/' . $hinh;
        $chen1 = "UPDATE banh SET Tenbanh = '" . $tenbanh . "',
        Mahangsx = '" . $tenhang . "', Maloaibanh= '" . $tenloai . "',
        Nguyenlieu = '" . $nguyenlieu . "',
        Dongia = '" . $dongia . "', Mota = '" . $mota . "',
        Hinh = '" . $hinh . "' 
        WHERE Mabanh = '" . $mabanh . "'";
    }
    $chen = mysqli_query($conn, $chen1);
    if ($chen) {
        echo '<script language="javascript">
            alert("Sửa bản ghi bánh thành công");
             window.location="../TrangchuAdmin.php";
            </script>';
    } else {
        echo '<script language="javascript">
            alert("Có lỗi trong quá trình xử lý");
             window.location="Suabanh.php";
            </script>';
    }
    ?>
</body>
<script language="javascript">
    alert("");
    window.location = "../TrangchuAdmin.php";
</script>

</html>