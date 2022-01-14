<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include "config.php";
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $sql = "INSERT INTO `contact`( `name`, `email`, `message`) VALUES ('$name','$email','$message')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    // header("location: viewprofile.php");
    echo "success";
  } else {
    echo "unsucesfaknfasld " ;
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
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


  <!-- Custom css -->
  <link rel="stylesheet" href="./css/style.css">

  <link href="./themify-icons/themify-icons.css" rel="stylesheet">

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

  <title>Contact</title>
</head>

<body style="display: flex; flex-direction:column; height:100vh;" >

  <!-- ============================  Navigation Start =========================== -->
  <?php include './includes/navigation.php'; ?>
  <!-- ============================  Navigation End =========================== -->


  <section id="contact">
    <div class="contact">
      <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./login/index.php"><i style="color: red;" class="fa fa-home home_1"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
          </ol>
        </nav>
        <div class="mb-5 text-center">
          <h5>Let’s Start a Conversation!</h5>
          <h2 class="fw-bold">Contact Us</h2>
        </div>

        <div class="row">
          <div class="col-lg-5 col-md-5">
            <h4 class="fw-bold">Contact Info</h4>
            <ul class="info list-unstyled">
              <li class="d-flex align-items-center">
                <span class="pe-3 fs-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                  </svg>
                </span>

                <p><a href="">Lorem ipsum dolor sit amet, consectetur.</a></p>
              </li>
              <li class="d-flex align-items-center">
                <span class="pe-3 fs-5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                  </svg>
                </span>
                <p><a href="">+91 999-999-9999</a></p>
              </li>
              <li class="d-flex align-items-center">
                <span class="pe-3 fs-5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                  </svg>
                </span>
                <p><a href="">Info@eshop.in</a></p>
              </li>
            </ul>
          </div>
          <div class="col-lg-7 col-md-7 pt-lg-0 pt-md-0 pt-4">
            <form>
              <div class="row">
                <form action="" method="POST">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email address">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="textarea" name="message" cols="30" rows="4" id="message" placeholder="Enter your message"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-danger"><span class="ti-rocket pe-2 fs-6"></span> Send Message</button>
                  </div>
                </form>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer  style="margin-top: auto;">
      <div class="py-4 copyright">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-md-6 text-center text-md-start">
                      <p class="text-sm mb-md-0">Copyright © 2021, All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
 </footer>

  <!-- Main JS -->
  <script src="./js/main.js"></script>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>