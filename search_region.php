<?
  include './dbconn.php';


  if (isset($_POST['gugu'])){
    $gu_name = $_POST['gugu'];
 }

  $gu_name_query = "Select * from restaurant where gu = '$gu_name'";
  $region_result = mysqli_query($conn, $gu_name_query);


  echo "
      <html>
      <head><title>지역검색리스트</title></head>
      <body>
      <center>
      <br>
      <font size=5>★$gu_name 검색 리스트★
      <br><br>
      <table width='1000' border='1'>
      <tr>
      <td width='10%' align='center'>ID</td>
      <td width='20%' align='center'>가게명</td>
      <td width='10%' align='center'>타입</td>
      <td width='20%' align='center'>핫플레이스</td>
       </tr>
  ";
  echo "
      <html>
      <body>
      <center>
      <select id='sorting_gu' name='sorting_gu' >
        <option value='0'>선택</option>
        <option value='1'>리뷰순</option>
        <option value='2'>별점순</option>
      </select></center></body></html>
      <br>
  ";
  while($row = mysqli_fetch_array($region_result))

    {
        echo("
        <tr>

        <td align='center'>$row[restaurant_id]</td>
        <td align='center'><a href='restaurant_detail_info.php?restaurant_id=".$row["restaurant_id"]."'>
        $row[restaurant_name]</td>
        <td align='center'>$row[restaurant_type]</td>
        <td align='center'>$row[hot_place]</td>

        </tr>
         ");

      }

?>