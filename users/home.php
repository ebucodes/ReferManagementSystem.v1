<?php 
include("../includes/session.php");
 $first = $user_info["firstName"];
 $last = $user_info["lastName"];
 $userID = $user_info["userID"];
 $point = $user_info["referPoint"];
// $link = strtolower($first.'%20'.$last);
$link = $user_info["referCode"];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbars/">

    

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../assets/css/navbar.css" rel="stylesheet">
  </head>
  <body>
    
<main>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary" aria-label="Tenth navbar example">
    <div class="container-fluid">
      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
                <?php echo $first." ".$last;  ?>'s Dashboard
                <!--<img src="assets/images/logo.png" alt="logo" width="300" height="">-->
            </a>
          </li>
        </ul>
      </div> 
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../includes/signOut.php">Sign out</a>
            </div>
        </div>
    </div>
  </nav>

  <div class="container">
    <div>
      <div class="bg-light p-5 rounded">
        <div class="col-sm-8 mx-auto">
          <p>Hi, <?php echo $first." ".$last;  ?></b>. Welcome to EbuCodes ReferManagementSystem</p>
          <p>Your membership ID is <b><?php echo $userID; ?></b></p>
          <p>Your referral point is <b><?php echo $point; ?></b></p>
          <p>Your referral link is <b>http://localhost/ebucodes/ReferManagementSystem.v1/users/?invite=<?php echo $link ?></b></p>
          <p>
          <a class="btn btn-success" href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share">Share via Whatsapp</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</main>


    <script src="assets/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
