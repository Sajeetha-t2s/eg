<? php

$date = date("Y-m-d");

$query55 = "SELECT id_order, price FROM orders WHERE delivery LIKE '%$date%'";
$result55 = mysql_query($query55) or die(mysql_error());

while ($row55 = mysql_fetch_array($result55))
{
$currency = $row55['id_currency'];
$id = $row55['id_order'];

    if ($currency == "1")
{
    echo '
        <tr>
        <td style="width: 120px;">' . $id_order . '</td>
        <td style="width: 120px;">EUR</td>
        <td style="width: 170px;">' . $row55['price'] . '</td>
        </tr>

';
        $somma_paid += $row55['price'];

}
?>
