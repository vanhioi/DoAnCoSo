<?php
    session_start();
    $password = "";
    $email = "";
   if(isset($_POST['submit'])){
    $user_name = $_POST['diachiemailKH'];
    $password = $_POST['password'];
    var_dump($user_name,$password);
    $sql = '
    SELECT * FROM user WHERE diachiemailKH = "'.$user_name.'" and password = "'.$password.'"
    ';
    $con = mysqli_connect("localhost","root","","shopgiay");
    $result = mysqli_query($con,$sql);
      $row= mysqli_fetch_array($result);
      var_dump($row);
      $_SESSION['email'] = $email ;
      $_SESSION['password'] =$password;
      var_dump($row);
      if($row!=null && $row!=""){
        $_SESSION['id']=$row['id'];
        header('Location: admin.php?id='.$row['id'].'');
      }
    }


?>
<form method="post" action="">
  <div  class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" id="" aria-describedby="" name="user_name" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control"  id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Đăng Nhập </button>
</form>
<style>
form{
    width: 1000px;
    margin: auto ;
    padding-top: 15%;
}
</style>