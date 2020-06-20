<?
  include './dbconn.php';
  include 'homebutton.php';

  $signup_id = $_POST['user_id'];
  $signup_pwd = $_POST['user_pw'];
  $signup_email = $_POST['user_email'].'@'.$_POST['emadress'];

  $query = "Select * from member where member_id = '$signup_id'";
  $result = mysqli_query($conn, $query);
  $num = mysqli_num_rows($result);

  if (!$num) {
    $query2 = "INSERT INTO member VALUES ('$signup_id', '$signup_pwd','$signup_email')";
    mysqli_query($conn, $query2);
    echo "<script>alert('회원 가입 완료!');
    location.href='./main.php'
    </script>";
  } else {
?>
    <script>
      alert('해당 아이디가 존재합니다!');
      location.href='signup_form.php';
    </script>
<?
  }
?>
