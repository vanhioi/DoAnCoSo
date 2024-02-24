<?php

$conn = new mysqli("localhost", "root", "", "shopgiay");

$sql = "SELECT * FROM danhmuc"; 
$resultSql = $conn->query($sql);

?>
<div class="header">
    <div class="header-child">
        <a href="index.php">
            <img style="width: 140px; margin-right: 20px;" src="../IMAGES/logo.png" alt="index.php">
        </a>
        <form action="timkiem.php" method="POST" style="display: flex;">
            <input
                style="height: 32px;width: 250px;border-radius: 5px;outline: none;border: 1px solid #ccc; padding: 0 10px; margin-right: 5px;"
                class="submit" type="text" name="tukhoa" placeholder="Nhập vào để tìm ?">
            <button type="submit" name="timkiem"
                style="height: 32px; border-radius: 5px; border: none; background-color: #333; color: #fff; padding: 0 10px; margin-left: -1px;">search</button>
        </form>

        <div class="header-link" style="width: 55%; margin-left: 50px">
            <a href="index.php">HOME</a>
            <?php
                if ($resultSql->num_rows > 0) {
                    while ($row = $resultSql->fetch_assoc()) {
                ?>
            <a href="index.php?pid=<?php echo $row['iddm']; ?>"><?php echo $row['tendm']; ?></a>

            <?php
                    }
                } else {
                    echo "No products found.";
                    }
            ?>
        </div>
        <div>
            <a>
                <div class="dropdown">
                    <a href="#"><img style="margin-right: 20px;" src="../IMAGES/Account.png" alt=""></a>
                    
                </div>
            </a>
        </div>
        <div style="width: 20%;">
            <a href="#" style="text-decoration: none;">
                <button>
                    <img style="margin-right: 30px; " src="../IMAGES/Cart.png" alt="">
                    Giỏ hàng
                </button>
            </a>
        </div>
    </div>
</div>
<style>
.header-link a {
    text-decoration: none;
    color: black;
    margin-right: 20px;
}

.header {
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 10vh;
    position: sticky;
    top: 0;
}

.header .header-child {
    width: 80%;
    display: flex;
    align-items: center;
}

.header .header-child div input {
    border-radius: 10px;
    border: none;
    background-color: #EAEAEA;
    color: #828282;
    width: 90%;
    padding: 5px 10px 5px 10px;
}

.header .header-child div button {
    background-color: #000000;
    border: none;
    border-radius: 10px;
    display: flex;
    align-items: center;
    padding: 10px 30px 10px 30px;
    color: white;
    font-size: 20px;
}

.dropdown {
    position: relative;
    display: inline-block;
}


.dropdown:hover .dropdown-content {
    display: block;
}


</style>