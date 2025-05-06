<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm hãng sản xuất</title>
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maHangSX = $_POST['code'];
            $tenHangSX = $_POST['name'];
            $diaChi = $_POST['address'];
            $sdt = $_POST['phone'];
            $email = $_POST['email'];

            if (!preg_match("/^[a-zA-Z0-9]+$/", $maHangSX)) {
                $errorMessage = "Mã hãng sản xuất chỉ được phép chứa chữ và số, không chứa ký tự đặc biệt hoặc dấu cách!";
            } else {
                $sql = "INSERT INTO hangsx (Mahangsx, Tenhangsx, Diachi, Email, Sdt) VALUES (?, ?, ?, ?, ?)";
                
                $checkSql = "SELECT * FROM hangsx WHERE Mahangsx = ?";
                if ($checkStmt = $conn->prepare($checkSql)) {
                    $checkStmt->bind_param("s", $maHangSX);
                    $checkStmt->execute();
                    $checkResult = $checkStmt->get_result();

                    if ($checkResult->num_rows > 0) {
                        $errorMessage = "Lỗi: Mã hãng sản xuất đã tồn tại!";
                    } else {
                        $sql = "INSERT INTO hangsx (Mahangsx, Tenhangsx, Diachi, Email, Sdt) VALUES (?, ?, ?, ?, ?)";
                        
                        if ($stmt = $conn->prepare($sql)) {
                            $stmt->bind_param("sssss", $maHangSX, $tenHangSX, $diaChi, $email, $sdt);
                            if ($stmt->execute()) {
                                $_SESSION['message'] = "Thêm hãng sản xuất thành công!";
                                header("Location: index.php");
                                exit();
                            } else {
                                $errorMessage = $stmt->error; 
                            }
                            $stmt->close();
                        } else {
                            $errorMessage = $conn->error;
                        }
                    }
                    $checkStmt->close();
                } else {
                    $errorMessage = $conn->error;
                }
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
            <form class="form-container" action="Themhangsanxuat.php" method="post">
                <?php if (!empty($errorMessage)): ?>
                    <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="code">Mã hãng sản xuất</label>
                    <input class="form-control" type="text" name="code" id="code">
                </div>
                <div class="form-group">
                    <label for="name">Tên hãng sản xuất</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <textarea class="form-control" name="address" id="address"></textarea>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input class="form-control" type="text" name="phone" id="phone">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
                <button type="submit">Thêm</button>
            </form>
        </main>
    </div>

    <?php include('../../Footer/footer.php');
    ?>
</body>
</html>
