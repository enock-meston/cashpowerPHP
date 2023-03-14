<?php
session_start();
include('includes/config.php');
// error_reporting(0);
if (strlen($_SESSION['sec_id']) == 0) {
    header('location:../index.php');
} else {
        $sec_id = $_SESSION['sec_id'];

         

        // Code for restore
    if (isset($_GET['citid'])) {
        $id = intval($_GET['citid']);
        // 2 value means that: now citizen can buy cashpower
        $query = mysqli_query($con, "UPDATE tbl_request set status=2 where reqID='$id'");
        echo "<script>alert('Request was now Approved');</script>";
        echo "<script type='text/javascript'> document.location = 'request.php'; </script>";
    }
    
    if (isset($_GET['darid'])) {
        $id = intval($_GET['darid']);
        // 0 value means that: not have permition to buy 
        $query = mysqli_query($con, "UPDATE tbl_request set status=0 where reqID='$id'");
        echo "<script>alert('Request was Rejected');</script>";
        echo "<script type='text/javascript'> document.location = 'request.php'; </script>";
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
    <title><?php echo $_SESSION['sec_sector']; ?>| List of Citizens</title>
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
            <h2 class="mb-4">User List</h2>
            <table id="example" class="display table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Names</th>
                        <th>Phone Number</th>
                        <th>File</th>
                        <th>EUCL Branch</th>
                        <th>Cell</th>
                        <th>Sector</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM `tbl_request` LEFT JOIN tblcitizen 
                    ON tbl_request.citizenID = tblcitizen.id WHERE tbl_request.sectorIDFromUser='$sec_id'");
                            while ($row = mysqli_fetch_array($query)) {

                            ?>
                    <tr>
                        <td><?php echo $row['Firstname']."  ".$row['Lastname']; ?></td>
                        <td><?php echo $row['phoneNumber']; ?></td>
                        <td>
                            <a href="../android/<?php echo $row['LandDocPath']; ?>">
                                <img src="../android/<?php echo $row['LandDocPath']; ?>" style="width: 45px;" alt="">
                            </a>
                        </td>
                        <td><?php echo $row['EUCL_Branch']; ?></td>
                        <td><?php echo $row['cell'];?></td>
                        <td><?php echo $row['Sector'];?></td>
                        <td><?php echo $row['addedDate'];?></td>
                        <td>
                            <?php 
                                if( $row['status'] == 0){
                                    echo 
                                    "<span class='btn btn- btn-sm'>Rejected</span>";
                                    }elseif( $row['status'] == 2){
                                        echo "<span class='btn btn- btn-sm'>Approved</span>";
                                    }elseif( $row['status'] == 1){
                                        echo "<span class='btn btn- btn-sm'>Pending</span>";
                                    }
                                        ?>
                        </td>
                        <td>
                            <a href="request.php?citid=<?php echo htmlentities($row['reqID']); ?>"
                                class="btn btn-success btn-sm">YES</a>
                            <a href="request.php?darid=<?php echo htmlentities($row['reqID']); ?>"
                                class="btn btn-danger btn-sm">NO</a>
                        </td>
                    </tr>

                    <?php
                            }
                            ?>



                </tbody>
                <tfoot>
                    <tr>
                        <th>Names</th>
                        <th>Phone Number</th>
                        <th>File</th>
                        <th>EUCL Branch</th>
                        <th>cell</th>
                        <th>Sector</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</body>

</html>

<?php
} ?>