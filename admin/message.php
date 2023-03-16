<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {
    require __DIR__ . '/vendor/autoload.php'; 

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
    <title><?php echo $_SESSION['names']; ?>| Message</title>
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
            <h4>Send Message</h4>
            <!-- topbar -->
            <?php include('includes/topbar.php'); ?>
            <!-- end of topbar -->
            <table id="example" class="display table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Names</th>
                        <th>Phone Number</th>
                        <th>Date</th>
                        <th>Send Message</th>
                        <th>Message Status</th>

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

                        <td><?php echo $row['addedOn']; ?></td>
                        <td>
                            <?php
                            $query1 = mysqli_query($con, "SELECT * FROM `messageofuser` WHERE user_id = '".$row['id']."'");
                                if(isset($_POST['send'])){
                                    
                            
                                    $id = $_POST['id'];
                                    // $_SESSION['idd'] = $id;
                                    $phone = $_POST['phone'];
                                    $name = $_POST['name'];
                                    $date = $_POST['date'];
                                    $messageBody = $_POST['message'];

                                    //send message API
                                    // twilio API
                                    

                                    // use Twilio\Rest\Client;

                                    $sid = "ACda6ef4f03da85094644fe48f2d550802"; // Your Account SID from https://console.twilio.com
                                    $token = "3e2c1c25ef8a41ccc6019163c1f1b750"; // Your Auth Token from https://console.twilio.com
                                    $client = new Twilio\Rest\Client($sid, $token);

                                    // Use the Client to make requests to the Twilio REST API
                                    $message = $client->messages->create(
                                        // The number you'd like to send the message to
                                        "+25$phone",
                                        [
                                            // A Twilio phone number you purchased at https://console.twilio.com
                                            'from' => '+15076235881',
                                            // The body of the text message you'd like to send
                                            'body' => "Hello Dear Sir/Madam! , $name  $messageBody Good luck on the bar exam!"
                                        ]
                                    );


                                    if ($message) {
                                        //check if message is sent
                                        $check = mysqli_query($con, "SELECT * FROM `messageofuser` WHERE user_id = '".$row['id']."'");
                                        if (mysqli_num_rows($check) > 0) {
                                            echo "<script>alert('Message already sent');</script>";
                                        }else {
                                          $query= mysqli_query($con, "INSERT INTO `messageofuser`(`user_id`,`message`) VALUES ('$id','$messageBody')");
                                        
                                       if ($query) {
                                            echo "<script>alert('Message sent successfully');</script>";
                                            echo "<script>window.location.href='message.php'</script>";
                                        }else {
                                            echo "<script>alert('Message not Saved');</script>";
                                        }
                                        }
                                    }else {
                                        echo "<script>alert('Message not sent');</script>";
                                    }
                                    
                                }
                            ?>
                            <!-- form -->
                            <form method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="text" name="phone" value="<?php echo $row['phoneNumber']; ?>">
                                <input type="hidden" name="name"
                                    value="<?php echo $row['Firstname']."-".$row['Lastname']; ?>">
                                <input type="hidden" name="date" value="<?php echo $row['addedOn']; ?>">
                                <!-- message -->
                                <input type="text" name="message" class="form-control" placeholder="Enter Message">
                                <button type="submit" name="send" class="btn btn-primary">Send Message</button>
                            </form>
                        </td>
                        <td>
                            <?php
                                
                                
                                $count = mysqli_num_rows($query1);
                                if($count > 0){
                                    
                                    echo "<span class='badge badge-success'>Message Sent</span>";
                                }else {
                                    echo "<span class='badge badge-danger'>Message Not Sent</span>";
                                }
                            ?>
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
                        <th>Date</th>
                        <th>Send Message</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</body>

</html>

<?php
} ?>