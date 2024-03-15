<div class="main p-3">
    <div class="text-center">
        <section class="container my-2 bg-secondary w-50 text-light p-2">
        <h6 style="text-align: center; text-transform: uppercase; font-weight: bold;">Thêm user</h6>
            <form class="row g-3 p-3" method="POST" action="index.php?quanly=xulythemuser" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Tên KH</label>
                    <input type="text" class="form-control" id="validationDefault01" name="tenKH" placeholder="Tên KH" required>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Địa Chỉ</label>
                    <input type="text" class="form-control" id="validationDefault01" name="diachi" placeholder="Địa Chỉ" required>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Email KH</label>
                    <input type="text" class="form-control" id="validationDefault01" name="email" placeholder="Email KH" required>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="validationDefault01" name="sdt" placeholder="Số điện thoại" required>
                    
                </div>
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Password</label>
                    <input type="password" class="form-control" id="validationDefault01" name="password" placeholder="Password" required>
                    
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Role</label>
                    <select id="inputState" class="form-select" name="role">
                        <?php
                            $sql_dm ="SELECT * FROM role ORDER BY id DESC";
                            $query_dm = mysqli_query($conn,$sql_dm);
                            while($row_dm = mysqli_fetch_array($query_dm)){
                        ?>
                        <option value="<?php echo $row_dm['id']  ?>"><?php echo $row_dm['namerole'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="themuser">Thêm User</button>
                </div>
            </form>
        </section>
    </div>
</div>