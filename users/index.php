<?php
session_start();
ob_start();

include("../includes/config.php");

if (isset($_POST["login"])) {
    $emailAddress = $_POST["emailAddress"];
    $password = md5($_POST["password"]);

    $query = ("SELECT * FROM users WHERE emailAddress =  '$emailAddress' AND password = '$password'") or die(mysqli_error($conn));
    $result = mysqli_query($conn, $query);
    $fetchArray = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) > 0) {

        $_SESSION["id"] = $fetchArray["id"];
        header("location:home.php");
    } else {
        ?>
            <script>
                setTimeout(function() {
                        swal("Error!", "Invalid Email address / password combination!", "error");
                    },
                    100);
            </script> 
        <?php
        // $message = "<p class='card-text alert alert-danger'>Invalid Email Address/password combination</p>";
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
    <meta name="generator" content="Hugo 0.84.0">
    <title>EbuCodes · Register</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon1.png">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="../assets/css/sweetalert.min.css">

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
  <form method="POST">
    <img class="mb-4" src="../assets/images/logo1.png" alt="" width="100" height="">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" name="emailAddress" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button name="login" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>

    <!-- Bootstrap -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Form validation -->
    <script src="../assets/js/form-validation.js"></script>
    <!-- jQuery -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- SweetAlert -->
    <script src="../assets/js/sweetalert.min.js"></script>    
  </body>
</html>
