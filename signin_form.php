<?
include 'homebutton.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>로그인 폼</title>
  </head>
  <script>
    function signin_checkform() {
      if (!document.signin_form.login_id.value) {
        alert('아이디가 입력되지 않았습니다.');
        document.signin_form.login_id.focus();
        return;
      }
      else if (!document.signin_form.login_pw.value) {
        alert('비밀번호가 입력되지 않았습니다.');
        document.signin_form.login_pw.focus();
        return;
      }
      document.signin_form.submit();
    }
    </script>
  <body><br><br>
    <form name ="signin_form" action='signin.php' method="post">
      <center><h1>로그인</h1></center>
      <br><br>
				<table align="center" border="0" cellspacing="0" width="400">
        			<tr>
                <td width ="130" align="center">
                  아이디
                </td>
            			<td width="130" colspan="1">
                		<input type="text" name="login_id">
            		</td>
            		<td rowspan="2" align="center" width="200" >
                		<button type="button" name="button_signin" OnClick ="signin_checkform();">
                      로그인</button>
            		</td>
        		</tr>
        		<tr>
              <td width ="130" align="center">
                비밀번호
              </td>
            		<td width="130" colspan="1">
               	<input type="password" name="login_pw">
            	</td>
        	</tr>
        	<tr>
           		<td colspan="3" align="center">
              	<br><br><a href="signup_form.php">회원가입 하시겠습니까?</a>
           </td>
        </tr>
    </table>
    </form>
  </body>
</html>
