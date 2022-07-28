<?php
session_start();
require('config.php'); ?>
<?php


if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $sql = "SELECT EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $_SESSION['login'] = $_POST['email'];
    $_SESSION['fname'] = "dfdsfsdf";
    // $currentpage = $_SERVER['REQUEST_URI'];
    $currentpage = '../index.php';

    echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
  } else {
    echo "<script>alert('Invalid Details');</script>";
  }
}

?>







<!doctype html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Car Rental Portal | Admin Login</title>
  <link rel="stylesheet" href="../admin/css/font-awesome.min.css">
  <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
  <link rel="stylesheet" href="../admin/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../admin/css/bootstrap-social.css">
  <link rel="stylesheet" href="../admin/css/bootstrap-select.css">
  <link rel="stylesheet" href="../admin/css/fileinput.min.css">
  <link rel="stylesheet" href="../admin/css/awesome-bootstrap-checkbox.css">
  <link rel="stylesheet" href="../admin/css/style.css">
</head>

<body>

  <div class="login-page bk-img" style="background-image: url(../assets/images/coming_soon_bg.jpg);">
    <div class="form-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">

            <div class="well row pt-2x pb-3x bk-light">
              <div class="col-md-8 col-md-offset-2">
                <h1 class="text-center text-bold text-primary ">Sign in</h1>

                <form method="post">
                  <div class="form-group">
                    <label for="" class="text-uppercase text-sm">Email Address </label>
                    <input type="email" class="form-control mb" name="email" placeholder="Email address*">
                  </div>
                  <div class="form-group">
                    <label for="" class="text-uppercase text-sm">Password</label>
                    <input type="password" class="form-control mb" name="password" placeholder="Password*">
                  </div>
                  <div class="form-group checkbox">
                    <input type="checkbox" id="remember">

                  </div>
                  <div class="form-group">
                    <input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
                  </div>
                </form>

                <div class="modal-footer text-center">
                  <p>Don't have an account? <a href="registration.php" data-toggle="modal" data-dismiss="modal">Signup Here</a></p>
                  <p><a href="forgotpassword.php" data-toggle="modal" data-dismiss="modal">Forgot Password ?</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Loading Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <script src="js/fileinput.js"></script>
  <script src="js/chartData.js"></script>
  <script src="js/main.js"></script>

</body>

</html>