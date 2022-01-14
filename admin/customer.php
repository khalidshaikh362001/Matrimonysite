<?php
include "../includes/config.php";

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
}




if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $sql = "DELETE FROM `profiles` WHERE id = '$id' ";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $_SESSION['success'] = "Your data is deleted";
        header("location: customer.php");
    } else {
        $_SESSION['status'] = "Your data not is deleted";
        header("location: customer.php");
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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->



    <link rel="stylesheet" href="../css/admin.css">



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
                    <a href="logout.php">
                        <span class="icon">
                            <ion-icon name="exit-outline"></ion-icon>
                        </span>

                        <span class="title" href="logout.php">Log Out</span>
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
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!-- user image -->
                <div class="user">
                    <img src="./images/user.jpg" alt="">
                </div>
            </div>

            <!-- cards -->
            <div class="cardBox">
            <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            include "../includes/config.php";
                            $sql = "SELECT id FROM `users` WHERE usertype = 'Admin'";
                            $query = mysqli_query($conn, $sql);
                            $results = mysqli_num_rows($query);
                            echo "$results";

                            ?>
                        </div>
                        <div class="cardname">Number of Admin</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            include "../includes/config.php";
                            $sql = "SELECT id FROM `users` ORDER by id";
                            $query = mysqli_query($conn, $sql);
                            $results = mysqli_num_rows($query);
                            echo "$results";

                            ?>
                        </div>
                        <div class="cardname">Total users</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                            include "../includes/config.php";
                            $sql = "SELECT * FROM `users` WHERE status = 'Inactive' ORDER BY `status` ASC;";
                            $query = mysqli_query($conn, $sql);
                            $results = mysqli_num_rows($query);
                            echo "$results";

                            ?>
                        </div>
                        <div class="cardname">Blocked Users</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardname">Daily Views</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- Details List -->
            <div class="details">
                <div class="recentorders">
                    <div class="cardheader">
                        <h2>User Profiles</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>
                    <?php
                    include '../includes/config.php';
                    $query = "SELECT * FROM `profiles`";
                    $results = mysqli_query($conn, $query);

                    ?>
                    <div style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Firstame</td>
                                <td>Lastname</td>
                                <td>Age</td>
                                <td>Date Of Birth</td>
                                <td>Marital Status</td>
                                <td>State</td>
                                <td>City</td>
                                <td>Height </td>
                                <td>Weight</td>
                                <td>Education</td>
                                <td>Religion</td>
                                <!-- <td>Edit</td> -->
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (mysqli_num_rows($results) > 0) {
                                while ($row = mysqli_fetch_assoc($results)) {
                            ?>

                                    <tr>
                                        <td ><?php echo $row['id'];   ?></td>
                                        <td><?php echo $row['firstname']  ?></td>
                                        <td><?php echo $row['lastname']  ?></td>
                                        <td><?php echo  $row['age']  ?></td>
                                        <td ><?php echo $row['dateofbirth']; ?></td>
                                        <td><?php echo $row['maritalstatus'];  ?></td>
                                        <td><?php echo $row['state']  ?></td>
                                        <td><?php echo  $row['city']; ?></td>
                                        <td><?php echo $row['height']  ?></td>
                                        <td><?php echo $row['weight']; ?></td>
                                        <td><?php echo $row['qualification']; ?></td>
                                        <td><?php echo $row['religion'];  ?></td>
                                      

                                        <!-- <td>
                                            <form action="./editprofile.php" method="POST">
                                                <input type="hidden" name="edit_id" value="<?php echo $row['id'];   ?>">
                                                <button type="submit" name="edit_btn" class="btn">
                                                    <ion-icon name="create-outline"></ion-icon>
                                                </button>
                                            </form>
                                        </td> -->
                                        <td>
                                            <form action="" method="POST">
                                                <input type="hidden" name="delete_id" value="<?php echo $row['id'];   ?>">
                                                <button type="submit" name="delete_btn" class="btn">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                </button>
                                            </form>
                                        </td>
                                        <!-- <td><span class="btn">Delete</span></td> -->
                                        <!-- <td><span class="status pending">Delivered</span></td> -->
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "No records Found";
                            }

                            ?>
                      

                        </tbody>
                    </table>
                    </div>
                </div>

            </div>

        </div>
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