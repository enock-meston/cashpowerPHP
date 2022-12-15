<?php
include('includes/config.php');
$id = $_POST['id'];
// $id = "4";
// echo $id;

$sql_request = mysqli_query($con,"SELECT * FROM `tbl_request` WHERE citizenID='$id' AND status='2'");
$stmt = mysqli_num_rows($sql_request);

$sql_request2 = mysqli_query($con,"SELECT * FROM `tbl_request` WHERE citizenID='$id' AND status='3'");
$stmt2 = mysqli_num_rows($sql_request2);

if($stmt == 0){
echo "Nta Burenganzira Bwo Kwishyura";
}elseif ($stmt2 ==1) {
    echo "Mwamaze guhabwa Cashpower device!";
}
else {
    echo "Ubu Mushobora Kwishyura Cashpower Device.";
}

?>