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
			<th>Category Id</th>
			<th>Category Tittle</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
		include("includes/db.php");

			$get_cat = "select * from categories";

			$run_cat = mysqli_query($con,$get_cat);

			while ($row_cats = mysqli_fetch_array($run_cat)) {
				
				$cat_id = $row_cats['cat_id'];
				$cat_tittle = $row_cats['cat_title'];
			
		?>
		<tr align="center">
			<td><?php echo $cat_id; ?></td>
			<td><?php echo $cat_tittle; ?></td>
			<td><a href="index.php?edit_cat=<?php echo $cat_id;?>">Edit</a></td>
			<td><a href="index.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
