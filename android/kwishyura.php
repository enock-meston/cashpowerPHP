<?php
include('includes/config.php'); 
$id = $_POST['userid'];
$phone = $_POST['phone'];
$amount = $_POST['amount'];
$Transactionref = $_POST['Transactionref'];
$status = $_POST['status'];


$update = mysqli_query($con,"INSERT INTO `tbl_payrequest`(`phone`, `amount`, `Transactionref`,
 `status`,`reqUserId`) VALUES ('$phone','$amount','$Transactionref','$status','$id')");
if(!$update){
    
    echo mysqli_error($con);
}else {
    mysqli_query($con,"UPDATE `tbl_request` SET `status`='3' WHERE citizenID='$id'");
    echo "Success";

}


?>