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
			
				<div id="products_box">
					<form action="cart.php" method="post" enctype="multipart/form-data">
						<table width="740" align="center" bgcolor="#0099cc">
							<tr align="center">
								<td><b>Remove</b></td>
								<td><b>Product(s)</b></td>
								<td><b>Quantity</b></td>
								<td><b>Total price</b></td>
							
							</tr>
			<?php

					 $total = 0;

					 $ip_add = getRealIpAddr();

					 $sel_price = "select * from cart where ip_add='$ip_add'";

					 $run_price = mysqli_query($con,$sel_price);

					 while ($record=mysqli_fetch_array($run_price)) {
					 	
					 	$pro_id = $record['p_id'];

					 	$pro_price = "select * from products where product_id='$pro_id'";

					 	$run_pro_price = mysqli_query($con,$pro_price);

					 	while ($p_price = mysqli_fetch_array($run_pro_price)) {
					 		
					 		$product_price =array($p_price['product_price']);
					 		$product_title = $p_price['product_title'];
					 		$product_image = $p_price['product_img1'];
					 		$price = $p_price['product_price'];

					 		$values = array_sum($product_price);

					 		$total+=$values; 
					 
		?>
							<tr>
								<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
								<td style="padding-top: 10px;"><?php echo $product_title; ?><br><img src="admin_area/product_images/<?php echo $product_image; ?>" height="80" width="80" style="padding-top: 10px;"></td>
								<td><input type="text" name="qty" value="1" size="3"></td>

								<?php

								if (isset($_POST['update'])) {
									
									$qty = $_POST['qty'];

									$insert_qty = "update cart set qty='$qty' where ip_add='$ip_add'";

									$run_qty = mysqli_query($con,$insert_qty);

									$total = $total*$qty;

								}



								?>
								<td><?php echo "$". $price; ?></td>
							</tr>
							<?php }} ?>

							<tr>
								<td colspan="3" align="right"><b>Sub Total :</b></td>
								<td><b><?php echo "$". $total; ?></b></td>
							</tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr>
								<td><input type="submit" name="update" value="Update Cart"></td>
								<td><input type="submit" name="continue" value="Continue Shopping"></td>
								<td><button><a href="checkout.php" style="text-decoration: none; color: #000;">Checkout</a></button></td>
							</tr>
						</table>
					</form>
					<?php

					function updatecart(){

						global $con;

					if (isset($_POST['update'])) {
						
						foreach ($_POST['remove'] as $remove_id) {
							
							$delete_products = "delete from cart where p_id ='$remove_id'";

							$run_delete  = mysqli_query($con,$delete_products);

							if ($run_delete) {
								
								echo "<script>window.open('cart.php','_self')</script>";
							}
						}


					}

					if (isset($_POST['continue'])) {
						
						echo "<script>window.open('index.php','_self')</script>";
					}

				}

				echo @$up_cart = updatecart();
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