<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "../../ketnoi.php";

    // Khởi tạo biến để tránh lỗi
    $tenloaibanh = "";
    $maloaibanh = "";

    // Kiểm tra và gán giá trị từ form
    if (isset($_POST["txtMaLoaiBanh"])) {
        $maloaibanh = $_POST["txtMaLoaiBanh"];
    }
    if (isset($_POST["txtTenLoaiBanh"])) {
        $tenloaibanh = $_POST["txtTenLoaiBanh"];
    }

    // Kiểm tra trùng lặp
    $sql = "SELECT * FROM loaibanh WHERE Maloaibanh = '$maloaibanh'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Trùng mã loại bánh, mời nhập lại!");
            window.location="Themloaibanh.php";
            </script>';
        die();
    } else {
        // Thực hiện chèn dữ liệu
        $chen = "INSERT INTO loaibanh (Maloaibanh, Tenloaibanh) 
                 VALUES ('$maloaibanh', '$tenloaibanh')";
        $result2 = mysqli_query($conn, $chen);

        if ($result2) {
            echo '<script language="javascript">alert("Thêm loại bánh thành công!");
                window.location="Danhsachloaibanh.php";
                </script>';
        } else {
            echo '<script language="javascript">alert("Có lỗi, mời nhập lại!");
                window.location="ThemLoaiBanh.php";
                </script>';
        }
    }
    ?>
</body>

</html>
