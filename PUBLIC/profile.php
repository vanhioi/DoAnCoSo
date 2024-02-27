<?php
session_start(); // Bắt đầu phiên
?>
 
<div>
    <center>
        <img style="width:100px;" src="../IMAGES/Account.png" alt="">
        <?php if (isset($_SESSION['nguoidung'])) { ?>
            <div style="width: 30%;">
                <input type="text" value="<?php echo $_SESSION['nguoidung']; ?>" readonly>
            </div>
        <?php } else { ?>
            <div style="width: 30%;">
                <input type="text" placeholder="Tên khách hàng">
            </div>
        <?php } ?>
        <button><a href="login.php">Đăng xuất</a></button>
    </center>
 
    <style>
        input[type="text"] {
            margin-bottom: 25px;
            width: 250px;
            height: 40px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        button {
            background-color: #FFCE1A;
            border: none;
            border-radius: 10px;
            align-items: center;
        }
           
