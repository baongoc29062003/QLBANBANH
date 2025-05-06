<?php
include('../ketnoi.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./danhsachsp.css">
</head>
<body>
    <div class="titleds">
        <p>TẤT CẢ SẢN PHẨM</p>
    </div>
    <?php
    $sql = "SELECT banh.Tenbanh as tenbanh, banh.Dongia as dongia, banh.Hinh as hinh FROM banh";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) == 0)
    {
        echo"Chưa có sản phẩm nào";
    }
    else {?>
        
            <div class="danhsachsp-container">
        
            <?php while($row = mysqli_fetch_array($result)) {?>
            <div class="khung">
            <div class="imgsp">
                <img src="../Img/<?php echo $row['hinh'] ?>" alt="">
            </div>
            <div class="content">
                <h3><?php echo $row['tenbanh'] ?></h3>
                <h2><?php echo $row['dongia'] ?> đ </h2>
            </div>
        </div>
        <?php 
    }
    ?>
    <?php } ?>

    </div>
</body>
</html>