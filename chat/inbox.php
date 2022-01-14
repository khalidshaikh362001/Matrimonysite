<?php

// session start
session_start();

// include DB connection
include('../includes/config.php');

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
}
else{
    $email = $_SESSION['email'];
}
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
    <link rel="stylesheet" href="../css/btn.css">

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

<body style="display: flex; flex-direction:column; height:100vh;" >

    <!-- ============================  Navigation Start =========================== -->
    <?php include './navigation.php'; ?>
    <!-- ============================  Navigation End =========================== -->

    <!-- chats section -->
    <div class="container mt-4">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="./login/index.php"><i class="fa fa-home home_1"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Inbox</li>
      </ol>
    </nav>
      <div class="card">
        <div class="card-title text-center">
          <form class="form-inline mt-4" style = "display : inline-block" method = "POST" action = "../chat/searchuser.php">
            <input class="form-control mr-sm-2" type="search" name = "search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
        <div class="card-body mb-4">
          <!-- Received Messages -->
          <?php
            $lastMessage = "SELECT DISTINCT sent_by FROM chat WHERE received_by = '$email'";
            $lastMessageStatus = mysqli_query($conn,$lastMessage) or die(mysqli_error($conn));
            if(mysqli_num_rows($lastMessageStatus) > 0) {
              while($lastMessageRow = mysqli_fetch_assoc($lastMessageStatus)) {
                $sent_by = $lastMessageRow['sent_by'];
                $getSender = "SELECT * FROM users WHERE username = '$sent_by'";
                $getSenderStatus = mysqli_query($conn,$getSender) or die(mysqli_error($conn));
                $getSenderRow = mysqli_fetch_assoc($getSenderStatus);
          ?>
          <div class="card">
            <div class="card-body">
              <h6><strong><?=$lastMessageRow['sent_by'];?></strong><a href="./message.php?receiver=<?=$sent_by?>" class="btn btn-outline-primary" style = "float:right">Send message</a></h6>
            </div>
          </div><br/>
          <?php
            }
          } else {
          ?>
            <div class="card-body text-center">
              <h6><strong>No conversations yet!</strong></h6>
            </div>
          <?php
          }
          ?>
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