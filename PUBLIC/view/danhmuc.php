<?php
    $sql = "SELECT * FROM loaisp"; 
    
    $resultSql = $conn->query($sql);
?>
<div class="danhmucsp">
    <div class="ten_danhmucsp">
    <?php
        if ($resultSql->num_rows > 0) {
            while ($row = $resultSql->fetch_assoc()) {
    ?>
        <a href="index.php?idsp=<?php echo $row['idLoaisp']; ?>"><?php echo $row['tenloaisp']; ?></a>
                        
        <?php
            }
        }
        ?>
        
    </div>
    
</div>

<style>
    .danhmucsp {
        display: flex;
        justify-content: center;
    }

    .ten_danhmucsp a {
        text-decoration: none;
        margin: 0 55px;
        padding: 5px 50px;
        border: 1px solid #ccc;
        border-radius: 5px;
        color: white;
        font-size: 18px;
        background-color: rgb(92, 94, 90);
    }
</style>

