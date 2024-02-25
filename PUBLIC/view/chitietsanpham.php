<?php
    include("header.php");

    include_once("connect.php");
    $id ="";
    if (isset($_GET["idSP"])) 
    {
        $id = $_GET["idSP"];
    }

    $sql_query = " Select * from Product where id_sanpham = $id ";
    $result = $conn -> query($sql_query); 

?>
    <div class ="container">
        <h2>Chi tiết sản phẩm</h2>
        <?php
            if ($result -> num_rows > 0)
            {
                while($row = $result -> fetch_assoc())
                {
                    ?>
                        <div class ="row">
                            <div class="col-md-5">
                                <img src="<?php echo $row["img"] ?> "style="width: 100% height: 400px;margin: 5%; "/>
                            </div>
                            
                            
                            
                            
                            <div class="col-md-7">
                                <h4 style ="color: grey;"><?php echo $row["tenSP"]; ?>                  </h4>
                                <p style ="color: grey;"> Giá:  <?php echo $row["gia"]; ?>  vnđ      </p>
                                <h5 style ="color: grey;"> Mô tả: <?php echo $row["mota"];?> </h5>
                               
                                <?php
                                    if($row["soluongtonkho"]==0)
                                    {
                                            echo '<h4 style="color:red;"> Hết hàng </h4> ' ;
                                    }
                                    else
                                    {
                                            echo '<h4 style="color:green;"> Còn hàng</h4> ' ;
                                            echo '<h4 style="color:black;"> Số lượng</h4> ';
                                            echo '<input type="number"
                                                 class="form-control" name="" id="" min="1" max="'.$row["soluongtonkho"].'" aria-describedby="helpId" placeholder="">';
                                    }
                                ?>
                            </div>    
                        </div>

                    <?php
                }
            }
        ?>
    
    
    
</div>
<br></br>   
<?php
    include("footer.php");
?>
