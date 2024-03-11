<?php
    session_start();
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
// Tính tổng số lượng sản phẩm trong giỏ hàng
function calculateTotalQuantity($cart)
{
    $totalQuantity = 0;
    foreach ($cart as $product) {
        $totalQuantity += $product['soluong'];
    }
    return $totalQuantity;
}

$totalPrice = 0;
$totalQuantity = calculateTotalQuantity($_SESSION['cart']);
?>

<div>
    <section class="cart">
        <div class="container">
            <div class="cart-top-wrap">
                <div class="cart-top">
                    <!-- Icons for cart, address, and payment -->
                    <div class="cart-top-cart cart-top-item">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="cart-top-adress cart-top-item">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="cart-top-payment cart-top-item">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div style="display: flex;" class="cart-content row">
                <div style="width: 50%;" class="cart-content-left">
                    <table>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Thành tiền</th>
                            <th>SL</th>
                            <th>Xóa</th>
                        </tr>
                        <?php
                        $totalPrice = 0;
                        $i = 0;
                     if(isset($_SESSION["cart"])){
                        foreach ($_SESSION['cart'] as $product) {
                            $totalPrice+= $product['price']* $product['soluong'];
                            echo '<tr>';
                            // Thong tin san pham
                           
                            echo '<td><p>' . $product['title'] . '</p></td>';
                            echo '<td><p>' . $product['price']*$product['soluong'] . '</p></td>';
                            echo '<td>
                                    <form method="post" action="update_quantity.php"> 
                                        <input type="hidden" name="index" value="">
                                        <span><a style="text-decoration: none;" href="xoa.php?pg=giam&id='.$product['masp'].'">-</a>'.$product['soluong'].'<a style="text-decoration: none;" href="xoa.php?pg=tang&id='.$product['masp'].'">+</a></span>
                                    </form>
                                </td>';
                                
                              
                            // chuc nang xoa
                            echo '<td>
                            <form method="post" action=""> 
                                <button><a href="xoa.php?ind='.$i.'">Xóa</a></button>
                            </form>
                          </td>';     
                        }
                        $i++;
                        $_SESSION['totalPrices'] = $totalPrice;
                     }
                        ?>
                    </table>
                </div>

                <div style="width: 50%;" class="cart-content-right">
                    <table>
                        <tr>
                            <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                        </tr>
                        <tr>
                            <td>TỔNG SẢN PHẨM</td>
                            <td><?php echo $totalQuantity; ?></td>
                        </tr>
                        <tr>
                            <td>TỔNG TIỀN HÀNG</td>
                            <td>
                                <p><?php echo number_format($totalPrice, 0, ',', '.'); ?><sup>đ</sup></p>
                            </td>
                        </tr>
                        <tr>
                            <td>TẠM TÍNH</td>
                            <td>
                                <p style="color: black; font-weight: bold;">
                                    <?php echo number_format($totalPrice, 0, ',', '.'); ?><sup>đ</sup></p>
                            </td>
                        </tr>
                    </table>
                    <div class="cart-content-right-text">
                        <p>Bạn sẽ được Free ship khi tổng giá trị đơn hàng trên 2.000.000 đ</p>
                        <p style="color:red;font-weight:bold;">Mua thêm <span style="font-size: 18px;">130.000đ </span>
                            để được Free ship</p>
                    </div>
                    <div class="cart-content-right-button">
                        <a href="index.php?pid=1"><button>TIẾP TỤC MUA SẮM</button></a>
                        <a href="index.php?pid=5"><button>THANH TOÁN</button></a>

                    </div>
                    <div class="cart-content-right-dangnhap">
                        <p>TÀI KHOẢN CỦA BẠN</p><br>
                        <p> Hãy <a href="login.php">Đăng nhập</a> tài khoản của bạn đã tích điểm thành viên</p>
                    </div>
                    <!-- Additional content for the right side of the cart -->
                </div>
            </div>
        </div>
    </section>
</div>


<style>
/*---------------------Cart----------*/
.cart {
    padding: 10px 0;
}

a {
    text-decoration: none;
}

.cart-top-wrap {
    display: flex;
    justify-content: center;
    align-items: center;
}

