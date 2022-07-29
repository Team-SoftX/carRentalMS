<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang='en'>

<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width,initial-scale=1'>
  <meta name='keywords' content=''>
  <meta name='description' content=''>
  <title>Car Rental Portal | Car Listing</title>
  <!--Bootstrap -->
  <link rel='stylesheet' href='assets/css/bootstrap.min.css' type='text/css'>
  <!--Custome Style -->
  <link rel='stylesheet' href='assets/css/style.css' type='text/css'>
  <!--OWL Carousel slider-->
  <link rel='stylesheet' href='assets/css/owl.carousel.css' type='text/css'>
  <link rel='stylesheet' href='assets/css/owl.transitions.css' type='text/css'>
  <!--slick-slider -->
  <link href='assets/css/slick.css' rel='stylesheet'>
  <!--bootstrap-slider -->
  <link href='assets/css/bootstrap-slider.min.css' rel='stylesheet'>
  <!--FontAwesome Font Style -->
  <link href='assets/css/font-awesome.min.css' rel='stylesheet'>

  <!-- SWITCHER -->
  <link rel='stylesheet' id='switcher-css' type='text/css' href='assets/switcher/css/switcher.css' media='all' />
  <link rel='alternate stylesheet' type='text/css' href='assets/switcher/css/red.css' title='red' media='all' data-default-color='true' />
  <link rel='alternate stylesheet' type='text/css' href='assets/switcher/css/orange.css' title='orange' media='all' />
  <link rel='alternate stylesheet' type='text/css' href='assets/switcher/css/blue.css' title='blue' media='all' />
  <link rel='alternate stylesheet' type='text/css' href='assets/switcher/css/pink.css' title='pink' media='all' />
  <link rel='alternate stylesheet' type='text/css' href='assets/switcher/css/green.css' title='green' media='all' />
  <link rel='alternate stylesheet' type='text/css' href='assets/switcher/css/purple.css' title='purple' media='all' />

  <!-- Fav and touch icons -->
  <link rel='apple-touch-icon-precomposed' sizes='144x144' href='assets/images/favicon-icon/apple-touch-icon-144-precomposed.png'>
  <link rel='apple-touch-icon-precomposed' sizes='114x114' href='assets/images/favicon-icon/apple-touch-icon-114-precomposed.html'>
  <link rel='apple-touch-icon-precomposed' sizes='72x72' href='assets/images/favicon-icon/apple-touch-icon-72-precomposed.png'>
  <link rel='apple-touch-icon-precomposed' href='assets/images/favicon-icon/apple-touch-icon-57-precomposed.png'>
  <link rel='shortcut icon' href='assets/images/favicon-icon/favicon.png'>
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet'>
</head>

<body>

  <script>
    

    
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost/carRentalMS/api/listing', true);
    xhr.send();
    
    xhr.onreadystatechange = function(event) {
      
      if (this.readyState == 4 && this.status == 200) {


        var carLists = JSON.parse(this.responseText);
        var strList = JSON.stringify(carLists);
        
        content="";
        for(let i=0;i<carLists.length;i++){

          content+="<div class='col-list-3'>"+
          "<div class='recent-car-list'>"+
          "<div class='car-info-box'> <a href='vehical-details.php?vhid=" + carLists[i].id + "'><img src='admin/img/vehicleimages/"+carLists[i].Vimage1+"' class='img-responsive' alt='image'></a>"+
                  "<ul>"+
                    "<li><i class='fa fa-car' aria-hidden='true'></i>"+carLists[i].FuelType+"</li>"+
                    "<li><i class='fa fa-calendar' aria-hidden='true'></i>"+carLists[i].ModelYear+" Model</li>"+
                    "<li><i class='fa fa-user' aria-hidden='true'></i>"+carLists[i].SeatingCapacity+" seats</li>"+
                  "</ul>"+
                "</div>"+
                "<div class='car-title-m'>"+
                  "<h6><a href='vehical-details.php?vhid="+carLists[i].id+"'>"+carLists[i].BrandName+" ,"+ carLists[i].VehiclesTitle+"</a></h6>"+
                  "<span class='price'>$"+carLists[i].PricePerDay+" /Day</span>"+
                "</div>"+
                "<div class='inventory_info_m'>"+
                  "<p>"+carLists[i].VehiclesOverview+"</p>"+
                "</div>"+
              "</div>"+
            "</div>";

        }
        document.getElementById('resentnewcar').innerHTML=content;
        


      } else if (this.readyState == 4 && this.status == 404) {
        alert('No data found');

      }
    };
  </script>



  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!-- /Header -->

  <!--Page Header-->
  <section class='page-header listing_page'>
    <div class='container'>
      <div class='page-header_wrap'>
        <div class='page-heading'>
          <h1>Car Listing</h1>
        </div>
        <ul class='coustom-breadcrumb'>
          <li><a href='#'>Home</a></li>
          <li>Car Listing</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class='dark-overlay'></div>
  </section>
  <!-- /Page Header-->



<!-- <div id="testing">
<?php $very = '<script>document.writeln(str)</script>' ?>
  <p id><?php echo $very ?></p>
</div> -->

  <div class='row' >


    <!-- Recently Listed New Cars -->
    <div class='tab-content'>
      <div role='tabpanel' class='tab-pane active' id='resentnewcar'>

        

      </div>
    </div>
  </div>



  <!--Footer -->
  <?php include('includes/footer.php'); ?>
  <!-- /Footer-->

  <!--Back to top-->
  <div id='back-top' class='back-top'> <a href='#top'><i class='fa fa-angle-up' aria-hidden='true'></i> </a> </div>
  <!--/Back to top-->



  <!-- Scripts -->
  <script src='assets/js/jquery.min.js'></script>
  <script src='assets/js/bootstrap.min.js'></script>
  <script src='assets/js/interface.js'></script>
  <!--Switcher-->
  <script src='assets/switcher/js/switcher.js'></script>
  <!--bootstrap-slider-JS-->
  <script src='assets/js/bootstrap-slider.min.js'></script>
  <!--Slider-JS-->
  <script src='assets/js/slick.min.js'></script>
  <script src='assets/js/owl.carousel.min.js'></script>

</body>

</html>