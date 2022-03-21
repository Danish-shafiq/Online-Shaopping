<form accept="" method="post">
	<table width="500" align="center">
		<tr align="center">
			<td colspan="4">
				<b><h2>Change Your Password :</h2></b>
			</td>
		</tr>
		<tr>
			<td align="right">Enter Current Password :</td>
			<td><input type="text" name="old_pass" required=""></td>
		</tr>
		<tr>
			<td align="right">Enter New Password :</td>
			<td><input type="text" name="new_pass" required=""></td>
		</tr>
		<tr>
			<td align="right">Confirm New Password :</td>
			<td><input type="text" name="confirm_new_pass" required=""></td>
		</tr>
		<tr align="center">
			<td colspan="4"><input type="submit" name="change_pass" value="Change Password"></td>
		</tr>
	</table>
</form>

<?php

include("includes/db.php");

$c = $_SESSION['customer_email'];
	
	if (isset($_POST['change_pass'])) {
		
		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		$confirm_new_pass = $_POST['confirm_new_pass'];

		$get_real_pass = "select * from customers where customer_pass='$old_pass'";
		$run_real_pass = mysqli_query($con,$get_real_pass);

		$check_pass = mysqli_num_rows($run_real_pass);

		if ($check_pass==0) {
			
			echo "<script>alert('Your current password is not valid! Try again')</script>";
			exit();
		}

		if ($new_pass!=$confirm_new_pass) {
			
			echo "<script>alert('New password did not matched! Try again')</script>";
			exit();
		}
		else
		{
			$update_pass = "update customers set customer_pass='$new_pass' where customer_email='$c'";
			$run_update = mysqli_query($con, $update_pass);

			if ($run_update) {
				
				echo "<script>alert('Your Password has been successfully changed')</script>";
				echo "<script>window.open('my_account.php','_self')</script>";
			}
		}
	}






?>