<?php
require 'connection.php';

$item=$_POST["menu"];
$quantity=$_POST["quantity"];
//echo $quantity;
//Create connection
$conn=Connect();
$url="graph.php";
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$ingname=array();
$sql="SELECT Ingredients_Name FROM Ingredients_details";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //output data of each row
    while($row = $result->fetch_assoc()) {
      array_push($ingname,$row['Ingredients_Name']);


   }
 }
 else {
     echo "0 RECORDS";
 }
//print_r($ingname);
$ingval=array();
$sql1 = "SELECT $item FROM Menu_details " ;
 //echo $sql1;
$result1 = $conn->query($sql1);


if ($result1->num_rows > 0) {
    //echo "hi";
    //output data of each row
    while($row1 = $result1->fetch_assoc()) {
        //echo "1";
        //print_r($row1);
        array_push($ingval,$quantity*$row1[$item]);

   }
 }
 else {
     echo "0 RECORDS-Menu_details";
 }
//print_r($ingval);
$Available_Quantity=array_combine($ingname,$ingval);
 foreach ($Available_Quantity as $key => $value)
 {
   $sqlt="SELECT Available_Quantity FROM Ingredients_details WHERE Ingredients_Name='" . $key . "'";
   echo $sqlt;
   echo "Hi";

   $result3 = $conn->query($sqlt);
   echo "Hi3";
   print_r($result3);
   if ($result3->num_rows > 0)
   {
     echo "Hi2";
       while($row3 = $result3->fetch_assoc())
       {
           if($row3['Available_Quantity']>=$value)
           {
             $sql = "UPDATE Ingredients_details SET  Available_Quantity=Available_Quantity - '" . $value . "' WHERE Ingredients_Name='" . $key . "'";
             //print_r($sql);
             if ($conn->query($sql) === TRUE)
             {
               echo  $key." :records edited successfully";
               echo '<meta http-equiv="refresh" content="0;URL=' . $url . '">';
             }
             else
             {
                echo "Error: " . $sql . "<br>" . $conn->error;
             }
           }

      }
    }
    else {
      echo '<script language="javascript">';
      echo 'alert("Available Quantity is less than Required Quantity")';
      echo '</script>';
      echo '<meta http-equiv="refresh" content="0;URL=' . $url . '">';
      break;
    }


  }




?>
