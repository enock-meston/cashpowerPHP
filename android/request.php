<?php
include('includes/config.php');
$UniqueID = uniqid();
$branch = $_POST['branch'];
$CitizenID = $_POST['CitizenID'];
$sector_id = $_POST['sector_id'];
$image = $_POST['image'];
$upload_path = "uploadsF/file_$CitizenID._.$UniqueID.jpg";
$status = 1;
$checkRequest = mysqli_query($con,"SELECT * FROM `tbl_request` WHERE citizenID='$CitizenID' AND status='1'");
$Count = mysqli_num_rows($checkRequest); 

$checkRequest2 = mysqli_query($con,"SELECT * FROM `tbl_request` WHERE citizenID='$CitizenID' AND status='2'");
$Count2 = mysqli_num_rows($checkRequest2); 

if ($Count > 0) {
    echo "Wamaze gusaba Ubufasha Tegereza Mugihe Gito Urasubiza";
} else if($Count2 > 0){
    echo "Ibyo Mwasabye Byemewe Ubu mwaKwishyura";
}else {
    $query = mysqli_query($con,"INSERT INTO `tbl_request`(`citizenID`, `sectorIDFromUser`,
 `LandDocPath`, `EUCL_Branch`,`status`) VALUES ('$CitizenID','$sector_id','$upload_path',
 '$branch','$status')");
if ($query) {
    file_put_contents($upload_path,base64_decode($image));
    echo "Successfully_Submitted";
}else{
    echo "Failed to register";
}

}


?>