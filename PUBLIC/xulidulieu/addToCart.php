<?php
   session_start();
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $img = $_POST['thumbnail'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $quantity = 0; // Initialize the quantity to 0
            var_dump($id);
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $item_exists = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($id == $item['masp']) {
                $item_exists = true;
                $item['soluong']++; // Increment the quantity if the item exists
            }
        }

        if (!$item_exists) {
            $product = array('masp' => $id, 'img' => $img, 'title' => $title, 'price' => $price, 'soluong' => 1);
            $_SESSION['cart'][] = $product;
        }
    } 

header("Location: ../index.php?pid=4");

?>
