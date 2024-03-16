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

    // lấy id khách hàng
    $idKH = isset($_SESSION['idKH']) ? $_SESSION['idKH'] : 1;

    // đưa dữ liệu vào session file sau sử dụng lại.
    $_SESSION['ten'] = $ten;
    $_SESSION['email'] = $email;
    $_SESSION['dienthoai'] = $dienthoai;
    $_SESSION['diachi'] = $diachi;
    $_SESSION['ghichu'] = $ghichu;
    $_SESSION['phuongthuc'] = $phuongthuc;
    $_SESSION['idKH'] = $idKH; // có hoặc 0 đều đc
    echo (gettype($idKH));
    echo "Id: $idKH<br>";
    echo "Họ và tên: $ten<br>";
    echo "Email: $email<br>";
    echo "Số điện thoại: $dienthoai<br>";
    echo "Địa chỉ: $diachi<br>";
    echo "Ghi chú: $ghichu<br>";
    echo "Phương thức thanh toán: $phuongthuc<br>";


    // lấy dữ liệu cart
    $products = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    var_dump($products);


    // Chuyển đổi phương thức thanh toán thành mã tương ứng
    switch ($phuongthuc) {
        case "chuyenkhoan":
            $phuongthuc_id = 2;
            break;
        case "momo":
            $phuongthuc_id = 3;
            break;
        default:
            $phuongthuc_id = 1;
            break;
    }

    // // Ví dụ: Lưu vào cơ sở dữ liệu MySQL
    $conn = new mysqli("localhost", "root", "", "shopgiay");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Chạy truy vấn để kiểm tra giá trị status_id
    $status_id = 1; // Giả sử giá trị bạn muốn gán là 1
    $check_status_query = "SELECT COUNT(*) AS count FROM order_status WHERE id = $status_id";
    $result = $conn->query($check_status_query);

    if ($result && $result->fetch_assoc()['count'] > 0) {
        // Giá trị hợp lệ, tiếp tục với INSERT INTO
        $sql = "INSERT INTO `order` (
            `idKH`,
            `fullname`,
            `email`,
            `phone_number`,
            `address`,
            `note`,
            `status`,
            `id_phuongthuc`
        )
        VALUES (
            $idKH,
            '$ten',
            '$email',
            '$dienthoai',
            '$diachi',
            '$ghichu',
            1,
            $phuongthuc_id
        )";

        if ($conn->query($sql) === TRUE) {
            // Lấy ID của bản ghi order vừa được thêm
            $order_id = $conn->insert_id;

            // Duyệt qua danh sách sản phẩm trong giỏ hàng
            foreach ($products as $sanpham) {
                // Tạo câu lệnh INSERT INTO cho bảng order_details
                $sql_order_detail = "INSERT INTO `order_details` 
                    (`order_id`, `masp`,`idKH`, `gia`, `soluong`)
                    VALUES (
                        $order_id,
                        " . intval($sanpham["masp"]) . ",
                         $idKH,
                        " . floatval($sanpham["gia"]) . ",
                        " . intval($sanpham["soluong"]) . "
                    )";

                // Thực thi câu lệnh INSERT INTO
                if (!$conn->query($sql_order_detail)) {
                    echo "Lỗi khi thêm chi tiết đơn hàng: " . $conn->error;
                    exit;
                }
            }

            
            // Đã lưu dữ liệu thành công, chuyển hướng về trang cần thiết
            $url = 'http://localhost/DoAnCoSo/PUBLIC/index.php?pid=8';
           // Chuyển hướng
            header('Location: ' . $url);
            exit;
        } else {
            echo "Lỗi khi thêm đơn hàng: " . $conn->error;
        }
    } else {
        echo "Lỗi: Giá trị status không hợp lệ.";
    }
    $conn->close();
}
