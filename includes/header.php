<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="assets/images/logo.png" alt="image" /></a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">


            <?php if (strlen($_SESSION['login']) == 0) {
            ?>
              <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
              <div class="login_btn"> <a href="admin/" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Admin Login</a> </div>

            <?php } else {

              echo "Welcome To Car rental portal";
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>

            <?php
            $email = $_SESSION['login'];
            $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email ";
            $query = $dbh->prepare($sql);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            if ($query->rowCount() > 0) {
              foreach ($results as $result) {

                echo htmlentities($result->FullName);
              }
            } ?></a>


          </ul>
        </div>

      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a> </li>



          <li><a href="car-listing.php">Car Listing</a>
          <li><a href="my-booking.php">My Booking</a></li>
          <li><a href="page.php?type=aboutus">About Us</a></li>

          <li><a href="contact-us.php">Contact Us</a></li>

          <li><a href="logout.php">Sign Out</a></li>


        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>