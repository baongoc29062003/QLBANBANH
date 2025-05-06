<?php
session_start();
ob_start();
include ('../../ketnoi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Mới Bánh</title>
    <link rel="stylesheet" href="./style1.css">
    <link rel="stylesheet" href="../../Header/header.css">
    <link rel="stylesheet" href="../menuAD/menuCon.css">
    <link rel="stylesheet" href="../../Footer/footer.css">
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

        function kiemtrabanh() {
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
                                }else {
                                            if (hinh.value == "") {
                                                alert("Bạn chưa chọn hình, mời chọn hình!");
                                                hinh.focus();
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
    <div class="container">
        
        <div class="khung">
            <div class="form-group" style="margin-bottom: 40px">
                <h2>Thêm mới sản phẩm</h2>
                <div id="imgContainer" class="khung-anh">

                </div>
                <!-- return kiemtrasua() -->
                <form action="xuly_ThemBanh.php" method="post" onsubmit="return kiemtrabanh()">
                    <div class="form-group">
                        <label class="label">Mã Bánh</label>
                        <input type="text" id="txtMaBanh" name="txtMaBanh" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Tên Bánh</label>
                        <input type="text" id="txtTenbanh" name="txtTenbanh" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Tên Hãng SX</label>
                        <?php
                        $db = "SELECT * FROM hangsx";
                        $query = mysqli_query($conn, $db);
                        if (mysqli_num_rows($query) > 0) {
                        ?>
                            <select name="selTenHang" id="selTenHang" style="font-size: 16px" class="form-control">
                                <option value="">-- Chọn Hãng Sản Xuất --</option>
                                <?php
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <option value="<?php echo $row['Mahangsx']; ?>">
                                        <?php echo $row['Tenhangsx']; ?>
                                    </option>
                                <?php }
                                ?>
                            </select>
                        <?php }
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="label">Tên loại Bánh</label>
                        <?php
                        $sql = "SELECT * FROM loaibanh";
                        $loai = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($loai) > 0) {
                        ?>
                            <select name="selTenLoai" id="selTenLoai" style="font-size: 16px" class="form-control">
                                <option value="">-- Chọn Loại Bánh --</option>
                                <?php
                                while ($hang = mysqli_fetch_array($loai)) { ?>
                                    <option value="<?php echo $hang['Maloaibanh']; ?>">
                                        <?php echo $hang['Tenloaibanh']; ?>
                                    </option>
                                <?php }
                                ?>
                            </select>
                        <?php }
                        ?>
                    </div>

                    <div class="form-group">
                        <label class="label">Nguyên Liệu</label>
                        <input type="text" id="txtNguyenLieu" name="txtNguyenLieu" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Đơn Giá</label>
                        <input type="number" id="txtDonGia" name="txtDonGia" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Mô Tả</label>
                        <textarea name="txtMoTa" id="txtMoTa" rows="3" cols="20" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="label">Hinh</label>
                        <input type="file" id="filHinh" name="filHinh" class="form-control">
                    </div>
                    <div class="form_group">
                        <button type="submit" class="button">Thêm</button>
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
       
  
</body>

</html>