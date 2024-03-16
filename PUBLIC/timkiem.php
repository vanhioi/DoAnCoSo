<?php
 $mysqli = new mysqli("localhost","root","","shopgiay");
include("view/header.php");
if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
} else{
    $tukhoa = '';
}
$sql_pro ="SELECT * FROM sanpham,danhmuc  WHERE sanpham.iddm = danhmuc.iddm AND sanpham.tenSP LIKE'%".$tukhoa."%'";
$query_pro = mysqli_query($mysqli,$sql_pro);
?>
<p style="text-align: center;">Từ khóa tìm kiếm: <?php echo $_POST['tukhoa'];  ?></p>
<div class="shop">
    <div class="shop-hihi">
        <div class="shop-child">
            <?php
             while ($row = mysqli_fetch_array($query_pro)){
        ?>
            <a href="index.php?pid=product_detail&id=<?=$row['idSP']?>">
                <div class="display-product">
                    <form action="#" method="post">
                        <input type="hidden" name="idSP" value="<?php echo $row['idSP']; ?>">
                        <input type="hidden" name="img" value="<?php echo $row['img']; ?>">
                        <input type="hidden" name="tenSP" value="<?php echo $row['tenSP']; ?>">
                        <input type="hidden" name="gia" value="<?php echo $row['gia']; ?>">
                        <div style="display: flex; justify-content: center;">
                            <img src="../IMAGES/anhcsld/<?php echo $row['img']; ?>" alt="anh giay">
                        </div>
                        <div>
                            <a href="index.php?pid=product_detail&id=<?=$row['idSP']?>">
                                <h3 style="margin: 20px 0 20px 0"><?php echo $row['tenSP']; ?></h3>
                            </a>
                            <p style="margin-bottom: 20px;"><?=number_format($row['gia'], 0, ',', '.')?>vnđ</p>
                            <a id="<?php echo $row["idSP"]; ?>">
                                <button type="submit" name="submit">
                                    <img style="margin-right: 30px; width: 20px; height: 20px;" src="../IMAGES/Cart.png"
                                        alt="">
                                    Giỏ hàng
                                </button>
                            </a>
                        </div>
                    </form>
                </div>

            </a>
            <?php
             }
            ?>
        </div>
    </div>
</div>
<?php
include("view/footer.php");
?>
<style>
    
    .shop {
        display: flex;
        justify-content: center;
        margin: 50px 0 50px 0px;
    }

    .shop-hihi {
        display: flex;
        justify-content: center;
        flex-direction: column;
        width: 75%;
    }

    .shop-child {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; /* điều chỉnh theo nhu cầu */
    }

    .display-product {
        width: 23%; /*  Điều chỉnh chiều rộng để vừa 4 mục trong một hàng */
        margin: 10px 0;
        box-sizing: border-box;
    }

    .display-product img {
        width: 100%;
        height: auto; /* Để chiều cao điều chỉnh tự động */
        object-fit: cover;
    }

    .display-product div {
        text-align: center;
    }

    .shop-child div button {
        background-color: black;
        border: none;
        border-radius: 10px;
        align-items: center;
        padding: 10px 30px 10px 30px;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    .phantrang {
        margin-top: 20px;
        text-align: center;
    }

    .phantrang a {
        text-decoration: none;
        margin: 0 5px;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>