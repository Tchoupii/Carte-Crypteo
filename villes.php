<?php
$servername = "localhost";
$username = "root";
$password = "";
try {
  $conn = new PDO("mysql:host=$servername;dbname=piscine", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
  $sql = 'SELECT zip_code , name FROM cities ORDER BY name';
  $stmt = $conn->query($sql);

  $publisher = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($publisher as $v){
    echo $v['name'].",". $v['zip_code'].';';
  }
} 
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


?>