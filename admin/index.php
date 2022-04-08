<?php
session_start();
ob_start();

include("../includes/config.php");

if (isset($_POST["login"])) {
    $emailAddress = $_POST["emailAddress"];
    $password = md5($_POST["password"]);

    $query = ("SELECT * FROM admin WHERE emailAddress =  '$emailAddress' AND password = '$password'") or die(mysqli_error($conn));
    $result = mysqli_query($conn, $query);
    $fetchArray = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {

        $_SESSION["adminID"] = $fetchArray["adminID"];
        header("location:dashboard.php");
    } else {
        $message = "<p class='card-text alert alert-danger'>Invalid Email Address/password combination</p>";
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Admin | Sign In </title>

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
    <link href="../assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="" method="POST">
    <!--<img class="mb-4" src="../assets/images/logo.png" alt="" width="100" height="">-->
    <h1 class="h3 mb-3 fw-normal">Sign In</h1>
    <p class='card-text alert alert-warning'>Only authorized admin can sign in</p>
    <p>
        <?php 
            if (isset($message)) {
                echo $message;
            } 
        ?>
    </p>

    <div class="form-floating">
      <input type="email" name="emailAddress" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email Address</label>
    </div>
    <br>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Sign in</button>
  </form>
</main>
    
</body>
</html>
