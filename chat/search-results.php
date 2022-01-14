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
    $search = $_SESSION['search'];
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

<body>

    <!-- ============================  Navigation Start =========================== -->
    <?php include '../includes/navigation.php'; ?>
    <!-- ============================  Navigation End =========================== -->


    <!-- chats section -->
    <div class="container mt-4">
      <?php
        include "../chat/snackbar.php";
      ?>
      <div class="card">
        <div class="card-title text-center">
          <form class="form-inline mt-4" style = "display : inline-block" method = "POST" action = "../chat/searchuser.php">
            <input class="form-control mr-sm-2" type="search" name = "search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
        <div class="card-body mb-4">
          <?php
            $searchUser = "SELECT * FROM users WHERE username = '$search' OR email = '$search'";
            $searchUserStatus = mysqli_query($conn,$searchUser) or die(mysqli_error($conn));
            if(mysqli_num_rows($searchUserStatus) > 0) {
                while($searchUserRow = mysqli_fetch_assoc($searchUserStatus)){
                    $email = $searchUserRow['email'];
          ?>
          <div class="card">
            <div class="card-body">
                <h6><strong><img src = "../images/s1.jpg" alt = "dp" width = "40"/><?=$searchUserRow['username']?></strong><a href="../chat/message.php?receiver=<?=$email?>" class="btn btn-outline-primary" style = "float:right">Send message</a></h6>
                <!-- <h6><strong><img src = "./dp/<?=$searchUserRow['dp']?>" alt = "dp" width = "40"/><?=$searchUserRow['username']?></strong><a href="./message.php?receiver=<?=$email?>" class="btn btn-outline-primary" style = "float:right">Send message</a></h6> -->
            </div>
          </div>
          <?php
                }
            } else {
                echo "No users found!";
            }
          ?>
        </div>
      </div>
    </div>

    <!-- ============================  Footer Start =========================== -->
    <?php include "../includes/footer.php" ?>
    <!-- ============================  Footer End =========================== -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="assets/js/snackbar.js"></script>
</body>

</html>
   
    
