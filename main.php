<?
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <center>
        <img src="logo.png" width="200" height="150">
    </center>
    <br><br>
    <?
	   if(isset($_SESSION['id'])){
		     echo "<h2>{$_SESSION['id']} 님 환영합니다.</h2>";
      }
	  ?>
    <center>
      <br><br><br>
      <form action='signup_form.php' name='sign_up_button' method='post'>
      <input type = "submit" value ="회원가입">
      </form>

      <form action='signin_form.php' name='sign_in_button' method='post'>
      <input type = "submit" value ="로그인">
      </form>

    </center>

    <center>
      <br><br><br>
      <form action='search_form.php' name='search_form_button' method='post'>
      <input type = "submit" value ="검색"></form>
      <input type="button" name="tv_matjib_button" value="tv맛집" onclick="alert('맛집~')">
      <input type="button" name="recommend_form_button" value="맛집 추천" onclick="alert('추천~')">

    </center>
  </body>
</html>
