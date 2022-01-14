<?php
session_start();
include './includes/config.php';
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];
 

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
  // $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND status='Active'";
  $query_run = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($query_run);
  $usertypes = mysqli_fetch_array($query_run);
 
  if ($num == 1) {
    
   if($usertypes['status'] == "Inactive"){
     
      // $_SESSION['status'] = "Email / Password is Invalid";
      $showError = "Blocked";
  
      // header('Location: login.php');
    }
     else if ($usertypes['usertype'] == "Admin") {
      // $_SESSION['username'] = $email_login;
      $_SESSION['loggedin'] = true;
      $_SESSION['id'] = $usertypes['id'];
      $_SESSION['email'] = $email;
      $_SESSION['admin'] = true;
      header('Location: ./admin/index.php');
    } else if ($usertypes['usertype'] == "User") {
      // $_SESSION['cusername'] = $email_login;
      $_SESSION['loggedin'] = true;
      $_SESSION['id'] = $usertypes['id'];
      $_SESSION['email'] = $email;
      header('Location: index.php');
    }
    
  } 
   else {
    // $_SESSION['status'] = "Email / Password is Invalid";
    $showError = "Invalid Credentials";

    // header('Location: logm.php');
  }
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
  <link rel="stylesheet" href="./css/btn.css">
  <link rel="stylesheet" href="./css/style.css">

  <!-- Responsive CSS -->
  <link rel="stylesheet" href="./css/responsive.css">

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800;900&display=swap" rel="stylesheet">

  <!--font-Awesome-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <!--font-Awesome-->

  <!-- Themify Icons -->
  <link rel="stylesheet" href="/themify-icons/themify-icons.css">

  <title>Login</title>
</head>

<body style="display: flex; flex-direction:column; height:100vh;" >
  <!-- ============================  Navigation Start =========================== -->
  <?php include './includes/navigation.php'; ?>
  <!-- ============================  Navigation End =========================== -->
  <?php
  if ($login) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You are Logged in!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }

  if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ' . $showError . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }

  ?>
  <div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./index.php"><i class="fa fa-home home_1"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Login</li>
      </ol>
    </nav>
    <form action="" method="POST">
      
      <div class="mb-3 col-md-7">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputUsername" placeholder="Email" name="email" required>
      </div>
      <div class="mb-3 col-md-7">
        <label for="exampleInputEmail1" class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
      </div>


      <div class="mb-3">
        <button class="btn btn-danger" name="submit" type="submit">Login</button>
      </div>

    </form>
    <p class="register-text">Have an account? <a href="./register.php">Register Here</a>.</p>

  </div>
  <!-- ============================  Footer Start =========================== -->
  <?php include "./includes/footer.php" ?>
  <!-- ============================  Footer End =========================== -->

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>