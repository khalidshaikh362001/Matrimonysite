<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

?>
<?php


$email = $_SESSION['email'];
include "./includes/config.php";
$sql1 = "SELECT * FROM `users` where email = '$email'";
$query1 = mysqli_query($conn, $sql1);
$result1 = mysqli_fetch_array($query1);
$id = $result1['id'];

// getting profile details
$sql = "SELECT * FROM `profiles` where cust_id = '$id'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);

// updating code

if (isset($_POST['submit'])) {
    include "./includes/config.php";
    $cust_id = '$id';
    $profileimage = $_FILES['profileimage']['name'];
    $current = $_POST['profileimage_current'];
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

    $target = 'images/' . $profileimage;
    move_uploaded_file($_FILES['profileimage']['tmp_name'], $target);


    if ($profileimage != '') {
        $update_filename = $_FILES['profileimage']['name'];
    } else {
        $update_filename = $current;
    }

    // if ($_FILES['profileimage']['name'] != '') {
    //     if (file_exists("images/" . $_FILES['profileimage']['name'])) {
    //         $profileimage = $_FILES['profileimage']['name'];
    //         $_SESSION['status'] = "Image already exists";
    //         header('location: index.php');
    //     }
    // } else {
    $sql = "UPDATE `profiles` SET `profileimage`='$update_filename',`firstname`='$firstname',
        `lastname`='$lastname',`maritalstatus`='$maritalstatus',`gender`='$gender',`state`='$state',`city`='$city',
        `pincode`='$pincode',`age`='$age',`height`='$height',`weight`='$weight',`profilecreatedfor`='$profilecreatedfor',
        `drinking`='$drinking',`smoking`='$smoking',`mothertongue`='$mothertongue',`diet`='$diet',`dateofbirth`='$dateofbirth',
        `placeofbirth`='$placeofbirth',`religion`='$religion',`horoscope`='$horoscope',`qualification`='$qualification',
        `workprofile`='$workprofile',`jobrole`='$jobrole',`annualincome`='$annualincome',`aboutyourself`='$aboutyourself',
        `phone`='$phone',`profilecreationdate`='$profilecreationdate' WHERE cust_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if ($_FILES['profileimage']['name'] != '') {
            $target = 'images/' . $profileimage;
            move_uploaded_file($_FILES['profileimage']['tmp_name'], $target);
            unlink("images/" . $current);
        }
        $_SESSION['status'] = "Image uploaded succesfully";
        header("location: viewprofile.php");
    } else {
        $_SESSION['status'] = "Image not uploaded ";
        header("location: index.php");
    }
    // }
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

    <title>Update Your Profile</title>
</head>