.cart-top {
    height: 2px;
    width: 70%;
    background-color: #dddddd;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 50px 0 100px;
}

.cart-top-item {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: 1px solid #dddddd;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #fff;
}

.cart-top-item i {
    color: #dddddd;
}

.cart-top-cart {
    border: 1px solid yellow;
}

.cart-top-cart i {
    color: #0DB7EA;
}

.cart-content-left {
    flex: 2;
    padding-right: 12px;
}

.cart-content-left table {
    width: 100%;
    text-align: center;
}

.cart-content-left table th {
    padding-bottom: 30px;
    font-family: var(--main-text-font);
    font-size: 12px;
    text-transform: uppercase;
    color: #333;
    border-collapse: collapse;
    border-bottom: 2px solid #dddddd;
}

.cart-content-left table p {
    font-family: var(--main-text-font);
    font-size: 12px;
    color: #333;
}

.cart-content-left table input {
    width: 30px;
}

.cart-content-left table span {
    display: block;
    width: 20px;
    height: 20px;
    border: 1px solid #dddddd;
    cursor: pointer;
}

.cart-content-left table td {
    padding: 20px 0;
    border-bottom: 2px solid #dddddd;
}

.cart-content-left td:first-child img {
    width: 130px;
}

.cart-content-left table td:nth-child(2) {
    max-width: 130px;
}

.cart-content-right {
    flex: 1;
    padding-left: 12px;
    border-left: 2px solid #dddddd;
}

.cart-content-right table {
    width: 100%;
}

.cart-content-right table th {
    padding-bottom: 30px;
    font-family: var(--main-text-font);
    font-size: 12px;
    color: #333;
    border-collapse: collapse;
    border-bottom: 2px solid #dddddd;
}

.cart-content-right table td {
    font-family: var(--main-text-font);
    font-size: 12px;
    color: #333;
    padding: 6px 0;
}

.cart-content-right tr:nth-child(3) td {
    border-bottom: 2px solid #dddddd;
}

.cart-content-right tr td :last-child {
    text-align: right;
}

.cart-content-right-text {
    margin: 20px 0;
    text-align: center;
}

.cart-content-right-text p {
    font-family: var(--main-text-font);
    font-size: 12px;
    color: #333;
}

.cart-content-right-button {
    text-align: center;
    align-items: center;
}

.cart-content-right-button button {
    padding: 0 18px;
    height: 35px;
    cursor: pointer;
}

.cart-content-right-button button:first-child {
    background-color: #fff;
    border: 1px solid black;
    margin-right: 20px;
}

.cart-content-right-button button:first-child:hover {
    background-color: #ddd;
}

.cart-content-right-button button:last-child {
    background-color: black;
    color: #fff;
    border: none;
    border: 1px solid black;
}

.cart-content-right-button button:last-child:hover {
    background-color: #dddddd;
    color: black;
}

.cart-content-right-dangnhap {
    margin-top: 20px;
}

.cart-content-right-dangnhap p {
    font-family: var(--main-text-font);
    font-size: 12px;
    color: #333;
}

.delivery-content-left-button {
    justify-content: space-between;
    padding-top: 20px;
}

.delivery-content-left-button button {
    width: 100px;
    height: 35px;
    border: 2px solid black;
    padding: 6px 12px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.delivery-content-left-button button:hover {
    background-color: black;
    color: #fff;
}

.delivery-content-right {
    width: 40%;
    padding-left: 12px;
    border-left: 2px solid #dddddd;
    height: auto;
}

.delivery-content-right table {
    width: 100%;
    font-family: var(--main-text-font);
    font-size: 12px;
    text-align: center;
}

.delivery-content-right table tr th:first-child {
    text-align: left;
}

.delivery-content-right table tr th {
    padding-bottom: 12px;
    border-bottom: 2px solid #dddddd;
}

.delivery-content-right table tr th:last-child {
    text-align: right;
}

.delivery-content-right table tr td {
    padding: 6px 0;
}

.delivery-content-right table tr :nth-child(4) {
    border-top: 2px solid #dddddd;
}

.delivery-content-right table tr td:last-child {
    text-align: right;
}

.delivery-content-right table tr td:first-child {
    text-align: left;
}
</style>