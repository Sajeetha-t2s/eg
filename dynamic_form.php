<html>

<head>

  <?php include 'header.php';?><br>
  <style>
  <div class="container" style="background-image:file:///home/dev/Desktop/windows_8_blue_grain_by_ipur-d4dbkwa%20bs.jpg;">
    ...
</div>

  h1{
       font-size: 35px;
       font-family: 'Pacifico', cursive;
           }
  body{
    font-family: 'Indie Flower', cursive;
  }
  li{
    font-family: 'Pacifico', cursive;
  }
  </style>
  <body>
    <p>
      <form action="dynamic_table.php" method="post">
      <center><input type="button" value="Add Ingredient" onClick="addRow('dataTable') " />
      <input type="button" value="Remove Ingredient" onClick="deleteRow('dataTable') "  /></center>
      </p>
           <table id="dataTable" class="form" border="1">
              <tbody>
                <tr>
                  <p>
        <td><input type="checkbox"  name="chk[]" checked="checked" /></td>
        <td>
          <label>Ingredient Name</label>
          <input type="text" required="required" name="Ingredient_Name[]" size="16">
         </td>
         <td>
           <label for="Quantity">Quantity</label>
           <input type="text" required="required" class="small"  name="Quantity[]"size="8">
           <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
           <script>
           $("input").keyup(function () {
               //if (!this.value.match(/[0-9]/)) {
                   this.value = this.value.replace(/[^0-9]/g, '');
               //}
           });
           </script>
         </td>
         <td>
            <label for="Pizza">For Pizza</label>
            <input type="text" required="required" class="small"  name="Pizza[]" size="8">
            <!-- <script>
            $("input").keyup(function () {
                //if (!this.value.match(/[0-9]/)) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                //}
            });
            </script> -->
         </td>
         <td>
            <label for="Burger">For Burger</label>
            <input type="text" required="required" class="small"  name="Burger[]" size="8">
            <script>
            $("input").keyup(function () {
                //if (!this.value.match(/[0-9]/)) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                //}
            });
            </script>
         </td>
         <td>
            <label for="Roti">For Roti/Naan</label>
            <input type="text" required="required" class="small"  name="Roti[]" size="8">
            <script>
            $("input").keyup(function () {
                //if (!this.value.match(/[0-9]/)) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                //}
            });
            </script>
         </td>
         <td>
            <label for="Noodles">For Noodles</label>
            <input type="text" required="required" class="small"  name="Noodles[]" size="8">
            <script>
            $("input").keyup(function () {
                //if (!this.value.match(/[0-9]/)) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                //}
            });
            </script>
         </td>
         <td>
            <label for="Dessert">For Dessert</label>
            <input type="text" required="required" class="small"  name="Dessert[]" size="8">
            <script>
            $("input").keyup(function () {
                //if (!this.value.match(/[0-9]/)) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                //}
            });
            </script>
         </td>
         <td>
            <label for="Fish_Curry">For Fish_Curry</label>
            <input type="text" required="required" class="small"  name="Fish_Curry[]" size="8">
            <script>
            $("input").keyup(function () {
                //if (!this.value.match(/[0-9]/)) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                //}
            });
            </script>
        </td>
        <td>
            <label for="Paneer_Tikka">For Paneer_Tikka</label>
            <input type="text" required="required" class="small"  name="Paneer_Tikka[]" size="8">
            <script>
            $("input").keyup(function () {
                //if (!this.value.match(/[0-9]/)) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                //}
            });
            </script>
       </td>
            </p>
                </tr>
                </tbody>
            </table><br>
            <center>
            <label></label><input type="submit" value="Submit"></center>
          </form>
</body>
</html>
</head>
<script>
//var table1 = document.getElementById('data');
function addRow(tableID) {
  console.log("add row is working");
	var table = document.getElementById(tableID);
  var rowCount = table.rows.length;
  //var rowCount = 0;
  // if(rowCount==0)
  // {
  //    var body = document.getElementsByTagName('body')[0];
  //          var row = table.insertRow(rowCount);
  //         var tbl = document.createElement('table');
  //         var tbl = document.createElement('table');
  //         tbl.setAttribute('border', '1');
  //         tbl.setAttribute('class', 'form');
  //         var tbdy = document.createElement('tbody');
  //         var tr = document.createElement('tr');
  //         var td = document.createElement('td');
  //
  //           var cell1 = row.insertCell(0);
  //           var element1 = document.createElement("input");
  //           element1.type = "checkbox";
  //           element1.name="chkbox[]";
  //           td.appendChild(cell1.appendChild(element1));
  //
  //
  //           var cell2 = row.insertCell(1);
  //           //cell2.innerHTML ="Ingredient Name";
  //           var element2 = document.createElement("input");
  //           element2.type = "text";
  //           element2.name = "Ingredient_Name[]";
  //           td.appendChild(cell2.appendChild(element2));
  //
  //
  //           var cell3 = row.insertCell(2);
  //           //cell3.innerHTML = "Quantity ";
  //           var element3 = document.createElement("input");
  //           element3.type = "text";
  //           element3.name = "Quantity[]";
  //         td.appendChild(cell3.appendChild(element3));
  //           tr.appendChild(td);
  //           tbdy.appendChild(tr);
  //           tbl.appendChild(tbdy);
  //           body.appendChild(tbl)
  //
  //
  // }
  var row = table.insertRow(rowCount);
		 var colCount = table.rows[0].cells.length;
    //var colCount = 3;
		for(var i=0; i <colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		}

}

function deleteRow(tableID) {
	var table = document.getElementById(tableID);
  //var table = table1;
	var rowCount = table.rows.length;
	for(var i=0; i<rowCount; i++) {
		var row = table.rows[i];
		var chkbox = row.cells[0].childNodes[0];
    if(null != chkbox && true == chkbox.checked) {
			if(rowCount <= 1) { 						// limit the user from removing all the fields
				alert("Cannot Remove all the Ingredients.");
				break;
			}
			table.deleteRow(i);
			rowCount--;
			i--;
		}
	}
}
</script>
