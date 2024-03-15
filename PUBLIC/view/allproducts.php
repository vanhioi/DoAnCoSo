<?php
$conn = new mysqli("localhost", "root", "", "shopgiay");

$loaispID = isset($_GET["loaisp"]) ? $_GET["loaisp"] : NULL;

$productsPerPage = 8;
// Xác định trang hiện tại
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính toán OFFSET cho truy vấn SQL
$offset = ($currentPage - 1) * $productsPerPage;

// Truy vấn SQL để lấy dữ liệu phân trang
$allspsql = "SELECT * FROM sanpham LIMIT $offset, $productsPerPage";

$resultallspSql = $conn->query($allspsql);
?>

<?php
if (isset($_GET["idsp"])) {

?>


<?php

} else {
?>
    <div class="shop">
        <div class="shop-hihi">
            <div class="shop-child">
                <?php
                if ($resultallspSql->num_rows > 0) {
                    while ($row = $resultallspSql->fetch_assoc()) {

                ?>
                        <a href="index.php?pid=product_detail&id=<?= $row['idSP'] ?>">
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
                                        <a href="index.php?pid=product_detail&id=<?= $row['idSP'] ?>">
                                            <h3 style="margin: 20px 0 20px 0"><?php echo $row['tenSP']; ?></h3>
                                        </a>
                                        <p style="margin-bottom: 20px;"><?= number_format($row['gia'], 0, ',', '.') ?>vnđ</p>
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
    <!-- Hiển thị phân trang -->
    <div class="pagination">
        <?php
        $sql = "SELECT COUNT(*) AS total FROM sanpham";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totalPages = ceil($row["total"] / $productsPerPage);

        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='index.php?page=$i'>$i</a>";
        }
        ?>
    </div>
<?php
}
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
        justify-content: space-between;
        /* điều chỉnh theo nhu cầu */
    }

    .display-product {
        width: 23%;
        /*  Điều chỉnh chiều rộng để vừa 4 mục trong một hàng */
        margin: 10px 0;
        box-sizing: border-box;
    }

    .display-product img {
        width: 100%;
        height: auto;
        /* Để chiều cao điều chỉnh tự động */
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

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .pagination a {
        padding: 5px 10px;
        margin: 0 5px;
        border: 1px solid #ccc;
        text-decoration: none;
        color: black;
    }

    .pagination a.active {
        background-color: #ccc;
    }
</style>