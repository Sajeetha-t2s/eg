<?php
function getperformer($domain)
{
  $url="https://api.github.com/repos/uktech/".$domain."/contributors";
  $curl1 = curl_init();
  curl_setopt_array($curl1, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
      //"postman-token: a3f451e2-7bcf-6f5f-17fe-255933ba21c8",
      "user-agent: http://developer.github.com/v3/"
    ),
  ));

  $response1 = curl_exec($curl1);
  $err1 = curl_error($curl1);
  if ($err1) {
    //echo "cURL Error #:" . $err;
    return $err1;

  } else {
    $value1=(json_decode($response1,true));
    //$elementCount=count($value);
      // //$var=array();
      $keys=$value1[0]['login'];
      $val=$value1[0]['contributions'];
      $var=array();
      $var[$keys]=$val;
      //$var=array($value1[0]['login']=>$value1[0]['contributions']);
      return $var;
      }


}
function getrepos()
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.github.com/orgs/uktech/repos",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
      //"postman-token: a3f451e2-7bcf-6f5f-17fe-255933ba21c8",
      "user-agent: http://developer.github.com/v3/"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  if ($err) {
    //echo "cURL Error #:" . $err;
    return $err;
  }
  else {
    $value=(json_decode($response,true));
    $elementCount=count($value);
    $array=array();
   for($i=0;$i<$elementCount;$i++)
      {
       $array[$i]=$value[$i]['name'];
       //echo "Success";
      }
      return $array;
}
}
$repos=array();
$repos=getrepos();
// $reposCount=count($repos);
// for($j=0;$j<$reposCount;$j++)
// {
//    echo "Repo Name: ".$repos[$j];
//    echo nl2br("\n");
// }
//getperformer($repos[0]);
 $reposCount=count($repos);
 $performer=array();
 $array2=array();
for($k=0;$k<$reposCount;$k++)
 {
   $array2=getperformer($repos[$k]);
  //  $key=key($array2);
  //  $performer[$k][$key]=$array2[$key];
  foreach ($array2 as $key => $value) {
    if (array_key_exists($key, $performer)) {
      if($performer[$key]>$array2[$key])
      {
        continue;
      }
      else {
      $performer[$key]=$value;
      }

}
else {
  $performer[$key]=$value;
}


  }
 }
  //echo '<pre>'; print_r($performer);
arsort($performer);
$a=array();
$b=array();
$a=array_keys($performer);
$b=array_values($performer);
$my_var=$a;
$my_var2=$b; ?>

<html>
<head>
    <title>Star Performer-Github</title>
<style>#canvas{background: #ffffff;
        box-shadow:5px 5px 5px #ccc;
        border:5px solid #eee;
        margin-bottom:10px;}</style>
<script type="text/javascript">
var canvas ;
var context ;
var Val_Max;
var Val_Min;
var sections;
var xScale;
var yScale;
var y;
var itemName = <?php echo json_encode($my_var); ?>;
var itemValue = <?php echo json_encode($my_var2); ?>;
function init() {
    sections = 12;
    Val_Max = 300;
    var stepSize = 50;
    var columnSize = 50;
    var rowSize = 60;
    var margin = 10;
    var header = "Performance"
    canvas = document.getElementById("canvas");
    context = canvas.getContext("2d");
    context.fillStyle = "#000;"
    yScale = (canvas.height - columnSize - margin) / (Val_Max);
    xScale = (canvas.width - rowSize) / (sections + 1);
    context.strokeStyle="#000;";
    context.beginPath();
    context.font = "19 pt Arial;"
    context.fillText(header, 0,columnSize - margin);
    context.font = "16 pt Helvetica"
    var count =  0;
    for (scale=Val_Max;scale>=0;scale = scale - stepSize) {
        y = columnSize + (yScale * count * stepSize);
        context.fillText(scale, margin,y + margin);
        context.moveTo(rowSize,y)
        context.lineTo(canvas.width,y)
        count++;
    }
    context.stroke();
    context.font = "20 pt Verdana";
    context.textBaseline="bottom";
    for (i=0;i<8;i++) {
        computeHeight(itemValue[i]);
        context.fillText(itemName[i], xScale * (i+1),y - margin);
    }
    context.fillStyle="#FF69B4;";
  context.shadowColor = 'rgb(255, 102, 102)';
    context.shadowOffsetX = 9;
    context.shadowOffsetY = 3;
  context.translate(0,canvas.height - margin);
    context.scale(xScale,-1 * yScale);
    for (i=0;i<8;i++) {
        context.fillRect(i+1, 0, 0.3, itemValue[i]);
    }
}
function computeHeight(value) {
    y = canvas.height - value * yScale ;
}
</script>
</head>
<body onLoad="init()">
<div>
<center><h2>T2S Star Performers</h2></center>
<canvas id="canvas" height="400" width="650">
</canvas>
</div>
<center>
<h2>STAR PERFORMER <br> <?php echo $my_var[0]; ?> <br> NUMBER OF COMMITS:<?php echo $my_var2[0]; ?></h2>
<h2>List of Performers</h2>
      <table class="table" border="5">
   <tr>
     <th><b>COMMITTS</th>
     <th><b>EMPLOYEE NAME</th>
   </tr>
   <tr>
     <td><?php echo $my_var2[0]; ?></td>
     <td><?php echo $my_var[0]; ?></td>
   </tr>
   <td><?php echo $my_var2[1]; ?></td>
   <td><?php echo $my_var[1]; ?></td>
   <tr>
     <td><?php echo $my_var2[2]; ?></td>
     <td><?php echo $my_var[2]; ?></td>
   </tr>
 </table>
</body>
