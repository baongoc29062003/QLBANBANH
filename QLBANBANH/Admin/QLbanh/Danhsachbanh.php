<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ob_start();
include("../ketnoi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Bánh</title>
    <?php
    // if($_SESSION["lgadmin"] == null || $_SESSION["lgadmin"]=="")
    // {
    //     header("location:Dangnhap_admin.php");
    // }
    ?>
    <link rel="stylesheet" href="./style1.css">
    <style type="text/css">
        .khungsp {
            clear: both;
            width: 80%;
            height: 170px;
            margin: 0 auto;
            border: 1px solid #A1A1A1;
            padding: 5px 0;
        }

        h1 {
            width: 80%;
            margin: 20px auto 0;
            width: 80%;
            height: 40px;
            line-height: 40px;
            background-color: peachpuff;
            color: chocolate;
            font-weight: bolder;
            text-align: center;
            border: 1px solid #A1A1A1;
        }

        .tt {
            width: 5%;
            text-align: center;
            height: 100%;
            float: left;
            line-height: 100px;
        }

        .khungsp>img {
            width: 20%;
            height: 90%;
            float: left;
            padding: 5px;
            border-left: 1px solid #A1A1A1;
        }

        .khungsp>.thongtin {
            width: 58%;
            padding-top: 0;
            float: left;
            height: 100%;
            padding-left: 10px;
            border-left: 1px solid #A1A1A1;
        }

        .sua {
            width: 7%;
            text-align: center;
            height: 100%;
            float: left;
            border-left: 1px solid #A1A1A1;
            line-height: 100px;
        }

        .xoa {
            width: 7%;
            text-align: center;
            height: 100%;
            float: right;
            border-left: 1px solid #A1A1A1;
            line-height: 100px;
        }

        h2 {
            text-align: center;
            margin: 0px;
            padding: 3px;
        }

        p {
            margin: 5px;
            padding: 3px;
        }

        .thembanh {
            width: 150px;
            height: 30px;
            border-radius: 10px;
            box-shadow: inset 0 0 10px red;
            font-size: 20px;
            margin: 20px 0 10px 120px;
            padding: 5px;
            text-align: center;
            float: left;
            line-height: 30px;
        }

        .thembanh>a {
            text-decoration: none;
        }

        .timkiem {
            float: right;
            width: 250px;
            height: 30px;
            border-radius: 10px;
            box-shadow: inset 0 0 10px red;
            font-size: 20px;
            margin: 20px 120px 10px 0px;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
       
        <h1>THÔNG TIN CÁC SẢN PHẨM</h1>
        <div>
            <div class="thembanh">
                <a href="./QLbanh/ThemBanh.php">Thêm mới Bánh</a>
            </div>
            <div>
                <form action="./xuly_ThemBanh.php" method="get" class="timkiem">
                    <input type="text" name="timkiem">
                    <input type="submit" value="Tìm Kiếm" name="">
                </form>
            </div>
        </div>
        <?php
        include "../../ketnoi.php";
        $stt = 1;
        $db = "SELECT banh.Mabanh as mabanh, banh.Hinh as hinh, banh.Tenbanh as tenbanh, banh.Nguyenlieu as nguyenlieu, 
        banh.Dongia as dongia,banh.Mota as mota, loaibanh.Tenloaibanh as tenloai, hangsx.Tenhangsx as tenhang 
        FROM banh INNER JOIN loaibanh on banh.Maloaibanh = loaibanh.Maloaibanh
        INNER JOIN hangsx ON banh.Mahangsx = hangsx.Mahangsx;";
        $result = mysqli_query($conn, $db);
        if (mysqli_num_rows($result) == 0) {
            echo "Chưa có sản phẩm bánh nào";
        } else {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <div class="khungsp">
                    <div class="tt"><?php echo $stt++; ?></div>
                    <?php
                    $dd = $row['hinh'];
                    if (strpos($dd, "https") !== false) {
                    ?>
                        <img src="<?php echo $row['hinh'] ?>" alt="">
                    <?php
                    } else {
                    ?>
                        <img src="../Img/<?php echo $row['hinh'] ?>" alt="">
                    <?php }
                    ?>

                    <div class="thongtin">
                        <h2><?php echo $row['tenbanh'] ?></h2>
                        <p>Hãng sản xuất: <?php echo $row['tenhang'] ?></p>
                        <p>
                            <p>Tên Loại Bánh: <?php echo $row['tenloai'] ?></p>
                            <p>Nguyên Liệu: <?php echo $row['nguyenlieu'] ?></p>
                            <p>Giá: <?php echo $row['dongia'] ?>đ</p>
                        </p>
                    </div>
                    <div class="sua">
                        <a style="text-decoration: none;" href="./QLbanh/Suabanh.php?Mabanh=<?php echo $row['mabanh'] ?>">Sửa</a>
                    </div>
                    <div class="xoa">
                        <a style="text-decoration: none;"
                            href="/BTLNHOM14/Admin/QLbanh/XoaBanh.php?Mabanh=<?php echo $row['mabanh'] ?>"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa bánh này không');">
                            Xóa
                        </a>
                    </div>
                </div>
        <?php
            }
        }
        ?>
       
    </div>
</body>

</html>