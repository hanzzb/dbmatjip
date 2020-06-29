<?
include './dbconn.php';

//select box에서 선택된 프로그램의 value
$program = $_GET['program'];

//사용자가 선택한 프로그램의 맛집 목록을 보여주기 위한 쿼리문
$query = "SELECT * from broadcasting_restaurant
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
  //한 줄에 맛집 하나씩 출력되게 함
  echo("
  <tr>
  <td align = 'center'><a href='restaurant_detail_info.php?restaurant_id=".$row["restaurant_id"]."'>$row[restaurant_name]</td>
  <td align = 'center'>$row[gu]</td>
  <td align = 'center'>$row[restaurant_type]</td>
  <td align = 'center'>$row[star]</td>
  </tr>
  ");
}


?>
