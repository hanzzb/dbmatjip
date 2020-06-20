<?
  include './dbconn.php';
  include 'homebutton.php';

  if (isset($_POST['hothot'])){
    $hotplace_name = $_POST['hothot'];
 }
 echo "<script src='//code.jquery.com/jquery.min.js'></script>";
 echo "<script>
     function option_changed() {
         $.ajax({
             url: 'search_hotplace_option.php',
             type: 'post',
             dataType:'html',
             data: {
               'hotplace' : $('#hothothot').val(),
               'sorting_option' : $('#sorting_option').val(),
             }
         }).done(function(data) {
             $('#hotplace_result').html(data);
         });
     }</script>
   ";

  echo "
      <html>
      <head><title>핫플레이스별 검색리스트</title></head>
      <body>
      <center>
      <br>
      <font size=5>★ $hotplace_name 검색 리스트★</font>
      <br><br>
  ";

  echo "
      <html>
      <body>
      <center>
      <input type = 'hidden' name='hothothot' id = 'hothothot' value ='$hotplace_name'>
      <select id='sorting_option' name='sorting_option' onchange='option_changed();'>
        <option value='0'>선택</option>
        <option value='1'>리뷰순</option>
        <option value='2'>별점순</option>
      </select>
      </center></body></html>
      <br>
  ";
  echo "<p id='hotplace_result'></p>";

?>
