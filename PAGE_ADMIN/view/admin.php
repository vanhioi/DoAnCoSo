
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>

<body>
    <div id="header">
		<h1>TRANG QUẢN TRỊ</h1>
		
	</div>
    <div id="topmenu">
		<ul>
            <li><a href="index.php">Trang chủ</a></li>
            <div class="dropdown">
				<li><a>Product</a></li>
				<div class="dropdown-content">
				<li><a href="index.php?act=danhmuc">Danh mục</a></li>
				<li><a href="index.php?act=sanpham">Sản phẩm</a></li>
				</div>
			  </div>
            <li><a href="index.php?act=users">Users</a></li>
			<li><a href="index.php?act=quanlidonhang">Quản lí đơn hàng</a></li>
        </ul>
	</div>
    
	

	<div class="content_center">

	<div class="home">
	
		<div class="list_catalog">
			<ul class="list_catalogs">
				<a href=""><div class="list_catalog_items trangchu" style="background-color: rgb(50, 50, 50);">Home</div></a>
				<a href="index.php?act=danhmuc"><div class="list_catalog_items danhmuc" style="background-color: rgb(50, 50, 50);">Danh Mục</div></a>
				<a href="index.php?act=sanpham"><div class="list_catalog_items sanpham" style="background-color: rgb(50, 50, 50);">Sản Phẩm </div></a>
				<a href="index.php?act=users"><div class="list_catalog_items users" style="background-color: rgb(50, 50, 50);">Users</div></a>
				<a href="index.php?act=quanlidonhang"><div class="list_catalog_items quanlidonhang" style="background-color: rgb(50, 50, 50);">Quản lí đơn hàng</div></a>
			</ul>
		</div>
	</div>
	</div>

    </div>

    <div id="footer">
		<center>
			<h2><strong>Công Ty TNHH 5 Thành Viên</strong></h2>
			<br>
			<p><strong>Địa chỉ:</strong> An Giang, Đà Nẵng, Trà Vinh, TP HCM, Long An </p>
			<p><strong>Số ĐT:</strong> 0123456789</p>
			<p><strong>Mail:</strong>helloxinchao@gmail.com</p>
			<p><strong>Mã số doanh nghiệp:</strong> 123456789 do Sở Kế hoạch & Đầu Tư VAA
			<p>Bản quyền thuộc về Công Ty Cổ Phần TNHH 5 Thành Viên</p> 
		</center>
	</div>
</body>

</html>

<style>
		body {
			margin: 0;
			padding: 0;
		}
		#header {
			background-color:rgb(50, 50, 50);
			color:white;
			text-align:center;
			padding:5px;
		}
		
		#topmenu {
			line-height:30px;
			background-color:#b9b9b9;
			height: 500px;
			width:200px;
			float:left;
		}
		#topmenu ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			width: 200px;
			background-color: #b9b9b9;
		}

		#topmenu li a {
			display: block;
			color: #000;
			padding: 8px 16px;
			text-decoration: none;
		}

		/* Change the link color on hover */
		#topmenu li a:hover {
			background-color: #555;
			color: rgb(255, 255, 255);
		}
		#content {
			width:350px;
			float:left;
			padding:10px;
		}
		
		.list_catalogs{
			display: flex;
		}
		.list_catalog_items{
			list-style: none;
			height: 200px;
			font-size: 25px;
			color: white;
			line-height: 200px;
			border-radius: 5px;


		}
		.list_catalogs a {
			text-decoration: none;
			width: 100%;
			text-align: center;
			margin: 0px 7px;
			padding-top: 36px;
		}
		
		#footer {
			background-color:#F6f7f7;
			color:rgb(0, 0, 0);
			clear:both;
			text-align:center;
			padding:5px;
		}

		.dropdown-content {
		display: none;
		position:relative;
		background-color: #f9f9f9;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		}

		.dropdown:hover .dropdown-content {
		display: block;
		}
	</style>