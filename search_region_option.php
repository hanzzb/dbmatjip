<?
  include './dbconn.php';

  $gu_name = $_POST['gu'];
  $option = $_POST['sorting_option'];

  if($option == '0'){
    $gu_name_query = "SELECT * FROM restaurant_info join restaurant ON restaurant.restaurant_id = restaurant_info.restaurant_id AND restaurant.gu = '$gu_name'";
  }

  if($option=='1')
  {
    $gu_name_query = "SELECT * FROM restaurant_info join restaurant ON restaurant.restaurant_id = restaurant_info.restaurant_id AND restaurant.gu = '$gu_name' ORDER BY number_of_review desc";
  }

  if($option=='2')
  {
    $gu_name_query = "SELECT * FROM restaurant_info join restaurant ON restaurant.restaurant_id = restaurant_info.restaurant_id AND restaurant.gu = '$gu_name' ORDER BY star desc";
  }

  $region_result = mysqli_query($conn, $gu_name_query);

  echo "
  <table width='500' border='1'>
  <tr>
  <td width='20%' align='center'>가게명</td>
  <td width='10%' align='center'>별점</td>
  <td width='5%' align='center'>리뷰수</td>
  </tr>
  ";
  while($row = mysqli_fetch_array($region_result))
    {
        echo("
        <tr>
        <td align='center'><a href='restaurant_detail_info.php?restaurant_id=".$row["restaurant_id"]."'>
        $row[restaurant_name]</td>
        <td align='center'>$row[star]</td>
        <td align='center'>$row[number_of_review]</td>
        </tr>
         ");

      }


?>
