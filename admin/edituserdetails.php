<?php
session_start();

//  update data 
include "../includes/config.php";
if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertype = $_POST['edit_usertype'];

    $sql = "UPDATE `users` SET `username`='$username',`email`='$email',`password`='$password',`usertype`='$usertype'  WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['success'] = "Your data is updated";
        header("location: index.php");
    } else {
        $_SESSION['status'] = "Your data not is updated";
        header("location: index.php");
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
                            <!-- <ion-icon name="logo-apple"></ion-icon> -->
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


            <div class="details">
                <div class="recentorders">
                    <div class="cardheader">
                        <h2>Edit Details</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>
                    <?php
                    include "../includes/config.php";
                    if (isset($_POST['edit_btn'])) {
                        $id = $_POST['edit_id'];
                        $query = "SELECT * FROM `users` WHERE id = '$id'";
                        $results = mysqli_query($conn, $query);

                        foreach ($results as $row) {
                    ?>
                    <?php
                        }
                    }
                    ?>
                    <form action="" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id'];  ?>">
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Username</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="username" value="<?php echo $row['username'];  ?>" id="exampleInputUsername" placeholder="Username" name="edit_username">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Email</label>
                            </div>
                            <div class="col-75">
                                <input type="email" id="email" value="<?php echo $row['email'];  ?>" placeholder="Email" name="edit_email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Password</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="lname" value="<?php echo $row['password'];   ?>" placeholder="Password" name="edit_password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="country">Usertype</label>
                            </div>
                            <div class="col-25">
                                <select name="edit_usertype" required>
                                    <option value="Admin">Admin</option>
                                    <option value="User" selected>User</option>
                                </select>
                            </div>
                        </div>

                        <br>
                        <div class="feild">
                            <a href="index.php" class="btn">Cancel</a>
                            <button class="btn" name="updatebtn" type="submit">Update</button>
                        </div>
                    </form>
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