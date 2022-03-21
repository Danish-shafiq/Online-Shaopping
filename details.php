<?php
	include('includes/db.php');
	include('function/functions.php');

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="content-Type" content="text/html">
	<title>E-ShopOnline</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all"/>
</head>
<body>
	<!-- container Start-->
	<div class="main_wraper">
		<!--header Start Here-->
		<div class="header_wraper">
			<img src="images/logo.png" style="float: left;" />
			<img src="images/logo2.jpg" style="float: right;" />
		</div>
		<!--header end here-->
		<!--navigation bar start here-->
		<div id="navbar">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="#">My Accounts</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="#">Shoping Cart</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>

			<div id="form">

			<form method="get" action="results.php" enctype="multipart/form-data">

				<input type="text" name="user_query" placeholder="Search a Product"/>
				<input type="submit" name="search" value="Search">				

			</form>
		</div>
		</div>
		<!--navigation bar end here-->
		<div class="content_wraper">
			<div id="left_sidebar">
				<div id="sidebar_tittle">Categories</div>
				<ul id="cats">
					<?php
						gercategory();
					?>
					
				</ul>
				<div id="sidebar_tittle">Brands</div>
				<ul id="cats">
					<?php
						getbrand();
					?>
				</ul>
			</div>


			<div id="right_contentarea">
				<div id="headline">
					<div id="headline_content">
						<b>Welcome guest!</b>
						<b style="color: yellow;">Shoping Cart</b>
						<span>Item : - Price : </span>
					</div>
				</div>
				<div id="products_box">
					<?php
						
						if (isset($_GET['pro_id'])) {

							$product_id = $_GET['pro_id'];
							
						$get_products = "select * from products where product_id='$product_id'";

						$run_products = mysqli_query($con, $get_products);

						while ($row_products = mysqli_fetch_array($run_products)) {
							
							$pro_id = $row_products['product_id'];
							$pro_title = $row_products['product_title'];
							$cat_id = $row_products['cat_id'];
							$brand_id = $row_products['brand_id'];
							$pro_desc = $row_products['product_desc'];
							$pro_price = $row_products['product_price'];
							$pro_img1 = $row_products['product_img1'];
							$pro_img2 = $row_products['product_img2'];
							$pro_img3 = $row_products['product_img3'];

							echo "

								<div id='single_product'>
								<h3>$pro_title</h3>
								<img src = 'admin_area/product_images/$pro_img1' width='180' height='180'/>
								<img src = 'admin_area/product_images/$pro_img2' width='180' height='180'/>
								<img src = 'admin_area/product_images/$pro_img3' width='180' height='180'/><br>
								<p><b>Price : $ $pro_price</b></p></br>
								<p>$pro_desc</p></br>
								<a href='index.php' style='float:left;'>Go Back</a>
								<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>

								</div>

							";
						}

					}//this is if closed here.
					?>
				</div>
			</div>
		</div>
		<div class="footer">
			<h1 style="color: #000; padding: 30px; text-align: center;">&copy; 2021- By www.E-ShopOnline.com</h1>
		</div>
	</div>
	<!-- Container end-->
</body>
</html>