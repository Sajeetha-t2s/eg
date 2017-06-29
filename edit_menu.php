<?php
$id=$_GET["Id"];
 ?>


<html>
<head>
<title>Edit Menu</title>
</head>
<body>


<center>
<h3> Edit Menu Details</h3></center>

<?php
//include("Connection.php");
require 'connection.php';
$conn=Connect();
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT Ingredients_Name FROM Menu_details WHERE Id='".$id."'" ;

//echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //output data of each row
    while($row = $result->fetch_assoc())
    {
    $name=$row['Ingredients_Name'];
}}
else {
    echo "0 RECORDS";
}
$conn->close();
?>

<form action="editmenu.php?ID=<?=$id?>" method="post">
  <center><?=$name?><br>



Pizza
  <!-- <input type="text" name="Pizza" required><br> -->
  <input style="width:300px;height:40px;border:none;box-shadow:0px 0px 3px grey;" input type="text" name="Pizza" required />
<br>
Burger
  <!-- <input type="text" name="Burger" required><br> -->
  <input style="width:300px;height:40px;border:none;box-shadow:0px 0px 3px grey;"input type="text" name="Burger" required/>
<br>
Roti
  <!-- <input type="text" name="Roti" required><br> -->
  <input style="width:300px;height:40px;border:none;box-shadow:0px 0px 3px grey;" input type="text" name="Roti" required />
<br>
Noodles
  <!-- <input type="text" name="Noodles" required><br> -->
  <input style="width:300px;height:40px;border:none;box-shadow:0px 0px 3px grey;" input type="text" name="Noodles" required />
<br>
Dessert
  <!-- <input type="text" name="Dessert" required><br> -->
  <input style="width:300px;height:40px;border:none;box-shadow:0px 0px 3px grey;" input type="text" name="Dessert" required />
<br>
Fish_Curry
  <!-- <input type="text" name="Fish_Curry" required><br> -->
  <input style="width:300px;height:40px;border:none;box-shadow:0px 0px 3px grey;" input type="text" name="Fish_Curry" required />
<br>
Paneer_Tikka
  <!-- <input type="text" name="Paneer_Tikka" required><br> -->
  <input style="width:300px;height:40px;border:none;box-shadow:0px 0px 3px grey;" input type="text" name="Paneer_Tikka" required />



<input type="submit" value="Submit" class="btn-link"><br>
</center>
</form>
</body>
</html>
