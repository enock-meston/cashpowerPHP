<?php
include('includes/config.php');
$phoneNumber=$_POST['phone'];
// $phoneNumber="0783982872";

$data;
if ($con) {
    $sqlCheckphoneNumber=mysqli_query($con,"SELECT * FROM `tblcitizen` WHERE `phoneNumber` LIKE '$phoneNumber'");
    
    if (mysqli_num_rows($sqlCheckphoneNumber) > 0) {
       

        $loginQuery="SELECT * FROM `tblcitizen` WHERE `phoneNumber` LIKE '$phoneNumber' AND ActiveStatus=1";
   
   $query=mysqli_query($con,$loginQuery);

   if (mysqli_num_rows($query)==1) {
     $data = mysqli_fetch_assoc($query);
        $data['statuss'] = "Login_Success";
        echo json_encode($data);
    
       
    }else{
        $data['statuss'] = "Wrong_phone";
        echo json_encode($data);
    } 
}else {
    $data['statuss'] = "Wrong_phone";
        echo json_encode($data);
}  
}

   
else {
    $data['status'] = "Connection_Error";
    echo json_encode($data);
    // echo "Connection Error";
}
?>