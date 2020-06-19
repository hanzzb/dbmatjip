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

  $new_email = $_POST['user_email'].'@'.$_POST['emadress'];


   $update_email_query = "UPDATE member SET email='$new_email' where member_id = '$user_id'";
   mysqli_query($conn, $update_email_query);

   echo " <script>
      alert('이메일 수정 완료!');
      location.href='my_info.php';
    </script>";



?>
