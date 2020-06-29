<?
  include './dbconn.php';

  $type_name = $_POST['type'];          // 선택된 종류
  $option = $_POST['sorting_option'];   // 선택된 옵션 (별점순 or 리뷰순)

  if($option == '0'){ // '선택'을 고른 경우, restaurant_id 순서대로 출력
    $type_name_query = "SELECT * FROM restaurant_info join restaurant ON restaurant.restaurant_id = restaurant_info.restaurant_id AND restaurant.restaurant_type = '$type_name'";
  }
  if($option=='1')   // 리뷰순이 선택된 경우, 쿼리문에 order by 사용
  {
    $type_name_query = "SELECT * FROM restaurant_info join restaurant ON restaurant.restaurant_id = restaurant_info.restaurant_id AND restaurant.restaurant_type = '$type_name' ORDER BY number_of_review desc";
  }

  if($option=='2')  // 별점순이 선택된 경우, 쿼리문에 order by 사용
  {
    $type_name_query = "SELECT * FROM restaurant_info join restaurant ON restaurant.restaurant_id = restaurant_info.restaurant_id AND restaurant.restaurant_type = '$type_name' ORDER BY star desc";
  }

  $type_result = mysqli_query($conn, $type_name_query);
  $num = mysqli_num_rows($type_result);
  // 검색 결과가 없는 경우, 예외 메세지를 출력
  if(!$num)
  {
    echo "<h3>검색 결과가 없습니다. <br> 빠른 시일내에 업데이트 하겠습니다.<h3>";
  }
  // 검색 결과가 있는 경우
  else{
    echo "
    <table width='700' border='1'>
    <tr>
    <td width='20%' align='center'>가게명</td>
    <td width='10%' align='center'>구</td>
    <td width='10%' align='center'>별점</td>
    <td width='5%' align='center'>리뷰수</td>
    </tr>";

    // 정렬된 결과를 출력
    // restaurant_name을 클릭하면, 상세정보 페이지로 이동
    while($row = mysqli_fetch_array($type_result)){
        echo "
            <html>
            <body>
            <center>
            <tr>
            <td align='center'><a href='restaurant_detail_info.php?restaurant_id=".$row["restaurant_id"]."'>$row[restaurant_name]</td>
            <td align='center'>$row[gu]</td>
            <td align='center'>$row[star]</td>
            <td align='center'>$row[number_of_review]</td>
            </tr></center></body></html>
          ";
      }
  }

?>
