<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng xuất</title>
</head>
<body>
    <div>
        
    </div>
</body>
</html>
<?php
    session_start();
    session_destroy(); // Hủy bỏ thông tin người dùng khi đăng xuất
    header("location: index.php");
?>