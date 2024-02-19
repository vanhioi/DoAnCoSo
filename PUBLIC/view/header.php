
<div class="header">
    <div class="header-child">
    <a href="index.php">
        <img style="width: 140px; margin-right: 20px;" src="../IMAGES/logo.png" alt="index.php">
    </a>
    
        <form action="index.php?pid=search" method="post">
            <input style="height: 32px;width: 250px;border-radius: 5px;outline: none;border: none;" class="submit" type="text" name="name_search" placeholder="Nhập vào để tìm ?"  >  
        </form>
        <div class="header-link" style="width: 55%; margin-left: 50px">
            <a href="index.php?pid=1">HOME</a>
            <a href="#New">NEW</a>
            <a href="#Women">WOMEN</a>
            <a href="#Men">MEN</a>
            <a href="#KIDS">KIDS</a>
            <a href="#SALE">SALE</a></li>
        </div>
        <div>
            <a>
                <div class="dropdown">
                    <img style="margin-right: 20px;" src="../IMAGES/Account.png" alt="">
                    <div class="dropdown-content">
                        <a href="login.php">Đăng nhập</a>
                        <a href="dangki.php">Đăng ký</a>
                    </div>
                </div> 
            </a>
        </div>
        <div style="width: 20%;">
            <a style="text-decoration: none;">
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
        display: flex;
        justify-content: center;
        align-items: center;
        height: 10vh;
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

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown1 {
        position: relative;
        display: inline-block;
    }

    .dropdown-content1 {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 250px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content1 a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content1 a:hover {
        background-color: #f1f1f1
    }

    .dropdown1:hover .dropdown-content1 {
        display: block;
    }
</style>