<body>

    <!-- ============================  Navigation Start =========================== -->
    <?php include './includes/navigation.php'; ?>
    <!-- ============================  Navigation End =========================== -->
    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="./login/index.php"><i class="fa fa-home home_1"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Your Profile</li>
            </ol>
        </nav>

        <div class="details">


            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row needs-validation" novalidate>
                    <div class="mb-3 ">
                        <img src="images/<?php echo $result['profileimage'];  ?>" id="profiledisplay" name="profiledisplay" alt="" alt="" onclick="triggerClick()" height="220" width="220"> <br>
                        <label for="exprofileimage" class="form-label">Upload Your Profile Image</label>
                        <input type="file" name="profileimage" onchange="displayImage(this)" id="profileimage" style="display: none;" accept="image/x-png,image/gif,image/jpeg" />
                        <input type="hidden" name="profileimage_current" value="<?php echo $result['profileimage'];  ?>">
                    </div>

                    <div class="mb-3 col-md-5">
                        <label for="exampleInputfirstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="exampleInputfirstname" name="firstname" value="<?php echo $result['firstname'];  ?>" required>
                    </div>

                    <div class="mb-3 col-md-5">
                        <label for="exampleInputlastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputlastname" name="lastname" value="<?php echo $result['lastname'];  ?>" required>
                    </div>
                    <div class="mb-3 col-md-5">
                        <label for="exampleInputlastname" class="form-label">State</label>
                        <input type="text" class="form-control" id="exampleInputlastname" name="state" value="<?php echo $result['state'];  ?>" required>
                    </div>



                    <div class="mb-3 col-md-3">
                        <label for="validationDefault04" class="form-label">Marital status</label>
                        <select name="maritalstatus" class="form-select" id="validationDefault04" required>
                            <option selected><?php echo $result['maritalstatus']; ?></option>
                            <option value="Single">Single</option>
                            <option value="Divorsed">Divorsed</option>
                            <option value="Widow">Widow</option>
                            <option value="Widower">Widower</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-3">
                        <label for="validationDefault04" class="form-label">Gender</label>
                        <select name="gender" class="form-select" id="validationDefault04" required>
                            <option selected><?php echo $result['gender']; ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>



                    <div class="mb-3 col-md-3">
                        <label for="validationDefault05" class="form-label">City</label>
                        <input type="text" class="form-control" id="validationDefault05" name="city" value="<?php echo $result['city']; ?>" required>
                    </div>

                    <div class=" mb-3 col-md-3">
                        <label for="validationDefault05" class="form-label">Pincode</label>
                        <input type="text" class="form-control" id="validationDefault05" name="pincode" value="<?php echo $result['pincode']; ?>" required>
                    </div>


                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Age</label>
                        <input type="number" class="form-control" id="validationDefault05" name="age" min="20" max="60" value="<?php echo $result['age']; ?>" required>
                    </div>

                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Height (in foot)</label>
                        <input type="number" class="form-control" id="validationDefault05" step="0.01" name="height" min="3" max="7" value="<?php echo $result['height']; ?>" required>
                    </div>

                    <div class="mb-3 col-md-3">
                        <label for="validationDefault05" class="form-label">Weight (in kg)</label>
                        <input type="number" class="form-control" id="validationDefault05" min="30" max="100" name="weight" value="<?php echo $result['weight']; ?>" required>
                    </div>

                    <div class="mb-3 col-md-3">
                        <label for="validationDefault04" class="form-label">Profile Created for</label>
                        <select name="profilecreatedfor" class="form-select" id="validationDefault04" required>
                            <option selected><?php echo $result['profilecreatedfor']; ?></option>
                            <option value="Self">Self</option>
                            <option value="Son/Daughter">Son/Daughter</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>


                    <div class="col-md-3">
                        <label for="validationDefault04" class="form-label">Do you drink...?</label>
                        <select name="drinking" class="form-select" id="validationDefault04" required>
                            <option selected><?php echo $result['drinking']; ?></option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Sometimes">Sometimes</option>
                            <option value="Trying to Quit">Trying to Quit</option>
                        </select>
                    </div>


                    <div class="col-md-3">
                        <label for="validationDefault04" class="form-label">Do you Smoke...?</label>
                        <select name="smoking" class="form-select" id="validationDefault04" required>
                            <option selected><?php echo $result['smoking']; ?></option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Sometimes">Sometimes</option>
                            <option value="Trying to Quit">Trying to Quit</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-3">
                        <label for="validationDefault04" class="form-label">Mother Tongue</label>
                        <select name="mothertongue" class="form-select" id="validationDefault04" required>
                            <option selected><?php echo $result['mothertongue']; ?></option>
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

                    <div class="col-md-3">
                        <label for="validationDefault04" class="form-label">Diet</label>
                        <select name="diet" class="form-select" id="validationDefault04" required>
                            <option selected><?php echo $result['diet']; ?></option>
                            <option value="Vegetarian">Vegetarian</option>
                            <option value="Non-Vegetarian">Non-Vegetarian</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="validationDefault05" name="dateofbirth" value="<?php echo $result['dateofbirth']; ?>" min="1982-01-01" max="2021-12-31" required>
                    </div>



                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" id="validationDefault05" max="4" name="placeofbirth" value="<?php echo $result['placeofbirth']; ?>" required>
                    </div>

                    <div class="mb-3 col-md-3">
                        <label for="validationDefault05" class="form-label">Religion</label>
                        <input type="text" class="form-control" id="validationDefault05" max="4" name="religion" value="<?php echo $result['religion']; ?>" required>
                    </div>

                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Horoscope</label>
                        <input type="text" class="form-control" id="validationDefault05" name="horoscope" value="<?php echo $result['horoscope']; ?>" required>
                    </div>

                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Your Highest Qualification</label>
                        <input type="text" class="form-control" id="validationDefault05" name="qualification" value="<?php echo $result['qualification']; ?>" required>
                    </div>

                    <div class="col-md-3">
                        <label for="validationDefault04" class="form-label">You work with</label>
                        <select name="workprofile" class="form-select" id="validationDefault04" required>
                            <option selected><?php echo $result['workprofile']; ?></option>
                            <option value="Private Sector">Private Sector</option>
                            <option value="Government / Public Sector">Government / Public Sector</option>
                            <option value="Defense / Civil Services">Defense / Civil Services</option>
                            <option value="Business / Self Employed">Business / Self Employed</option>
                            <option value="Not Working">Not Working</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-3">
                        <label for="validationDefault05" class="form-label">Your Job Role</label>
                        <input type="text" class="form-control" id="validationDefault05" name="jobrole" value="<?php echo $result['jobrole']; ?>" required>
                    </div>

                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Annual Income</label>
                        <input type="number" class="form-control" id="validationDefault05" name="annualincome" min="200000" value="<?php echo $result['annualincome']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">About Yourself</label>
                        <textarea type="textarea" class="form-control" name="aboutyourself" cols="30" rows="4" id="validationTextarea" placeholder="Enter your message" required><?php echo $result['aboutyourself']; ?></textarea>
                    </div>


                    <div class="row mb-3">
                        <label for="exampleInputEmail1" class="form-label">Your Phone number</label>
                        <div class="col-auto">
                            <select class="form-select " aria-label="Disabled select example" disabled>
                                <option selected>+91</option>
                            </select>
                        </div>
                        <div class="col-md-3">

                            <input type="tel" class="form-control" id="phone" maxlength="10" name="phone" pattern="[1-9]{1}[0-9]{9}" value="<?php echo $result['phone']; ?>" placeholder="Phone number" required>
                        </div>

                    </div>

                    <!-- Button -->
                    <div class="mb-3 col-auto">
                        <button class="btn btn-danger" name="submit" type="submit">Update Profile</button>
                    </div>
                    <div class="mb-3 col-auto">
                        <a href="./viewprofile.php" class="btn btn-danger">Cancel</a>
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