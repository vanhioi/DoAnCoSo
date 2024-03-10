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
        <link rel="icon" href="https://i.pinimg.com/564x/39/dc/1b/39dc1b252746629529475184b6883fc0.jpg"/>
        <link rel="stylesheet" href="css/index.css">
        <title>ADMIN</title>
    </head>
    <body>
        <?php 
        include("../DATABASE/connect.php");
        include("header.php");
        include("sidebar.php");
        if(isset($_GET['quanly'])){
            $id = $_GET['quanly'];
            switch ($id) {
                case 'themsanpham':
                    include("view/themsanpham.php");
                    break;
                case 'themdanhmuc':
                    include("view/themdanhmuc.php");
                        break;
                case 'themdanhmucsanpham':
                    include("view/themdanhmucsanpham.php");
                       break;
                case 'suadanhmuc':
                    include("view/suadanhmuc.php");
                        break;
                case 'suasanpham':
                    include("view/suasanpham.php");
                    break;
                case 'suadanhmucsanpham':
                    include("view/suadanhmucsanpham.php");
                    break;
                case 'xulythemsanpham':
                    include("xuly/xulythemsanpham.php");
                    break;
                case 'xulythemdanhmuc':
                    include("xuly/xulythemdanhmuc.php");
                    break;
                case 'xulythemdanhmucsanpham':
                    include("xuly/xulythemdanhmucsanpham.php");
                    break;
                case 'timkiemsanpham':
                    include("view/timkiemsanpham.php");
                    break;
                case 'danhsachsanpham':
                    include("view/danhsachsanpham.php");
                    break;
                case 'danhmuc':
                    include("view/danhmuc.php");
                    break;
                case 'danhmucsanpham':
                    include("view/danhmucsanpham.php");
                    break;
                case 'themsizesp':
                    include("view/themsize.php");
                    break;
                case 'user':
                    include("view/user.php");
                    break;
                case 'xoa':
                    include("view/xoa.php");
                    break;
            }
        }
        
        else {
            include("5khungvuong.php");
        }
		
        
        ?>
    </body>
</html>