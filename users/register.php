<?php 
    include("../includes/config.php");
                if (!(isset($_GET['invite']))) {
                  echo "";
                } else {
                  $invite = $_GET["invite"];
                  $inviteQuery =mysqli_query($conn, "SELECT * FROM users WHERE referCode='$invite'");
                  $inviteArray = mysqli_fetch_assoc($inviteQuery);
                  $referName = $inviteArray["firstName"]." ".$inviteArray["lastName"];
                  $referEmail = $inviteArray["emailAddress"];
                  $point = $inviteArray["referPoint"];
                  $add = 10;
                  $referPoint = $point + $add;
                  // echo "Referrer Email: $referEmail<br>";
                  // echo "Referrer Point: $referPoint";
                  $updatePoint = mysqli_query($conn,"UPDATE users SET referPoint='$referPoint' WHERE emailAddress='$referEmail'") or die(mysqli_error($conn));
                  if (!$updatePoint) {
                    echo "No";
                    exit;
                  } 
                }
            ?>
    <?php
    include("../includes/config.php");
    if (isset($_POST["register"])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $emailAddress = $_POST["emailAddress"];
    $password = md5($_POST["password"]);  
    //generate voters id
    $set = "0123456789";
    $user = substr(str_shuffle($set), 0, 6);
    // Voter ID
    $userID = "USER$user";
    $refer = $_POST["refer"];
    $referCode = "$userID"; 
    // To check if the user already exists
    $sql1 = mysqli_query($conn, "SELECT emailAddress FROM users WHERE emailAddress='$emailAddress'");
      if (mysqli_num_rows($sql1) > 0) {
        ?>
            <script>
                setTimeout(function() {
                        swal("Error!", "Email Address already in use", "error")
                    },
                    100);
            </script> 

        <?php
      } else {
        // Register new user
        $query = mysqli_query($conn, "INSERT INTO users (userID, firstName, lastName, emailAddress, password, refer, referCode) VALUES ('$userID','$firstName', '$lastName','$emailAddress','$password', '$refer', '$referCode')") or die(mysqli_error($conn));
        if ($query) {
        ?>
            <script>
                setTimeout(function() {
                        swal({
                            title: "Congratulations!!!",
                            text: "Registration was successfully.",
                            html: true,
                            icon: "success",
                            button: "OK",
                        }).then(function(){
                      window.location = "../users/";
                    });
                    },
                    100);
            </script>

        <?php
        } else {
        ?>
            <script>
                setTimeout(function() {
                        swal("Error!", "User not added!", "error");
                    },
                    100);
            </script> 
        <?php
        }
        
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
    <link href="../assets/css/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/images/logo2.png" alt="" width="100" height="">
      <h2>Registration Form</h2>
      <p class="lead">Please enter your details correctly</p>
    </div>

    <div class="row g-5">
      <div class="col-md-12">
        <!-- <h4 class="mb-3"></h4> -->
        <form method="POST" class="needs-validation" novalidate>
          <div class="row g-3">
            <?php 
                if (!(isset($_GET['invite']))) {
                  $referName = "";
                } else {
                    echo "<p class='card-text alert alert-success'>Referred By: $referName</p>";
                }
            ?>
            <div class="col-sm-12">
              <input type="text" class="form-control" name="refer" value="<?php echo $referName; ?>" readonly>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>&nbsp;<span style="color: red;">*</span>
              <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Your first name" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>&nbsp;<span style="color: red;">*</span>
              <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Your last name" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="email" class="form-label">Email Address</label>&nbsp;<span style="color: red;">*</span>
              <input type="email" name="emailAddress" class="form-control" id="email" placeholder="Your email address" required>
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div> 
            </div>

            <div class="col-sm-6">
              <label for="address" class="form-label">Password</label>&nbsp;<span style="color: red;">*</span>
              <input type="password" name="password" class="form-control" id="address" minlength="5" maxlength="12" placeholder="Your password" required>
              <div class="invalid-feedback">Password is required.<br>Minimum length is 5.<br>Maximum length is 12.
              </div>
            </div>
         
        </div>

          <br class="my-2">

          <button name="register" class="w-100 btn btn-primary btn-lg" type="submit">Register</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-2 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; <?php echo date('Y'); ?></p>
  </footer>
</div>

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
