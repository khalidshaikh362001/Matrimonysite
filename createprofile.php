<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}


$email = $_SESSION['email'];
include "./includes/config.php";
$sql = "SELECT * FROM `users` where email = '$email'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);
$id = $result['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include "config.php";
  $profileimage = $_FILES['profileimage']['name'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $maritalstatus = $_POST['maritalstatus'];
  $gender = $_POST['gender'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $pincode = $_POST['pincode'];
  $age = $_POST['age'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $profilecreatedfor = $_POST['profilecreatedfor'];
  $drinking = $_POST['drinking'];
  $smoking = $_POST['smoking'];
  $mothertongue = $_POST['mothertongue'];
  $diet = $_POST['diet'];
  $dateofbirth = $_POST['dateofbirth'];
  $placeofbirth = $_POST['placeofbirth'];
  $religion = $_POST['religion'];
  $horoscope = $_POST['horoscope'];
  $qualification = $_POST['qualification'];
  $workprofile = $_POST['workprofile'];
  $jobrole = $_POST['jobrole'];
  $annualincome = $_POST['annualincome'];
  $aboutyourself = $_POST['aboutyourself'];
  $phone = $_POST['phone'];



  // image upload
  $target = 'images/' . $profileimage;
  move_uploaded_file($_FILES['profileimage']['tmp_name'], $target);

  // check whether data already exist
  $existSql = "SELECT * FROM `profiles` WHERE cust_id = '$id'";
  $result = mysqli_query($conn, $existSql);
  $numExistrows = mysqli_num_rows($result);
  if ($numExistrows > 0) {
    echo "profile already exists ";
  } else {
    $sql = "INSERT INTO `profiles` ( `cust_id` ,`profileimage` ,`firstname`, `lastname`, `maritalstatus`, `gender`, `state`, `city`,
   `pincode`, `age`, `height`, `weight`, `profilecreatedfor`,
   `drinking`, `smoking`, `mothertongue`, `diet`, `dateofbirth`, `placeofbirth`, `religion`,
    `horoscope`, `qualification`, `workprofile`, `jobrole`, `annualincome`, `aboutyourself`, `phone`) 
    VALUES ( '$id ','$profileimage' , '$firstname', '$lastname', '$maritalstatus', '$gender', '$state', '$city', '$pincode', '$age', '$height', '$weight',
   '$profilecreatedfor', '$drinking', '$smoking', '$mothertongue', '$diet', '$dateofbirth', '$placeofbirth', '$religion', '$horoscope', '$qualification', '$workprofile', 
   '$jobrole', '$annualincome', '$aboutyourself', '$phone')";
    $result = mysqli_query($conn, $sql);


    if ($result) {
      header("location: viewprofile.php");
    } else {
      echo "unsucesfaknfasld " . mysqli_error($conn);
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

  <title>Matrimonial</title>
</head>

<body>

  <!-- ============================  Navigation Start =========================== -->
  <?php include './includes/navigation.php'; ?>
  <!-- ============================  Navigation End =========================== -->
  <div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb ">
        <li class="breadcrumb-item"><a href="./login/index.php"><i class="fa fa-home home_1"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Your Profile</li>
      </ol>
    </nav>

    <div class="details">

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="row needs-validation" novalidate>
          <div class="mb-3  ">
            <img src="./images/place.jpg" id="profiledisplay" name="profiledisplay" alt="" onclick="triggerClick()" height="220" width="220"> <br>
            <label for="exprofileimage" class="form-label">Upload Your Profile Image</label>
            <input type="file" name="profileimage" onchange="displayImage(this)" id="profileimage" style="display: none;" accept="image/x-png,image/gif,image/jpeg" required />
          </div>

          <div class="mb-3 col-md-5">
            <label for="exampleInputfirstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="exampleInputfirstname" name="firstname" required>
          </div>

          <div class="mb-3 col-md-5">
            <label for="exampleInputlastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="exampleInputlastname" name="lastname" required>
          </div>

          <div class="mb-3 col-md-3">
            <label for="validationDefault04" class="form-label">Marital status</label>
            <select name="maritalstatus" class="form-select" id="validationDefault04" required>
              <option selected disabled value="">Select your marital status</option>
              <option value="Single">Single</option>
              <option value="Divorsed">Divorsed</option>
              <option value="Widow">Widow</option>
              <option value="Widower">Widower</option>
            </select>
          </div>

          <div class="mb-3 col-md-3">
            <label class="form-label">Gender</label>
            <select name="gender" class="form-select mb-3" aria-label="Default select example" required>
              <option selected disabled value="">Select your Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>



          <div class="mb-3  col-md-5">
            <label for="exampleInputState" class="form-label">State</label>
            <input type="text" class="form-control" id="exampleInputstate" name="state" required>
          </div>

          <div class="mb-3 col-md-3">
            <label for="exampleInputcity" class="form-label">City</label>
            <input type="text" class="form-control" id="exampleInputCity" name="city" required>
          </div>

          <div class="mb-3 col-md-3">
            <label for="exampleInputpincode" class="form-label">Pincode</label>
            <input type="number" class="form-control" id="exampleInputPincode" name="pincode" required>
          </div>


          <div class="mb-3 col-md-3">
            <label for="exampleInputage" class="form-label">Age</label>
            <input type="number" class="form-control" id="exampleInputage" name="age" required>
          </div>

          <div class="mb-3 col-md-3">
            <label for="exampleInputheight" class="form-label">Height</label>
            <input type="decimal" class="form-control" id="exampleInputHeight" min="2" max="7" name="height" required>
          </div>

          <div class="mb-3 col-md-3">
            <label for="exampleInputweight" class="form-label">Weight</label>
            <input type="number" class="form-control" id="exampleInputweight" min="30" max="100" name="weight" required>
          </div>

          <div class="mb-3 col-md-3">
            <label class="form-label">Profile Created for</label>
            <select name="profilecreatedfor" class="form-select mb-3" aria-label="Default select example" required>
              <option selected disabled value="">Choose your preference</option>
              <option value="Single">Self</option>
              <option value="Married">Son/Daughter</option>
              <option value="Divorsed">Others</option>
            </select>
          </div>

          <div class="mb-3 col-md-3">
            <label class="form-label">Do you drink...?</label>
            <select name="drinking" class="form-select mb-3" aria-label="Default select example" required>
              <option selected disabled value="">Choose your preference</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
              <option value="Sometimes">Sometimes</option>
              <option value="Trying to Quit">Trying to Quit</option>
            </select>
          </div>

          <div class="mb-3 col-md-3">
            <label class="form-label">Do you Smoke...?</label>
            <select name="smoking" class="form-select mb-3" aria-label="Default select example" required>
              <option selected disabled value="">Choose your preference</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
              <option value="Sometimes">Sometimes</option>
              <option value="Trying to Quit">Trying to Quit</option>
            </select>
          </div>

          <div class="mb-3 col-md-3">
            <label class="form-label">Mother Tongue</label>
            <select name="mothertongue" class="form-select mb-3" aria-label="Default select example" required>
              <option selected disabled value="">Choose your preference</option>
              <option value="Hindi">Hindi</option>
              <option value="Malayalam">Malayalam</option>
              <option value="Marathi">Marathi</option>
              <option value="Punjabi">Punjabi</option>
              <option value="Marwari">Marwari</option>
              <option value="Telgu">Telgu</option>
              <option value="Tamil">Tamil</option>
              <option value="Sindhi">Sindhi</option>
              <option value="Odia">Odia</option>
              <option value="Kannada">Kannada</option>
              <option value="Gujarati">Gujarati</option>
            </select>
          </div>

          <div class="mb-3 col-md-3">
            <label for="validationDefault03" class="form-label">Diet</label>
            <select name="diet" class="form-select mb-3" id="validationDefault04" aria-label="Default select example" required>
              <option selected disabled value="">Choose your preference</option>
              <option value="Vegetarian">Vegetarian</option>
              <option value="Non-Vegetarian">Non-Vegetarian</option>
            </select>
          </div>

          <div class="mb-3 col-md-3">
            <label for="exampleInputState" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="exampleInputDateofbirth" name="dateofbirth" min="2001-06-03" required>
          </div>

          <div class="mb-3 col-md-3">
            <label for="exampleInputState" class="form-label">Place of Birth</label>
            <input type="text" class="form-control" id="exampleInputHeight" name="placeofbirth" required>
          </div>

          <div class="mb-3 col-md-3">
            <label for="exampleInputState" class="form-label">Religion</label>
            <input type="text" class="form-control" id="exampleInputHeight" name="religion" required>
          </div>

          <div class="mb-3 col-md-3">
            <label for="exampleInputState" class="form-label">Horoscope</label>
            <input type="text" class="form-control" id="exampleInputHeight" name="horoscope" required>
          </div>




          <div class="mb-3 col-md-3">
            <label for="exampleInputEmail1" class="form-label">Your Highest Qualification</label>
            <input type="text" class="form-control" id="exampleInputUsername" name="qualification" required>
          </div>

          <div class="mb-3 col-md-3">
            <label for="validationDefault04" class="form-label">You work with</label>
            <select name="workprofile" class="form-select mb-3" id="validationDefault04" aria-label="Default select example" required>
              <option selected disabled value="">Your work Profile</option>
              <option value="Private Sector">Private Sector</option>
              <option value="Government / Public Sector">Government / Public Sector</option>
              <option value="Defense / Civil Services">Defense / Civil Services</option>
              <option value="Business / Self Employed">Business / Self Employed</option>
              <option value="Not Working">Not Working</option>
            </select>
          </div>

          <div class="mb-3 col-md-3">
            <label for="exampleInputEmail1" class="form-label">Your Job Role</label>
            <input type="text" class="form-control" id="exampleInputUsername" name="jobrole" required>
          </div>

          <div class="mb-3 col-md-3">
            <label for="exampleInputEmail1" class="form-label">Annual income</label>
            <input type="text" class="form-control" id="exampleInputUsername" name="annualincome" required>
          </div>


          <div class="mb-3 ">
            <div class="form-group">
              <label for="exampleInputEmail1" class="form-label">About Yourself</label>
              <textarea type="textarea" class="form-control" name="aboutyourself" cols="30" rows="4" id="message" placeholder="Enter your message" required></textarea>
            </div>
          </div>


          <div class="row mb-3 ">
            <label for="validationDefault04" class="form-label">Your Phone number</label>
            <div class="col-auto">
              <select class="form-select " aria-label="Disabled select example" disabled>
                <option selected>+91</option>
              </select>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control" name="phone" id="name" placeholder="Phone number" required>
            </div>

          </div>

          <!-- Button -->
          <div class="mb-3">
            <button class="btn btn-danger" name="submit" type="submit">Create Profile</button>
          </div>

        </div>
      </form>


    </div>



  </div>


  <!-- ============================  Footer Start =========================== -->
  <?php include "./includes/footer.php" ?>
  <!-- ============================  Footer End =========================== -->

  <!-- Main JS -->
  <script>
    // ImageDisplay
    function triggerClick(e) {
      document.querySelector('#profileimage').click();
    }

    function displayImage(e) {
      if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          document.querySelector('#profiledisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
      }
    }
  </script>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>