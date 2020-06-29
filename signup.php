<?
  include './dbconn.php';

  $signup_id = $_POST['user_id'];                                   // 회원 아이디
  $signup_pwd = $_POST['user_pw'];                                  // 회원 비밀번호
  $signup_email = $_POST['user_email'].'@'.$_POST['emadress'];      // 회원 이메일

  $query = "Select * from member where member_id = '$signup_id'";
  $result = mysqli_query($conn, $query);
  $num = mysqli_num_rows($result);

// 입력한 아이디와 동일한 아이디가 member 테이블에 없는 경우
  if (!$num) {
    $query2 = "INSERT INTO member VALUES ('$signup_id', '$signup_pwd','$signup_email')";
    mysqli_query($conn, $query2);
    echo "<script>alert('회원 가입 완료!');
    location.href='./main.php'
    </script>";
  }
  // 동일한 아이디를 가진 회원이 이미 있는 경우
  else {
?>
    <script>
      alert('해당 아이디가 존재합니다!');  // alert 창을 통한 예외 메세지 출력
      location.href='signup_form.php';  // 로그인 페이지로 다시 돌아가기
    </script>
<?
  }
?>
