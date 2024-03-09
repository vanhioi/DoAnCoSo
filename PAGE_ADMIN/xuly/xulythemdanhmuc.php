<?php
   $tendanhmuc = $_POST['tendanhmuc'];

   if(isset($_POST['themdanhmuc'])){
       $sql_them = "INSERT INTO danhmuc(tendm) VALUES ('$tendanhmuc')";
       $query = mysqli_query($conn,$sql_them);
       header('location:index.php?quanly=danhmuc');
   }else if(isset($_POST['suadanhmuc'])){
       $id = $_GET['id'];
       $sql_update = "UPDATE danhmuc SET tendm='". $tendanhmuc."' WHERE iddm='$id'";
       mysqli_query($conn,$sql_update);
       header('location:index.php?quanly=danhmuc');
   }else {
         $id = $_GET['id'];
         $sql_xoa = "DELETE FROM danhmuc WHERE iddm ='".$id."'";
         mysqli_query($conn,$sql_xoa);
         header('location:index.php?quanly=danhmuc');
   }

?>
