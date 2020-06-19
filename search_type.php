<?
  include './dbconn.php';

  if (isset($_POST['type'])){
    $type_name = $_POST['type'];
 }

  $type_name_query = "Select * from restaurant where restaurant_type = '$type_name'";
  $type_result = mysqli_query($conn, $type_name_query);

  echo "
      <html>
      <head><title>타입검색리스트</title></head>
      <body>
      <center>
      <br>
      <font size=5> ★ $type_name 검색 리스트 ★
      <br><br>
      <table width='1000' border='1'>
      <tr>
      <td width='10%' align='center'>ID</td>
      <td width='20%' align='center'>가게명</td>
      <td width='10%' align='center'>구</td>
      <td width='20%' align='center'>핫플레이스</td>
       </tr>
  ";
  echo "
      <html>
      <body>
      <center>
      <select id='sorting_type' name='sorting_type' >
        <option value='0'>선택</option>
        <option value='1'>리뷰순</option>
        <option value='2'>별점순</option>
      </select></center></body></html>
      <br>
  ";
  while($row = mysqli_fetch_array($type_result))

    {
      echo "
          <html>
          <body>
          <center>
          <tr>
          <td align='center'>$row[restaurant_id]</td>
          <td align='center'>
          <a href='restaurant_detail_info.php?restaurant_id=".$row["restaurant_id"]."'>
          $row[restaurant_name]</td>
          <td align='center'>$row[gu]</td>
          <td align='center'>$row[hot_place]</td>
          </tr>
      ";
      }

?>
