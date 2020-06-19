<?
  include './dbconn.php';
  $restaurant_id = $_GET["restaurant_id"];

  $restaurant_id_query = "SELECT * FROM restaurant_info join restaurant ON restaurant.restaurant_id = restaurant_info.restaurant_id AND restaurant.restaurant_id='$restaurant_id'";
  $restaurant_id_result = mysqli_query($conn, $restaurant_id_query);
  $first_row = mysqli_fetch_array($restaurant_id_result);

  echo "
      <html>
      <head><title>가게 상세페이지</title></head>
      <body>
      <center>
      <br>
      <font size=5>★ $first_row[restaurant_name] 상세 페이지 ★
      <br><br>
      <fieldset style = 'width:500px'>
				<legend><b>정보</b></legend>
        <font size=4>
        <b>이름:</b> $first_row[restaurant_name]<br>
        <b>주소:</b> 서울특별시 $first_row[gu] $first_row[restaurant_address]<br>
        <b>타입:</b> $first_row[restaurant_type]<br>
        <b>핫플레이스:</b> $first_row[hot_place]<br>
        <b>별점:</b> $first_row[star]<br>
        <b>리뷰:</b> $first_row[number_of_review]<br>
  ";
?>
