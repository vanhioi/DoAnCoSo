<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['idKH'])) {
    header('Location: login.php'); // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="css/index.css">
        <title>ADMIN</title>
    </head>
    <body>
        <?php 
        include("../DATABASE/connect.php");
        include("header.php");
        include("sidebar.php");
        if(isset($_GET['quanly'])){
            $tam = $_GET['quanly'];
        } else {
            $tam = '';
        }
        if($tam =='themsanpham'){
            include("view/themsanpham.php");
        }

        else if($tam =='suasanpham'){
            include("view/suasanpham.php");
        }
        
        else if($tam =='xulythemsanpham'){
            include("xuly/xulythemsanpham.php");
        }

        else if($tam =='timkiemsanpham'){
            include("view/timkiemsanpham.php");
        }

        else if($tam =='danhsachsanpham'){
            include("view/danhsachsanpham.php");
        }

        else if($tam =='themsizesp'){
            include("view/themsize.php");
        }
		else if($tam =='danhmuc'){
            include("view/danhmuc.php");
        }
        
        else {
            include("5khungvuong.php");
        }
		
        include("footer.php");
        
        ?>
    </body>
</html>