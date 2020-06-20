<?
  include './dbconn.php';
  include 'homebutton.php';

  $review_restaurant_id = $_POST["restaurant_id_review"];

  $read_review_query = "SELECT * FROM review_list where restaurant_id = '$review_restaurant_id'";
  $review_result = mysqli_query($conn, $read_review_query);

  echo "
      <html>
      <body>
      <center>
      <br>
      <font size=5> ★ 리뷰 ★
      <br><br>
      <table width='700' border='1'>
      <tr>
      <td width='20%' align='center'>ID</td>
      <td width='80%' align='center'>리뷰</td>
       </tr>
  ";

  while($row = mysqli_fetch_array($review_result))
    {
      echo "
          <html>
          <body>
          <center>
          <tr>
          <td align='center'>$row[member_id]</td>
          <td align='center'>$row[review]</td>
          </tr>
      ";
      }

?>
