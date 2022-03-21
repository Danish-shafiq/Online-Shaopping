<?php
@session_start();

include("includes/db.php");

//include("function/functions.php");

?>




<div>
	
	<form action="checkout.php" method="post">
		<table width="800" align="center" bgcolor="#66cccc" style="padding: 20px;">
			<tr align="center">
				<td colspan="4"><h2>Login Or Register</h2></td>
			</tr>
			<tr>
				<td align="right">
					<b>Your Email :</b>
				</td>
				<td>
					<input type="text" name="c_email" placeholder="Enter Your Email" />
				</td>
			</tr>
			<tr>
				<td align="right">
					<b>Your Password :</b>
				</td>
				<td>
					<input type="password" name="c_pass" placeholder="Enter Your Password"/>
				</td>
			</tr>
			<tr align="center">
				<td colspan="4">
					<a href="forgot_pass.php">Forgot Password ?</a>
				</td>
			</tr>
			<tr align="center">
				<td colspan="4">
					<input type="submit" name="c_login" value="Login" style="margin-top: 10px; width: 70px; height: 30px;" />
				</td>
			</tr>		
		</table>
	</form>

	<h2 style="float: right; padding: 10px;"><a href="customer_register.php">New ? Register Here</a></h2>




</div>


<?php

	if (isset($_POST['c_login'])) {
		
		$customer_email = $_POST['c_email'];
		$customer_pass = $_POST['c_pass'];

		$sel_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

		$Run_customer = mysqli_query($con,$sel_customer);

		$check_customer = mysqli_num_rows($Run_customer);

		$get_ip = getRealIpAddr();

		$sel_cart = "select * from cart where ip_add='$get_ip'";

		$run_cart = mysqli_query($con,$sel_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if ($check_customer==0) {
			
			echo "<script>alert('Password Or Email is not correct, Try again!')</script>";
			exit();
		}

		if ($check_customer==1 AND $check_cart==0) {

			$_SESSION['customer_email'] = $customer_email;
			
			echo "<script>window.open('customer/my_account.php','_self')</script>";
		}

		else
		{
			$_SESSION['customer_email'] = $customer_email;

			echo "<script>alert('You are successfully loggin, Now you can order!')</script>";
			echo "<script>window.open('payment_option.php','_self')";
		}
	}




?>