<?php include 'navigation.php';?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ingredients_details</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<h1><center><strong><em>Ingredients_details</em></strong></center></h1>

</head>

<body>

<div class="container">

<table class="table table-bordered" align="left">
 <thead>
 <tr>

 <th>ID</th>
 <th>Ingredient</th>
 <th>burger</th>
 <th>roti</th>
 <th>rice</th>
  <th>delete</th>
   <th>edit</th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <?php
 //include("Connection.php");
 require 'connection.php';
 $conn=Connect();
 // Check connection
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }
 $sql = "SELECT * FROM menu" ;

 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     //output data of each row
     while($row = $result->fetch_assoc()) : ?>
     <tr>
    <td><?=$row['ID']?></td>
    <td><?=$row['Ingrediant']?></td>
    <td><?=$row['burger']?></td>
    <td><?=$row['roti']?></td>
      <td><?=$row['rice']?></td>
    <td><a href="delete_ing.php?SNo=<?=$row['SNo']?>" onclick="return confirm('Are you sure?')">Delete </a></td>
  </tr>
  <tr><td><a href="edit_form.php?SNo=<?=$row['SNo']?>" onclick="return confirm('Are you sure?')">edit</a></td>
</tr>
   <?php endwhile;

}
 else {
     echo "0 RECORDS";
 }

 $conn->close();
 ?>

</table>
<center>
<button type="button" onclick="window.location='graph.php'">Display the Graph</button>

</div>
</body>
</html>
