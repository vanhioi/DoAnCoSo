<link rel="stylesheet" href="css/etabl.css">
<?php
 if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
} else{
    $tukhoa = '';
}
$sql = "SELECT * FROM sanpham
WHERE sanpham.tenSP LIKE '%" . $tukhoa . "%'";
$qr = mysqli_query($conn, $sql);
?>

<body>
    <div class="main p-3">
        <div class="text-center">
            <div class="container" style="padding: 10px;">
                <div class="row justify-content-center mt-2">
                    <div class="col-lg-6">
                        <form class="form-inline" action="index.php?quanly=timkiemsanpham" method="POST">
                            <div class="input-group w-100">
                                <input type="search" name="tukhoa" class="form-control" placeholder="Nhập tên sản phẩm"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="submit" name="timkiem">Tìm
                                        kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <h6 style="text-align: center;padding: 10px;">Tìm kiếm: <?php echo $_POST['tukhoa'];  ?></h6>
            <a href="index.php?quanly=themsanpham" class="btn btn-secondary" style="margin-left: 700px;padding: 10px;">Thêm sản phẩm</a>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                        <th>Mô tả</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Danh mục</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($qr)) {
                            $i++;
                        ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['tenSP'] ?></td>
                                        <td><img src="../IMAGES/anhcsld/<?php echo $row['img'] ?>" class="img-fluid"
                                                style="max-width: 100px;"></td>
                                        <td><?php echo $row['gia'] ?></td>
                                        <td><?php echo $row['mota'] ?></td>
                                        <td><?php echo $row['idLoaisp'] ?></td>
                                        <td><?php echo $row['iddm'] ?></td>
                                        <td><a href="index.php?quanly=suasanpham&id=<?php echo $row['idSP'] ?>"
                                                class="btn btn-primary">Sửa</a></td>
                                        <td><a href="index.php?quanly=xulythemsanpham&id=<?php echo $row['idSP'] ?>"
                                                class="btn btn-danger">Xóa</a></td>
                                    </tr>
                                    <?php
                        }
                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>