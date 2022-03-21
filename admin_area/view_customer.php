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
			<td colspan="7"><h2>View All Customers</h2></td>
		</tr>
		<tr>
			<th>S.N</th>
			<th>Name</th>
			<th>Email</th>
			<th>Image</th>
			<th>Country</th>
			<th>City</th>
			<th>Delete</th>
		</tr>
		<?php

			$get_customer = "select * from customers";

			$run_customers = mysqli_query($con, $get_customer);
			$i=0;

			while ($row_customer=mysqli_fetch_array($run_customers)) {
				
				$customer_id = $row_customer['customer_id'];
				$name = $row_customer['customer_name'];
				$email = $row_customer['customer_email'];
				$c_image = $row_customer['customer_image'];
				$country = $row_customer['customer_country'];
				$city = $row_customer['customer_city'];

				$i++;

			
		?>
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $name;?></td>
			<td><?php echo $email;?></td>
			<td><img src="../customer/customer_photos/<?php echo $c_image; ?>" width="60" height="60"></td>
			<td><?php echo $country;?></td>
			<td><?php echo $city;?></td>
			<td><a href="index.php?delete_customer=<?php echo $customer_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>