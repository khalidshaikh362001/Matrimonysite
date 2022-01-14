<?php
$showalert = false;
$showerror = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './includes/config.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // Check whether email exists
    $existSql = "SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistrows = mysqli_num_rows($result);
    if ($numExistrows > 0) {
        $showerror = "Email already Exists";
    } else {

        if (($password == $cpassword)) {
            $sql = "INSERT INTO `users` ( `username`, `email`, `password`, `usertype` , `status` ,`dt`) 
                VALUES ('$username', '$email', '$password', '$usertype' , 'Active', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showalert = true;
            }
        } else {
            $showerror = "Passwords do not match";
        }
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

    <title>Register</title>
</head>

<body style="display: flex; flex-direction:column; height:100vh;">
    <!-- ============================  Navigation Start =========================== -->
    <?php include './includes/navigation.php'; ?>
    <!-- ============================  Navigation End =========================== -->
    <?php
    if ($showalert) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your Account has  been created
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
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
        </nav>
        <form action="" method="POST">
            <div class="mb-3 col-md-7">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputUsername" placeholder="Username" name="username" required>
            </div>
            <div class="mb-3 col-md-7">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputUsername" placeholder="Email" name="email" required>
            </div>
            <div class="mb-3 col-md-7">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="mb-3 col-md-7">

                <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputUsername" placeholder="Confirm Password" name="cpassword" required>
            </div>

            <input type="hidden" name="usertype" value="User">

            <div class="mb-3 mt-4">
                <button class="btn btn-danger" name="submit" type="submit">Register</button>
            </div>

        </form>
        <p class="register-text mb-4">Have an account..? <a href="./login.php">Login Here</a>.</p>

    </div>
    <!-- ============================  Footer Start =========================== -->
    <?php include "./includes/footer.php" ?>
    <!-- ============================  Footer End =========================== -->
 

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>