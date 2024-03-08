<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $con = mysqli_connect("localhost","root","","shopgiay");
    $sql = 'SELECT * FROM `sanpham` WHERE idSP ='.$id; 
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
}if($row==null){
    header('http://localhost/DoAnCoSo_Copy/PUBLIC/index.php');
}else{

    
}
?>
<body>
    <section class="product">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-content-left">
                        <div style="display: flex;width: 80%;margin: auto;" class="product-content-left-big-img">
                            <img style="width: 25%;" src="../IMAGES/anhcsld/<?php echo $row['img']; ?>" alt="Product Image">
                            <div class="product-content-right-product-name">
                            <h1><?=$row['tenSP']?></h1>
                            <h1 style="font-weight: 800;padding: 15px 0;" >Mô tả sản phẩm: 
                             <h3 style="font-weight: 500;" ><?=$row['mota']?></h3>
                            </h1>
                            
                        </div>
                        </div>
                        <div class="product-content-left-small-img">
                            <!-- Add small images if needed -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-content-right">
                      
                        <div class="product-content-right-product-price">
                            <p>Giá : <?=number_format($row['gia'], 0, '', ',')?><sup>đ</sup></p>
                        </div>
                        <div class="quantity">
                            <p style="font-weight: bold;">Số lượng:</p>
                            <input type="number" min="0" value="1">
                            <p style="color: red;">Vui lòng chọn số lượng</p>
                        </div>
                        <div class="product-content-right-product-button">
                    <!-- them san pham -->
                        <form action="xulidulieu/addToCart.php" method="post">
                            <input type="hidden" name="idSP" value="<?php echo $row['idSP']; ?>">
                            <input type="hidden" name="img" value="<?php echo $row['img']; ?>">
                            <input type="hidden" name="tenSP" value="<?php echo $row['tenSP']; ?>">
                            <input type="hidden" name="gia" value="<?php echo $row['gia']; ?>">
                            <div>
                                 <button type="submit" name="submit">
                                    <img style="margin-right: 30px; width: 20px; height: 20px;" src="../IMAGES/Cart.png" alt="">
                                    Giỏ hàng
                                </button>
                                </a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<style>
        body {
            background-color: while;
        }

        .product {
            margin-top: 100px;
        }

        .product-content-left-big-img img {
            width: 200%;
            height: auto;
        }

        .product-content-right {
            padding: 20px 0 0 450px;
            background-color: #fff;
            margin-bottom: 50px;
        }

        .product-content-right-product-name h1 {
            color: #343a40;
        }

        .product-content-right-product-price p {
            font-size: 20px;
            color: #007bff;
            margin-bottom: 20px;
        }

        .quantity {
            margin-bottom: 10px;
        }

        .product-content-right-product-button button {
            background-color: black;
            border: none;
            border-radius: 10px;
            display: flex;
            align-items: center;
            padding: 10px 30px 10px 30px;
            color: white;
            font-size: 20px;
        }

        
    </style>