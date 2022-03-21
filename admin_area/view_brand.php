<!DOCTYPE html>
<html>
<head>
	<title>Admin Pannel</title>
	<style type="text/css">
		th,tr{border:3px groove #000;}
		table{border:2px solid #000;}
		tr,td{padding-top:15px;}
	</style>
</head>
<body>
	<table width="794" align="center" bgcolor="#FFCCCC">
		<tr>
			<th>Brand Id</th>
			<th>Brand Tittle</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
		include("includes/db.php");

			$get_brands = "select * from brands";

			$run_brands = mysqli_query($con,$get_brands);

			while ($row_brands = mysqli_fetch_array($run_brands)) {
				
				$brand_id = $row_brands['brand_id'];
				$brand_tittle = $row_brands['brand_title'];
			
		?>
		<tr align="center">
			<td><?php echo $brand_id; ?></td>
			<td><?php echo $brand_tittle; ?></td>
			<td><a href="index.php?edit_brand=<?php echo $brand_id;?>">Edit</a></td>
			<td><a href="index.php?delete_brand=<?php echo $brand_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
