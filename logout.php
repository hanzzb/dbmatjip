<?

/*
  프로젝트 내에서 로그인의 상태는 현재 회원 id가 존재하는가, 존재하지 않는가로 결정한다.
  로그아웃 상태를 만들기 위해 session을 destroy해서 회원 id가 더이상 사용되지 않게함
  다른 곳에서 session이 사용중이더라도 현재 php에서 session이 start되지 않으면 destroy할 수 없어서
  session_start()를 함께 사용했다.
*/
session_start();
session_destroy();

//로그아웃 후 메인페이지 갱신을 위해 location으로 main.php 지정함
echo " <script>
   alert('로그아웃 되었습니다');
   location.href='main.php';
 </script>";
?>
