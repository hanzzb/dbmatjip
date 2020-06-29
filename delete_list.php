<?
  session_start();
  include './dbconn.php';

  //my_list에서 받아온 삭제하고자 하는 맛집의 id
  $restaurant_id = $_POST["delete_list"];

  //맛집 리스트에서 해당 맛집을 삭제하는 쿼리문
  $query_plz = "DELETE FROM mylist WHERE restaurant_id=$restaurant_id && member_id='{$_SESSION["user_id"]}'";
  mysqli_query($conn, $query_plz);

//삭제가 잘 되었는지 바로 확인할 수 있도록 location으로 my_list.php를 지정함
  echo " <script>
      alert('삭제 완료!');
      location.href='my_list.php';
    </script>";

?>
