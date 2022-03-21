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

				<?php
				cart();

				?>
			<div id="right_contentarea">
				<div id="headline">
					<div id="headline_content">
						<b>Welcome guest!</b>
						<b style="color: yellow;">Shoping Cart</b>
						<span>Total Item : <?php items(); ?> - Total Price : <?php Total_Price(); ?> - <a href="cart.php" style="color: #FF0;">Go to Cart</a> </span>
						
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
			
				<div>
					<form action="customer_register.php" method="post" enctype="multipart/form-data">
						<table width="750" align="center" style="padding: 10px; margin-top: 10px;">
							<tr align="center">
								<td colspan="2"><b><h2>Create an Account</h2></b></td>
							</tr>
							<tr>
								<td align="right"><b>Customer Name :</b></td>
								<td><input type="text" name="c_name" required></td>
							</tr>
							<tr>
								<td align="right"><b>Customer Email :</b></td>
								<td><input type="text" name="c_email" required></td>
							</tr>
							<tr>
								<td align="right"><b>Customer Pasword :</b></td>
								<td><input type="Pasword" name="c_pass" required></td>
							</tr>
							<tr>
								<td align="right"><b>Customer Country :</b></td>
								<td>
									<select name="c_country">
										<option>Select a Country</option>
										<option>Afghanistan</option>
										<option>India</option>
										<option>Iran</option>
										<option>Japan</option>
										<option>China</option>
										<option>Srilanka</option>
										<option>Germany</option>
										<option>United States</option>
										<option>United Arab Emirates</option>
										<option>Saudia Arabia</option>
										<option>United Kingdom</option>
										<option>Pakistan</option>
										<option>England</option>
										<option>South Africa</option>
										<option>Australia</option>
										<option>Bangladesh</option>
										<option>Turkey</option>
										<option>Itely</option>
									</select>
								</td>
							</tr>
							<tr>
								<td align="right"><b>Customer city :</b></td>
								<td><input type="text" name="c_city" required></td>
							</tr>
							<tr>
								<td align="right"><b>Customer Mobile No :</b></td>
								<td><input type="text" name="c_number" required></td>
							</tr>
							<tr>
								<td align="right"><b>Customer Address :</b></td>
								<td><input type="text" name="c_address" required></td>
							</tr>
							<tr>
								<td align="right"><b>Customer Image :</b></td>
								<td><input type="file" name="c_image" required></td>
							</tr>
							<tr align="center">
								<td colspan="2"><input type="submit" name="c_register" value="SignUp"></td>
							</tr>
						</table>
					</form>
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
<?php

	if (isset($_POST['c_register'])) {
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_number = $_POST['c_number'];
		$c_address = $_POST['c_address'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_temp = $_FILES['c_image']['tmp_name'];

		$c_ip = getRealIpAddr();
		
		$insert_query = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_number','$c_address','c_image','$c_ip')";		


		$run_customer = mysqli_query($con,$insert_query);

		move_uploaded_file($c_image_temp, "customer/customer_photos/$c_image");


		$sel_cart = "select * from cart where ip_add='$c_ip'";

		$run_cart = mysqli_query($con,$sel_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if ($check_cart>0) {
			
			$_SESSION['customer_email'] = $c_email;

			echo "<script>alert('Account Created Successfully, Thanks You!')</script>";

			echo "<script>window.open('checkout.php','_self')</script>";
		}

		else
		{
			$_SESSION['customer_email'] = $c_email;

			echo "<script>alert('Account Created Successfully, Thanks You!')</script>";

			echo "<script>window.open('index.php','_self')</script>";
		}
	}

?>