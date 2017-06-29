
  <?php

session_start();

if(($_SESSION['role'])!='Admin'){
 echo "You have not logged in as admin yet.<br/>";
 echo "Please <a href='login.php'>login</a>.";
 exit;
}
?>

<?php

 //member id
 $id = $_POST['id'];
 $idimplode = implode (", ", $id);
    $idexplode=  explode(", ", $idimplode);

 //accept, reject
 $select=$_POST['select'];
 $comma = implode (", ", $select);
 $comma1 = explode(", ", $comma);

 $check =($idexplode);

 //class id
 $idc = $_POST['idc'];



 include('dbconfig.php');

  for($i=0;$i< sizeof($comma1);$i++)
  {
   if($comma1[$i]=="accept")
   {


      //Select Query if status is accept

      $query="UPDATE attendance SET status='accept' WHERE Member_idMember ='$check[$i]' and Class_idClass='$idc'" ;
      $result = mysqli_query($link, $query) or die(mysqli_error($link));



   }

   else
   {
      //Select Query if status is reject
      $query2="UPDATE attendance SET status='reject' WHERE Member_idMember ='$check[$i]' and Class_idClass='$idc'" ;
      $result1 = mysqli_query($link, $query2) or die(mysqli_error($link));

   }

  }



     //select members based on status

     $query3 = "SELECT * FROM member m, attendance a, class c
        WHERE a.Member_idMember = m.idMember
        AND a.Class_idClass = c.idClass
        AND a.status = 'accept'
        AND a.Class_idClass = '$idc'
        ";
     $result3 = mysqli_query($link, $query3) or die (mysqli_connect_error($link));


     //select query to get the class dates
     $query4 = "SELECT day01, day02, day03, day04, day05, day06, day07, day08, day09, day10, day11, day12 FROM class
     WHERE idClass = '$idc'";

     $result4 = mysqli_query($link, $query4) or die (mysqli_connect_error($link));



     //select query to get venue id
     $query6 = "SELECT DISTINCT idVenue FROM venue";
     $result6 = mysqli_query($link, $query6) or die (mysqli_connect_error($link));


 while($row = mysqli_fetch_array($result4, MYSQL_NUM))
       {
        $day[] = implode(", ", $row);
       }
        $iday = implode(", ", $day);
        $eday = explode(", ", $iday);



 while($row = mysqli_fetch_array($result6, MYSQL_NUM))
       {
        $ven[] = implode(",", $row);
       }
        $iven = implode(", ", $ven);
        $even = explode(", ", $iven);


 $date = ($eday);
 $venue= ($even);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ST JOHN</title>
<link rel="stylesheet" type="text/css" href="main.css" />
<script language="JavaScript" type="text/javascript">

</script>
</head>

<body>

   <!-- Begin Wrapper -->
   <div id="wrapper">

         <!-- Begin Header -->
         <div id="header">

         <img src="Image/1.jpg" width="900" height="100" />

   </div>
   <!-- End Header -->

   <!-- Begin Navigation -->
         <div id="navigation">
  <a href="index.php"><img src="Image/4.png" width="30" height="30" ></a> Welcome!!! <br>;
  <a href="logout.php">Logout</a>;

   </div>
   <!-- End Navigation -->

         <!-- Begin Faux Columns -->
   <div id="faux">

         <!-- Begin Left Column -->
         <div id="leftcolumn">
   <center><img src="Image/2.jpg" width="150" height="100" /><br>
   <ul>
   <li><a href="#home">About Us</a></li>
   <li><a href="#news">Public Courses</a></li>
   <li><a href="#contact">Cadet Affairs</a></li>
   <li><a href="#about">Events</a></li>
   <li><a href="#contact">Contact Us</a></li>
  </ul></center>


         </div>
         <!-- End Left Column -->

         <!-- Begin Right Column -->
         <div id="rightcolumn">


      <h1>Assign Venue</h1><br/>

        <?php

   echo"<table border='1'>";
   echo"<th>Name</th>";
   echo"<th>Signup Datetime</th>";
   echo"<th>Status</th>";
   echo"<th>Class</th>";
   echo"<th>Venue</th>";


 while($row=mysqli_fetch_assoc($result3))
 {
   $idc=$row['idClass'];
   $id=$row['idMember'];
   $Name = $row['name'];
   $Status = $row['status'];
   $Signup_datetime = $row['signup_datetime'];
   $class=$row['Class_idClass'];
   $idt=$row['Time_Slot_idTime_Slot'];


   echo "<form method='post' action='assign_venue.php'>";



   echo "<tr>";

   echo "<td>".$Name."</td>";
   echo "<td>".$Signup_datetime."</td>";
   echo "<td>".$Status."</td>";
   echo "<td>".$class."</td>";


    echo "<input name='idc' type='hidden' value= '$idc'/>";
   echo "<input name='id[]' type='hidden' value= '$id'/>";

   echo "<td><select id ='idv[]' name='idv[]'>";

   for ($v=0; $v <count($venue); $v++)
   {
    for ($d=0; $d <count($date); $d++)
    {

     //select query to determine which are the dates that are in conflict with each other
     $sql = "SELECT * FROM  venue v, class c, attendance a
     WHERE a.Venue_idVenue = v.idVenue
     AND a.Class_idClass = c.idClass
     AND v.idVenue = '$venue[$v]'
     AND (day01='$date[$d]' OR day02='$date[$d]' OR day03='$date[$d]' OR day04='$date[$d]' OR day05='$date[$d]' OR day06='$date[$d]'
     OR day07='$date[$d]' OR day08='$date[$d]' OR day09='$date[$d]' OR day10='$date[$d]' OR day11='$date[$d]' OR day12='$date[$d]')
     AND c.Time_Slot_idTime_Slot = '$idt'";

     $rs = mysqli_query($link, $sql) or die (mysqli_connect_error($link));

     while ($row = mysqli_fetch_assoc($rs))
     {
      //if there are no conflict, then display the venue
      if (mysqli_num_rows($rs) != 0)
      {
       $ve[]= $row['idVenue'];
       break;
      }
     }

    }
   }


   $if = implode(",", $ve);
   $ef = explode(",", $if);
   $ve = ($ef);

   for ($f=0; $f <count($ve); $f++)
   {
    //select query to get venue id and name
    $sql1 = "SELECT * FROM venue WHERE idVenue != '$ve[$f]'";
    $rs1 = mysqli_query($link, $sql1) or die (mysqli_connect_error($link));
   }


   while($row = mysqli_fetch_assoc($rs1))
   {
    //display venue id and venue name
    $idv=$row['idVenue'];
    $name=$row['name'];

    echo"<option name='idv[]' value='$idv'>$name</option> ";
   }


   echo "</select>";

 }


 echo "</table>";
 echo "<td><input type='submit' value= 'Submit'>
 </form>";

mysqli_close($link);

?>

      <div class="clear"></div>
      </div>

      <!-- End Right Column -->

      <div class="clear"></div>

         </div>
         <!-- End Faux Columns -->

         <!-- Begin Footer -->
         <div id="footer">

               <center><p>Copyright© St. John Ambulance Singapore @ 420, Beach Road, Singapore 199582 Tel: 6298 0300 Fax: 6296 5797<a href="http://www.sjas.org.sg/association/Images/Map.JPG">click here for map</a></p></center>

         </div>
   <!-- End Footer -->

   </div>
   <!-- End Wrapper -->
</body>
</html>
