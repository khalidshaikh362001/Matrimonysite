<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}

?>
<?php

$id = $_GET['id'];
// echo $id;

include "./includes/config.php";
$sql = "SELECT * FROM `profiles` where cust_id = '$id'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);


$cust_id = $result['cust_id'];
$id = $result['cust_id'];
$profileimage = $result['profileimage'];
$current = $result['profileimage'];
$firstname = $result['firstname'];
$lastname = $result['lastname'];
$maritalstatus = $result['maritalstatus'];
$gender = $result['gender'];
$state = $result['state'];
$city = $result['city'];
$pincode = $result['pincode'];
$age = $result['age'];
$height = $result['height'];
$weight = $result['weight'];
$profilecreatedfor = $result['profilecreatedfor'];
$drinking = $result['drinking'];
$smoking = $result['smoking'];
$mothertongue = $result['mothertongue'];
$diet = $result['diet'];
// $diet = $result['diet'];
$dateofbirth = $result['dateofbirth'];
$placeofbirth = $result['placeofbirth'];
$religion = $result['religion'];
$horoscope = $result['horoscope'];
$qualification = $result['qualification'];
$workprofile = $result['workprofile'];
$jobrole = $result['jobrole'];
$annualincome = $result['annualincome'];
$aboutyourself = $result['aboutyourself'];
$phone = $result['phone'];


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

  <title>Matrimonial</title>

  <style>
    .tab-content {
      display: flex;
    }

    .tab-content>.tab-pane {
      display: block;
      /* undo "display: none;" */
      visibility: hidden;
      margin-right: -100%;
      width: 100%;
    }

    .tab-content>.active {
      visibility: visible;
    }

    .nav-tabs .nav-link.active{
      color: red;
    }

    .nav-tabs .nav-link{
      color: black;
    }
  </style>

</head>

