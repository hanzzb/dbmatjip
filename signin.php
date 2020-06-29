<?
  session_start(); // session 시작
  include './dbconn.php';

  $signin_id = $_POST['login_id'];  // 로그인 시, 입력된 아이디
  $signin_pw = $_POST['login_pw'];  // 로그인 시, 입력된 비밀번호

  $signin_query = "Select * from member where member_id = '$signin_id' AND member_pw = '$signin_pw'";
  $signin_result = mysqli_query($conn, $signin_query);
  $num = mysqli_num_rows($signin_result);

  // 해당 아이디와 비밀번호와 일치하는 정보가 없는 경우
  // alert 창을 통해 예외 메세지 출력하고 로그인 창으로 다시 돌아감
  if (!$num) {
    echo "<script>
      alert('회원이 아닙니다!');
      location.href='./signin_form.php';
    </script>";
  }
  // 아이디와 비밀번호가 제대로 입력된 경우
  else {
    $_SESSION['user_id'] = $signin_id;  // session 변수 설정
?>
    <script>
      alert('로그인 완료!');
      location.href='./main.php'; // 메인페이지로 이동
    </script>
<?
  }
?>
