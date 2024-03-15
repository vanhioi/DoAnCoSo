<?php
session_start();
// Lấy ID khách hàng từ session
$idKH = isset($_SESSION['idKH']) ? $_SESSION['idKH'] : 0;

// Kiểm tra xem người dùng đã đăng nhập chưa

// Kết nối cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "shopgiay");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn SQL để lấy danh sách các đơn hàng của người dùng
$sql = "SELECT * FROM `order` WHERE idKH = $idKH ORDER BY id DESC";
$result = $conn->query($sql);

// Tạo mảng kết hợp để lưu trữ tên của các trạng thái
$statusNames = array();
$sql2 = "SELECT * FROM `order_status`";
$statusResult = $conn->query($sql2);
while ($row = $statusResult->fetch_assoc()) {
    $statusNames[$row['id']] = $row['status_name'];
}

if ($result->num_rows > 0) {
?>
    <center style="padding: 20px">
        <div class="">
            <h1>Lịch sử đặt hàng</h1>
        </div>
        <table border='1' style="padding-bottom: 20px;">
            <tr>
                <th>ID đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Địa chỉ</th>
                <th>Trạng thái</th>
                <th>Chi tiết</th>
            </tr>
            <?php
            // Hiển thị danh sách các đơn hàng và chi tiết đơn hàng
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <!-- Hiển thị thông tin của đơn hàng -->
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <!-- Hiển thị thông tin của chi tiết đơn hàng -->
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <!-- Hiển thị tên trạng thái thay vì ID trạng thái -->
                    <td><?php echo $statusNames[$row['status']]; ?></td>
                    <!-- Hiển thị nút chi tiết đơn hàng -->
                    <td><a href='index.php?pid=9&id=<?php echo $row['id']; ?>'>Xem chi tiết</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </center>
<?php
} else {
    echo "Không có đơn hàng nào.";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>