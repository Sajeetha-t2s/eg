<?php
require 'connection.php';

$item=$_POST["menu"];
$quantity=$_POST["quantity"];
//echo $quantity;
//Create connection
$conn=Connect();
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM Menu_details WHERE Food_Items='".$item."'" ;
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    //output data of each row
    while($row = $result->fetch_assoc()) {
       $dough=$quantity*$row['Dough'];
       $cheese=$quantity*$row['Cheese'];
       $veggies=$quantity*$row['Veggies'];
       $maize=$quantity*$row['Maize'];
       $pickles=$quantity*$row['Pickles'];
       $meat=$quantity*$row['Meat'];
       $spices=$quantity*$row['Spices'];
       $fruits=$quantity*$row['Fruits'];
       $cream=$quantity*$row['Cream'];
       $mayonnise=$quantity*$row['Mayonnise'];
       $bbq=$quantity*$row['BBQ_Sauce'];

   }
 }
 else {
     echo "0 RECORDS";
 }
$ing1=array();
 $ing1["Dough"]=$dough;
 $ing1["Cheese"]=$cheese;
 $ing1["Veggies"]=$veggies;
 $ing1["Maize"]=$maize;
 $ing1["Pickles"]=$pickles;
 $ing1["Meat"]=$meat;
 $ing1["Spices"]=$spices;
 $ing1["Fruits"]=$fruits;
 $ing1["Cream"]=$cream;
 $ing1["Mayonnise"]=$mayonnise;
 $ing1["BBQ_Sauce"]=$bbq;

 foreach ($ing1 as $key => $value) {
   $sql = "UPDATE Ingredients_details SET  Available_Quantity=Available_Quantity - '" . $value . "' WHERE Ingredients_Name='" . $key . "'";
   //print_r($sql);
   if ($conn->query($sql) === TRUE) {
     echo  $key." :records edited successfully";
     } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }
     }
?>
