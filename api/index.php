<?php
session_start();

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require "db.php";

$app = new \Slim\App;


$app->get('/mybookings', function (Request $request, Response $response, array $args) {

    // $useremail = $_SESSION['login'];
    $useremail = "1@gmail.com";
    $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail";

    try {
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();

        $query = $db->prepare($sql);
        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        // $stmt = $db->query($sql);
        // $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        // $db = null;
        echo json_encode($results);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
    }
});

$app->get('/listing', function (Request $request, Response $response, array $args) {




    $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";

    try {
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();

        $query = $db->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        echo json_encode($results);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
    }
});

$app->get('/brands', function (Request $request, Response $response, array $args) {




    $sql = "SELECT * from  tblbrands ";

    try {
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();

        $query = $db->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        echo json_encode($results);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
    }
});

$app->post('/createBrand', function (Request $request, Response $response, array $args) {

    $BrandName = $_POST['BrandName'];



    try {
        $sql = "INSERT INTO tblbrands (BrandName) VALUES
			               (:BrandName)";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':BrandName', $BrandName);


        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;

        $data = array("status" => "success", "rowcount" => $count);
        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
        echo json_encode($e);
    }
});

$app->get('/regusers', function (Request $request, Response $response, array $args) {


    $sql = "SELECT * FROM tblusers";

    try {
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($user);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
    }
});

$app->get('/managebookings', function (Request $request, Response $response, array $args) {


    $sql = "SELECT tblusers.FullName,tblbrands.BrandName,tblvehicles.VehiclesTitle,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.VehicleId as vid,tblbooking.Status,tblbooking.PostingDate,tblbooking.id  from tblbooking join tblvehicles on tblvehicles.id=tblbooking.VehicleId join tblusers on tblusers.EmailId=tblbooking.userEmail join tblbrands on tblvehicles.VehiclesBrand=tblbrands.id  ";


    try {
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($user);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
    }
});



$app->post('/antiqueitem', function (Request $request, Response $response, array $args) {

    $itemid = $_POST['itemid'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $startprice = $_POST['startprice'];


    try {
        $sql = "INSERT INTO antiqueitem (itemid,description,category,startprice) VALUES
			               (:itemid,:description,:category,:startprice)";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':itemid', $itemid);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':category', $category);
        $stmt->bindValue(':startprice', $startprice);

        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;

        $data = array("status" => "success", "rowcount" => $count);
        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
        echo json_encode($e);
    }
});






$app->get('/bids', function (Request $request, Response $response, array $args) {


    $sql = "SELECT * FROM bid";

    try {
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($user);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
    }
});

$app->get('/bid/{bidder_id}', function (Request $request, Response $response, array $args) {
    $id = $args['bidder_id'];


    $sql = "SELECT * FROM bid where bidderid=$id";

    try {
        // Get DB Objectqw
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($user);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
    }
});


$app->post('/bid', function (Request $request, Response $response, array $args) {

    $bidderid = $_POST["bidderid"];
    $biddername = $_POST["biddername"];
    $contactnum = $_POST["contactnum"];
    $mybidprice = $_POST["mybidprice"];
    $itemid = $_POST["itemid"];
    $description = $_POST["description"];
    $category = $_POST["category"];
    $startprice = $_POST["startprice"];



    try {
        $sql = "INSERT INTO bid (bidderid,biddername,contactnum,mybidprice,itemid,description,category,startprice) VALUES
                           (:bidderid,:biddername,:contactnum,:mybidprice,:itemid,:description,:category,:startprice)";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':bidderid', $bidderid);
        $stmt->bindValue(':biddername', $biddername);
        $stmt->bindValue(':contactnum', $contactnum);
        $stmt->bindValue(':mybidprice', $mybidprice);
        $stmt->bindValue(':itemid', $itemid);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':category', $category);
        $stmt->bindValue(':startprice', $startprice);

        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;

        $data = array("status" => "success", "rowcount" => $count);
        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
        echo json_encode($e);
    }
});


$app->put('/bid/{bidder_id}', function (Request $request, Response $response, array $args) {
    $id = $args['bidder_id'];


    $biddername = $_POST["biddername"];
    $contactnum = $_POST["contactnum"];
    $mybidprice = $_POST["mybidprice"];
    $itemid = $_POST["itemid"];
    $description = $_POST["description"];
    $category = $_POST["category"];
    $startprice = $_POST["startprice"];


    try {
        $sql = "UPDATE bid SET biddername= :biddername , contactnum= :contactnum, mybidprice= :mybidprice , itemid= :itemid,description= :description,category= :category , startprice= :startprice Where bidderid=$id";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':biddername', $biddername);
        $stmt->bindValue(':contactnum', $contactnum);
        $stmt->bindValue(':mybidprice', $mybidprice);
        $stmt->bindValue(':itemid', $itemid);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':category', $category);
        $stmt->bindValue(':startprice', $startprice);

        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;

        $data = array("status" => "success", "rowcount" => $count);
        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
        echo json_encode($e);
    }
});


$app->delete('/bid/{bidder_id}', function (Request $request, Response $response, array $args) {
    $id = $args['bidder_id'];

    try {
        $sql = "DELETE FROM bid Where bidderid=$id";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);


        $stmt->execute();
        $count = $stmt->rowCount();
        $db = null;

        $data = array("status" => "success", "rowcount" => $count);
        echo json_encode($data);
    } catch (PDOException $e) {
        $data = array("status" => "fail");
        echo json_encode($data);
        echo json_encode($e);
    }
});






// $app->get('/', function (Request $request, Response $response, array $args) {

//     $response->getBody()->write("This is the root directory.......");

//     return $response;
// });

// $app->get('/home', function (Request $request, Response $response, array $args) {

//     $response->getBody()->write("This is home .......");

//     return $response;
// });




// $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");

//     return $response;
// });
$app->run();
