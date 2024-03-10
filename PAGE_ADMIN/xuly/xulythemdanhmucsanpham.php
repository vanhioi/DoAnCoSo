<?php
    $conn = new mysqli("localhost", "root", "", "shopgiay");
    $tendanhmuc = $_POST['tendanhmuc'];

   if(isset($_POST['themdanhmuc'])){
        $sql_them = "INSERT INTO loaisp(tenloaisp) VALUES ('$tendanhmuc')";
        $query = mysqli_query($conn,$sql_them);
        header('location:index.php?quanly=danhmucsanpham');
   }else if(isset($_POST['suadanhmuc'])){
        $id = $_GET['id'];
        $sql_update = "UPDATE loaisp SET tenloaisp='". $tendanhmuc."' WHERE idLoaisp='$id'";
        mysqli_query($conn,$sql_update);
        header('location:index.php?quanly=danhmucsanpham');
   }else {
        $id = $_GET['id'];
        $sql_xoa = "DELETE FROM loaisp WHERE idLoaisp ='".$id."'";
        mysqli_query($conn,$sql_xoa);
        header('location:index.php?quanly=danhmucsanpham');
   }
   
   
?>
