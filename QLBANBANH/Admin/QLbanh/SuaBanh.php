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
    <title>Sửa sữa</title>
    <?php
    // if($_SESSION["lgadmin"] == null || $_SESSION["lgadmin"]=="")
    // {
    //     header("location:Dangnhap_admin.php");
    // }
    ?>
    <link rel="stylesheet" href="./style1.css">
    <link rel="stylesheet" href="../../Header/header.css">
    <link rel="stylesheet" href="../menuAD/menuCon.css">
    <style>
        img {
            width: 50px;
            height: 30px;
            margin-top: 0px;
        }

        .khung-anh {
            width: 60px;
            height: 60px;
            margin-left: 5px;
            position: absolute;
            top: 5px;
            right: 50px;
        }

        <?php
        // if($_SESSION["lgadmin"] == null || $_SESSION["lgadmin"] ==""){
        //     header("location:Dangnhap_admin.php");
        // }
        ?>
    </style>
    <script language="javascript">
        function HienThi() {
            var duongdan = window.document.themmoi.filHinh.value;
            if (duongdan != "") {
                window.document.themmoi.filHinh.src = "images/" + duongdan;
            }
        }

        function kiemtrasua() {
            var tenbanh = "",
                mabanh = "",
                nguyenlieu = "",
                hinh = "";
            var dongia = "",
                mota = "",
                maloai = "",
                tenhang = "";
            mabanh = document.getElementById("txtMaBanh");
            tenbanh = document.getElementById("txtTenBanh");
            tenhang = document.getElementById("selTenHang");
            tenloai = document.getElementById("selTenLoai");
            nguyenlieu = document.getElementById("txtNguyenLieu");
            dongia = document.getElementById("txtDonGia");
            mota = document.getElementById("txtMoTa");
            hinh = document.getElementById("filHinh");

            if (masua.value == "") {
                alert("Bạn chưa nhập mã bánh, mời nhập lại!");
                mabanh.focus();
                return false;
            } else {
                if (tensua.value == "") {
                    alert("Bạn chưa nhập tên bánh, mời nhập lại!");
                    tenbanh.focus();
                    return false;
                } else {
                    if (tenhang.value == "") {
                        alert("Bạn chưa nhập hãng bánh, mời nhập lại!");
                        tenhang.focus();
                        return false;
                    } else {
                        if (tenloai.value == "") {
                            alert("Bạn chưa nhập loại bánh, mời nhập lại!");
                            tenloai.focus();
                            return false;
                        } else {
                            if (nguyenlieu.value == "") {
                                alert("Bạn chưa nhập nguyên liệu, mời nhập lại!");
                                nguyenlieu.focus();
                                return false;
                            } else {
                                if (dongia.value == "") {
                                    alert("Bạn chưa nhập đơn giá, mời nhập lại!");
                                    dongia.focus();
                                    return false;
                                } else {
                                    if (mota.value == "") {
                                        alert("Bạn chưa nhập mô tả, mời nhập lại!");
                                        mota.focus();
                                        return false;
                                    } 
                                }
                            }
                        }
                    }
                }
            }
        }
    </script>
</head>

<body>
<?php
        include "../../Header/header.php";
        include "../menuAD/menuNgang.php";
        ?>
    <?php
    $Mabanh = isset($_GET['Mabanh']) ? $_GET['Mabanh'] : 0;
    $db = "SELECT * FROM banh where Mabanh = '" . $Mabanh . "'";
    $query = mysqli_query($conn, $db);
    if (mysqli_num_rows($query) == "") {
        echo "Chưa có mặt hàng bánh cần sửa";
    } else {
        $result = mysqli_fetch_array($query);
    }
    ?>
    <div class="container">
        <?php
        include "header.php";
        include "menuNgang.php";
        ?>
        <div class="khung">
            <div class="form-group" style="margin-bottom: 40px">
                <h2>SỬA SẢN PHẨM BÁNH</h2>
                <div id="imgContainer" class="khung-anh">
                <?php
                    $dd = $result['Hinh'];
                    if (strpos($dd, "https") !== false) {
                    ?>
                        <img src="<?php echo $result['Hinh'] ?>" alt="">
                    <?php
                    } else {
                    ?>
                        <img src="../<?php echo $result['Hinh'] ?>" alt="">
                    <?php }
                    ?>
                </div>
                <!-- return kiemtrasua() -->
                <form action="xuly_SuaBanh.php?Mabanh=<?php echo $result['Mabanh']  ?>" method="post" onsubmit="return kiemtrasua()">
                    <div class="form-group">
                        <label class="label">Mã bánh</label>
                        <input type="text" id="txtMaBanh" name="txtMaBanh" class="form-control" value="<?php echo $result['Mabanh'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="label">Tên bánh</label>
                        <input type="text" id="txtTenBanh" name="txtTenBanh" value="<?php echo $result['Tenbanh'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Tên hãng sản xuất</label>
                        <?php
                        $db = "SELECT * FROM hangsx";
                        $query = mysqli_query($conn, $db);
                        if (mysqli_num_rows($query) > 0) {
                        ?>
                            <select name="selTenHang" id="selTenHang" style="font-size: 16px" class="form-control">
                                <option value="">-- Chọn hãng sản xuất --</option>
                                <?php
                                while ($row = mysqli_fetch_array($query)) { 
                                    $selected = ($row['Mahangsx'] == $result['Mahangsx']) ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $row['Mahangsx']; ?>"<?php echo $selected; ?>>
                                        <?php echo $row['Tenhangsx']; ?>
                                    </option>
                                <?php }
                                ?>
                            </select>
                        <?php }
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="label">Loại bánh</label>
                        <?php
                        $sql = "SELECT * FROM loaibanh";
                        $loai = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($loai) > 0) {
                        ?>
                            <select name="selTenLoai" id="selTenLoai" style="font-size: 16px" class="form-control">
                                <option value="">-- Chọn loại bánh --</option>
                                <?php
                                while ($hang = mysqli_fetch_array($loai)) { 
                                    $selected = ($hang['Maloaibanh'] == $result['Maloaibanh']) ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $hang['Maloaibanh']; ?>"<?php echo $selected; ?>>
                                        <?php echo $hang['Tenloaibanh']; ?>
                                    </option>
                                <?php }
                                ?>
                            </select>
                        <?php }
                        ?>
                    </div>

                    <div class="form-group">
                        <label class="label">Nguyên liệu</label>
                        <input type="text" id="txtNguyenLieu" name="txtNguyenLieu" value="<?php echo $result['Nguyenlieu'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Đơn giá</label>
                        <input type="number" id="txtDonGia" name="txtDonGia" value="<?php echo $result['Dongia'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Mô tả</label>
                        <textarea name="txMoTa" id="txMoTa" rows="3" cols="30" class="form-control">
                    <?php echo $result['Mota'] ?>
                    </textarea>
                    </div>
                    <div class="form-group">
                        <label class="label">Hình</label>
                        <input type="file" id="filHinh" name="filHinh" class="form-control">
                    </div>
                    <div class="form_group">
                        <button type="submit" class="button">Sửa</button>
                        <button type="reset" class="button">Reset</button>
                    </div>

                </form>
                <script>
                    const fileInput = document.getElementById("filHinh");
                    const imgContainer = document.getElementById("imgContainer");
                    fileInput.addEventListener('change', function() {
                        const file = fileInput.files[0];
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const imgUrl = e.target.result;
                            imgContainer.innerHTML = `<img src="${imgUrl}" alt="Product Image">`;
                        };
                        reader.readAsDataURL(file);
                    });
                </script>
            </div>
        </div>
        
    </div>
</body>

</html>