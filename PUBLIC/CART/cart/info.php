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
              <input type="text" id="ten" name="ten" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="dienthoai">Số điện thoại:</label>
              <input type="tel" id="dienthoai" name="dienthoai" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="diachi">Địa chỉ:</label>
              <input type="text" id="diachi" name="diachi" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="ghichu">Ghi chú:</label>
              <textarea id="ghichu" name="ghichu" class="form-control"></textarea>
            </div>
          </form>
    </div>

      <div class="container">
        <h1>Chọn phương thức thanh toán</h1>
        
        <div class="phuong-thuc">
          <div class="item">
            <input type="radio" id="tienmat" name="phuong-thuc" value="tienmat" checked>
            <label for="tienmat">Thanh toán tiền mặt</label>
          </div>
          <div class="item">
            <input type="radio" id="chuyenkhoan" name="phuong-thuc" value="chuyenkhoan">
            <label for="chuyenkhoan">Chuyển khoản ngân hàng</label>
          </div>
          <div class="item">
            <input type="radio" id="momo" name="phuong-thuc" value="momo">
            <label for="momo">Ví MoMo</label>
          </div>
        </div>
        <a href="index.php?pid=6">
        <button class="btn-thanhtoan">Thanh toán</button>

        </a>
      </div>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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