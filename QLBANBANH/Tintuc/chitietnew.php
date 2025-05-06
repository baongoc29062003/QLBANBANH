<?php
include('../ketnoi.php');

// Lấy bài viết theo ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$query = "SELECT * FROM news WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    die("Không tìm thấy bài viết.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['title']; ?></title>
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
    <div class="container my-4">
        <div class="row">
            <div class="col-lg-8">
                <img src="../Img/<?php echo $row['image']; ?>" class="img-fluid" alt="<?php echo $row['title']; ?>">
                <h1 class="mt-4"><?php echo $row['title']; ?></h1>
                <p class="text-muted">Ngày đăng: <?php echo date('d-m-Y', strtotime($row['created_at'])); ?></p>
                <p><?php echo $row['content']; ?></p>
            </div>
        </div>
    </div>
    <?php
    include('../Footer/footer.php') ?>
</body>

</html>