<body>
  <!-- ============================  Navigation Start =========================== -->
  <?php include './includes/navigation.php'; ?>
  <!-- ============================  Navigation End =========================== -->
  <div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./index.php"><i class="fa fa-home home_1"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">View Profile</li>
      </ol>
    </nav>


    <div class="profile">
      <div class="col-md-8 profile_left">
        <h2 class="mb-4">Profile Id: <?php echo $cust_id  ?></h2>

        <div class="row mb-5">
          <div class="col-sm-5 row_2">
            <div class="profile-pic">
              <img src="images/<?php echo $profileimage  ?>" alt="" height="270" width="270">
            </div>
          </div>
          <div class="col-sm-7 row_1">
            <table>
              <tbody>
                <tr>
                  <td>Name : </td>
                  <td><?php echo $firstname . " " . $lastname ?></td>
                </tr>
                <tr>
                  <td>Age / Height :</td>
                  <td><?php echo $age . "/" . $height ?></td>
                </tr>
                <tr>
                  <td>Date of Birth :</td>
                  <td><?php echo $dateofbirth ?></td>
                </tr>
                <tr>
                  <td>Religion : </td>
                  <td><?php echo $religion?></td>

                </tr>
                <tr>
                  <td>Marital Status : </td>
                  <td><?php echo $maritalstatus ?></td>
                </tr>
                <tr>
                  <td>State/City : &nbsp; </td>
                  <td><?php echo $state. "/" . $city ?></td>
                </tr>
                <tr>
                  <td>Height / Weight : &nbsp;&nbsp;</td>
                  <td><?php echo $height . "/" . $weight ?></td>
                </tr>
                <tr>
                  <td>Education : </td>
                  <td><?php echo $qualification ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tabs-info">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">About Myself</button>
              <button class="nav-link " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Family Details</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-about-myself">
              <div class="about mb-3 mt-3">
                <h3 class="text-danger">About Me</h3>
                <p><?php echo $aboutyourself ?></p>
                <!-- basic details -->
                <div class="basic">
                  <div class="row">
                    <h3 class="text-danger">Basic Details</h3>
                    <div class="col-md-6">
                      <table>
                        <tbody>
                          <tr>
                            <td>Name : </td>
                            <td><?php echo $firstname. " " . $lastname ?></td>
                          </tr>
                          <tr>
                            <td>Age :</td>
                            <td><?php echo $age ?></td>
                          </tr>
                          <tr>
                            <td>Date of Birth :</td>
                            <td><?php echo $dateofbirth?></td>
                          </tr>
                          <tr>
                            <td>Religion : </td>
                            <td><?php echo $religion  ?></td>
                          </tr>
                          <tr>
                            <td>Marital Status : </td>
                            <td><?php echo $maritalstatus  ?></td>
                          </tr>
                          <tr>
                            <td>State/City : &nbsp; </td>
                            <td><?php echo $state . "/" . $city ?></td>
                          </tr>
                          <tr>
                            <td>Profile Created by : &nbsp;&nbsp;</td>
                            <td><?php echo $profilecreatedfor  ?></td>
                          </tr>
                          <tr>
                            <td>Education : </td>
                            <td><?php echo $qualification  ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-6">
                      <table>
                        <tbody>
                          <tr>
                            <td>Mother Tongue : </td>
                            <td><?php echo $mothertongue ?></td>
                          </tr>
                          <tr>
                            <td>Height / Weight : &nbsp;&nbsp;</td>
                            <td><?php echo $height . "/" . $weight  ?></td>
                          </tr>
                          <tr>
                            <td>Diet :</td>
                            <td><?php echo $diet ?></td>
                          </tr>
                          <tr>
                            <td>Smoke : </td>
                            <td><?php echo $smoking  ?></td>
                          </tr>
                          <tr>
                            <td>Drinking : </td>
                            <td><?php echo $drinking ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- basic details end -->

                <!-- religious -->
                <div class="religious mt-3 mb-3">
                  <h3 class="text-danger">Religious / Social & Astro Background</h3>
                  <div class="row">
                    <div class="col-md-6">
                      <table>
                        <tbody>
                          <tr>
                            <td>Religion : </td>
                            <td><?php echo $mothertongue ?></td>
                          </tr>
                          <tr>
                            <td>Caste : &nbsp;&nbsp;</td>
                            <td><?php echo $height . "/" . $weight  ?></td>
                          </tr>
                          <tr>
                            <td>Horoscope : &nbsp; </td>
                            <td><?php echo $diet ?></td>
                          </tr>
                          <tr>
                            <td>Place of birth : &nbsp;</td>
                            <td><?php echo $placeofbirth  ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-6"></div>
                  </div>
                </div>

                <!-- Education & Career -->
                <div class="education mb-3">
                  <h3 class="text-danger">Education & Career</h3>
                  <table>
                    <tbody>
                      <tr>
                        <td>Qualification : &nbsp;</td>
                        <td><?php echo $qualification ?></td>
                      </tr>
                      <tr>
                        <td>Workprofile : </td>
                        <td><?php echo $workprofile  ?></td>
                      </tr>
                      <tr>
                        <td>Jobrole :</td>
                        <td><?php echo $jobrole ?></td>
                      </tr>
                      <tr>
                        <td>Annual Income : &nbsp;</td>
                        <td><?php echo $annualincome  ?></td>
                      </tr>
                      <tr>
                        <td>Drinking : </td>
                        <td><?php echo $drinking  ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-family-details">
              <div class="family-details">
                <h3 class="text-danger mt-3 mb-3">Family Details</h3>
                <table>
                  <tbody>
                    <tr>
                      <td>Father's Occupation : </td>
                      <td><?php echo $firstname . " " . $lastname ?></td>
                    </tr>
                    <tr>
                      <td>Mother's Occupation :</td>
                      <td><?php echo $age ?></td>
                    </tr>
                    <tr>
                      <td>Date of Birth :</td>
                      <td><?php echo $dateofbirth ?></td>
                    </tr>
                    <tr>
                      <td>No. of Brothers : </td>
                      <td><?php echo $religion  ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  <!-- ============================  Footer Start =========================== -->
  <?php include "./includes/footer.php" ?>
  <!-- ============================  Footer End =========================== -->

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>