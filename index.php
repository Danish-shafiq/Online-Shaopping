<?php
	session_start();
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
				<li>
					<?php
						if (!isset($_SESSION['customer_email'])) {
							
							echo "<a href='checkout.php' style='text-decoration: none;color: #F93; display:none;'>MY Account</a>";
						}
						else
						{
							echo "<a href='customer/my_account.php' style='text-decoration: none;color: #FFF;'>My Account</a>";
						}


						?>
				</li>
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

				<?php
				cart();

				?>
			<div id="right_contentarea">
				<div id="headline">
					<div id="headline_content">
						<?php
						if (!isset($_SESSION['customer_email'])) {
							
							echo "<b>Welcome Guest</b>";
						}
						else{



							echo "<b>Wecome :" . "<span style='color:skyblue'>" . $_SESSION['customer_email'] . "</span>" . "</b>";
						}

						?>
						<b style="color: yellow;">Shoping Cart</b>
						<span>Total Item : <?php items(); ?> - Total Price : <?php Total_Price(); ?> - <a href="cart.php" style="color: #FF0;">Go to Cart</a> 

							
						</span>

						<?php
						if (!isset($_SESSION['customer_email'])) {
							
							echo "<a href='checkout.php' style='text-decoration: none;color: #F93;'>Login</a>";
						}
						else
						{
							echo "<a href='logout.php' style='text-decoration: none;color: #F93;'>Logout</a>";
						}


						?>
					</div>
				</div>
			
				<div id="products_box">
					<?php
						getpro();
						getcatpro();
						getbrandpro();
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