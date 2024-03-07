<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $index = $_POST['index'];
    $quantity = $_POST['quantity'];

    // Kiểm tra số lượng hợp lệ
    if ($quantity > 0) {
        // Cập nhật số lượng trong giỏ hàng
        $_SESSION['cart'][$index][4] = $quantity;
    }
}

// Chuyển hướng về trang giỏ hàng
header("Location: giohang.php");
exit();
?>
