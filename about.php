<?php

session_start();

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
  <link rel="stylesheet" href="./css/btn.css">

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

  <title>About</title>
</head>

<body style="display: flex; flex-direction:column; height:100vh;" >


  <!-- ============================  Navigation Start =========================== -->
  <?php include './includes/navigation.php'; ?>
  <!-- ============================  Navigation End =========================== -->

  <section id="about">
    <div class="about">
      <div class="container">

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./login/index.php"><i class="fa fa-home home_1"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
          </ol>
        </nav>

        <div class="mb-3 text-center ">

          <h2 class="fw-bold">About Us</h2>
        </div>

        <p class="text-center mb-3">The perfect matrimonial site to find the perfect match Marital.in has helped thousands of people find the perfect partner and family. We believe marriage is more than two people. It's about two families. matrimonix.in is a personalized search tool that helps you find the right partner and family for your interests, community and preferences.</p>

        <div class="row row-cols-1 row-cols-md-3 g-4 mb-3 ">
          <div class="col">
            <div class="card">
              <img src="./images/bg.jpg" class="card-img-top" alt="...">

            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="./images/bg.jpg" class="card-img-top" alt="...">

            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="./images/bg.jpg" class="card-img-top" alt="...">

            </div>
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