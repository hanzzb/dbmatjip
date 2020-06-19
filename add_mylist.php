<?
  session_start();
  include './dbconn.php';

  $add_restaurant_id = $_POST["add_restaurant_id"];

  if (!isset($_SESSION['user_id'])){
    echo "<script>
    alert('로그인을 해야 사용 가능합니다!');
    location.href='restaurant_detail_info.php?restaurant_id=$add_restaurant_id';
    </script>";
  }
  else{
    $mylist_query = "INSERT INTO `mylist`(`member_id`, `restaurant_id`) VALUES ('{$_SESSION["user_id"]}','{$add_restaurant_id}')";
       mysqli_query($conn, $mylist_query);

       echo "<script>alert('추가되었습니다!');
       location.href='./main.php';</script>";
  }


?>
