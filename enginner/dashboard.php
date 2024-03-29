
<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['sec_id']) == 0) {
    header('location:../index.php');
} else {
?>


<!doctype html>
<html lang="en">
    <head>
        <title>Engineer OCPR Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">

        <!-- / -->
           <!-- Custom fonts for this template-->
    <link href="addd/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="addd/css/sb-admin-2.min.css" rel="stylesheet">

    </head>
    <body>
        
        <div class="wrapper d-flex align-items-stretch">
            <!-- sidebar -->
            <?php include('includes/sidebar.php'); ?>
            <!-- end of sidbar -->
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5">
                <h4>Engineer OCPR Page</h4>
                <!-- topbar -->
                <?php include('includes/topbar.php'); ?>
                <!-- end of topbar -->
                <h2 class="mb-4">DashBoard</h2>
               
                <div class="row">
                    <!-- list users -->
                     <!-- Tasks Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        
                                        <div class="col mr-2">
                                          <a href="request.php">  
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Citizen Request
                                            </div></a>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <?php 
                                                        $sec_id = $_SESSION['sec_id'];
                                                    $query = mysqli_query($con, "SELECT * from tbl_request WHERE sectorIDFromUser='$sec_id' AND status= 1");
                                                    $countposts = mysqli_num_rows($query);
                                                    ?>
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php echo htmlentities($countposts); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--  -->
                    




     
                    </div> <!-- ends of row -->

            </div>
        </div>
    </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>

<?php } ?>