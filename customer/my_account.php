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
			<img src="../images/logo.png" style="float: left;" />
			<img src="../images/logo2.jpg" style="float: right;" />
		</div>
		<!--header end here-->
		<!--navigation bar start here-->
		<div id="navbar">
			<ul id="menu">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../all_products.php">All Products</a></li>
				<li><a href="../customer/my_account.php">My Accounts</a></li>
				<?php
					if (isset($_SESSION['customer_email'])) {
						
						echo "<span style='display:none;'><li><a href='../user_register.php'>Sign Up</a></li></span>";

					}

					else
					{
						echo "<li><a href='../user_register.php'>Sign Up</a></li>";
					}
				?>
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
				<div id="sidebar_tittle">Manage Account :</div>
				<ul id="cats">
					<?php
						$user_session = $_SESSION['customer_email'];

						$get_customer_pic = "select * from customers where customer_email='$user_session'";
						$run_customer = mysqli_query($con,$get_customer_pic);

						$row_customer = mysqli_fetch_array($run_customer);

						$customer_pic = $row_customer['customer_image'];

						echo "<img src='customer_photos/$customer_pic' width='150' height='150'";


					?>
					<br>
					<li><a href="my_account.php?my_orders">My Orders</a></li>
					<li><a href="my_account.php?edit_account">Edit Account</a></li>
					<li><a href="my_account.php?change_pass">Change Password</a></li>
					<li><a href="my_account.php?delete_account">Delete Account</a></li>
					<li><a href="logout.php">Logout</a></li>
					
				</ul>
			</div>

				<?php
				cart();

				?>
			<div id="right_contentarea">
				<div id="headline">
					<div id="headline_content">
						<?php
							if (isset($_SESSION['customer_email'])) 
							{
								
								echo "<b>Welcome :"."<span style='color:skyblue'>".$_SESSION['customer_email']."</span>"."</b>";
							}



						?>
						&nbsp;<?php
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
					<h2 style="background-color: #000; color: #fc9; padding: 20px; text-align: center; border-top: 2px solid #FFF;">Manage Your Account Here</h2>

					<?php getDefault(); ?>

					<?php
					if (isset($_GET['my_orders'])) {
						
						include("my_orders.php");
					}

					if (isset($_GET['edit_account'])) {
						
						include("edit_account.php");
					}

					if (isset($_GET['change_pass'])) {
						
						include("change_pass.php");
					}

					if (isset($_GET['delete_account'])) {
						
						include("delete_account.php");
					}

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