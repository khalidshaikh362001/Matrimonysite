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
  <link href="./themify-icons/themify-icons.css" rel="stylesheet">

  <title>Matrimonial</title>
</head>

<body>

  <!-- ============================  Navigation Start =========================== -->
  <?php include './includes/navigation.php'; ?>
  <!-- ============================  Navigation End =========================== -->
  <!-- Home -->
  <section id="home" class="home">
    <div id="carouselExampleIndicators" class="carousel  slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>

      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="banner banner-1">
            <div class="banner-text">
              <h1>Millions of verified <br> Profile</h1>
              <a href="./register.php" class="btn btn-danger mt-2">Create your Profile</a>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="banner banner-2">
            <div class="banner-text">
              <h1>Millions of verified </h1>
              <a href="./register.php" class="btn btn-danger mt-2">Create your Profile</a>
            </div>
          </div>
        </div>

      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true">
          <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left slider-icon" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg> -->
        </span>

        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true">
          <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right slider-icon" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
          </span> -->

          <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <!-- Find your Special Someone -->
  <section id="someone" class="someone">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="headline text-center mb-5">
            <h2 class="pb-3 position-relative d-inline-block">Find your Special Someone</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-lg-4">
          <a href="#" class="d-block text-center mb-4">
            <div class="login-options">
              <div class="login-img position-relative">
                <span class="num">1</span>
                <img src="./images/login.svg" class="img-fluid login-img-1" alt="">
              </div>
              <div class="login-text pt-3">
                <h3>Sign up</h3>
                <p>Register for free & put up your Profile</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-12 col-lg-4">
          <a href="#" class="d-block text-center mb-4">
            <div class="login-options">
              <div class="login-img position-relative">
                <span class="num">2</span>
                <img src="./images/connections.svg" class="img-fluid login-img-2" alt="">
              </div>
              <div class="login-text pt-3">
                <h3>Connect</h3>
                <p>Select & Connect with Matches you likee</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-12 col-lg-4">
          <a href="#" class="d-block text-center mb-4">
            <div class="login-options">
              <div class="login-img position-relative">
                <span class="num">3</span>
                <img src="./images/messages.svg" class="img-fluid login-img-1" alt="">
              </div>
              <div class="login-text pt-3">
                <h3>Interact</h3>
                <p>Become a Premium Member & Start a Conversation</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>


  </section>

  <!-- Success Stories -->
  <section id="success-stories" class="success-stories">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="headline text-center mb-5">
            <h2 class="pb-3 position-relative d-inline-block">Success Stories</h2>
          </div>
        </div>
        <div class="col-sm-12 col-lg-8 offset-lg-2 text-center">
          <div id="carouselExampleIndicatorsTwo" class="carousel slide carousel-dark" data-bs-ride="carousel">
            <div class="carousel-indicators ">
              <button type="button" data-bs-target="#carouselExampleIndicatorsTwo" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicatorsTwo" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicatorsTwo" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner carousel-dark">
              <div class="carousel-item active">
                <div class="success-stories-wrapper">
                  <div class="row">
                    <div class="col-sm-12">
                      <img src="./images/7.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="username">
                      <h3>Laxmi & Prashant</h3>
                      <p>Bhagyashree and Deepak. Well we met on Shaadi.com. I was in search of an educated,decent person with well family background.
                        One day we got a call from my father-in-law and their approach made us ...</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- 2nds -->
              <div class="carousel-item">
                <div class="success-stories-wrapper">
                  <div class="row">
                    <div class="col-sm-12">
                      <img src="./images/s1.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="username">
                      <h3>Bhagyashree & Deepak</h3>
                      <p>Bhagyashree and Deepak. Well we met on Shaadi.com. I was in search of an educated,decent person with well family background.
                        One day we got a call from my father-in-law and their approach made us ...</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- 3 rd -->
              <div class="carousel-item">
                <div class="success-stories-wrapper">
                  <div class="row">
                    <div class="col-sm-12">
                      <img src="./images/s1.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="username">
                      <h3>Urvashi & Pranav</h3>
                      <p>We saw each other's profile on shaadi.com in the month of july 2019.
                        We started chatting on this platform and we both started liking each other. We did our engagement on 30th of January 2020 but unfor...</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsTwo" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorsTwo" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact section -->
  <section id="contact">
    <div class="contact">
      <div class="container">
        <div class="mb-5 text-center">
          <h5>Let’s Start a Conversation!</h5>
          <h2 class="fw-bold">Contact Us</h2>
        </div>

        <div class="row">
          <div class="col-lg-5 col-md-5">
            <h4 class="fw-bold">Contact Info</h4>
            <ul class="info list-unstyled">
              <li class="d-flex align-items-center">
                <span class="pe-3 fs-5">
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
                <form action="userinfo.php" method="post">
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


  <!-- ============================  Footer Start =========================== -->
  <?php include "./includes/footer.php" ?>
  <!-- ============================  Footer End =========================== -->



  <!-- Scroll button -->
  <div id="scrollUp" title="Scroll To Top">
    <!-- <a href="#"><span class="ti-arrow-circle-up fs-4 text-black "></span></a> -->
    <a href="#"><img  src="https://img.icons8.com/ios-filled/50/000000/circled-up-2.png"/></a>
  </div>


  <!-- Main JS -->
  <script src="./js/main.js"></script>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>