<?
  session_start();
  include './dbconn.php';

  if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
  }
  else {
    echo " 다시 시도해주세요!";
  }

  //my_page에서 전송받은 새로운 비밀번호
  $new_pw = $_POST["user_pw"];

  //새로운 비밀번호로 변경하는 쿼리문
  $update_password_query = "UPDATE member SET member_pw='$new_pw' where member_id = '$user_id'";
  mysqli_query($conn, $update_password_query);

  echo " <script>
      alert('수정 완료!');
      location.href='main.php';
    </script>";



?>
