<?
  session_start();
  include './dbconn.php';
  include 'homebutton.php'; // 홈 버튼
  $restaurant_id = $_GET["restaurant_id"];  // 검색 페이지에서 클릭한 가게 ID 값을 $restaurant_id 에 저장

  // 해당 가게에 대한 모든 정보를 불러오기 위해, 쿼리문에서 JOIN 사용
  $restaurant_id_query = "SELECT * FROM restaurant_info join restaurant ON restaurant.restaurant_id = restaurant_info.restaurant_id AND restaurant.restaurant_id='$restaurant_id'";
  $restaurant_id_result = mysqli_query($conn, $restaurant_id_query);
  $first_row = mysqli_fetch_array($restaurant_id_result);

  /*
   나만의 맛집 List에 추가하기, 친구에게 맛집 정보 공유하기 각각 hidden을 사용하여 $restaurant_id 값을 전달함
   해당 가게의 세부 정보를 출력
  */
  /*
    입력 창에 친구 아이디를 입력후 친구에게 공유하기 버튼을 눌러 맛집 정보를 메일로 전송함
  */
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
        <b>종류:</b> $first_row[restaurant_type]<br>
        <b>별점:</b> $first_row[star]<br>
        <b>리뷰:</b> $first_row[number_of_review]<br>
        </fieldset>
  ";
  /* rightFriend 함수
    친구의 아이디를 입력하지 않은 경우, alert 창을 통해 예외 메세지 출력
    입력이 된 경우, share.php로 submit
  */
  echo "<script>
  function rightFriend() {
    if (!document.share_restaurant.friend_id.value) {
      alert('공유할 친구 아이디가 입력되지 않았습니다. ');
      return;
    }
    else{
      document.share_restaurant.submit();
    }
  }</script>";
  /* checkReviewAndStar 함수
    cnt : 리뷰 글자수
    option : 선택된 별점의 option 값 (0인 경우에 별점이 선택되지 않음)
    별점과 리뷰 모두 작성하도록 함
    리뷰 작성시, 100글자를 넘어가지 않도록 함
  */
  echo "<script>
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

  // select 태그 이용하여, 별점 선택
  // 리뷰보기, 리뷰쓰기 버튼
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
