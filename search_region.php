<?
  include './dbconn.php';
  include 'homebutton.php'; // 홈 버튼

  // 선택된 구를 $gu_name 변수에 저장
  if (isset($_POST['gugu'])){
    $gu_name = $_POST['gugu'];
  }
 echo "<script src='//code.jquery.com/jquery.min.js'></script>";
 // 옵션이 바뀔 때마다, 다른 결과 리스트 출력하기 위한 함수
 echo "<script>
     function option_changed() {
         $.ajax({
             url: 'search_region_option.php',
             type: 'post',
             dataType:'html',
             data: {
               'gu' : $('#gugu').val(),
               'sorting_option' : $('#sorting_option').val(),
             }
         }).done(function(data) {
             $('#region_result').html(data);
         });
     }</script>
   ";
 // 선택한 구 이름에 맞게 제목 출력
  echo "
      <html>
      <head><title>지역검색리스트</title></head>
      <body>
      <center>
      <br>
      <font size=5>★$gu_name 검색 리스트★</font>
      <br><br>
  ";
  // hidden 속성을 사용하여, search_region_option.php 에 $gu_name값을 넘겨준다
  // 리뷰순, 별점순으로의 나열을 위해, select 태그 사용
  echo "
      <html>
      <body>
      <center>
      <input type = 'hidden' name='gugu' id = 'gugu' value ='$gu_name'>
      <select id='sorting_option' name='sorting_option' onchange='option_changed();'>
        <option value='0'>선택</option>
        <option value='1'>리뷰순</option>
        <option value='2'>별점순</option>
      </select>
      </center></body></html>

      <br>
  ";
  // 리스트 출력 부분
  echo "<p id='region_result'></p>";


?>
