<?php
include('../ketnoi.php');

// Lấy danh sách bài viết
$query = "SELECT * FROM news ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Menu/menuCon.css">
    <link rel="stylesheet" href="./news.css">
    <link rel="stylesheet" href="../Header/header.css">
    <link rel="stylesheet" href="../Menu/menu.css">
    <link rel="stylesheet" href="../Footer/footer.css">
</head>

<body>
    <?php
    include('../Header/header.php');
    include('../Menu/menu.php')
    ?>
    <!-- Thanh menu -->
    
    <!-- Danh sách bài viết -->
    <div class="container my-4">
        <div class="row">
            <!-- Tin tức chính -->
            <div class="col-lg-8">
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="card mb-4">
                            <img src="../Img/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                                <p class="card-text"><?php echo substr($row['content'], 0, 100); ?>...</p>
                                <a href="chitietnew.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Đọc tiếp</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Không có bài viết nào.</p>
                <?php endif; ?>
            </div>

            <!-- Bài viết mới nhất -->
            <div class="col-lg-4">
    <h5>Bài viết mới nhất</h5>
    <ul class="list-group">
        <?php
        $recent_query = "SELECT * FROM news ORDER BY created_at DESC LIMIT 5";
        $recent_result = mysqli_query($conn, $recent_query);
        while ($recent = mysqli_fetch_assoc($recent_result)): ?>
            <li class="list-group-item d-flex align-items-center">
                <!-- Hiển thị hình ảnh bài viết -->
                <img src="../Img/<?php echo $recent['image']; ?>" alt="<?php echo $recent['title']; ?>" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px; border-radius: 5px;">
                <!-- Hiển thị tiêu đề bài viết -->
                <div>
                    <a href="./chitietnew.php?id=<?php echo $recent['id']; ?>" style="font-weight: bold; text-decoration: none; color: #007bff;">
                        <?php echo $recent['title']; ?>
                    </a>
                    <br>
                    <small style="color: #555;"><?php echo date('d-m-Y', strtotime($recent['created_at'])); ?></small>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
</div>

        </div>
    </div>

    <?php
    include('../Footer/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
