<?

include './dbconn.php';

$select_age = $_GET['select_age'];
$select_price = $_GET['select_price'];
$select_mood = $_GET['select_mood'];

$gu_name_query = "Select * from restaurant where gu = '$gu_name'";
$region_result = mysqli_query($conn, $gu_name_query);

$query = "SELECT * from recommend LEFT JOIN restaurant ON restaurant.restaurant_id = recommend.restaurant_id
          WHERE option_mood = '$select_mood' && option_age = '$select_age' && option_price='$select_price' ";

$result=mysqli_query($conn, $query);

echo "
    <table width='1000' border='1'>
    <tr>
    <td width='10%' align='center'>ID</td>
    <td width='20%' align='center'>가게명</td>
    <td width='10%' align='center'>나이</td>
    <td width='10%' align='center'>분위기</td>
    <td width='10%' align='center'>가격대</td>
     </tr>
";

while($row = mysqli_fetch_array($result))
{
  echo("
  <tr>
  <td align = 'center'>$row[restaurant_id]</td>
  <td align = 'center'>$row[restaurant_name]</td>
  <td align = 'center'>$row[option_age]</td>
  <td align = 'center'>$row[option_mood]</td>
  <td align = 'center'>$row[option_price]</td>
  </tr>
  ");
}

?>
