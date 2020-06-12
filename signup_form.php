<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>회원가입 폼</title>
  </head>
  <script>
    function signup_checkform() {
      if (!document.signup_form.user_id.value) {
        alert('아이디가 입력되지 않았습니다. ');
        document.signup.user_id.focus();
        return;
      }
      else if (!document.signup_form.user_pw.value) {
        alert('비밀번호가 입력되지 않았습니다. ');
        document.signup.user_password.focus();
        return;
      }
      else if(!document.signup_form.user_email.value){
        alert('이메일이 입력되지 않았습니다. ');
        return;
      }
      else{
        document.signup_form.submit();
      }
    }
    </script>
  <body><br><br>
    <form name ="signup_form" action='signup.php' method="post">
    <CENTER>
      <h1>회원가입</h1>
			<fieldset>
				<legend><b>입력사항</b></legend>
					<table>
						<tr>
							<td>아이디</td><br>
							<td><input type="text" size="35" name="user_id" placeholder="아이디"></td>
						</tr>
						<tr>
							<td>비밀번호</td>
							<td><input type="password" size="35" name="user_pw" placeholder="비밀번호"></td>
						</tr>
            <tr>
							<td>이메일</td>
							<td><input type="text" name="user_email">@<select name="emadress">
              <option value="naver.com">naver.com</option>
              <option value="nate.com">nate.com</option>
							<option value="hanmail.com">hanmail.com</option></select></td>
						</tr>
					</table>

				<br><input type="button" value="가입하기" OnClick="signup_checkform();">

		</fieldset>
    </form>
  </body>
</html>
