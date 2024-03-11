<?php
session_start();
// Kiểm tra xem form đã được submit chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Lấy dữ liệu từ form
    $ten = $_POST["ten"];
    $email = $_POST["email"];
    $dienthoai = $_POST["dienthoai"];
    $diachi = $_POST["diachi"];
    $ghichu = $_POST["ghichu"];
    $phuongthuc = $_POST["phuongthuc"];
    $user_id = 0;

    // lấy id khách hàng
    if(isset($_SESSION['idKH'])) {
        $user_id = $_SESSION['idKH'];
    }

    // đưa dữ liệu vào session file sau sử dụng lại.
    $_SESSION['ten'] = $ten;
    $_SESSION['email'] = $email;
    $_SESSION['dienthoai'] = $dienthoai;
    $_SESSION['diachi'] = $diachi;
    $_SESSION['ghichu'] = $ghichu;
    $_SESSION['phuongthuc'] = $phuongthuc;
    $_SESSION['user_id'] = $user_id; // có hoặc 0 đều đc
    echo(gettype($user_id));
    echo "Id: $user_id<br>";
    echo "Họ và tên: $ten<br>";
    echo "Email: $email<br>";
    echo "Số điện thoại: $dienthoai<br>";
    echo "Địa chỉ: $diachi<br>";
    echo "Ghi chú: $ghichu<br>";
    echo "Phương thức thanh toán: $phuongthuc<br>";


    // lấy dữ liệu cart
    $products = $_SESSION['cart'];
    var_dump($products);
    


    if ($phuongthuc == "chuyenkhoan") $phuongthuc = 2;
    else if($phuongthuc == "momo") $phuongthuc = 3;
    else $phuongthuc = 1;

    // // Ví dụ: Lưu vào cơ sở dữ liệu MySQL
    $conn = new mysqli("localhost", "root", "", "shopgiay");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO `order` (
        `user_id`,
        `fullname`,
        `email`,
        `phone_number`,
        `address`,
        `note`,
        `status`,
        `ship_method`, 
        `order_id`, 
        `id_phuongthuc`
    )
    VALUES ($user_id, '$ten','$email', '$dienthoai', 
    '$diachi', '$ghichu', 1, 1, 1, $phuongthuc)";
    if ($conn->query($sql) === TRUE) {
        // Lấy ID của bản ghi order vừa được thêm
        $id = mysqli_insert_id($conn);
        $_SESSION['order_id'] = $id;
        // Duyệt qua danh sách sản phẩm
        foreach ($products as $product) {
            // Tạo câu lệnh INSERT INTO
            $sql = "INSERT INTO `order_details` 
            VALUES (
                $id,
                " . intval($product["masp"]) . ",
                " . intval($user_id) . ",
                " . intval($product["price"]) . ",
                " . $product["soluong"] . "
            )";

            // Thực thi câu lệnh INSERT INTO
            if(!mysqli_query($conn, $sql)) return;
            
        }

        // tất cả hoàn tất
        echo "Đã lưu dữ liệu thành công";

        // lưu dữ liệu xong cho về lại trang
        header('location:index.php?pid=6');
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    }
?>
