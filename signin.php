<?
  session_start();
  include './dbconn.php';
  include 'homebutton.php';

  $signin_id = $_POST['login_id'];
  $signin_pw = $_POST['login_pw'];

  $signin_query = "Select * from member where member_id = '$signin_id' AND member_pw = '$signin_pw'";
  $signin_result = mysqli_query($conn, $signin_query);
  $num = mysqli_num_rows($signin_result);

  if (!$num) {
    echo "<script>
      alert('회원이 아닙니다!');
      location.href='./signin_form.php';
    </script>";
}  else {
    $_SESSION['user_id'] = $signin_id;
?>
    <script>
      alert('로그인 완료!');
      location.href='./main.php';
    </script>
<?
  }
?>
