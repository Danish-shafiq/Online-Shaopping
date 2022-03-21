<!DOCTYPE html>
<html>
<head>
	<title>Payment Option</title>
</head>
<body>

<?php
	include('includes/db.php');

?>


<div align="center" style="padding: 20px;">
	<h2>Payments Option For You</h2><br>
	<?php

	$ip = getRealIpAddr();

	$get_customer = "select * from customers where customer_ip ='$ip'";

	$run_customer = mysqli_query($con, $get_customer);

	$customer = mysqli_fetch_array($run_customer);

	$customer_id = $customer['customer_id'];




	?>
	<b>Pay with </b>&nbsp;&nbsp;<a href="https://www.paypal.com"><img src="images/paypal.png" width="200" height="80"></a><b>&nbsp;&nbsp;Or &nbsp;&nbsp;<a href="order.php?c_id=<?php echo $customer_id;  ?>">Pay Offline</a></b><br>

	<br><b>If you selected "Pay Offline" option then please ckeck your email or account to find the Invoice No of your order</b>
</div>
</body>
</html>
<?php
	




?>