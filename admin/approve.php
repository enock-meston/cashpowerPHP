<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {


    
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
    <title><?php echo $_SESSION['names']; ?>| List of Engineers</title>
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
            <h2 class="mb-4">Request List</h2>
            <table id="example" class="display table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Names</th>
                        <th>Phone Number</th>
                        <th>Cell </th>
                        <th>Sector</th>
                        <th>Sector Requested</th>
                        <th>Land Doc</th>
                        <th>Branch</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                            $count=1;
                            $query = mysqli_query($con, "SELECT * FROM `tbl_request` LEFT JOIN tblcitizen 
                            ON tbl_request.citizenID = tblcitizen.id");

                            while ($row = mysqli_fetch_array($query)) {
                               
                            ?>
                    <tr>
                        <td><?php  echo $count; ?></td>
                        <td><?php echo $row['Firstname']."-".$row['Lastname']; ?></td>
                        <td><?php echo $row['phoneNumber']; ?></td>
                        <td><?php echo $row['cell']; ?></td>
                        <td><?php echo $row['Sector']; ?></td>
                        <td><?php echo $row['sectorIDFromUser']; ?></td>
                        <td>
                            <a href="../android/<?php echo $row['LandDocPath']; ?>">
                                <img src="../android/<?php echo $row['LandDocPath']; ?>" style="width: 45px;" alt="">
                            </a>
                        </td>
                        <td><?php echo $row['EUCL_Branch']; ?></td>
                        <td><?php echo $row['addedOn']; ?></td>
                        <td>
                            <?php
                                if ($row['status']==1) {
                                    echo "Not yes Appooved By Eng Sector";
                                }else if ($row['status']==0) {
                                    echo "Rejeced By Eng Sector";
                                }else if($row['status']==2) {
                                    ?>
                            <a href="givecashpower.php?reqID=<?php echo $row['reqID'];?>" class="btn btn-primary">Assign
                                Cashpower</a>
                            <?php
                                    }else {
                                        echo "Paid";
                                    }
                            ?>

                        </td>
                    </tr>

                    <?php
                    $count++;
                            }
                            ?>



                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Names</th>
                        <th>Phone Number</th>
                        <th>Cell </th>
                        <th>Sector</th>
                        <th>Sector Requested</th>
                        <th>Land Doc</th>
                        <th>Branch</th>
                        <th>Date</th>
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