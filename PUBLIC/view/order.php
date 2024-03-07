<?php
session_start();

// thêm order vào db 
$id =($_SESSION["id"]);

    if(isset($_SESSION["id"])){
       $id =($_SESSION["id"]);

       if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $dienthoai = $_POST['dienthoai'];
        $diachi = $_POST['diachi'];
        $conn = mysqli_connect("localhost", "root", "", "web_bansach");
        $sql = "
        INSERT INTO `orders`(
            `id`,
            `user_id`,
            `fullname`,
            `email`,
            `phone_number`,
            `address`,
            `note`,
            `order_date`,
            `status`,
            `ship_method`
        )
        VALUES(
            NULL,
            '".$id."',
            '".$name."',
            NULL,
            '".$dienthoai."',
            '".$diachi."',
            NULL,
            NULL,
            NULL,
            NULL
        );
        ";
        $result = mysqli_query($conn, $sql);

        
    }

    //thêm sản phẩm chi tiết vào order detail
 function order_id (){
    $conn = mysqli_connect("localhost", "root", "", "web_bansach");
    $sql = "    SELECT * FROM orders WHERE id = (SELECT MAX(id) FROM orders)    ";
    $result = mysqli_query($conn, $sql);
    $id = mysqli_fetch_array($result);
    return $id['id'] ;
}
 $id = order_id();
//  var_dump($id);
 if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $product) {
      $quantity =$product['soluong'];
      $product_id =$product['masp'];
      $sql = "INSERT INTO `order_details`(
        `id`,
        `order_id`,
        `product_id`,
        `user_id`,
        `price`,
        `quantity`
    )
    VALUES(NULL, '".$id."', '".$product_id."', NULL, '', '".$quantity."');";
    }
    $result = mysqli_query($conn, $sql);
  }

                echo" <h3>Thanh Toán Thành Công</h3>   ";
    unset($_SESSION["cart"]);
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
}else{
    echo"Vui lòng đăng nhập để thanh toán";
}

?>
