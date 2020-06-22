<?php
  session_start();
  $con=mysqli_connect("localhost","root","","expenselogger") or die ("<h1>Database Error</h1>");
  if (!isset($_SESSION['id'])){
    header('location:login.php');
  }
  $id=$_SESSION['id'];
  $sql="select year(`timestamp`) as year,sum(`expense`) as expense from `expenses` where `ID`='$id' group by year";
  $data=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expense Logger - Yearly Expenses</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">Expense Logger</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    

    

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
         
          <span>Expenses</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addex.php">
          <!--<i class="fas fa-fw fa-tachometer-alt"></i>-->
          <span>Add Expense</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="daily.php">
          <!--<i class="fas fa-fw fa-tachometer-alt"></i>-->
          <span>Daily Expenses</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="monthly.php">
          <!--<i class="fas fa-fw fa-tachometer-alt"></i>-->
          <span>Monthly Expenses</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="yearly.php">
          <!--<i class="fas fa-fw fa-tachometer-alt"></i>-->
          <span>Yearly Expenses</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" onclick="return confirm('Do you really want to logout?');">
          <!--<i class="fas fa-fw fa-tachometer-alt"></i>-->
          <span>Logout</span>
        </a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        

        <!-- Page Content -->
        <h1>Yearly Expenses</h1>
        <hr>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Expenses</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Year</th>
                    <th>Expenses</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Year</th>
                    <th>Expenses</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                    while($res=mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?=$res['year']?></td>
                    <td><?=$res['expense']?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Expense Logger 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
