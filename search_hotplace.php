<?
  include './dbconn.php';

  if (isset($_POST['hothot'])){
    $hotplace_name = $_POST['hothot'];
 }

  echo "
      <html>
      <head><title>핫플레이스별 검색리스트</title></head>
      <body>
      <center>
      <br>
      <font size=5>★ $hotplace_name 검색 리스트★
      <br><br>
      <table width='1000' border='1'>
      <tr>
      <td width='10%' align='center'>ID</td>
      <td width='20%' align='center'>가게명</td>
      <td width='10%' align='center'>구</td>
      <td width='10%' align='center'>타입</td>
      <td width='10%' align='center'>별점</td>
      <td width='10%' align='center'>리뷰</td>
       </tr>
  ";

  echo "
      <html>
      <body>
      <center>
      <select id='sorting_type' name='sorting_type' onchange>
        <option value='0'>선택</option>
        <option value='1'>리뷰순</option>
        <option value='2'>별점순</option>
      </select></center></body></html>
      <br>
  ";
  $hotplace_name_query = "SELECT * FROM restaurant_info join restaurant ON restaurant.restaurant_id = restaurant_info.restaurant_id AND restaurant.hot_place = '$hotplace_name'";
  $hotplace_result = mysqli_query($conn, $hotplace_name_query);

  while($row = mysqli_fetch_array($hotplace_result))

    {

        echo("
        <tr>
        <td align='center'>$row[restaurant_id]</td>
        <td align='center'><a href='restaurant_detail_info.php?restaurant_id=".$row["restaurant_id"]."'>
        $row[restaurant_name]</td>
        <td align='center'>$row[gu]</td>
        <td align='center'>$row[restaurant_type]</td>
        <td align='center'>$row[restaurant_type]</td>
        </tr>
         ");

      }

?>