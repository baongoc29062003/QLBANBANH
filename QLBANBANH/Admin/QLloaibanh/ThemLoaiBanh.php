<?php
session_start();
ob_start();
include "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Mới Loại Bánh</title>
    <link rel="stylesheet" href="../QLbanh/style1.css">
    <style>
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

            if (masua.value == "") {
                alert("Bạn chưa nhập mã loại bánh, mời nhập lại!");
                mabanh.focus();
                return false;
            } else {
                if (tensua.value == "") {
                    alert("Bạn chưa nhập tên loại bánh, mời nhập lại!");
                    tenbanh.focus();
                    return false;
                }
            }
        }
    </script>
    <link rel="stylesheet" href="../../Header/header.css">
    <link rel="stylesheet" href="../menuAD/menuCon.css">
    <link rel="stylesheet" href="../../Footer/footer.css">
</head>

<body>
    <div class="container">
        <?php
        include "../../Header/header.php";
        include "../menuAD/menuNgang.php";
        ?>
        <div class="khung">
            <div class="form-group" style="margin-bottom: 40px">
                <h2>Thêm mới loại bánh</h2>
                <!-- return kiemtraloaibanh() -->
                <form action="xuly_Themloaibanh.php" method="post" onsubmit="return kiemtraloaibanh()">
                    <div class="form-group">
                        <label class="label">Mã Loại Bánh</label>
                        <input type="text" id="txtMaLoaiBanh" name="txtMaLoaiBanh" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Tên Loại Bánh</label>
                        <input type="text" id="txtTenLoaiBanh" name="txtTenLoaiBanh" class="form-control">
                    </div>
                    <div class="form_group">
                        <button type="submit" class="button">Thêm</button>
                        <button type="reset" class="button">Reset</button>
                    </div>

                </form>
            </div>
        </div>
        <?php
        include "../../Footer/footer.php";
        ?>
    </div>
</body>

</html>