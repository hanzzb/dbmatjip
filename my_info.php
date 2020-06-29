<?

  include './dbconn.php';
  include 'homebutton.php';

  //뒤로가기 눌렀을 때 페이지가 뜨지 않는 오류 해결
  header('Cache-Control:no cache');
  session_cache_limiter('private_no_expire');

  session_start();
  if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
  }
  else {
    echo " 다시 시도해주세요!";
  }

  //회원의 정보를 가져오기 위한 쿼리문
  $query = "SELECT * from member
            WHERE member_id = '$user_id'";

  $result=mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);


/*
  현재 회원의 정보를 출력하고 비밀번호와 이메일을 수정할 수 있도록 함
  onClick시 각각의 함수를 통해 공백인지 아닌지 검사하도록 함
*/
  echo "
  <center>
  <br>
  <h1>현재 정보</h1>
  </center>
  <br><br><br>
  <center>
    <h3>아이디 : $row[member_id]</h3>

    <h3>비밀번호 : $row[member_pw]
    <form action='change_pw.php' name='change_password' method='post'>
    <input type = 'hidden' name='change_pw' value ='$user_id'>
    <input type='password' size='35' name='user_pw' placeholder='비밀번호'>
    <input type = 'button' value ='수정' onClick='rightPassword()'></form></td></h3>

    <h3>메일주소 : $row[email]
    <form action='change_email.php' name='change_email' method='post'>
    <input type = 'hidden' name='change_email' value ='$user_id'>
    <input type='text' name='user_email'>@<select name='emadress'>
    <option value='naver.com'>naver.com</option>
    <option value='nate.com'>nate.com</option>
    <option value='gmail.com'>gmail.com</option>
    <option value='sejong.ac.kr'>sejong.ac.kr</option>
    <option value='hanmail.com'>hanmail.com</option></select>
    <input type = 'button' value ='수정' onClick='rightEmail()'></form></td></h3>
  </center>

  ";

//수정 버튼이 눌렸을 때 입력 칸이 공백인지 아닌지 검사하는 함수들
  echo "<script>
  function rightPassword() {
    if (!document.change_password.user_pw.value) {
      alert('비밀번호가 입력되지 않았습니다. ');
      return;
    }

    else{
      document.change_password.submit();
    }
  }


  function rightEmail() {
    if (!document.change_email.user_email.value) {
      alert('이메일이 입력되지 않았습니다. ');
      return;
    }

    else{
      document.change_email.submit();
    }
  }


  </script>";



?>
