<?php
if (isset($_POST['emailsubscibe'])) {
  $subscriberemail = $_POST['subscriberemail'];
  $sql = "SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
  $query = $dbh->prepare($sql);
  $query->bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    echo "<script>alert('Already Subscribed.');</script>";
  } else {
    $sql = "INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      echo "<script>alert('Subscribed successfully.');</script>";
    } else {
      echo "<script>alert('Something went wrong. Please try again');</script>";
    }
  }
}
?>

<footer>
  <div class="footer-top">
    <div class="container">



      <h6>About Us</h6>



      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="page.php?type=aboutus">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="page.php?type=faqs">FAQs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="page.php?type=privacy">Privacy</a>
        </li>
      </ul>







    </div>
  </div>

</footer>