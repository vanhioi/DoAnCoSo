<?php
$conn = new mysqli("localhost", "root", "", "shopgiay");

$loaispID = isset($_GET["loaisp"]) ? $_GET["loaisp"] : NULL;

$kidssql = "SELECT * FROM sanpham WHERE idLoaisp = 12 ";

$resultKidSql = $conn->query($kidssql);

?>

<?php
    if(isset($_GET["idsp"])){
    
    if($_GET["idsp"]==12){

    
?>
<div class="shop">
    <div class="shop-hihi">
        <div class="shop-child">
        <?php
            if ($resultKidSql->num_rows > 0) {
            while ($row = $resultKidSql->fetch_assoc()) {
                
        ?>
                  <a href="index.php?pid=product_detail&id=<?=$row['idSP']?>">
                  <div class="display-product">
                        <form action="xulidulieu/addToCart.php" method="post">
                            <input type="hidden" name="idSP" value="<?php echo $row['idSP']; ?>">
                            <input type="hidden" name="img" value="<?php echo $row['img']; ?>">
                            <input type="hidden" name="tenSP" value="<?php echo $row['tenSP']; ?>">
                            <input type="hidden" name="gia" value="<?php echo $row['gia']; ?>">
                            <div style="display: flex; justify-content: center;">
                                <img src="../IMAGES/anhcsld/<?php echo $row['img']; ?>" alt="anh giay">
                            </div>
                            <div>
                                <a href="index.php?pid=product_detail&id=<?=$row['idSP']?>"> <h3 style="margin: 20px 0 20px 0"><?php echo $row['tenSP']; ?></h3> </a>
                                <p style="margin-bottom: 20px;"><?=number_format($row['gia'], 0, ',', '.')?>vnđ</p>
                                <a id="<?php echo $row["idSP"]; ?>">
                                    <button type="submit" name="submit">
                                        <img style="margin-right: 30px; width: 20px; height: 20px;" src="../IMAGES/Cart.png" alt="">
                                        Giỏ hàng
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>

                  </a>
            <?php
                }
            } else {
                echo "No products found.";
            }
            ?>
        </div>
    </div>
</div>

<?php
}}
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
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>