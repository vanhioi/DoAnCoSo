<?php
   session_start();
    if (isset($_POST['submit'])) {
        $id = $_POST['idSP'];
        $img = $_POST['img'];
        $title = $_POST['tenSP'];
        $price = $_POST['gia'];

            var_dump($id);
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $item_exists = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($id == $item['masp']) {
                $item_exists = true;
                $item['soluong']++; // tăng số lượng nếu sản phẩm không tồn tại
            }
        }

        if (!$item_exists) {
            $product = array('masp' => $id, 'img' => $img, 'tenSP' => $title, 'gia' => $price, 'soluong' => 1);
            $_SESSION['cart'][] = $product;
        }
    } 

header("Location: ../index.php?pid=4");

?>
