<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ADMIN</title>
    </head>
    <body>
        <?php 
        include("view/admin.php");
        
        ?>
    </body>
</html>

<?php ob_end_flush(); ?>