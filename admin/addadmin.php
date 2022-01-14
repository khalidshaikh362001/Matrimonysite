<?php
$showalert = false;
$showerror = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../includes/config.php';
    $username = $_POST["admin_username"];
    $email = $_POST["admin_email"];
    $password = $_POST["admin_password"];
    $cpassword = $_POST["admin_cpassword"];

    // Check whether email exists
    $existSql = "SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistrows = mysqli_num_rows($result);
    if ($numExistrows > 0) {
        $showerror = "Email already Exists";
    } else {

        if (($password == $cpassword)) {
            $sql = "INSERT INTO `users` ( `username`, `email`, `password`, `usertype` , `status` ,`dt`) 
                VALUES ('$username', '$email', '$password', 'Admin' , 'Active', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showalert = "Your Account has  been created";
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
    <style>
        * {
            box-sizing: border-box;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        input[type=email] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        input[type=password] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Custom css -->
    <link rel="stylesheet" href="../adm.css">


    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800;900&display=swap" rel="stylesheet">
    <title>Admin Panel</title>
</head>

<body>
    
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                        </span>
                        <span class="title" style="margin-top: 1rem; margin-left: -0.2rem; "><img src="../images//logo.png" alt=""></span>

                    </a>
                </li>
                <li>
                    <a href="./index.php">
                        <span class="icon">
                            <ion-icon name="layers-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="./customer.php">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="./logout.php">
                        <span class="icon">
                            <ion-icon name="exit-outline"></ion-icon>
                        </span>
                        <span class="title">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- search -->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon style="margin-top: 1.2rem; margin-left: -0.1rem; " name="search-outline"></ion-icon>
                    </label>
                </div>
                <!-- user image -->
                <div class="user">
                    <img src="./images/user.jpg" alt="">
                </div>
            </div>

            <?php
    if ($showalert) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success!</strong>  ' . $showalert . '
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

            <div class="details">
                <div class="recentorders">
                    <div class="cardheader">
                        <h2>Add Admin</h2>
                    </div>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Username</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="username" id="exampleInputUsername" placeholder="Username" name="admin_username">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Email</label>
                            </div>
                            <div class="col-75">
                                <input type="email" id="email" placeholder="Email" name="admin_email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Password</label>
                            </div>
                            <div class="col-75">
                                <input type="password" id="lname" placeholder="Password" name="admin_password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Confirm Password</label>
                            </div>
                            <div class="col-75">
                                <input type="password" id="lname" placeholder="Confirm Password" name="admin_cpassword" required>
                            </div>
                        </div>

                        <br>
                         <div class="feild">
                            <button class="btn" name="submit" type="submit">Register</button>
                            <a class="btn" href="./index.php" role="button">Cancel</a>
                        </div>
                    </form>

                   
                </div>
            </div>
        </div>
        <!-- container ends -->


    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        // MenuToggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        toggle.onclick = function() {
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }




        // Add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');

        function activeLink() {
            list.forEach((item) =>
                item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
            item.addEventListener('mouseover', activeLink));
    </script>
</body>

</html>