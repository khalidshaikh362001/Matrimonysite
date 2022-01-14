<?php session_start(); ?>
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


    <title>Search</title>
</head>

<body style="display: flex; flex-direction:column; height:100vh;">

    <!-- ============================  Navigation Start =========================== -->
    <?php include './includes/navigation.php'; ?>
    <!-- ============================  Navigation End =========================== -->

    <div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb" style=" padding-top: 3rem; padding-bottom: 1rem;">
                <li class="breadcrumb-item"><a href="./login/index.php"><i style="color: red;" class="fa fa-home home_1"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Search</li>
            </ol>
        </nav>

        <form action="./match.php" class="row g-3" method="GET">
            <label class="col-md-5" for="gender">Gender</label>
            <div class="col-md-5">
                <select name="gender" class="form-select mb-3">
                    <option value="" selected>Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>


            <label class="col-md-5 control-label">Marital status</label>
            <div class="col-md-5">
                <select name="maritalstatus" class="form-select mb-3">
                    <option value="" selected>Select</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widow">Widow</option>
                    <option value="Widower">Widower</option>
                </select>
            </div>

            <label for="exampleInputcity" class="form-label col-md-5">City</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="exampleInputCity" name="city">
            </div>

            <label for="exampleInputcity" class="form-label col-md-5">State</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="exampleInputCity" name="state">
            </div>

          

            <label for="exampleInputcity" class="form-label col-md-5">Religion</label>
            <div class="col-md-5">
                <input type="text" class="form-control" id="exampleInputCity" name="religion">
            </div>

            <label class="col-md-5" for="marital">Mother Tongue</label>
            <div class="col-md-5">
                <select name="mothertongue" class="form-select mb-3">
                    <option value="" selected>Select</option>
                    <option value="Single">Hindi</option>
                    <option value="Married">Malayalam</option>
                    <option value="Divorsed">Marathi</option>
                    <option value="Divorsed">Punjabi</option>
                    <option value="Divorsed">Marwari</option>
                    <option value="Divorsed">Telgu</option>
                    <option value="Divorsed">Tamil</option>
                    <option value="Divorsed">Sindhi</option>
                    <option value="Divorsed">Odia</option>
                    <option value="Kannada">Kannada</option>
                    <option value="Divorsed">Gujarati</option>
                    <option value="Divorsed">Christian </option>
                </select>
            </div>

            <label for="exampleInputcity" class="form-label col-md-5">Age</label>
            <div class="col-md-2">
                <input type="text" class="form-control" id="exampleInputCity" name="from_age">

            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" id="exampleInputCity" name="to_age">

            </div>

            <div class="col-md-5">
                <button type="submit" name="submit" class="btn btn-danger mb-3">Search</button>
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