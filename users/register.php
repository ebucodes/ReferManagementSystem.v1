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
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Your first name" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Your last name" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Your email address" required>
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address" class="form-label">Password</label>&nbsp;<span style="color: red;">*</span>
              <input type="password" class="form-control" id="address" minlength="5" maxlength="12" placeholder="Your password" required>
              <div class="invalid-feedback">
                Password is required.<br>
                Minimum length is 5.<br>
                Maximum length is 12.
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


    <script src="../assets/js/bootstrap.bundle.min.js"></script>

      <script src="../assets/js/form-validation.js"></script>
  </body>
</html>
