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

    <title>Matching Profile</title>
</head>

<body style="display: flex; flex-direction:column; height:100vh;">

    <!-- ============================  Navigation Start =========================== -->
    <?php include './includes/navigation.php'; ?>
    <!-- ============================  Navigation End =========================== -->

    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb" style=" padding-top: 3rem; padding-bottom: 1rem;">
                <li class="breadcrumb-item"><a href="./login/index.php"><i style="color: red;" class="fa fa-home home_1"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Matching Profiles</li>
            </ol>
        </nav>
        <?php
        

        if (isset($_GET['submit'])) {
            include "./includes/config.php";
            $gender = $_GET['gender'];
            $maritalstatus = $_GET['maritalstatus'];
            $city =  $_GET['city'];
            $state =  $_GET['state'];
            $religion =  $_GET['religion'];
            $mothertongue = $_GET['mothertongue'];


            if ($gender != ""  || $maritalstatus != ""  || $city != ""  || $state != ""  || $religion != ""  || $mothertongue != "") {
                $query = "SELECT * FROM profiles WHERE gender = '$gender' OR maritalstatus = '$maritalstatus' || state = '$state' 
                             OR city = '$city' || mothertongue = '$mothertongue' OR religion = '$religion'";
                $data = mysqli_query($conn, $query);
                if (mysqli_num_rows($data) > 0) {
                    while ($row = mysqli_fetch_array($data)) {
                        // $id=$_SESSION['id'];
                        $id = $row['cust_id'];
                        $maritalstatus = $row['maritalstatus'];
                        $gender =  $row['gender'];
                        $state =  $row['state'];
                        $city =  $row['city'];
                        $age = $row['age'];
                        $religion =  $row['religion'];
                        $mothertongue = $row['mothertongue'];
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $age = $row['age'];
                        $height = $row['height'];
                        $dateofbirth = $row['dateofbirth'];
                        $religion = $row['religion'];
                        $weight = $row['weight'];
                        $qualification = $row['qualification'];
                        $profileimage = $row['profileimage'];
                             ?>
                        <div class="profiles">
                            <h2 class="mb-4 mt-4">Profile Id: <?php echo $id;  ?></h2>
                            <div class="row mb-5">
                                <div class="col-sm-5 row_2">
                                    <div class="profile-pic">
                                        <img src="images/<?php echo $profileimage;  ?>" alt="" height="270" width="270">
                                    </div>
                                </div>
                                <div class="col-sm-7 ">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Name : </td>
                                                <td><?php echo $firstname . " " . $lastname ?></td>
                                            </tr>
                                            <tr>
                                                <td>Age / Height :</td>
                                                <td><?php echo $age . "/" . $height; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth :</td>
                                                <td><?php echo $dateofbirth; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Religion : </td>
                                                <td><?php echo $religion;  ?></td>

                                            </tr>
                                            <tr>
                                                <td>Marital Status : </td>
                                                <td><?php echo $maritalstatus;  ?></td>
                                            </tr>
                                            <tr>
                                                <td>State/City : &nbsp; </td>
                                                <td><?php echo $state . "/" . $city; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Height / Weight : &nbsp;&nbsp;</td>
                                                <td><?php echo $height . "/" . $weight;  ?></td>
                                            </tr>
                                            <tr>
                                                <td>Education : </td>
                                                <td><?php echo $qualification;  ?></td>
                                            </tr>
                                            <tr>
                                            
                                                <td><a href="./searchedprofile.php?id=<?php echo $id ?>" name="view_profile" class="btn btn-danger mt-2">View Profile</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php

                    }
                }
            }
        } 
                ?>



                            </div>

                            <!-- ============================  Footer Start =========================== -->
                            <?php include "./includes/footer.php" ?>
                            <!-- ============================  Footer End =========================== -->





                            <!-- Bootstrap Bundle with Popper -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>