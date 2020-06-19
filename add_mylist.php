<?
  session_start();
  include './dbconn.php';

  $add_restaurant_id = $_POST["add_restaurant_id"];

   $mylist_query = "INSERT INTO `mylist`(`member_id`, `restaurant_id`) VALUES ('{$_SESSION["user_id"]}','{$add_restaurant_id}')";
   mysqli_query($conn, $mylist_query);

   echo "<script>alert('추가되었습니다!');
   location.href='./main.php';</script>"
?>
