<?php
function Connect()
{
  $servername = "localhost";
  $username = "root";
  $password = "touch2success";
  $dbname = "menu_details";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname) or die($conn->connect_error);
  return $conn;
}
?>
