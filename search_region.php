<?
  include './dbconn.php';
  include 'homebutton.php';

  if (isset($_POST['gugu'])){
    $gu_name = $_POST['gugu'];
  }
 echo "<script src='//code.jquery.com/jquery.min.js'></script>";
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

  echo "
      <html>
      <head><title>지역검색리스트</title></head>
      <body>
      <center>
      <br>
      <font size=5>★$gu_name 검색 리스트★</font>
      <br><br>
  ";

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

  echo "<p id='region_result'></p>";


?>
