<?
include './dbconn.php';

$program = $_GET['program'];

$query = "SELECT restaurant.restaurant_name, restaurant.gu, restaurant.restaurant_type, restaurant_info.star from broadcasting_restaurant
             LEFT JOIN restaurant ON restaurant.restaurant_id = broadcasting_restaurant.restaurant_id
             LEFT JOIN restaurant_info ON broadcasting_restaurant.restaurant_id = restaurant_info.restaurant_id WHERE program = '$program'";

$result=mysqli_query($conn, $query);

echo "
    <table width='1000' border='1'>
    <tr>
    <td width='20%' align='center'>가게명</td>
    <td width='10%' align='center'>지역</td>
    <td width='10%' align='center'>종류</td>
    <td width='10%' align='center'>별점</td>
     </tr>
";

while($row = mysqli_fetch_array($result))
{
  echo("
  <tr>
  <td align = 'center'>$row[restaurant_name]</td>
  <td align = 'center'>$row[gu]</td>
  <td align = 'center'>$row[restaurant_type]</td>
  <td align = 'center'>$row[star]</td>
  </tr>
  ");
}


?>
