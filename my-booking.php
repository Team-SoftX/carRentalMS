<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
?>
  <!DOCTYPE HTML>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>CarForYou - Responsive Car Dealer HTML5 Template</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!--Custome Style -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!--slick-slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!--bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
    <!-- Google-Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
  </head>

  <body>

    <!-- Start Switcher -->
    <?php include('includes/colorswitcher.php'); ?>
    <!-- /Switcher -->

    <!--Header-->
    <?php include('includes/header.php'); ?>
    <!--Page Header-->
    <!-- /Header -->

    <!--Page Header-->
    <section class="page-header profile_page">
      <div class="container">
        <div class="page-header_wrap">
          <div class="page-heading">
            <h1>My Booking</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>My Booking</li>
          </ul>
        </div>
      </div>
      <!-- Dark Overlay-->
      <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <section class="user_profile inner_pages">

      <div class="row">


        <div class="d-flex p-2">
          <div class="container">
            <h5 class="uppercase underline">My Booikngs </h5>
            <div class="my_vehicles_list">

              <ol id="vehicle_listing1">

              </ol>
              <!-- <ul class="vehicle_listing">
                <!?php
                $useremail = $_SESSION['login'];
                $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail";
                $query = $dbh->prepare($sql);
                $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);


                if ($query->rowCount() > 0) {
                  foreach ($results as $result) {

                ?>

                    <li>
                      <div class="vehicle_img"> <a href="vehical-details.php?vhid=<!?php echo htmlentities($result->vid); ?>"><img src=" admin/img/vehicleimages/<!?php echo htmlentities($result->Vimage1); ?>" alt="image"></a> </div>
                      <div class="vehicle_title">
                        <h6><a href="vehical-details.php?vhid=<!?php echo htmlentities($result->vid); ?>""> <!?php echo htmlentities($result->BrandName); ?> , <!?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
                         <p><b>From Date:</b> <!?php echo htmlentities($result->FromDate); ?><br /> <b>To Date:</b> <!?php echo htmlentities($result->ToDate); ?></p>
                      </div>
                      
                  <!?php if ($result->Status == 1) { ?>
                      <div class=" vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Confirmed</a>

                      </div>

                    <!?php } else if ($result->Status == 2) { ?>
                      <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Cancelled</a>

                      </div>



                    <!?php } else { ?>
                      <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Not Confirm yet</a>
                        <div class="clearfix"></div>
                      </div>
                    <!?php } ?>
                    <div style="float: left">
                      <p><b>Message:</b> <!?php echo htmlentities($result->message); ?> </p>
                    </div>
                    </li>
                <!?php }
                } ?>


              </ul> -->



            </div>
          </div>
        </div>

      </div>
    </section>
    <!--/my-vehicles-->
    <?php include('includes/footer.php'); ?>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/interface.js"></script>
    <!--Switcher-->
    <script src="assets/switcher/js/switcher.js"></script>
    <!--bootstrap-slider-JS-->
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <!--Slider-JS-->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>



    <script>
      //get data by ajax
      // $.ajax({
      //   url: "http://localhost/CR/api/mybookings",
      //   type: "GET",
      //   //dataType: "json",
      //   success: function(data) {
      //     var json = data;
      //     var obj = JSON.parse(json);
      //     console.log(data);
      //     buildTable(obj);
      //   }
      // });

      // function buildTable(obj) {
      //   var table = document.getElementById('vehicle_listing1')

      //   for (var i = 0; i < obj.length; i++) {
      //     var row = "<li>ddsdf </li>"
      //     table.innerHTML += row

      //   }

      // }

      var xht = new XMLHttpRequest();
      // step2
      xht.open("GET", "http://localhost/CR/api/mybookings", true);
      // step3
      xht.send();
      //step4 -we do the processing upon receiving the response with sta
      xht.onreadystatechange = function(data) {
        const myObj = JSON.parse(this.responseText);
        if (this.readyState == 4 && this.status == 200) {

          var content = "";

          for (let i = 0; i < myObj.length; i++) {

            content += "<li style = 'float: left'> <div class = 'vehicle_img'> <a href = 'vehical-details.php?vhid=" + myObj[i].vid +
              "'> <img src='admin/img/vehicleimages/" + myObj[i].Vimage1 + "' alt='image'></a> </div>" +
              "<div class='vehicle_title'> <h6> <a href='vehical-details.php?vhid=" + myObj[i].vid + "'> " +
              myObj[i].BrandName + ", " + myObj[i].VehiclesTitle +
              " </a></h6> <p> <b> From Date: </b>" + myObj[i].FromDate + "<br/> <b> To Date: </b> " + myObj[i].ToDate + "</p> </div>";

            if (myObj[i].Status == 1) {
              content += "<div class = 'vehicle_status'> <a href ='#' class = 'btn outline btn-xs active-btn'> Confirmed </a>  </div>";

            } else if (myObj[i].Status == 2) {
              content += "<div class = 'vehicle_status'> <a href ='#' class = 'btn outline btn-xs'> Cancelled </a>  </div>";

            } else {
              content += "<div class = 'vehicle_status'> <a href ='#' class = 'btn outline btn-xs'> Not Confirm yet </a> </div>";
            }
            content += "<div style = 'float: left'> <p> <b> Message: </b> " + myObj[i].message + " </p> </div> </li>";

          }


          document.getElementById("vehicle_listing1").innerHTML = content;
        } else if (this.readyState == 4 && this.status == 404) {
          alert(this.status + "<br>resource not found");
        }
      };
    </script>

  </body>

  </html>
<?php } ?>