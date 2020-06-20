<?
session_start();
include 'homebutton.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <center>
      <br>
        <img src="logo.png" width="240" height="180">
    <br><br>
    <?
	   if(isset($_SESSION['user_id'])){
		     echo "<h2>{$_SESSION['user_id']} 님 환영합니다.</h2>";
      }
	  ?>
  </center>
  <center>
      <br><br><br>

      <?
      if(!isset($_SESSION['user_id'])){
        echo "
        <form action='signup_form.php' name='sign_up_button' method='post'>
        <input type = 'submit' value ='회원가입'></form>

        <form action='signin_form.php' name='sign_in_button' method='post'>
        <input type = 'submit' value ='로그인'></form>
        ";
      }
      ?>



      <?
      if(isset($_SESSION['user_id'])){
        echo "
        <form action='logout.php' name='logout_button' method='post'>
        <input type = 'submit' value ='로그아웃'></form>
        ";
      }
      ?>

      <form action='my_page.php' name='my_page_button' method='post'>
      <input type = "submit" value ="마이페이지"></form>


    </center>

    <center>
      <br><br><br>
      <form action='search_form.php' name='search_form_button' method='post'>
      <input type = "submit" value ="검색"></form>

      <form action='tv_matjib.php' name='tv_matjib_button' method='post'>
      <input type = "submit" value ="TV 맛집"></form>

      <form action='recommend.php' name='recommend_button' method='post'>
      <input type = "submit" value ="맛집 추천"></form>

    </center>
  </body>
</html>
