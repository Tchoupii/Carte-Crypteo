<?php
$servername = "localhost";
$username = "root";
$password = "";
$lat = $_GET['lat'];
$lng = $_GET['lng'];


try {
    $conn = new PDO("mysql:host=$servername;dbname=piscine", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    $sql = "	
    SELECT gps_lat, gps_lng, get_distance_metres(:lat, :lng, gps_lat, gps_lng) 
    AS rayon
    FROM cities
    HAVING rayon < 10000
    ";
    $stmt = $conn->prepare($sql);
    $floatLat = floatval($lat);
    $floatLng = floatval($lng);
    $stmt->bindParam(':lat', $floatLat);
    $stmt->bindParam(':lng', $floatLng);
    
    $stmt->execute();
    foreach($stmt as $v){
        echo $v['gps_lat'].";". $v['gps_lng'].";";
      }
    
  } 
  catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  
  ?>

