<?php

include("includes/db.php");

	if (isset($_GET['delete_brand'])) {
		
		$delete_id = $_GET['delete_brand'];

		$delete_brand = "delete from brands where brand_id='$delete_id'";

		$run_delete = mysqli_query($con,$delete_brand);

		if ($run_delete) {
			
			echo "<script>alert('One brand has been deleted')</script>";

			echo "<script>window.open('index.php?view_brand','_self')</script>";
		}
	}

?>