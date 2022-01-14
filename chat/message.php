<?php

// session start
session_start();

// include DB connection
include('../includes/config.php');

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
} else {
    $email = $_SESSION['email'];
}
$receiver = $_GET['receiver'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom css -->

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../btn.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800;900&display=swap" rel="stylesheet">

    <!--font-Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!--font-Awesome-->

    <!-- Themify Icons -->
    <link rel="stylesheet" href="/themify-icons/themify-icons.css">

    <title>Matrimonial</title>
</head>

<body style="display: flex; flex-direction:column; height:100vh;">

    <!-- ============================  Navigation Start =========================== -->
    <?php include './navigation.php'; ?>
    <!-- ============================  Navigation End =========================== -->


    <?php
    $getUser = "SELECT * FROM users WHERE email = '$email'";
    $getUserStatus = mysqli_query($conn, $getUser) or die(mysqli_error($conn));
    $getUserRow = mysqli_fetch_assoc($getUserStatus);
    ?>

    </div>
    </nav>
    <div class="container mb-4">
        <?php
        $getReceiver = "SELECT * FROM users WHERE email = '$receiver'";
        $getReceiverStatus = mysqli_query($conn, $getReceiver) or die(mysqli_error($conn));
        $getReceiverRow = mysqli_fetch_assoc($getReceiverStatus);
        $received_by = $getReceiverRow['email'];
        ?>
        <div class="card mt-4">
            <div class="card-header">
                <h6><img src="../images/s2.jpg" alt="Profile image" width="40" /><strong> <?= $receiver ?></strong></h6>
                <!-- <h6><img src="./dp/<?= $getReceiverRow['dp'] ?>" alt="Profile image" width = "40"/><strong> <?= $receiver ?></strong></h6> -->
            </div>
            <?php
            $getMessage = "SELECT * FROM chat WHERE sent_by = '$receiver' AND received_by = '$email' OR sent_by = '$email' AND received_by = '$receiver' ORDER BY createdAt asc";
            $getMessageStatus = mysqli_query($conn, $getMessage) or die(mysqli_error($conn));
            if (mysqli_num_rows($getMessageStatus) > 0) {
                while ($getMessageRow = mysqli_fetch_assoc($getMessageStatus)) {
                    $message_id = $getMessageRow['id'];
            ?>
                    <div class="card-body ">
                        <h6 style="color: blue"><?= $getMessageRow['sent_by'] ?></h6>
                        <div class="message-box ml-4">
                            <p ><?= $getMessageRow['message'] ?></p>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="card-body">
                    <p class="text-muted">No messages yet! Say 'Hi'</p>
                </div>
            <?php
            }
            ?>
            <div class="card-footer  text-center">
                <form action="./send.php" method="POST" style="display: inline-block">
                    <input type="hidden" name="sent_by" value="<?= $email ?>" />
                    <input type="hidden" name="received_by" value="<?= $receiver ?>" />
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="text" name="message" id="message" class="form-control" placeholder="Type your message here" required />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================  Footer Start =========================== -->
    <?php include "./footer.php" ?>
    <!-- ============================  Footer End =========================== -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>