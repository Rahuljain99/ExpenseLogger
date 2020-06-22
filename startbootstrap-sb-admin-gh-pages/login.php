<?php
    session_start();
    $con=mysqli_connect("localhost","root","","expenselogger") or die ("<h1>Database Error</h1>");
    if (isset($_POST['submit'])){
        extract($_POST);
        $sql="select * from `users` where `Email`='$email' and `Password`='$password'";
        if ($data=mysqli_query($con,$sql)){
            $res=mysqli_fetch_array($data);
            if ($res){
                $name=$res['First_Name'];
                //echo "<script>alert('Welcome to Expense Logger, ".$name."')</script>";
                $_SESSION['name']=$name;
                $_SESSION['id']=$res['ID'];
                header('location:index.php');
            }
            else{
                echo "<script>alert('Maybe the username or password is wrong, check and try again')</script>";
            }
        }
        else{
            echo "alert('Some error occurred try again')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expense Logger - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"> Expense Logger - Login</div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="email">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <!--<div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
        
          <a class="btn btn-primary btn-block" href="index.php">Login</a>
        -->
          <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <!-- <a class="d-block small" href="forgot-password.php">Forgot Password?</a> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
