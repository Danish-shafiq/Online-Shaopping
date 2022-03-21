<?php
@session_start();
include("includes/db.php");

	if (isset($_GET['edit_account'])) {
		
		$customer_email = $_SESSION['customer_email'];

		$get_customer = "select * from customers customer_email='$customer_email'";

		$run_customer = mysqli_query($con, $get_customer);

				//$row_customer = mysqli_fetch_array($run_customer);

		$customer_id = $row_customer['customer_id'];
		$customer_name = $row_customer['customer_name'];
		$customer_email = $row_customer['customer_email'];
		$customer_pass = $row_customer['customer_pass'];
		$country = $row_customer['customer_country'];
		$city = $row_customer['customer_city'];
		$contact = $row_customer['customer_contact'];
		$address = $row_customer['customer_address'];
		$image = $row_customer['customer_image'];

	}
?>
<form action="" method="post" enctype="multipart/form-data">
	<table align="center" width="600">
		<tr align="center">
			<td colspan="8"><h2><b>Update Your Account :</b></h2></td>
		</tr>	
		<tr>
			<td align="right"><b>Customer Name :</b></td>
			<td><input type="text" name="c_name" value="<?php echo $customer_name; ?>"></td>
		</tr>
		<tr>
			<td align="right"><b>Customer Email :</b></td>
			<td><input type="text" name="c_email" value="<?php echo $customer_email; ?>"></td>
		</tr>
		<tr>
			<td align="right"><b>Customer Pasword :</b></td>
			<td><input type="password" name="c_pass" value="<?php echo $customer_pass; ?>" disabled=""></td>
		</tr>
		<tr>
			<td align="right"><b>Customer Country :</b></td>
			<td>
				<select name="c_country" disabled="">
					<option value="<?php echo $country; ?>"><?php echo $country; ?></option>
					<option>Afghanistan</option>
					<option>India</option>
					<option>Iran</option>
					<option>Japan</option>
					<option>China</option>
					<option>Srilanka</option>
					<option>Germany</option>
					<option>United States</option>
					<option>United Arab Emirates</option>
					<option>Saudia Arabia</option>
					<option>United Kingdom</option>
					<option>Pakistan</option>
					<option>England</option>
					<option>South Africa</option>
					<option>Australia</option>
					<option>Bangladesh</option>
					<option>Turkey</option>
					<option>Itely</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right"><b>Customer city :</b></td>
			<td><input type="text" name="c_city" value="<?php echo $city; ?>"></td>
		</tr>
		<tr>
			<td align="right"><b>Customer Mobile No :</b></td>
			<td><input type="text" name="c_number" value="<?php echo $contact; ?>"></td>
		</tr>
		<tr>
			<td align="right"><b>Customer Address :</b></td>
			<td><input type="text" name="c_address" value="<?php echo $address; ?>"></td>
		</tr>
		<tr>
			<td align="right"><b>Customer Image :</b></td>
			<td><img src="customer_photos/<?php echo $image; ?>" width="60" height="60"><br><input type="file" name="c_image"></td>
		</tr>
		<tr align="center">
			<td colspan="8"><input type="submit" name="update_account" value="Update Now"></td>
		</tr>
	</table>
</form>

<?php

	if (isset($_POST['update_account'])) {
		
		$update_id = $customer_id;
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_number'];
		$c_address = $_POST['c_address'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_temp = $_FILES['c_image']['tmp_name'];

		move_uploaded_file($c_image_temp,"customer_photos/$c_image");

		$Update_c = "update customers set customer_name='$c_name', customer_email='$c_email', customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address', customer_image='$c_image' where customer_id='$update_id'";
		$run_c = mysqli_query($con, $Update_c);

		if ($run_c) {
			
			echo "<script>alert('Your Account has been updated successfully!')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";
		}
	}











?>