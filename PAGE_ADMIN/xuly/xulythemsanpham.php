<?php
   $tensp = $_POST['tensp'];
   $mota = $_POST['mota'];
   $gia = $_POST['gia'];
   $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh_time = time().'_'.$hinhanh;
    $loaisp = $_POST['loaisanpham'];
    $danhmuc = $_POST['danhmuc'];

    if(isset($_POST['themsanpham'])){     
        $sql_them = "INSERT INTO sanpham(tenSP,mota,gia,img,idloaisp,iddm) VALUES ('$tensp','$mota','$gia','$hinhanh_time','$loaisp','$danhmuc')";
        $query = mysqli_query($conn,$sql_them);
        move_uploaded_file($hinhanh_tmp,'../IMAGES/anhcsld/'.$hinhanh_time);
        header('location:index.php?quanly=danhsachsanpham');
    }else if(isset($_POST['suasanpham'])){
        $id=$_GET['id'];

        if($hinhanh !=''){
           move_uploaded_file($hinhanh_tmp,'../IMAGES/anhcsld/'.$hinhanh_time);       
           $sql_update = "UPDATE sanpham SET tenSP='". $tensp."',img='".$hinhanh_time."', 
           mota='". $mota."', gia='". $gia."', idloaisp='". $loaisp."', iddm='". $danhmuc."'
           WHERE idSP='$id'";
   
           $sql = "SELECT * FROM sanpham WHERE idSP = '$id' LIMIT 1";
           $query = mysqli_query($conn,$sql);
           while($row = mysqli_fetch_array($query)){
              unlink('../IMAGES/anhcsld/'.$row['img']);
           }
        }else{
            $sql_update = "UPDATE sanpham SET tenSP='". $tensp."', 
           mota='". $mota."', gia='". $gia."', idloaisp='". $loaisp."', iddm='". $danhmuc."'
           WHERE idSP='$id'";
        }
        mysqli_query($conn,$sql_update);
        header('location:index.php?quanly=danhsachsanpham');
    }else if(isset($_POST['themsizesanpham'])){
        $id = $_GET['id'];
        $size = $_POST['size'];
        $soluong = $_POST['soluong'];
        $sql_them = "INSERT INTO size (idSP,sizevalue,soluongtonkho) VALUES ('$id','$size','$soluong')";
        $query = mysqli_query($conn,$sql_them);
        header('location:index.php?quanly=danhsachsanpham');
    }else{
        $id = $_GET['id']; // Change $_GET to $_POST
        $sql = "SELECT * FROM sanpham WHERE idSP = '$id' LIMIT 1";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('../IMAGES/anhcsld/'.$row['img']);
        }
        $sql_xoa = "DELETE FROM sanpham WHERE idSP ='".$id."'";
        mysqli_query($conn,$sql_xoa);
        header('location:index.php?quanly=danhsachsanpham');
    }
    

?>