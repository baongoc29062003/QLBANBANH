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
    $tenbanh =  $mabanh =  $nguyenlieu = $mota =  $hinh = "";
    $dongia = 0;
    $tenhang = $tenloai = "";
    $gt = "";
    if (isset($_POST["txtMaBanh"])) {
        $mabanh = $_POST["txtMaBanh"];
    }
    if (isset($_POST["txtTenBanh"])) {
        $tenbanh = $_POST["txtTenBanh"];
    }
    if (isset($_POST["selTenHang"])) {
        $tenhang = $_POST["selTenHang"];
    }
    if (isset($_POST["selTenLoai"])) {
        $tenloai = $_POST["selTenLoai"];
    }
    if (isset($_POST["txtNguyenLieu"])) {
        $nguyenlieu = $_POST["txtNguyenLieu"];
    }
    if (isset($_POST["txtDonGia"])) {
        $dongia = $_POST["txtDonGia"];
    }
    if (isset($_POST["txtMoTa"])) {
        $mota = $_POST["txtMoTa"];
    }
    if (isset($_POST["filHinh"])) {
        $hinh = $_POST["filHinh"];
    }
    $hinh = 'images/' . $hinh;
    if (isset($_POST["gt"])) {
        $gt = $_POST["gt"];
    }
    echo $gt;
    $sql = "SELECT * FROM banh WHERE Mabanh = '$mabanh' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Trùng mã bánh, mời nhập lại!");
       window.location="ThemBanh.php";
       </script>';
        die();
    } else {
        $chen = "INSERT INTO banh(Mabanh, Tenbanh, Nguyenlieu, Dongia, Mota, Maloaibanh, Mahangsx, Hinh) 
        VALUES('" . $mabanh . "', '" . $tenbanh . "', '" . $nguyenlieu . "', '" . $dongia . "', '" . $mota . "', '" . $tenloai . "', '" . $tenhang . "',  '" . $hinh . "')";
        $result2 =  mysqli_query($conn, $chen);
        if ($result2) {
            echo '<script language="javascript">alert("Thêm bánh thành công!");
       window.location="../TrangchuAdmin.php";
       </script>';
        } else {
            echo '<script language="javascript">alert("Có lỗi, mời nhập lại!");
       window.location="ThemBanh.php";
       </script>';
        }
    }
    ?>
</body>

</html>