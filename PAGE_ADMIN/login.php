<?php
session_start();
$password = "";

if (isset($_POST['submit'])) {
    $TenKH = $_POST['TenKH'];
    $password = $_POST['password'];

    // Bảo mật: Sử dụng prepared statement để ngăn chặn SQL injection
    $sql = 'SELECT * FROM user WHERE TenKH = ? AND password = ?';
    $con = mysqli_connect("localhost", "root", "", "shopgiay");

    if ($con) {
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $TenKH, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);

            // Kiểm tra quyền truy cập
            if ($row['idrole'] == 2) {
                $_SESSION['idKH'] = $row['idKH'];
                header('location: index.php');
            } else {
                $tb = "Tài khoản này không có quyền đăng nhập trang quản trị";
            }
        } else {
            $tb = "Tài khoản này không tồn tại";
        }

        mysqli_close($con);
    } else {
        $tb = "Không thể kết nối đến cơ sở dữ liệu";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.password {
  float: right;
  padding-top: 16px;
}

.boxcenter {
  width: 500px;
  margin: 0 auto;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.password {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<div class="boxcenter">
<h2>Login Form</h2>

<form action="login.php" method="post">
  <div class="imgcontainer">
    <img src="../IMAGES/logo.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="TenKH"><b>Tên đăng nhập</b></label>
    <input type="text" placeholder="Enter Username" name="TenKH" required>

    <label for="password"><b>Mật khẩu</b></label>
    <input type="password" placeholder="Password" name="password" required>
    <?php
      if(isset($tb)&&($tb!="")){
        echo "<h3 style='color:red'>".$tb."</h3>";
      }
    ?>
    <button type="submit" name="submit">ĐĂNG NHẬP</button>
  </div>

</form>
</div>

</body>
</html>
