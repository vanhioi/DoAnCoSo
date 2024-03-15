<?php
// Kiểm tra xem yêu cầu xác nhận đã được gửi hay chưa
if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    // Cập nhật trạng thái của đơn hàng sang 2 (đã xác nhận) trong cơ sở dữ liệu
    $sql = "SELECT * FROM `order_details` WHERE order_id = $orderId";
    $result = $conn->query($sql);
}
?>
<div class="main p-3">
    <div class="text-center">
        <h6 style="text-align: center;padding: 10px;">Chi tiết đơn hàng</h6>
        <a href="javascript:history.go(-1);" class="btn btn-white">Quay lại</a>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID Sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$conn->close();
?>