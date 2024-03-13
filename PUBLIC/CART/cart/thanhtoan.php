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

    $idKH = 0;

    // lấy id khách hàng
    if(isset($_SESSION['idKH'])) {
        $idKH = $_SESSION['idKH'];
    }
    
    // đưa dữ liệu vào session file sau sử dụng lại.
    $_SESSION['ten'] = $ten;
    $_SESSION['email'] = $email;
    $_SESSION['dienthoai'] = $dienthoai;
    $_SESSION['diachi'] = $diachi;
    $_SESSION['ghichu'] = $ghichu;
    $_SESSION['phuongthuc'] = $phuongthuc;
    $_SESSION['idKH'] = $idKH; // có hoặc 0 đều đc
    echo(gettype($idKH));
    echo "Id: $idKH<br>";
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
    $status_id = 1; // Giả sử giá trị bạn muốn gán là 1

    // Kiểm tra xem giá trị tồn tại trong bảng order_status hay không
    $check_status_query = "SELECT COUNT(*) FROM order_status WHERE id = $status_id";
    $result = $conn->query($check_status_query);

    if ($result && $result->fetch_assoc()['COUNT(*)'] > 0) {
        // Giá trị hợp lệ, tiếp tục với INSERT INTO
    } else {
        // Giá trị không hợp lệ, xử lý lỗi hoặc đưa ra thông báo
        echo "Lỗi: Giá trị status không hợp lệ.";
        return;
    }

    $sql = "INSERT INTO `order` (
        `idKH`,
        `fullname`,
        `email`,
        `phone_number`,
        `address`,
        `note`,
        `status`,
        `order_id`, 
        `id_phuongthuc`
    )
    VALUES ($idKH, '$ten','$email', '$dienthoai', 
    '$diachi', '$ghichu', 1, 1, $phuongthuc)";
    
    if ($conn->query($sql) === TRUE) {
        // Lấy ID của bản ghi order vừa được thêm
        $id = mysqli_insert_id($conn);
        $_SESSION['order_id'] = $id;

        
        // Duyệt qua danh sách sản phẩm
        foreach ($products as $sanpham) {
            

            // Tạo câu lệnh INSERT INTO
            $sql = "INSERT INTO `order_details` 
    (`order_id`, `masp`, `idKH`, `gia`, `soluong`)
    VALUES (
        $id,
        " . intval($sanpham["masp"]) . ",
        " . intval($idKH["idKH"]) . ",
        " . intval($sanpham["gia"]) . ",
        " . $sanpham["soluong"] . "
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
