<?php ob_start();?>

<?php
    // session_start();
    if(isset($_SESSION['nguoidung'])){
    $nguoidung = $_SESSION['nguoidung'];
   }
?>

<?php
    $conn = new mysqli("localhost", "root", "", "shopgiay");

    $sql = "SELECT * FROM loaisp"; 
    
    $resultSql = $conn->query($sql);
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="https://i.pinimg.com/564x/39/dc/1b/39dc1b252746629529475184b6883fc0.jpg"/>
        <title>Nike - 2hand</title>
    </head>

    <body>
        <?php 
        include("view/header.php");
        if (isset($_GET["pid"])) {
            $id = $_GET["pid"];
            switch ($id) {
                case '1':
                    include("view/spnew.php");
                    break;
                case '2':
                    include("view/spsale.php");
                    break;
                case '3':
                    include("profile.php");
                    break;    
                case '4':
                    include("CART/cart/cart.php");
                    break;
                case '5':
                    include("CART/cart/info.php");
                    break;
                case '6':
                    include('CART/cart/confirm.php');
                    break;
                case 'product_detail':
                    include('chitietsanpham.php');
                    break;
                case '7':
                    if(isset($_GET['ind'])&& $_GET['ind']>=0){
                        session_start();
                        array_splice($_SESSION['cart'],$_GET['ind'],1);
                        header('location:CART/cart/cart.php');
                      }
                      break;
        }} else {
            include("view/trangchu.php");
            include("view/danhmuc.php");
            include("view/allproducts.php");  
            include("view/women.php");
            include("view/kids.php");
            include("view/men.php"); 
        }
        include("view/footer.php");
        ?>

    </body>
</html>

<?php ob_end_flush(); ?>
