<?php
$sql = "SELECT * FROM user";
$qr = mysqli_query($conn, $sql);
?>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/index.css">
    </head>
<body>
        <h6 style="text-align: center;padding: 10px;font-size: 30px; ">Danh sách tài khoản</h6>
        <a href="index.php?quanly=themuser" class="btn btn-secondary"
                style="margin-left: 900px;padding: 10px;">Thêm User</a>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>STT</th>
                                        <th>ID KH</th>
                                        <th>Tên KH </th>
                                        <th>Địa Chỉ</th>
                                        <th>Email KH</th>
                                        <th>Số điện thoại</th>
                                        <th>Role</th>
                                        <th>Password</th>
                                        <th>Xóa user</th>
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
                                        <td><?php echo $row['idKH'] ?></td>
                                        <td><?php echo $row['TenKH'] ?></td>
                                        <td><?php echo $row['diachiKH'] ?></td>
                                        <td><?php echo $row['diachiemailKH'] ?></td>
                                        <td><?php echo $row['sodienthoaiKH'] ?></td>
                                        <td><?php echo $row['idrole'] ?></td>
                                        <td><?php echo $row['password'] ?></td>
                                        <td><a href="index.php?quanly=xulythemuser&id=<?php echo $row['idKH']?>"
                                                class="btn btn-danger">Xóa</a></td>
                                    </tr>
                                    <?php
                        }
                        ?>
                                </tbody>
                        </div>
                    </div>
                </div>
            </div>  
                                                  
</body>
