<?php

require_once "config.php";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
}
else{
  $loggedin = false;
}

$isprofile = false;
if(isset($_SESSION['id'])){
  $id=$_SESSION['id'];
  $sql = "SELECT * FROM `profiles` where cust_id = '$id'";
  $query = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($query);
  if($result){
    $isprofile = true;
  }
}



echo '<section id="header ">
         <!-- navbar -->
      <nav class="navbar navbar-expand-lg bg-danger navbar-dark" id="top_nav">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="./images/logo.png" class="img-fluid" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>';
              
              echo '<li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
              ';
              if(!$loggedin){
              echo '
             
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>';
              }
              if($loggedin){

                if($isprofile){

                  echo '
                  <li class="nav-item">
                  <a class="nav-link" href="../../matrimony/chat/inbox.php">Inbox</a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="viewprofile.php">View Profile</a>
                  </li>';
                  echo '<li class="nav-item">
                    <a class="nav-link" href="search.php">Search</a>
                  </li>';
                  }
                  else{
                    echo '<li class="nav-item">
                <a class="nav-link" href="createprofile.php">Create Profile</a>
              </li>';
                }
              }
                if($loggedin){
              echo'
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>';
              }
              
              // if($view){
              // echo '<li class="nav-item">
              //   <a class="nav-link" href="createprofile.php">View Profile</a>
              // </li>';
              // }
            echo'</ul>
          </div>
        </div>
      </nav>
    </section>';
?>