<?php
require 'connection.php';
$name=$_POST['Ing'];        // array
$name_count=count($name);

// echo '<pre>';
//print_r($name);
//Create connection

$conn=Connect();
$url="graph.php";
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$ingname=array();
$sql="SELECT burger,roti,rice FROM menu";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //output data of each row
    while($row = $result->fetch_assoc()) {
      array_push($ingname,$row['burger','roti','rice']);


   }
 }
 else {
     echo "0 RECORDS";
 }

 $quan=array_combine($ingname,$name);

  foreach ($quan as $key => $value) {
    $sql = "UPDATE menu SET burger='" . $value . "', roti='" . $value . "',rice='" . $value . " WHERE Ingredients_Name='" . $key . "'";
    //print_r($sql);
    if ($conn->query($sql) === TRUE) {
      echo  $key." :records edited successfully";
      echo '<meta http-equiv="refresh" content="0;URL=' . $url . '">';
      } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
    }
      }



?>
