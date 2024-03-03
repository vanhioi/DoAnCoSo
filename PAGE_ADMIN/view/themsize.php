<?php
  $sql = "SELECT * FROM sanpham WHERE idSP = '$_GET[id]' ";
  $kq = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($kq);
?>
<div class="main p-3">
    <div class="text-center">
    <h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Thêm size,số lượng sản phẩm : <?php echo $row['tenSP'] ?></h6>
        <section class="container my-2 bg-secondary w-50 text-light p-2">
            <form class="row g-3 p-3" method="POST" action="index.php?quanly=xulythemsanpham&id=<?php echo $row['idSP'] ?>" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Size</label>
                    <input type="text" class="form-control" id="validationDefault01" name="size" placeholder="Size của sản phẩm"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Số lượng</label>
                    <input type="text" class="form-control" id="validationDefault01" name="soluong" placeholder="Số lượng của sản phẩm"
                        required>
                </div>
                
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="themsizesanpham">Thêm vào sản phẩm</button>
                </div>
            </form>
        </section>
    </div>
</div>