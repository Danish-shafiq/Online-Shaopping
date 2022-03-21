<?php

include("includes/db.php");

	if (isset($_GET['delete_orders'])) {
		
		$delete_id = $_GET['delete_orders'];

		$delete_order = "delete from pendind_orders where order_id='$delete_id'";

		$run_delete = mysqli_query($con,$delete_order);

		if ($run_delete) {

			$delete_c_order = "delete from customer_orders where order_id='$delete_id'";

			$run_c_delete = mysqli_query($con,$delete_c_order);
			
			echo "<script>alert('One order has been deleted')</script>";

			echo "<script>window.open('index.php?view_orders','_self')</script>";
		}
	}

?>