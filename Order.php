<?php
	include('includes/db.php');
	include('function/functions.php');
?>

<?php
	//Geting the customer ID

	if (isset($_GET['c_id'])) {
		
		$customer_id = $_GET['c_id'];
	
}
	//Getting products price and number of items...


		 $total = 0;

		 $ip_add = getRealIpAddr();

		 $sel_price = "select * from cart";

		 $run_price = mysqli_query($con,$sel_price);

		 $status = "Pending";
		 $invoice = mt_rand();

		 $count_pro = mysqli_num_rows($run_price);

		 while ($record=mysqli_fetch_array($run_price)) {
		 	
		 	$pro_id = $record['p_id'];

		 	$pro_price = "select * from products where product_id='$pro_id'";

		 	$run_pro_price = mysqli_query($con,$pro_price);

		 	while ($p_price = mysqli_fetch_array($run_pro_price)) {
		 		
		 		$product_price =array($p_price['product_price']);

		 		$values = array_sum($product_price);

		 		$total+=$values; 
		 	}
		 }

		 //Getting quantity from the cart

		 $get_cart = "select * from cart where ip_add='$ip_add'";

		 $run_cart = mysqli_query($con, $get_cart);

		 $get_qty = mysqli_fetch_array($run_cart);

		 $qty = $get_qty['qty'];

		 if ($qty==0) {
		 	
		 	$qty = 1;
		 	$sub_total= $total;
		 }

		 else
		 {
		 	$qty = $qty;
		 	$sub_total = $total*$qty;
		 }

		 $insert_order = "insert into customer_orders (customer_id,due_amount,invoice_no,total_products,order_date,order_status) values ('$customer_id','$sub_total','$invoice','$count_pro',NOW(),'$status')";

		 $run_orders = mysqli_query($con, $insert_order);

		 if ($run_orders) {
		 	
		 	echo "<script>alert('Order Successfully Submited, Thank You!')</script>";
		 	echo "<script>window.open('customer/my_account.php','_self')</script>";

		 	$empty_cart ="delete from cart where ip_add='$ip_add'";

		 	$run_empty = mysqli_query($con, $empty_cart);

		 	$insert_pending_orders = "insert into pendind_orders (customer_id,invoice_no,product_id,qty,order_status) values ('$customer_id','$invoice','$pro_id','$qty','$status')";

		 	$run_pending_orders = mysqli_query($con, $insert_pending_orders);

		 	if ($run_pending_orders) {
		 		
		 		echo "<script>alert('pending oders inserted Successfully')</script>";
		 	}

		 	


		 }


	
?>