<?php
include('../../ketnoi.php');

// Lấy danh sách bài viết
$query = "SELECT * FROM news ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Header/header.css">
    <link rel="stylesheet" href="../menuAD/menuCon.css">
    <link rel="stylesheet" href="../../Footer/footer.css">
    <link rel="stylesheet" href="news.css">
</head>

<body>
<?php
    include("../../Header/header.php");
    include("../menuAD/menuNgang.php");
    ?>

    <div class="container my-4">
        <h1 class="mb-4">Quản lý bài viết</h1>
        <a href="add_new.php" class="btn btn-primary mb-3">Thêm bài viết</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><img src="../../Img/<?php echo $row['image']; ?>" alt="Ảnh" style="width: 100px; height: 50px; object-fit: cover;"></td>
                            <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                            <td>
                                <a href="edit_news.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <a href="delete_new.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Không có bài viết nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
    include('../../Footer/footer.php') ?>
</body>

</html>
