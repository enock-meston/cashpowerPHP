<?php
include('includes/config.php');

$sql_sectorData = mysqli_query($con,"SELECT * FROM `usertbl` WHERE usercategory='engineer' and Status='1'");
$sectorData = array(); 

//traversing through all the result 
while($stmt = mysqli_fetch_array($sql_sectorData)){
$temp = array();
$user_id = $stmt['id'];
$sector = $stmt['sector'];

$temp['id'] = $user_id; 
$temp['sector'] = $sector; 

array_push($sectorData, $temp);
}

//displaying the result in json format 
echo json_encode($sectorData);
?>