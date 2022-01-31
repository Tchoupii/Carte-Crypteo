<?php
$servername = "localhost";
$username = "root";
$password = "";
$name = $_GET['ville'];

try {
  $conn = new PDO("mysql:host=$servername;dbname=piscine", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
  $sql = 'SELECT * FROM cities WHERE name = '. "'".$name."'";
  $stmt = $conn->query($sql);

  $publisher = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($publisher as $v){
    echo $v['gps_lat'].";". $v['gps_lng'];
  }

} 
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>