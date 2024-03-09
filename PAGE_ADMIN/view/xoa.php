<?php
if (isset($_GET['xoa']) && $_GET['xoa'] >= 0) {
    session_start();
    $userIdToDelete = $_GET['xoa'];

    // Kết nối CSDL
    $conn = new mysqli("localhost", "root", "", "shopgiay");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // Sử dụng prepared statement để xóa người dùng
    $stmt = $conn->prepare("DELETE FROM user WHERE idKH = ?");
    $stmt->bind_param("i", $userIdToDelete);

    // Thực hiện truy vấn
    if ($stmt->execute()) {
        echo 'Người dùng đã được xóa thành công.';
    } else {
        echo 'Không thể xóa người dùng.';
    }

    // Đóng kết nối và statement
    $stmt->close();
    mysqli_close($conn);

    // Chuyển hướng về trang danh sách người dùng
    header('Location: index.php?quanly=user');
}
?>
