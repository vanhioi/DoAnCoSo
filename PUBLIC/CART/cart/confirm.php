<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xác nhận thanh toán</title>

</head>
<body>
  <?php
  // check tạo đơn hàng thành công hay không ?
  if(isset($_SESSION['order_id'])) { ?>
  <div class="container">
    <h1>Xác nhận thanh toán</h1>
    <h5>Đơn hàng của bạn đã được thanh toán thành công!</h5>
    <div class="container">
      <table class="table table-striped">
        <thead>
          <tr>
            <th></th>
            <th></th>            
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Mã đơn hàng</td>
            <td><?php echo($_SESSION['order_id']) ?></td>
          </tr>
          <tr>
            <td>Tên khách hàng</td>
            <td><?php echo($_SESSION['ten']) ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo($_SESSION['email']) ?></td>
          </tr>
          <tr>
            <td>Số điện thoại</td>
            <td><?php echo($_SESSION['dienthoai']) ?></td>
          </tr>
          <tr>
            <td>Địa chỉ</td>
            <td><?php echo($_SESSION['diachi']) ?></td>
          </tr>
          <tr>
            <td>Địa chỉ</td>
            <td><?php echo($_SESSION['ghichu']) ?></td>
          </tr>
          <tr>
            <td>Tổng tiền</td>
            <td><?php echo($_SESSION['totalPrices']) ?></td>
          </tr>
          <tr>
            <td>Phương thức thanh toán</td>
            <td><?php echo($_SESSION['phuongthuc']) ?></td>
          </tr>
            </tbody>
      </table>
  <div>
    <h5>Cảm ơn bạn đã mua hàng!</h5>
    <h5>Bạn sẽ nhận được email xác nhận đơn hàng và thông tin giao hàng trong vòng 24 giờ.</h5>
    <a href="index.php">Quay lại trang chủ</a>
  </div>

<?php }   ?>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<style>
  body {
    font-family: 'Times New Roman', Times, serif;
  }
  
  .container {
    width: 800px;
    margin: 0 auto;
  }
  
  h1 {
    text-align: center;
  }
  
  p {
    text-align: justify;
  }
  
  ul {
    list-style: none;
    padding: 0;
  }
  
  ul li {
    margin-bottom: 10px;
  }
  
  a {
    text-decoration: none;
    color: #000;
    font-weight: bold;
  }
  
  a:hover {
    color: #333;
  }
  
</style>