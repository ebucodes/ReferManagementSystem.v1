<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Admin Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/images/logo1.png">  
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/css/buttons.bootstrap4.min.css">
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
    <link href="../assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
            <img src="../assets/images/logo1.png" width="80" height="">
            EbuCodes
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="signOut.php">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    
                </div>

                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">List of Users</h3>
                    </div>
                    <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th>S/N</th>  
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Referred By</th>
                    <th>Points</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        include("../includes/config.php");
                        // Query to get users from database
                        $query = ("SELECT * FROM users") or die(mysqli_error($conn));
                        $count=1;
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                          <tr>
                            <td><?php echo htmlentities($count);?></td>
                            <td><?php echo htmlentities ($row["userID"]); ?></td>
                            <td><?php echo htmlentities ($row["firstName"]); ?>
                                <?php echo htmlentities ($row["lastName"]); ?></td>
                            <td><?php echo htmlentities ($row["emailAddress"]); ?></td>                           
                            <td><?php echo htmlentities ($row["refer"]); ?></td>
                            <td><?php echo htmlentities ($row["referPoint"]); ?></td>
                            <td><?php echo htmlentities ($row["date"]); ?></td>
                          </tr>
                    <?php
                      }
                    ?>
                  </tbody>

                  <tfoot>
                  <tr>
                    <th>S/N</th>  
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Referred By</th>
                    <th>Points</th>
                    <th>Date</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </main>
        </div>
    </div>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- DataTables -->
    <script src="../assets/datatables/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/datatables/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/datatables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../assets/datatables/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/datatables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/datatables/jszip/jszip.min.js"></script>
    <script src="../assets/datatables/pdfmake/pdfmake.min.js"></script>
    <script src="../assets/datatables/pdfmake/vfs_fonts.js"></script>
    <script src="../assets/datatables/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/datatables/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/datatables/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": true,"paging": true,"ordering": true,"info": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        })
    </script>
</body>
</html>