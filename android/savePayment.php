<?php
include('includes/config.php');

$phone=$_POST['phone_number'];
$amount = $_POST['amount'];
$Transactionref = $_POST['Transactionref'];
$statusPay = $_POST['status'];

// $phone="0783982872";


if ($con) {

		  	// inserting new user query
		  	$status=1;
		  	$sql_save= mysqli_query($con,"INSERT INTO `paymenttbl`(`amount`, 
			`citizenPhoneNumber`, `Transactionref`,`status`, `statusPay`) VALUES 
			('$amount','$phone','$Transactionref','$status','$statusPay')");

		  	if ($sql_save) {
		  		echo "Successfully_saved";
		  	}else{
		  		echo "Failed to saved";
		  	}  
	}
else{
		echo "Connetion Error";
	}
?>