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
    <title>Sửa Bánh</title>
    <?php
    // if($_SESSION["lgadmin"] == null || $_SESSION["lgadmin"]=="")
    // {
    //     header("location:Dangnhap_admin.php");
    // }
    ?>
    <link rel="stylesheet" href="../QLbanh/style1.css">
    <link rel="stylesheet" href="../../Header/header.css">
    <link rel="stylesheet" href="../menuAD/menuCon.css">
    <link rel="stylesheet" href="../../Footer/footer.css">
    <style>
        .khung1{
            width: 500px;
            height: auto;
            margin: 0 auto;
            min-height: 700px;
            padding: 10px 20px;
            box-shadow: 0 0 5px red;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .form-group{
            width: 100%;
            margin: 10px 2px;
            height: 35px;
        }

        <?php
        // if($_SESSION["lgadmin"] == null || $_SESSION["lgadmin"] ==""){
        //     header("location:Dangnhap_admin.php");
        // }
        ?>
    </style>
    <script language="javascript">

        function kiemtraloaibanh() {
            var tenloaibanh = "",
                maloaibanh = "";
            maloaibanh = document.getElementById("txtMaLoaiBanh");
            tenloaibanh = document.getElementById("txtTenLoaiBanh");

            if (maloaibanh.value == "") {
                alert("Bạn chưa nhập mã loại bánh, mời nhập lại!");
                maloaibanh.focus();
                return false;
            } else {
                if (tenloaibanh.value == "") {
                    alert("Bạn chưa nhập tên loại bánh, mời nhập lại!");
                    tenloaibanh.focus();
                    return false;
                }
            }
        }
    </script>
</head>

<body>
    <?php
    $Maloaibanh = isset($_GET['Maloaibanh']) ? $_GET['Maloaibanh'] : 0;
    $db = "SELECT * FROM loaibanh where Maloaibanh = '" . $Maloaibanh . "'";
    $query = mysqli_query($conn, $db);
    if (mysqli_num_rows($query) == "") {
        echo "Chưa có mặt hàng loại bánh cần sửa";
    } else {
        $result = mysqli_fetch_array($query);
    }
    ?>
    <div class="container">
        <?php
        include "../../Header/header.php";
        include "../menuAD/menuNgang.php";
        ?>
        <div class="khung1">
            <div class="form-group" style="margin-bottom: 40px">
                <h2>SỬA SẢN PHẨM LOẠI BÁNH</h2>
                <div id="imgContainer" class="khung-anh">
                <!-- return kiemtraloaibanh() -->
                <form action="xuly_SuaLoaiBanh.php?Mabanh=<?php echo $result['Maloaibanh']  ?>" method="post" onsubmit="return kiemtraloaibanh()">
                    <div class="form-group">
                        <label class="label">Mã loại bánh</label>
                        <input type="text" id="txtMaLoaiBanh" name="txtMaLoaiBanh" class="form-control" value="<?php echo $result['Maloaibanh'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="label">Tên loại bánh</label>
                        <input type="text" id="txtTenLoaiBanh" name="txtTenLoaiBanh" value="<?php echo $result['Tenloaibanh'] ?>" class="form-control">
                    </div>
                    <div class="form_group">
                        <button type="submit" class="button">Sửa</button>
                        <button type="reset" class="button">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        include "../../Footer/footer.php";
        ?>
</body>

</html>