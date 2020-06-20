<?
  session_start();
  include './dbconn.php';
  $restaurant_id = $_GET["restaurant_id"];

  $restaurant_id_query = "SELECT * FROM restaurant_info join restaurant ON restaurant.restaurant_id = restaurant_info.restaurant_id AND restaurant.restaurant_id='$restaurant_id'";
  $restaurant_id_result = mysqli_query($conn, $restaurant_id_query);
  $first_row = mysqli_fetch_array($restaurant_id_result);

  echo "
      <html>
      <head><title>가게 상세페이지</title></head>
      <body>
      <center>
      <br>
      <font size=5>★ $first_row[restaurant_name] 상세 페이지 ★
      <br><br>
      <form action='add_mylist.php' name='add_mylist_button' method='post'>
      <input type = 'hidden' name='add_restaurant_id' value ='$restaurant_id'>
      <input type = 'submit' value ='나만의 맛집 List에 추가하기'></form>

      <form action='share.php' name='share_restaurant' method='post'>
      <input type = 'hidden' name='idid' value ='$restaurant_id'>
      <input type='text' size='35' name='friend_id' placeholder='친구 아이디를 입력하세요.'>
      <input type = 'button' value ='친구에게 공유하기' onClick='rightFriend()'></form></td></h3>

      <fieldset style = 'width:500px'>
				<legend><b>정보</b></legend>
        <font size=4>
        <b>이름:</b> $first_row[restaurant_name]<br>
        <b>주소:</b> 서울특별시 $first_row[gu] $first_row[restaurant_address]<br>
        <b>타입:</b> $first_row[restaurant_type]<br>
        <b>별점:</b> $first_row[star]<br>
        <b>리뷰:</b> $first_row[number_of_review]<br>
        </fieldset>
  ";

  echo "<script>

  function rightFriend() {
    if (!document.share_restaurant.friend_id.value) {
      alert('공유할 친구 아이디가 입력되지 않았습니다. ');
      return;
    }

    else{
      document.share_restaurant.submit();
    }
  }

  function checkReviewAndStar(){
    var cnt = document.write_review.review.value.length;
    var option = document.write_review.starstar.value;

    if(option==0){
      alert('별점을 선택해주세요!');
    }
    else if(cnt>=100){
      alert('100글자 이상은 불가합니다!');
    }
    else if(cnt==0){
      alert('리뷰를 작성해주세요!');
    }
    else{
      document.write_review.submit();
    }
  }

  </script>";
  echo "
      <html>
      <body>
      <br>
      <form action='writeReview.php' name='write_review' method='post'>
      <input type = 'hidden' name='restaurant_id_review' value ='$restaurant_id'>
      <fieldset style = 'width:500px'>
      <legend><b>리뷰 및 별점</b></legend>
      <font size=3>별점 : </font>
      <select name='starstar'>
        <option value='0'>선택</option>
        <option value='1'>0</option>
        <option value='2'>1</option>
        <option value='3'>2</option>
        <option value='4'>3</option>
        <option value='5'>4</option>
        <option value='6'>5</option>
      </select>
      <br><br>
      <textarea rows = '4' cols = '50' name='review' maxlength ='100'></textarea><br>

      <input type='button' value='리뷰쓰기' OnClick='checkReviewAndStar();'>
      </fieldset>
      </form>


      <form action='showReview.php' name='read_review' method='post'>
      <input type = 'hidden' name='restaurant_id_review' value ='$restaurant_id'>
      <input type = 'submit' value ='리뷰보기' /></form>
      </body>
  ";


?>
