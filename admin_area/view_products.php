<!DOCTYPE html>
<html>
<head>
	<title>View Products</title>
	<style type="text/css">
		th,tr{border:3px groove #000;}
		table{border:2px solid #000;}
	</style>
</head>
<body>

	
	<table align="center" width="794" bgcolor="#FFCC99">
		<tr align="center">
			<td colspan="8">
				<b><h2>View All Products</h2></b>
			</td>
		</tr>
		<tr>
			<th>Product No</th>
			<th>Tittle</th>
			<th>Image</th>
			<th>Price</th>
			<th>Total Sold</th>
			<th>Status</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
		include("includes/db.php");

		$get_pro = "select * from Products";

		$run_pro = mysqli_query($con, $get_pro);

		$i = 0;

		while ($row_pro = mysqli_fetch_array($run_pro)) {
			
			$p_id = $row_pro['product_id'];
			$p_tittle = $row_pro['product_title'];
			$p_image = $row_pro['product_img1'];
			$p_price = $row_pro['product_price'];
			$p_status = $row_pro['status'];

			$i++;

		?>
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $p_tittle; ?></td>
			<td><img src="product_images/<?php echo $p_image; ?>" width="60" height="60"></td>
			<td><?php echo $p_price; ?></td>
			<td>
				<?php 

					$get_sold = "select * from pendind_orders where product_id='$p_id'";

					$run_sold = mysqli_query($con,$get_sold);

					$count = mysqli_num_rows($run_sold);

					echo $count;
				 ?>
			</td>
			<td><?php echo $p_status; ?></td>
			<td><a href="index.php?edit_pro=<?php echo $p_id; ?>">Edit</a></td>
			<td><a href="delete_pro.php?delete_pro=<?php echo $p_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>