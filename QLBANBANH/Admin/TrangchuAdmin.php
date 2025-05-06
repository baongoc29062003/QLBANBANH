<?php
include('../Login/check_login.php');
include('../Login/check_role.php');
checkRole(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Header/header.css">
    <link rel="stylesheet" href="./menuAD/menuCon.css">
    <link rel="stylesheet" href="../Footer/footer.css">
</head>
<body>
    <?php
    include('../Header/header.php');
    include('./menuAD/menuNgang.php');
    include('./QLbanh/Danhsachbanh.php');
    include('../Footer/footer.php')
    ?>
</body>
</html>