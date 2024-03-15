<?php
    $conn = new mysqli("localhost", "root", "", "shopgiay");
   $tenuser = $_POST['tenKH'];
   $diachi = $_POST['diachi'];
   $email = $_POST['email'];
   $sdt = $_POST['sdt'];
   $role = $_POST['role'];
   $password = $_POST['password'];

   if(isset($_POST['themuser'])){
       $sql_them = "INSERT INTO user(tenKH, diachiKH, diachiemailKH, sodienthoaiKH, idrole, password) VALUES ('$tenuser', '$diachi', '$email', '$sdt', '$role', '$password')";
       $query = mysqli_query($conn,$sql_them);
       header('location:index.php?quanly=user');
   }else{
    $id = $_GET['id']; // Change $_GET to $_POST
    $sql_xoa = "DELETE FROM user WHERE idKH ='".$id."'";
    mysqli_query($conn,$sql_xoa);
    header('location:index.php?quanly=user');
}

?>
