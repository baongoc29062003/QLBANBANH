<?php
session_start();
include('../../ketnoi.php');

// Kiểm tra quyền Admin
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../../Login/Dangnhap.php");
    exit();
}

// Lấy danh sách liên hệ từ cơ sở dữ liệu
$query = "SELECT * FROM contacts ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phản hồi liên hệ</title>
    <link rel="stylesheet" href="../../Header/header.css">
    <link rel="stylesheet" href="../menuAD/menuCon.css">
    <link rel="stylesheet" href="../../Footer/footer.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff7e6;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 50px auto;
            max-width: 800px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        h1 {
            color: #d2691e;
            text-align: center;
            margin-bottom: 20px;
        }

        .feedback {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .feedback:last-child {
            border-bottom: none;
        }

        .feedback p {
            margin: 5px 0;
        }

        .feedback h3 {
            margin: 0;
            font-size: 18px;
            color: #d2691e;
        }

        .feedback .meta {
            font-size: 14px;
            color: #888;
        }
    </style>
</head>

<body>
<?php
    include('../../Header/header.php');
    include('../menuAD/menuNgang.php');
?>

<div class="container">
    <h1>Phản hồi từ khách hàng</h1>
    <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="feedback">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <p class="meta">
                    Email: <?php echo htmlspecialchars($row['email']); ?> | 
                    SĐT: <?php echo htmlspecialchars($row['phone']); ?> | 
                    Ngày gửi: <?php echo date('d-m-Y H:i:s', strtotime($row['created_at'])); ?>
                </p>
                <p><?php echo nl2br(htmlspecialchars($row['message'])); ?></p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Không có phản hồi nào.</p>
    <?php endif; ?>
</div>

<?php
include('../../Footer/footer.php');
?>
</body>

</html>
