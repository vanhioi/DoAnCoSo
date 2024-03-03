<div class="main p-3">
    <div class="text-center">
        <section class="container my-2 bg-secondary w-50 text-light p-2">
        <h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Thêm sản phẩm</h6>
            <form class="row g-3 p-3" method="POST" action="index.php?quanly=xulythemsanpham" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="validationDefault01" name="tensp" placeholder="Tên sản phẩm"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Mô tả</label>
                    <textarea id="noidung" class="form-control"  style="resize: none;" name="mota" ></textarea>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Giá</label>
                    <input type="text" class="form-control" id="inputPassword4" name="gia" required>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" id="inputEmail4" name="hinhanh" required>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Loại sản phẩm</label>
                    <select id="inputState" class="form-select" name="loaisanpham">
                        <?php
                            $sql ="SELECT * FROM loaisp ORDER BY idLoaisp DESC";
                            $query = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($query)){
                        ?>
                        <option value="<?php echo $row['idLoaisp']  ?>"><?php echo $row['tenloaisp'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Danh mục sản phẩm</label>
                    <select id="inputState" class="form-select" name="danhmuc">
                        <?php
                            $sql_dm ="SELECT * FROM danhmuc ORDER BY iddm DESC";
                            $query_dm = mysqli_query($conn,$sql_dm);
                            while($row_dm = mysqli_fetch_array($query_dm)){
                        ?>
                        <option value="<?php echo $row_dm['iddm']  ?>"><?php echo $row_dm['tendm'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="themsanpham">Thêm sản phẩm</button>
                </div>
            </form>
        </section>
    </div>
</div>