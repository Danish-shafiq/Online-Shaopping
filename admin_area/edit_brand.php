<?php
include("includes/db.php");

	if (isset($_GET['edit_brand'])) {
		
		$brand_id = $_GET['edit_brand'];

		$get_brand = "select * from brands where brand_id='$brand_id'";

		$run_brand = mysqli_query($con,$get_brand);

		$row_brand = mysqli_fetch_array($run_brand);

		$brand_id = $row_brand['brand_id'];

		$brand_title = $row_brand['brand_title'];

	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Brand</title>
<body>
<form action="" method="post" style="padding-top: 300px; text-align: center;">

		<b>Brand Title :</b>
		<input type="text" name="b_title" value="<?php echo $brand_title; ?>">
		<input type="submit" name="update_brand" value="Update Brand">
</form>
</body>
</html>
<?php
	
	if (isset($_POST['update_brand'])) {
		
		$b_title = $_POST['b_title'];

		$update_brand = "update brands set brand_title='$b_title' where brand_id='$brand_id'";

		$run_brand = mysqli_query($con,$update_brand);

		if ($run_brand) {
			
			echo "<script>alert('Brand has been updated')</script>";

			echo "<script>window.open('index.php?view_brand','_self')</script>";
		}
	}
?>