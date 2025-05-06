<?php


include(__DIR__ . '/../Login/check_login.php');
include(__DIR__ . '/../Login/check_role.php');
checkRole(2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Header/header.css">
    <link rel="stylesheet" href="../Menu/menu.css">
    <link rel="stylesheet" href="../Footer/footer.css">
    <link rel="stylesheet" href="./Trangchu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php 
    include('../Header/header.php');
    include('../Menu/menu.php');
    ?>
    
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="5000">
      <img src="../Img/home_slider_image_1.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="../Img/slider_image_3.webp" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../Img/slider_image_4.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="sanpham">
<p >SẢN PHẨM BÁN CHẠY</p>
<div class="sanpham-container">
<div class="khung">
            <div class="imgsp">
            <a href ="../Danhsachsp/Trangdsbanhkem.php"> <img src="../Img/banh1.webp" alt=""></a>
            </div>
            <div class="content">
                <h3>Bánh Kem</h3>
            </div>
</div>
<div class="khung">
            <div class="imgsp">
               <a href ="../Danhsachsp/Trangdsbanhmi.php"> <img src="../Img/TCsanpham2.webp" alt=""></a> 
            </div>
            <div class="content">
                <h3>Bánh Mì</h3>
            </div>
</div>
<div class="khung">
            <div class="imgsp">
            <a href ="../Danhsachsp/Trangdsbanhngot.php"> <img src="../Img/TCsanpham.webp" alt=""></a>
            </div>
            <div class="content">
                <h3>Bánh Ngọt</h3>
            </div>
</div>
</div>
</div>

<div class="banner">
    <img src="../Img/banner.jpeg" alt="">
</div>

<div class="story">
    <p class="title">Câu chuyện Fresh Garden</p>
    <p class="noidung">
    Với hơn 100 cửa hàng và đại lý phân phối phủ khắp các tỉnh phía Bắc, Fresh Garden tự hào là thương hiệu bánh tươi uy tín bậc nhất với dây chuyền sản xuất tiên tiến hiện đại cùng gần 1000 nhân sự làm việc chăm chỉ không ngừng sáng tạo. Với tín đồ của bánh ngọt, mặn, bánh kem thì thật sự Fresh Garden chính là một "thế giới thu nhỏ" của bánh trái, chiều lòng bất kì vị khách nào ghé ngang. Trải qua một thập kỷ với những cung bậc sáng tạo, Fresh Garden không chỉ ghi dấu bởi chất lượng mà còn vì sự tinh tế trong từng nấc hương vị, đa dạng bánh Âu, Á và dần trở thành thói quen trong văn hóa tiêu dùng của những tín đồ yêu bánh.
    </p>
</div>

<?php
include('../Footer/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>