<?php
session_start(); // Start session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Get the username from session
$username = $_SESSION['username'];

// Connect to the database
$conn = new mysqli("localhost", "root", "", "shopgiay");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute SQL query to fetch user's information
$sql = "SELECT TenKH FROM user WHERE diachiemailKH = '$username'";
$result = $conn->query($sql);

if ($result === false || $result->num_rows == 0) {
    // Handle the case where user information cannot be fetched
    $TenKH = "User not found"; // Set a default value if user is not found
} else {
    // Fetch user's information
    $row = $result->fetch_assoc();
    $TenKH = $row["TenKH"];
}

// Close database connection
$conn->close();
?>


    <style>
        input[type="text"] {
            margin-bottom: 25px;
            width: 250px;
            height: 40px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        button {
            background-color: #FFCE1A;
            border: none;
            border-radius: 10px;
            align-items: center;
        }
    </style>

<body>
    <center>
        <img style="width:100px;" src="../IMAGES/Account.png" alt="">
        <h2>Welcome, <?php echo $TenKH; ?></h2>
        <!-- Other profile information here -->
        <button><a href="index.php">Trang chủ</a></button>
        <button><a href="login.php">Đăng nhập</a></button>
        <button><a href="dangxuat.php">Đăng xuất</a></button>
    </center>
</body>
</html>

   

 
    <style>
        input[type="text"] {
            margin-bottom: 25px;
            width: 250px;
            height: 40px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        button {
            background-color: #FFCE1A;
            border: none;
            border-radius: 10px;
            align-items: center;
        }
           
</style>
