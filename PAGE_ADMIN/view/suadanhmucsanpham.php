<?php
  $sql = "SELECT * FROM loaisp WHERE idLoaisp = '$_GET[id]' ";
  $kq = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($kq);
?>
<div class="main p-3">
    <div class="text-center">
        <section class="container my-2 bg-secondary w-50 text-light p-2">
            <h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Sửa danh mục sản phẩm</h6>
            <form class="row g-3 p-3" method="POST" action="index.php?quanly=xulythemdanhmucsanpham&id=<?php echo $row['idLoaisp'] ?>" enctype="multipart/form-data">
                <div class="col-md-12">
                    <label for="validationDefault01" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" id="validationDefault01" name="tendanhmuc" placeholder="Tên danh mục" value="<?php echo $row['tenloaisp'] ?>">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="suadanhmuc">Sửa danh mục</button>
                </div>
            </form>
        </section>
    </div>
</div>
