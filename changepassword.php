<?php
$showalert = false;
$showerror = false;
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}

include "./includes/config.php";
if (isset($_POST['submit'])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $npassword = $_POST['npassword'];
  $cnpassword = $_POST["cnpassword"];

  $query = mysqli_query($conn, "SELECT password from users where email = '$email' and password = '$password'");
  $num = mysqli_fetch_array($query);

  if ($num > 0) {
    if (($npassword == $cnpassword)) {
      $con = mysqli_query($conn, "UPDATE  users set password = '$npassword' where email = '$email'");
      $showalert = "Password changed successfully";
    } else {
      $showerror = "Passwords do not match";
    }
  } else {
    $showerror = "Current password does not match";
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

<body style="display: flex; flex-direction:column; height:100vh;">
  <!-- ============================  Navigation Start =========================== -->
  <?php include './includes/navigation.php'; ?>
  <!-- ============================  Navigation End =========================== -->
  <?php
  if ($showalert) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Success!</strong> ' . $showalert . '
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  if ($showerror) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ' . $showerror . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  ?>

  <div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./index.php"><i class="fa fa-home home_1"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Change password</li>
      </ol>
    </nav>
    <form action="" method="POST">
      <div class="mb-3 col-md-7">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputUsername" placeholder="Email" name="email" required>
      </div>
      <div class="mb-3 col-md-7">
        <label for="exampleInputEmail1" class="form-label">Current Password</label>
        <input type="password" class="form-control" placeholder="Current Password" name="password" required>
      </div>
      <div class="mb-3 col-md-7">
        <label for="exampleInputEmail1" class="form-label">New Password</label>
        <input type="password" class="form-control" placeholder="New Password" name="npassword" required>
      </div>
      <div class="mb-4 col-md-7">
        <label for="exampleInputEmail1" class="form-label">Confirm New Password</label>
        <input type="password" class="form-control" placeholder="Confirm New Password" name="cnpassword" required>
      </div>

      <div class="row mb-4">
        <div class="mb-3 col-auto">
          <button class="btn btn-danger" name="submit" type="submit">Submit</button>
        </div>
        <div class="mb-3 col-auto">
          <a href="./viewprofile.php" class="btn btn-danger ">Back</a>

        </div>
      </div>

    </form>


  </div>

  <!-- ============================  Footer Start =========================== -->
  <?php include "./includes/footer.php" ?>
  <!-- ============================  Footer End =========================== -->

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>