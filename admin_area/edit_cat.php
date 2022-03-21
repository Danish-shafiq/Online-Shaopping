<?php
include("includes/db.php");

	if (isset($_GET['edit_cat'])) {
		
		$cat_id = $_GET['edit_cat'];

		$get_cat = "select * from categories where cat_id='$cat_id'";

		$run_cat = mysqli_query($con,$get_cat);

		$row_cat = mysqli_fetch_array($run_cat);

		$cat_id = $row_cat['cat_id'];

		$cat_title = $row_cat['cat_title'];

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Pannel</title>
<body>
<form action="" method="post" style="padding-top: 300px; text-align: center;">

		<b>Category Title :</b>
		<input type="text" name="c_title" value="<?php echo $cat_title; ?>">
		<input type="submit" name="update_cat" value="Update Category">
</form>
</body>
</html>
<?php
	
	if (isset($_POST['update_cat'])) {
		
		$c_title = $_POST['c_title'];

		$update_cat = "update categories set cat_title='$c_title' where cat_id='$cat_id'";

		$run_cat = mysqli_query($con,$update_cat);

		if ($run_cat) {
			
			echo "<script>alert('Category has been updated')</script>";

			echo "<script>window.open('index.php?view_cat','_self')</script>";
		}
	}
?>