
<!DOCTYPE html>
<html>
<head>
	<title>Insert Brand</title>
<body>
<form action="" method="post" style="padding-top: 300px; text-align: center;">

		<b>Brand Title :</b>
		<input type="text" name="b_title">
		<input type="submit" name="insert_brand" value="Insert Category">
</form>
</body>
</html>
<?php
	
	if (isset($_POST['insert_brand'])) {
		
		$b_title = $_POST['b_title'];

		$insert_brand = "insert into brands (brand_title) values ('$c_title')";

		$run_brand = mysqli_query($con,$insert_brand);

		if ($run_brand) {
			
			echo "<script>alert('New Brand has been inserted')</script>";

			echo "<script>window.open('index.php?view_brand','_self')</script>";
		}
	}
?>