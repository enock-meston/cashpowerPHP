<?php
include('includes/config.php');
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$phone=$_POST['phonenumber'];
$cell=$_POST['cell'];
$Sector=$_POST['Sector'];

// $fname="enock";
// $lname="enock1";
// $phone="0783982872";
// $UPI="124112";
// $cell="kabutare";
// $Sector="rusororo";

$status = 1; // 0 means that 

if ($con) {
    $checkphone = mysqli_query($con,"SELECT * FROM `tblcitizen` WHERE `phoneNumber` LIKE '$phone'");

   if (mysqli_num_rows($checkphone) > 0) {
        echo "phone is arlead used !";
    }else {
        $sql_register = mysqli_query($con,"INSERT INTO `tblcitizen`(`Firstname`, `Lastname`, `phoneNumber`, `cell`, `Sector`, `ActiveStatus`) 
		VALUES ('$fname','$lname','$phone','$cell','$Sector','$status')");
            if ($sql_register) {
                echo "Successfully_Registered";
            }else{
                echo "Failed to register";
            }
    }
}else {
    echo "Connetion Error";
}
?>