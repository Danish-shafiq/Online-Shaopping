<!DOCTYPE html>
<html>
<head>
	<title>View Customers</title>
	<style type="text/css">
		th,tr{border:3px groove #333;}
	</style>
</head>
<body>
	<table width="794" align="center" bgcolor="#FFCC99">
		<tr align="center">
			<td colspan="7"><h2>View All Orders</h2></td>
		</tr>
		<tr>
			<th>Order No</th>
			<th>Customer</th>
			<th>Invoice No</th>
			<th>Product Id</th>
			<th>Qty</th>
			<th>Status</th>
			<th>Delete</th>
		</tr>
		<?php

			$get_orders = "select * from pendind_orders";

			$run_orders = mysqli_query($con, $get_orders);
			$i=0;

			while ($row_orders=mysqli_fetch_array($run_orders)) {
				
				$orders_id = $row_orders['order_id'];
				$customer_id = $row_orders['customer_id'];
				$Invoice_no = $row_orders['invoice_no'];
				$product_id = $row_orders['product_id'];
				$qty = $row_orders['qty'];
				$status = $row_orders['order_status'];

				$i++;

			
		?>
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td>
				<?php
				$get_custonmer = "select * from customers where customer_id='$customer_id'";

				$run_customer = mysqli_query($con, $get_custonmer);

				$row_customer= mysqli_fetch_array($run_customer);

				$customer_email = $row_customer['customer_email'];

				echo $customer_email;

				?>
			</td>
			<td><?php echo $Invoice_no;?></td>
			<td><?php echo $product_id;?></td>
			<td><?php echo $qty;?></td>
			<td><?php echo $status;?></td>
			<td><a href="index.php?delete_orders=<?php echo $orders_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>