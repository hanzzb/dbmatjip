<?
    include './dbconn.php';
    include 'homebutton.php';
    header('Cache-Control:no cache');
    session_cache_limiter('private_no_expire');

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
    echo " <script>
       alert('로그인하세요!');
       location.href='signin_form.php';
     </script>";
  }
?>

    <br><br><br>
    <form action='my_list.php' name='show_list_button' method='post'>
    <input type = "submit" value ="나만의 맛집 리스트"></form>

    <form action='my_info.php' name='change_info_button' method='post'>
    <input type = "submit" value ="정보 수정"></form>

</center>
