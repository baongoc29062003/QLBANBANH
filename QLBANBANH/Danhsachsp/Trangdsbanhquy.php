<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banh mì</title>
    <link rel="stylesheet" href="./Danhsachstyle.css">
    <link rel="stylesheet" href="../Header/header.css">
    <link rel="stylesheet" href="../Menu/menu.css">
    <link rel="stylesheet" href="../Footer/footer.css">
</head>
<body>

<?php 
    include('../Header/header.php');
    include('../Menu/menu.php');
    ?>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>DANH MỤC</h2>
            <hr>
            <ul>
                <li><a href="./Trangdanhsachsp.php">Tất cả sản phẩm</a></li>
                <li><a href="./Trangdsbanhkem.php">Bánh kem</a></li>
                <li><a href="./Trangdsbanhmi.php">Bánh mì</a></li>
                <li><a href="./Trangdsbanhngot.php">Bánh ngọt</a></li>
                <li><a href="./Trangdsbanhquy.php">Bánh quy</a></li>
            </ul>
        </aside>

        <!-- Product List -->
        <main class="product-list">
            <h1>Bánh quy</h1>
            <div class="products">
            <?php 
            include('../ketnoi.php'); 

            $sql = "SELECT banh.Tenbanh as tenbanh, banh.Dongia as dongia, banh.Hinh as hinh, banh.Mabanh as mabanh
                    FROM banh WHERE banh.Maloaibanh = 'LB04'";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 0) {
                echo "Chưa có sản phẩm nào";
            } else {
                while ($row = mysqli_fetch_array($result)) { ?>
                   <a href="../Chitiet/Chitietsp.php?Mabanh=<?php echo $row['mabanh']; ?>">
                   <div class="product">
                        <img src="../Img/<?php echo $row['hinh']; ?>" alt="<?php echo $row['tenbanh']; ?>">
                        <h3><?php echo $row['tenbanh']; ?></h3>
                        <p class="price"><?php echo $row['dongia']; ?> đ</p>
                    </div>
                   </a> 
                <?php }
            } ?>
            </div>
        </main>
    </div>

    <?php include('../Footer/footer.php');
    ?>
</body>
</html>
