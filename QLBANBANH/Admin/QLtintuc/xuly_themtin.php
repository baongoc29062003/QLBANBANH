<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
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
    $title =  $content =  $hinh = "";
    
    if (isset($_POST["txtTitle"])) {
        $title = $_POST["txtTitle"];
    }
    if (isset($_POST["txtContent"])) {
        $content = $_POST["txtContent"];
    }
    if (isset($_POST["filHinh"])) {
        $hinh = $_POST["filHinh"];
    }
    $hinh = 'images/' . $hinh;
   
    
        $chen = "INSERT INTO news(title, content, image) 
        VALUES('" . $title . "', '" . $content . "', '" . $hinh . "')";
        $result2 =  mysqli_query($conn, $chen);
        if ($result2) {
            echo '<script language="javascript">alert("Thêm tin thành công!");
       window.location="danhsachtin.php";
       </script>';
        } else {
            echo '<script language="javascript">alert("Có lỗi, mời nhập lại!");
       window.location="add_new.php";
       </script>';
        }
    
    ?>
</body>

</html>