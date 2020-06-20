<?
  include './dbconn.php';
  include 'homebutton.php';

  if (isset($_POST['type'])){
    $type_name = $_POST['type'];
  }
  echo "<script src='//code.jquery.com/jquery.min.js'></script>";
  echo "<script>
      function option_changed() {
          $.ajax({
              url: 'search_type_option.php',
              type: 'post',
              dataType:'html',
              data: {
                'type' : $('#typetype').val(),
                'sorting_option' : $('#sorting_option').val(),
              }
          }).done(function(data) {
              $('#type_result').html(data);
          });
      }</script>
    ";


  echo "
      <html>
      <head><title>타입검색리스트</title></head>
      <body>
      <center>
      <br>
      <font size=5> ★ $type_name 검색 리스트 ★</font>
      <br><br>
  ";
  echo "
      <html>
      <body>
      <center>
      <input type = 'hidden' name='typetype' id = 'typetype' value ='$type_name'>
      <select id='sorting_option' name='sorting_option' onchange='option_changed();'>

        <option value='0'>선택</option>
        <option value='1'>리뷰순</option>
        <option value='2'>별점순</option>
      </select>
      </center></body></html>

      <br>
  ";
  echo "<p id='type_result'></p>";



?>
