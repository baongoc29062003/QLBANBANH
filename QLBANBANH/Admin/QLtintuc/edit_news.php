<?php
include('../../ketnoi.php');

$id = $_GET['id'];
$query = "SELECT * FROM news WHERE id = $id";
$result = mysqli_query($conn, $query);
$news = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $image = $_FILES['image']['name'];
    $target = "../Img/" . basename($image);

    if (!empty($image)) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $query = "UPDATE news SET title = '$title', content = '$content', image = '$image' WHERE id = $id";
    } else {
        $query = "UPDATE news SET title = '$title', content = '$content' WHERE id = $id";
    }

    if (mysqli_query($conn, $query)) {
        header("Location: danhsachtin.php");
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bài viết</title>
    <link rel="stylesheet" href="form.css">

</head>
<body>
    <div class="container my-4">
        <h1>Sửa bài viết</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo $news['title']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <textarea name="content" id="content" class="form-control" rows="5" required><?php echo $news['content']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                <img src="../Img/<?php echo $news['image']; ?>" alt="" style="width: 100px; height: 50px; margin-top: 10px;">
            </div>
            <button type="submit" class="btn btn-warning">Sửa</button>
        </form>
    </div>
</body>
</html>

