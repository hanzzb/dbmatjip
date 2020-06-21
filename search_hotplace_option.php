
<?
  include './dbconn.php';

  $hotplace_name = $_POST['hotplace'];
  $option = $_POST['sorting_option'];

  if($option == '0'){
    $hotplace_name_query = "SELECT * FROM restaurant_info join restaurant ON restaurant.restaurant_id = restaurant_info.restaurant_id AND restaurant.hot_place = '$hotplace_name'";
  }
  if($option=='1')
  {
    $hotplace_name_query = "SELECT * FROM restaurant_info join restaurant ON restaurant.restaurant_id = restaurant_info.restaurant_id AND restaurant.hot_place = '$hotplace_name' ORDER BY number_of_review desc";
  }

  if($option=='2'){
    $hotplace_name_query = "SELECT * FROM restaurant_info join restaurant ON restaurant.restaurant_id = restaurant_info.restaurant_id AND restaurant.hot_place = '$hotplace_name' ORDER BY star desc";
  }

  $type_result = mysqli_query($conn, $hotplace_name_query);
  $num = mysqli_num_rows($type_result);
  if(!$num)
  {
    echo "<h3>검색 결과가 없습니다. <br> 빠른 시일내에 업데이트 하겠습니다.<h3>";
  }
  else {
    echo "
    <table width='700' border='1'>
    <tr>
    <td width='20%' align='center'>가게명</td>
    <td width='10%' align='center'>종류</td>
    <td width='10%' align='center'>별점</td>
    <td width='5%' align='center'>리뷰수</td>
    </tr>";

    $hotplace_result = mysqli_query($conn, $hotplace_name_query);

    while($row = mysqli_fetch_array($hotplace_result)){
        echo "
            <html>
            <body>
            <center>
            <tr>
            <td align='center'><a href='restaurant_detail_info.php?restaurant_id=".$row["restaurant_id"]."'>$row[restaurant_name]</td>
            <td align='center'>$row[restaurant_type]</td>
            <td align='center'>$row[star]</td>
            <td align='center'>$row[number_of_review]</td>
            </tr></center></body></html>
          ";
      }
  }

?>
