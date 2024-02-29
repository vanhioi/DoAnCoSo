<?php
    session_start();
    ob_start();
    include "../model/connect.php";
    include "../model/user.php";
    if((isset($_POST['dangnhap']))&&($_POST['dangnhap'])) {
        $user=$_POST['user'];
        $pass=$_POST['pass']
    } else {
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - ADMIN</title>
</head>
<body>
    <div class="main">
        <h2>LOGIN</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <input type="text" name="user" id="">
            <input type="text" name="pass" id="">
            <input type="submit" name="dangnhap" value="ĐĂNG NHẬP">
        </form>
    </div>
</body>
</html>