<?php ob_start();?>

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
                    include('view/shop.php');
                    break;
                
            }
        } else{
            include("view/trangchu.php");
        }
        include("view/footer.php");
        ?>
    </body>
</html>

<?php ob_end_flush(); ?>