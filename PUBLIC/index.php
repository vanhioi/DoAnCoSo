<?php ob_start();?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="https://img.icons8.com/emoji/48/books-emoji.png"/>
        <title>Nike - 2hand</title>
    </head>

    <body>
        <?php 
        include("view/header.php");
        include("view/trangchu.php");
        include("view/footer.php");
        ?>
    </body>
</html>

<?php ob_end_flush(); ?>