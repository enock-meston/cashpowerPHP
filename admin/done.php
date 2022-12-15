<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {

    $query = mysqli_query($con, "SELECT `uid`, `Firstname`, `Lastname`, `phoneNumber`, `password`, `address`,`GaudianPhoneNumber`, `Allergy`, `Status` FROM `usertbl` WHERE Status=3");
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
        <title><?php echo $_SESSION['Firstname'] . " " . $_SESSION['Lastname']; ?>| List of User</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="plugins/morris/morris.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            <nav id="sidebar">
                <div class="p-4 pt-5">
                    <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
                    <ul class="list-unstyled components mb-5">
                       
                        <li class="active">
                            <a href="index.php">DashBoard</a>
                        </li>
                        <li>
                            <a href="userList.php">Users</a>
                        </li>
                        <li>
                            <a href="Requests.php">Request</a>
                        </li>

                        <li>
                            <a href="done.php">Approved</a>
                        </li>

                        <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <div class="footer">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  <i class="icon-heart" aria-hidden="true"></i> by <a href="https://nigoote.com" target="_blank">nigoote.com</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </nav>
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5">
                <h4>Personal Safety WebSite App</h4>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">DashBoard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="userList.php">Users</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="Requests.php">Request</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="done.php">Approved</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <h2 class="mb-4">Citizens Who Helped</h2>
                <div class="col-sm-6">

                                <?php if ($msg) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <?php if ($delmsg) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($delmsg); ?>
                                    </div>
                                <?php } ?>


                            </div>
                    <table id="example" class="display table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>phone Number</th>
                                <th>address </th>
                                <th>Gaudian PhoneNumber </th>
                                <th>Allergy Word</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($query)) {

                            ?>
                                <tr>
                                    <td><?php echo $row['Firstname']; ?></td>
                                    <td><?php echo $row['Lastname']; ?></td>
                                    <td><?php echo $row['phoneNumber']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['GaudianPhoneNumber']; ?></td>
                                    <td><?php echo $row['Allergy'];?></td>
                                </tr>

                            <?php
                            }
                            ?>



                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>phone Number</th>
                                <th>address </th>
                                <th>Gaudian PhoneNumber </th>
                                <th>Allergy Word</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

    </body>

    </html>

<?php
} ?>