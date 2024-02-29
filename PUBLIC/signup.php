<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title> Sign Up</title>
    
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <div class="wrapper">
            <form action="">
                <h1>
                    Sign Up
                    <a href="index.php">
                        <img style="width: 50px; margin-right: 20px;" src="../IMAGES/logo.png" alt="#">
                    </a>
                </h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="Gmail" placeholder="Gmail" required>
                    <i class='bx bxl-gmail'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                  </div>
                  <div class="input-box">
                    <input type="password" placeholder="Confirm Password" required>
                    <i class='bx bxs-lock-alt'></i>
                  </div>
                  <div>
                    <button type="submit" class="btn">Submit</button>
                  </div>
                  <style>
            
            *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Poppins", sans-serif;

}
body{
    display:flex;
    justify-content: center;
    align-items:center;
    min-height: 100vh;
    background:url('../IMAGES/giay2.png') no-repeat;
    background-size: cover;
    background-position: center;

}
.wrapper{
    width: 500px;
    height:600px;
    background: transparent;
    border: 4px solid  rgba(255, 255, 255, .2);
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, .2);
    color: #fff;
    border-radius: 50px;
    padding: 50px 60px;

}
.wrapper h1{
    font-size:45px;
    text-align: center;
}
.wrapper .input-box{
    position: relative;
    width:100% ;
    height:50px;
    margin:30px 0;

}
.input-box input{
    width:100%;
    height:100%;
    background: transparent;
    border:none;
    outline:none;
    border: 2px solid rgba(255, 255, 255, .2);
    border-radius: 20px;
    font-size: 16px;
    color:#fff;
    padding:20px 45px 20px 20px;
}
.input-box input::placeholder{
    color:#fff;

}

.input-box i{
    position: absolute;
    right:20px;
    top:50%;
    transform: translateY(-50%);
    font-size:20px;
}

.wrapper .btn{
    width:60%;
    height:60px;
    background: #fff;
    border:none;
    outline:none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    cursor: pointer;
    font-size: 16px;
    color:#333;
    font-weight: 300;
  
}



        </style>

                
            </form>
        </div>
        <style>
            
    


        </style>

    </body>
</html>