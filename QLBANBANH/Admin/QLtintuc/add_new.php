<?php
session_start();
ob_start();
include('../../ketnoi.php');

// Kiểm tra quyền truy cập
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../../Login/Dangnhap.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Mới Tin</title>
    <link rel="stylesheet" href="../../Header/header.css">
    <link rel="stylesheet" href="../menuAD/menuCon.css">
    <link rel="stylesheet" href="../../Footer/footer.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            font-size: 14px;
        }

        .form_group button {
            width: 48%;
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #45a049;
        }

        .img-preview {
            margin-top: 10px;
            text-align: center;
        }

        .img-preview img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php
    include("../../Header/header.php");
    include("../menuAD/menuNgang.php");
    ?>

    <div class="container">
        <h2>Thêm Mới Tin</h2>
        <form action="xuly_themtin.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
            <div class="form-group">
                <label for="txtTitle">Title</label>
                <input type="text" id="txtTitle" name="txtTitle" required>
            </div>
            <div class="form-group">
                <label for="txtContent">Content</label>
                <textarea id="txtContent" name="txtContent" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="filHinh">Hình Ảnh</label>
                <input type="file" id="filHinh" name="filHinh" accept="image/*" required>
                <div class="img-preview" id="imgPreview"></div>
            </div>
            <div class="form_group">
                <button type="submit" class="button">Thêm</button>
                <button type="reset" class="button">Reset</button>
            </div>
        </form>
    </div>

    <script>
        const fileInput = document.getElementById("filHinh");
        const imgPreview = document.getElementById("imgPreview");

        fileInput.addEventListener("change", function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imgPreview.innerHTML = `<img src="${e.target.result}" alt="Preview Image">`;
                };
                reader.readAsDataURL(file);
            } else {
                imgPreview.innerHTML = "";
            }
        });

        function validateForm() {
            const title = document.getElementById("txtTitle").value.trim();
            const content = document.getElementById("txtContent").value.trim();
            const fileInput = document.getElementById("filHinh").value;

            if (!title) {
                alert("Vui lòng nhập Title.");
                return false;
            }
            if (!content) {
                alert("Vui lòng nhập Content.");
                return false;
            }
            if (!fileInput) {
                alert("Vui lòng chọn hình ảnh.");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
