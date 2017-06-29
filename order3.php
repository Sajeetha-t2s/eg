<?php
include "header.php";
 ?>


<!--
<!DOCTYPE html>
<html> -->
<!-- /*<style>
 bgcolor="powderblue";
</style>*/ -->


<form action="action_page.php" method="get">

 Menu  <select name="menu">
    <option value="Pizza">Pizza</option>
    <option value="Burger">Burger</option>
    <option value="Noodles">Noodles</option>
    <option value="Rotti">Roti</option>
    <option value="Dessertt">Dessertt</option>
    <option value="Fish Curry">Fish Curry</option>
    <option value="Paneer Tikka">Paneer Tikka</option>
  </select>
  <br><br>
</form>

<h3>Food Quantity</h3>

<input type="number" id="myNumber" min="1" >
<input type="submit">
<script>
function myFunction() {
    var x = document.getElementById("myNumber").value;
    document.getElementById("demo").innerHTML = x;
}
</script>

</body>
</html>
