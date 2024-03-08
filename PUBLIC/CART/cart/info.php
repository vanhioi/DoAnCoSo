
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "shopgiay");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu 
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $id_phuongthuc = $_POST['id_phuongthuc'];

    // Thực hiện truy vấn SQL để chèn dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO order (fullname, email, phone_number, address, note, id_phuongthuc)
            VALUES ('$fullname', '$email', '$phone_number', '$address', '$note', '$id_phuongthuc')";

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    </style>
  </head>
<body>
    <div class="form">
        <form action="thanhtoan.php" method="post">
            <h1>Thông tin người mua</h1>
            <div class="form-group">
              <label for="ten">Họ và tên:</label>
              <input type="text" id="ten" name="fullname" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="dienthoai">Số điện thoại:</label>
              <input type="tel" id="dienthoai" name="phone_number" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="diachi">Địa chỉ:</label>
              <input type="text" id="diachi" name="address" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="ghichu">Ghi chú:</label>
              <textarea id="ghichu" name="note" class="form-control"></textarea>
            </div>
          </form>
    </div>

      <div class="container">
        <h1>Chọn phương thức thanh toán</h1>
        
        <div class="phuong-thuc">
          <div class="item">
            <input type="radio" id="tienmat" name="phuongthuc" value="tienmat" checked>
            <label for="tienmat">Thanh toán tiền mặt</label>
          </div>
          <div class="item">
            <input type="radio" id="chuyenkhoan" name="phuongthuc" value="chuyenkhoan">
            <label for="chuyenkhoan">Chuyển khoản ngân hàng</label>
          </div>
          <div class="item">
            <input type="radio" id="momo" name="phuongthuc" value="momo">
            <label for="momo">Ví MoMo</label>
          </div>
        </div>
        <a href="index.php?pid=6">
        <button class="btn-thanhtoan">Thanh toán</button>

        </a>
      </div>

</body>
</html>

<style>
  
  
  body {
    font-family: 'Times New Roman', Times, serif;
  }
  .form {
    display: flex;
    justify-content: center;
    box-sizing: border-box;

  }
  .form-group {
    align-items: center;
    margin-bottom: 15px;
  }
  
  .form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  .label {
    margin-bottom: 5px;
    display: block;
  }
  
  .btn-primary {
    background-color: #000;
    color: #fff;
    border: 1px solid #000;
    border-radius: 4px;
    cursor: pointer;
    padding: 10px 20px;
  }
  
  .btn-primary:hover {
    background-color: #333;
  }
  
  .container {
    width: 800px;
    margin: 0 auto;
  }
  
  h1 {
    text-align: center;
  }
  
  .phuong-thuc {
    margin-top: 20px;
  }
  
  .item {
    margin-bottom: 10px;
  }
  
  .item input {
    margin-right: 10px;
  }
  
  .btn-thanhtoan {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #000;
    color: #fff;
    border: 1px solid #000;
    border-radius: 4px;
    cursor: pointer;
  }
  
  .btn-thanhtoan:hover {
    background-color: #333;
  }
  
</style>