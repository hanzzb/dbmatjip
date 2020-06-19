<?

  include './dbconn.php';
  session_start();
  if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
  }
  else {
    echo " again3~";
  }
  $query = "SELECT * from member
            WHERE member_id = '$user_id'";

  $result=mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

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
    <option value='hanmail.com'>hanmail.com</option></select>
    <input type = 'button' value ='수정' onClick='rightEmail()'></form></td></h3>
  </center>

  ";

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
