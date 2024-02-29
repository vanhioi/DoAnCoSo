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
		if(isset($_GET['act'])){
			switch ($_GET['act']) {
				case 'danhmuc':
					include "view/danhmuc.php";
					break;
				case 'danhmuc':
					include "view/sanpham.php";
					break;
				case 'danhmuc':
					include "view/users.php";
					break;
				case 'danhmuc':
					include "view/quanlidonhang.php";
					break;
				default:
					include "view/admin.php";
					break;
			}
		}else {
            include "view/admin.php";
        }
	?>

    </body>
</html>

<?php ob_end_flush(); ?>