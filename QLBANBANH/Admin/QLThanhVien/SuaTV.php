<?php
session_start();
ob_start();
include "../../ketnoi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thành Viên</title>
    <?php
    // if($_SESSION["lgadmin"] == null || $_SESSION["lgadmin"]=="")
    // {
    //     header("location:Dangnhap_admin.php");
    // }
    ?>
    <link rel="stylesheet" href="../QLbanh/style1.css">
    <link rel="stylesheet" href="../../Header/header.css">
    <link rel="stylesheet" href="../menuAD/menuCon.css">
    <link rel="stylesheet" href="../../Footer/footer.css">
    <style>
        .khung1{
            width: 500px;
            height: auto;
            margin: 0 auto;
            min-height: 700px;
            padding: 10px 20px;
            box-shadow: 0 0 5px red;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .form-group{
            width: 100%;
            margin: 10px 2px;
            height: 35px;
        }

        <?php
        // if($_SESSION["lgadmin"] == null || $_SESSION["lgadmin"] ==""){
        //     header("location:Dangnhap_admin.php");
        // }
        ?>
    </style>
    <script language="javascript">
        function kiemtratv() {
            var id = "",
                user = "",
                pass = "",
                hoten = "";
            var diachi = "",
                dt = "",
                role="";

                id = document.getElementById("txtid");
                user = document.getElementById("txtuser");
                pass = document.getElementById("txtpass");
                hoten = document.getElementById("txthoten");
                diachi = document.getElementById("txtdiachi");
                dt = document.getElementById("txtdt");
                role = document.getElementById("seltrole");

            if (id.value == "") {
                alert("Bạn chưa nhập ID, mời nhập lại!");
                id.focus();
                return false;
            } else {
                if (user.value == "") {
                    alert("Bạn chưa nhập tài khoản, mời nhập lại!");
                    user.focus();
                    return false;
                } else {
                    if (pass.value == "") {
                        alert("Bạn chưa nhập mật khẩu, mời nhập lại!");
                        pass.focus();
                        return false;
                    } else {
                        if (hoten.value == "") {
                            alert("Bạn chưa nhập họ tên, mời nhập lại!");
                            hoten.focus();
                            return false;
                        } else {
                            if (diachi.value == "") {
                                alert("Bạn chưa nhập địa chỉ, mời nhập lại!");
                                diachi.focus();
                                return false;
                            } else {
                                if (dt.value == "") {
                                    alert("Bạn chưa nhập điện thoại, mời nhập lại!");
                                    dt.focus();
                                    return false;
                                } else {
                                    if (role.value == "") {
                                        alert("Bạn chưa chọn quyền, mời chọn lại!");
                                        role.focus();
                                        return false;
                                    } 
                                }
                            }
                        }
                    }
                }
            }
        }
    </script>
</head>

<body>
    <?php
    $id = isset($_GET['user_id']) ? $_GET['user_id'] : 0;
    $db = "SELECT * FROM users where user_id = '" . $id . "'";
    $query = mysqli_query($conn, $db);
    if (mysqli_num_rows($query) == 0) {
        echo "Chưa có thành viên cần sửa";
        exit;
    }else {
        $result = mysqli_fetch_array($query);
    }if (!$query) {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }    
    ?>
    <div class="container">
        <?php
        include "../../Header/header.php";
        include "../menuAD/menuNgang.php";
        ?>
        <div class="khung1">
            <div class="form-group" style="margin-bottom: 40px">
                <h2>SỬA THÀNH VIÊN</h2>
                <!-- return kiemtratv() -->
                <form action="xuly_SuaTV.php?user_id=<?php echo $result['user_id']  ?>" method="post" onsubmit="return kiemtratv()">
                    <div class="form-group">
                        <label class="label">ID</label>
                        <input type="text" id="txtid" name="txtid" class="form-control" value="<?php echo $result['user_id'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label class="label">Tài khoản</label>
                        <input type="text" id="txtuser" name="txtuser" value="<?php echo $result['username'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Mật khẩu</label>
                        <input type="text" id="txtpass" name="txtpass" value="<?php echo $result['password'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Quyền</label>
                        <?php
                        $db = "SELECT * FROM roles";
                        $query = mysqli_query($conn, $db);
                        if (mysqli_num_rows($query) > 0) {
                        ?>
                            <select name="selrole" id="selrole" style="font-size: 16px" class="form-control">
                                <option value="">-- Chọn quyền --</option>
                                <?php
                                while ($row = mysqli_fetch_array($query)) { 
                                    $selected = ($row['role_id'] == $result['role_id']) ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $row['role_id']; ?>"<?php echo $selected; ?>>
                                        <?php echo $row['role_name']; ?>
                                    </option>
                                <?php }
                                ?>
                            </select>
                        <?php }
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="label">Họ tên</label>
                        <input type="text" id="txthoten" name="txthoten" value="<?php echo $result['Hoten'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Địa chỉ</label>
                        <input type="text" id="txtdiachi" name="txtdiachi" value="<?php echo $result['Diachi'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="label">Số điện thoại</label>
                        <input type="text" id="txtdt" name="txtdt" value="<?php echo $result['Dienthoai'] ?>" class="form-control">
                    </div>
                    <div class="form_group">
                        <button type="submit" class="button">Sửa</button>
                        <button type="reset" class="button">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        include "../../Footer/footer.php";
        ?>
</body>

</html>