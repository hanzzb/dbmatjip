<?
  session_start();
  include './dbconn.php';

  session_start();
  if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

  }
  else {
    echo " again3~";
  }

  $new_pw = $_POST["user_pw"];
  //$review_word = $_POST["review"];



   $update_password_query = "UPDATE member SET email='$new_pw' where member_id = '$user_id'";
   mysqli_query($conn, $update_password_query);

   echo " <script>
      alert('수정 완료!');
      location.href='my_info.php';
    </script>";



?>
