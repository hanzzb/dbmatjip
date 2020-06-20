<?
  session_start();
  include './dbconn.php';

  if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
  }
  else {
    echo " 다시 시도해주세요!";
  }

  $new_pw = $_POST["user_pw"];


   $update_password_query = "UPDATE member SET member_pw='$new_pw' where member_id = '$user_id'";
   mysqli_query($conn, $update_password_query);

   echo " <script>
      alert('수정 완료!');
      location.href='main.php';
    </script>";



?>
