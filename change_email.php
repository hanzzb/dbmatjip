<?
  session_start();
  include './dbconn.php';

  session_start();
  if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
  }
  else {
    echo " 다시 시도해주세요!";
  }

/*
  user_email => 이메일에서 @앞부분(사용자 직접입력)
  emadress => 이메일에서 @ 뒷부분(select box에서 선택)
  따로 전송받은 데이터들을 new_email에 합쳐서 온전한 형태의 이메일주소를 만듬
*/
  $new_email = $_POST['user_email'].'@'.$_POST['emadress'];

//온전한 형태의 이메일 주소(varchar형태)로 회원정보를 수정하는 쿼리문
  $update_email_query = "UPDATE member SET email='$new_email' where member_id = '$user_id'";
  mysqli_query($conn, $update_email_query);

  echo " <script>
      alert('이메일 수정 완료!');
      location.href='my_info.php';
    </script>";

?>
