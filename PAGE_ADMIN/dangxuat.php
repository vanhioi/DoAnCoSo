<?php
    session_start();
    session_destroy(); // Hủy bỏ thông tin người dùng khi đăng xuất
    header("location: login.php");
?>