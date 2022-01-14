<?php

 // session start
session_start();

// include DB connection
include('../includes/config.php');

    // declaring variables
    $search = "";

    // get form data
    if(isset($_POST['search'])) {

        $search = $_POST['search'];

    }

    if($search != "") { // if the field is not empty!

        // search for user!
        $searchUser = "SELECT * FROM users WHERE username = '$search' OR email = '$search'";
        $searchUserStatus = mysqli_query($conn,$searchUser) or die(mysqli_error($conn));
        
        if(mysqli_num_rows($searchUserStatus) > 0) { // if there is an user!

            header('Location: ../chat/search-results.php?message=Search results!');
            // header('Location: ../search-results.php?message=Search results!');

        } else {

            header('Location: ../chat/search-results.php?message=No user found!');

        }
        

    } else { // if the fields is empty!

        header('Location: ../chats.php?message=Please input something!');

    }

    $_SESSION['search'] = $search;
?>