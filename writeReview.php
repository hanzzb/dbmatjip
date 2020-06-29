<?
  session_start();
  include './dbconn.php';
  include 'homebutton.php';
  $review_restaurant_id = $_POST["restaurant_id_review"];

  // 로그인이 되어있지 않은 경우, 가게 상세 페이지로 되돌아감
  if (!isset($_SESSION['user_id'])){
    echo "<script>
    alert('로그인을 해야 사용 가능합니다!');
    location.href='restaurant_detail_info.php?restaurant_id=$review_restaurant_id';
    </script>";
  }
  // 로그인이 되어있는 경우
  else{
    $review_word = $_POST["review"];    // 리뷰 text
    $review_star = $_POST["starstar"];  // 별점 옵션
    $review_star = $review_star -1;     // 실제 별점 (옵션 -1)

    // 리뷰 내용을 review_list에 insert
    // review_id 는 Auto-Increment 이므로, 따로 필트들을 작성해줌
     $write_review_query = "INSERT INTO `review_list`(`restaurant_id`, `member_id`, `review`) VALUES ('{$review_restaurant_id}','{$_SESSION["user_id"]}', '{$review_word}')";
     mysqli_query($conn, $write_review_query);

     $review_num_query = "SELECT * FROM restaurant_info where restaurant_id = '$review_restaurant_id'";
     $review_num_table = mysqli_query($conn, $review_num_query);
     $row = mysqli_fetch_row($review_num_table);
     // $row[2] : 리뷰 갯수
     // 리뷰 갯수 1 추가
     $row[2] = $row[2]+1;
     // 별점 평균내기 (소수점 첫번째자리까지 반올림)
     $row[3] +=($review_star);
     $row[3]= round($row[3]/2,1);

     // 해당 가게의 별점과 리뷰 수를 갱신하기 위해 UPDATE 문 작성
     $star_num_query = "UPDATE restaurant_info SET number_of_review = '$row[2]', star='$row[3]' where restaurant_id = '$review_restaurant_id'";
     mysqli_query($conn, $star_num_query);
     echo "<script>alert('리뷰작성완료!');
     location.href='restaurant_detail_info.php?restaurant_id=$review_restaurant_id';
       </script>";
  }



?>
