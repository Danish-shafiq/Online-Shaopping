<!DOCTYPE html>
<html>
<head>
	<title>Admin Pannel</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all"/>
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<img src="logo.png" align="left">
			<img src="logo2.jpg" align="right">
		</div>
		<div class="left">
			<?php

			include("includes/db.php");

			if (isset($_GET['insert_product'])) {
				
				include("insert.php");
			}

			if (isset($_GET['view_product'])) {
				
				include("view_products.php");
			}

			if (isset($_GET['edit_pro'])) {
				
				include("edit_pro.php");
			}

			if (isset($_GET['edit_pro'])) {
				
				include("delete_pro.php");
			}

			if (isset($_GET['view_cat'])) {
				
				include("view_cat.php");
			}

			if (isset($_GET['edit_cat'])) {
				
				include("edit_cat.php");
			}


			if (isset($_GET['insert_cat'])) {
				
				include("insert_cat.php");
			}

			if (isset($_GET['delete_cat'])) {
				
				include("delete_cat.php");
			}

			if (isset($_GET['view_brand'])) {
				
				include("view_brand.php");
			}

			if (isset($_GET['insert_brand'])) {
				
				include("insert_brand.php");
			}

			if (isset($_GET['edit_brand'])) {
				
				include("edit_brand.php");
			}

			if (isset($_GET['delete_brand'])) {
				
				include("delete_brand.php");
			}

			if (isset($_GET['view_customer'])) {
				
				include("view_customer.php");
			}

			if (isset($_GET['delete_customer'])) {
				
				include("delete_customer.php");
			}

			if (isset($_GET['view_orders'])) {
				
				include("view_orders.php");
			}

			if (isset($_GET['delete_orders'])) {
				
				include("delete_orders.php");
			}

			?>
		</div>
		<div class="right">
			<h2>Manage Content</h2>
			<a href="index.php?insert_product">Insert New Products</a>
			<a href="index.php?view_product">View All Products</a>
			<a href="index.php?insert_cat">Insert New Category</a>
			<a href="index.php?view_cat">View All Categories</a>
			<a href="index.php?insert_brand">Insert New Brands</a>
			<a href="index.php?view_brand">View All Brands</a>
			<a href="index.php?view customer">View Customers</a>
			<a href="index.php?view_orders">View Orders</a>
			<a href="index.php?view_payments">View Payments</a>
			<a href="logout.php">Admin Logout</a>
		</div>
	</div>
</body>
</html>
