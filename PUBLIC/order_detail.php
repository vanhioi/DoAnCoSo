<?php
session_start();
// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['idKH'])) {
    // Nếu chưa đăng nhập, bạn có thể thêm mã HTML hoặc mã PHP để chuyển hướng đến trang đăng nhập.
    header("Location: login.php");
    exit; // Đảm bảo chuyển hướng hoạt động đúng cách
}

// Kiểm tra xem id của đơn hàng đã được truyền qua URL hay không
if (!isset($_GET['id'])) {
    echo "ID đơn hàng không hợp lệ.";
    exit;
}

// Lấy ID đơn hàng từ URL
$orderID = $_GET['id'];

// Kết nối cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "shopgiay");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn SQL để lấy thông tin chi tiết đơn hàng
$sql = "SELECT * FROM `order_details` WHERE order_id = $orderID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
    <center style="padding: 20px">
        <div class="" style="padding-bottom: 15px;">
            <h1>Chi tiết đơn hàng</h1>
            <a href="javascript:history.go(-1);">Quay lại</a>
        </div>
        <div class="">
            <table border='1' style="padding-bottom: 20px;">
                <tr>
                    <th>ID Sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
                <?php
                // Hiển thị thông tin chi tiết của đơn hàng
                while ($row = $result->fetch_assoc()) {
                    $productID = $row['masp'];
                    $sql_product = "SELECT * FROM `sanpham` WHERE idSP = $productID";
                    $result_product = $conn->query($sql_product);
                    if ($result_product->num_rows > 0) {
                        $product_info = $result_product->fetch_assoc();
                ?>
                        <tr>
                            <td><?php echo $product_info['idSP']; ?></td>
                            <td><?php echo $product_info['tenSP']; ?></td>
                            <td><?php echo $row['soluong']; ?></td>
                            <td><?php echo number_format($row['gia'], 0, ',', '.') . ' VNĐ'; ?></td>
                        </tr>
                <?php
                    } else {
                        echo "Không tìm thấy thông tin sản phẩm.";
                    }
                }
                ?>
            </table>
        </div>
    </center>
<?php
} else {
    echo "Không có chi tiết đơn hàng nào.";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>