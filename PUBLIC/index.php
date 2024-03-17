<?php ob_start(); ?>

<?php
// session_start();
if (isset($_SESSION['nguoidung'])) {
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
    <link rel="icon" href="https://i.pinimg.com/564x/39/dc/1b/39dc1b252746629529475184b6883fc0.jpg" />
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
            
            case '8':
                include('view/allorder.php');
                break;
            case '9':
                include('order_detail.php');
                break;
        }
    } else {
        include("view/trangchu.php");
        include("view/danhmuc.php");
        if (isset($_GET["idsp"])) {
            $idsp = $_GET["idsp"];
            switch ($idsp) {
                case 11:
                    include("view/women.php");
                    break;
                case 12:
                    include("view/kids.php");
                    break;
                case 13:
                    include("view/men.php");
                    break;
            }
        } else {
            include("view/allproducts.php");
        }
    }
    include("view/footer.php");
    ?>

</body>

</html>

<?php ob_end_flush(); ?>
