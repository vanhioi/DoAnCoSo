<?php

session_start();

if (isset($_POST["submit"])) {
   
    $id = $_POST["id"];
    $order_date = $_POST['order_date'];
    // $status = 
    //$shippping_method_id = 
    //$billing_adress_id = 
    $shipping_address_id = $_POST['id'];
    $productArray = array($img, $tenSP, $gia, $id, $quantity);

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    $_SESSION["cart"][] = $productArray;
    

    header("Location: ../../index.php?pid=5");
    exit();
}
