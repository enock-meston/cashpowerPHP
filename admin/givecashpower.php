<?php
session_start();
include('includes/config.php');
// error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {

    $reqID = $_GET['reqID'];
    if (isset($_POST['save'])) {


        $userName=$_POST['userName'];
        $cashpower=$_POST['cashpower'];
        $Status=1;

        // $check= mysqli_query($con,"");
        // $count = mysqli_num_rows($check);
        // if ($count >=1) {
        //     echo "<script>alert('User already has Device ');</script>";
        // }else {
             $updateQuery = mysqli_query($con,"UPDATE `cashpower` SET `status`='2' WHERE cashID='$cashpower'");
      
            if ($updateQuery) {
                mysqli_query($con,"INSERT INTO `cashpowercitizen`(`citizenNames`, `cashpowerID`) 
                VALUES ('$userName','$cashpower')");
                 echo "<script>alert('Now the Cashpower device is Assigned');</script>";
            echo "<script type='text/javascript'> document.location = 'approve.php'; </script>";
            }else{
                echo "<script>alert('There Something Went Wrong!!!');</script>";
            }
        // }
       
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <!-- App title -->
    <title><?php echo $_SESSION['names']; ?>|CashPower</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="DataTables/css/datatables.min.css" />
    <script type="text/javascript" src="DataTables/js/datatables.min.js"></script>
    <!-- App css -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../boot4/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../boot4/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../boot4/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../boot4/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../boot4/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../boot4/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../boot4/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../boot4/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../boot4/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../boot4/css/util.css">
    <link rel="stylesheet" type="text/css" href="../boot4/css/main.css">
    <!--===============================================================================================-->
</head>

<body>


    <div class="wrapper d-flex align-items-stretch">
        <!-- sidebar -->
        <?php include('includes/sidebar.php'); ?>
        <!-- end of sidbar -->
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
            <h4>OCPR WebSite App</h4>
            <!-- topbar -->
            <?php include('includes/topbar.php'); ?>
            <!-- end of topbar -->
            <h2 class="mb-4"> Assign CashPower TO Client</h2>
            <div class="container col-sm-6">

                <form class="login100-form validate-form p-b-33 p-t-5" method="POST">

                <?php
                            $sql1=  mysqli_query($con,"SELECT * FROM `tbl_request` LEFT JOIN tblcitizen 
                            ON tbl_request.citizenID = tblcitizen.id WHERE tbl_request.reqID='$reqID'");
                                while ($row1=mysqli_fetch_array($sql1)) {
                                   ?>
                    <div class="form-group">
                        <input readonly class="input100 form-control" type="text" name="userName" value="<?php echo $row1['Firstname']."-".$row1['Lastname'];?>">
                    </div>
                    <?php
                                }
                            ?>
                    <div class="form-group">
                        <select name="cashpower" id="" class="input100 form-control">
                            <option>Select Cashpower</option>
                            <!-- $reqID -->
                            <?php
                            $sql=  mysqli_query($con,"SELECT * FROM `cashpower` WHERE status='1'");
                                while ($row=mysqli_fetch_array($sql)) {
                                   ?>
                                   <option value="<?php echo $row['cashID'];?>"><?php echo $row['seriaNumber'].'-'.$row['title'];?></option>
                                   <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="container-login100-form-btn m-t-32">
                        <button class="btn btn-primary" style="background-color: #000;" name="save">
                            Add New
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
<?php
} ?>