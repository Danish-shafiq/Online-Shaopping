
<!DOCTYPE html>
<html>
<head>
	<title>Admin Pannel</title>
<body>
<form action="" method="post" style="padding-top: 300px; text-align: center;">

		<b>Category Title :</b>
		<input type="text" name="c_title">
		<input type="submit" name="insert_cat" value="Insert Category">
</form>
</body>
</html>
<?php
	
	if (isset($_POST['insert_cat'])) {
		
		$c_title = $_POST['c_title'];

		$insert_cat = "insert into categories (cat_title) values ('$c_title')";

		$run_cat = mysqli_query($con,$insert_cat);

		if ($run_cat) {
			
			echo "<script>alert('New Category has been inserted')</script>";

			echo "<script>window.open('index.php?view_cat','_self')</script>";
		}
	}
?>