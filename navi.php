<!DOCTYPE html>
<html>
<head>
  position: relative;
    margin: 0 auto 0;
    padding-top: 0px;
    background-color: $main-color;

<!-- /*<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
</style>*/ -->
</head>
<!-- function checkTotal() {
    document.listForm.total.value = '';
    var sum = 20;
    for (i = 0; i < document.listForm.choice.length; i++) {
        if (document.listForm.choice[i].checked) {
            sum = sum + parseInt(document.listForm.choice[i].value);
        }
    }
    document.listForm.total.value = sum;
}
$("#total").ready(function() {
    if (sum > 0) {
        alert("We are sorry, but at this time we can not offer you");
    }
});​ -->
<body>
<ul>
  <!-- <p><a href="next.php">Previous</a></p>
    <p><a href="previous.php">Next</a></p>
      <p><a href="previous.php">TestMe</a></p>
        <p><a href="previous.php">Updatelist</a></p>
  <p><a href="previous.php">Graph</a></p> -->

  <li><a href="next.php">Previous |</a></li>
  <li><a href="previous.php">Next |</a></li>
  <li><a href="previous.php">Test Me |</a></li>
  <li><a href="#previous.php">Update list |</a></li>
  <li><a href="#previous.php">Graph</a></li>
</ul>

</body>
</html>
