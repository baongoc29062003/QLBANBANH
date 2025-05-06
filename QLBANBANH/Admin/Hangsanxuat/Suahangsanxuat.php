<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa hãng sản xuất</title>
    <link rel="stylesheet" href="./Danhsachstyle.css">
    <link rel="stylesheet" href="../../Header/header.css">
    <link rel="stylesheet" href="../menuAD/menuCon.css">
    <link rel="stylesheet" href="../../Footer/footer.css">
</head>
<body>

    <?php 
         include('../../Header/header.php');
         include('../menuAD/menuNgang.php');
        include('../../ketnoi.php');

        if (isset($_GET['mahangsx'])) {
            $maHangSX = $_GET['mahangsx'];

            $sql = "SELECT * FROM hangsx WHERE Mahangsx = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("s", $maHangSX);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                } else {
                    echo "Không tìm thấy nhà sản xuất.";
                    exit();
                }
                $stmt->close();
            } else {
                echo "Lỗi: " . $conn->error;
                exit();
            }
        } else {
            echo "Mã hãng sản xuất không hợp lệ.";
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenHangSX = $_POST['name'];
            $diaChi = $_POST['address'];
            $sdt = $_POST['phone'];
            $email = $_POST['email'];

            $updateSql = "UPDATE hangsx SET Tenhangsx = ?, Diachi = ?, Email = ?, Sdt = ? WHERE Mahangsx = ?";
            if ($updateStmt = $conn->prepare($updateSql)) {
                $updateStmt->bind_param("sssss", $tenHangSX, $diaChi, $email, $sdt, $maHangSX);
                if ($updateStmt->execute()) {
                    $_SESSION['message'] = "Cập nhật thông tin thành công!";
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Lỗi: " . $updateStmt->error;
                }
                $updateStmt->close();
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        $conn->close();
    ?>
    <div class="container">
        <div class="header-item">
            <div class="item back">
                <a href="../Hangsanxuat/">Quay lại</a>
            </div>
        </div>
        <main class="product-list">
            <h1>Thêm hãng sản xuất</h1>
            <form class="form-container" action="Suahangsanxuat.php?mahangsx=<?php echo $_GET['mahangsx']; ?>" method="post">
                <?php if (!empty($errorMessage)): ?>
                    <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="code">Mã hãng sản xuất</label>
                    <input class="form-control" type="text" name="code" id="code" value="<?php echo htmlspecialchars($_GET['mahangsx']); ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="name">Tên hãng sản xuất</label>
                    <input class="form-control" type="text" name="name" id="name" value="<?php echo htmlspecialchars($row['Tenhangsx']); ?>">
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <textarea class="form-control" name="address" id="address"><?php echo htmlspecialchars($row['Diachi']); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input class="form-control" type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($row['Sdt']); ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" value="<?php echo htmlspecialchars($row['Email']); ?>">
                </div>
                <button type="submit">Cập nhật</button>
            </form>
        </main>
    </div>

    <?php include('../../Footer/footer.php');
    ?>
</body>
</html>
