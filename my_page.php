<?
    include './dbconn.php';
    include 'homebutton.php';

    //뒤로가기 눌렀을 때 페이지가 뜨지 않는 오류 해결
    header('Cache-Control:no cache');
    session_cache_limiter('private_no_expire');

    //user_id를 사용하기 위한 session
    session_start();
?>

<center>
<?
  if(isset($_SESSION['user_id']))
  {
      echo "<h2>{$_SESSION['user_id']} 님의 마이페이지</h2>";
  }
  else
  {
    /*
    로그인 하지 않으면 마이페이지를 사용할 수 없다.
    로그인하라는 메세지와 함께 로그인 창으로 이동하게 한다.
    */
    echo " <script>
       alert('로그인하세요!');
       location.href='signin_form.php';
     </script>";
  }
?>

    <br><br><br>
    <!-- 마이페이지 기능에 포함되는 버튼들 -->
    <form action='my_list.php' name='show_list_button' method='post'>
    <input type = "submit" value ="나만의 맛집 리스트"></form>
    <br>
    <form action='my_info.php' name='change_info_button' method='post'>
    <input type = "submit" value ="정보 수정"></form>

</center>
