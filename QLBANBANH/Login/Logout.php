<?php
session_start();
session_destroy(); // Hủy toàn bộ session
header("location: /BTLNHOM14/Login/Dangnhap.php");
exit();
?>