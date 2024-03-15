<link rel="stylesheet" href="css/table.css">

<?php
// Kiểm tra xem yêu cầu xác nhận đã được gửi hay chưa
if (isset($_GET['confirm_order'])) {
    $orderId = $_GET['confirm_order'];
    // Cập nhật trạng thái của đơn hàng sang 2 (đã xác nhận) trong cơ sở dữ liệu
    $sql = "UPDATE `order` SET status = 2 WHERE id = $orderId";
    mysqli_query($conn, $sql);
    // Chuyển hướng lại đến trang này để cập nhật dữ liệu mới
    header("Location: ?quanly=quanlidonhang");
    exit;
}
// Kiểm tra xem yêu cầu xóa đã được gửi hay chưa
if (isset($_GET['delete_order'])) {
    $deleteOrderId = $_GET['delete_order'];
    // Thực hiện truy vấn SQL để xóa đơn hàng tương ứng
    $sql_delete = "DELETE FROM `order` WHERE id = $deleteOrderId";
    mysqli_query($conn, $sql_delete);
    // Chuyển hướng lại đến trang này để cập nhật dữ liệu mới
    header("Location: ?quanly=quanlidonhang");
    exit;
}
$sql = "SELECT * FROM `order`";
$qr = mysqli_query($conn, $sql);
$statusNames = array();
$sql2 = "SELECT * FROM `order_status`";
$statusResult = $conn->query($sql2);
while ($row = $statusResult->fetch_assoc()) {
    $statusNames[$row['id']] = $row['status_name'];
}
?>


<body>
    <div class="main p-3">
        <div class="text-center">
            <h6 style="text-align: center;padding: 10px;">Danh sách đơn hàng</h6>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên khách hàng</th>

                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Địa chỉ</th>
                                        <th>Note</th>
                                        <th>Ngày order</th>
                                        <th>Trạng Thái</th>
                                        <th>Phương thức</th>
                                        <th>Chi tiết</th>
                                        <th>Xác nhận</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    while ($row = mysqli_fetch_array($qr)) {
                                        $i++;
                                    ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['fullname'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['phone_number'] ?></td>
                                            <td><?= $row['address'] ?></td>
                                            <td><?= $row['note'] ?></td>
                                            <td><?= date('d/m/Y', strtotime($row['order_date'])) ?></td>
                                            <td><?= $statusNames[$row['status']] ?></td>
                                            <td><?php switch ($row['id_phuongthuc']) {
                                                    case 2:
                                                        echo "chuyenkhoan";
                                                        break;
                                                    case 3:
                                                        echo "momo";
                                                        break;
                                                    default:
                                                        echo "tien mat";
                                                        break;
                                                } ?></td>
                                            <td><a href="?quanly=chitietdonhang&order_id=<?= $row['id'] ?>">Chi tiết</a></td>
                                            <td>
                                                <div class="d-flex flex-stuck">
                                                    <?php if ($row['status'] != 2) { ?>
                                                        <a href="?quanly=quanlidonhang&confirm_order=<?= $row['id'] ?>" class="btn btn-primary me-2">Xác nhận</a>
                                                    <?php } else { ?>
                                                        <a href="" class="btn btn-success">Done</a>
                                                    <?php } ?>
                                                    <!-- <a href="" class="btn btn-danger me-2">Xóa</a> -->
                                                    <?php if ($row['status'] != 2) { ?>
                                                        <a href="?quanly=quanlidonhang&delete_order=<?= $row['id'] ?>" class="btn btn-danger me-2">Xóa</a>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>