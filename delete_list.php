<?
  session_start();
  include './dbconn.php';

  $restaurant_id = $_POST["aa"];

   $query_plz = "DELETE FROM mylist WHERE restaurant_id=$restaurant_id && member_id='{$_SESSION["user_id"]}'";
   mysqli_query($conn, $query_plz);

   echo " <script>
      alert('삭제 완료!');
      location.href='my_list.php';
    </script>";

?>
