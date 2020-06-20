<?
  session_start();
  include './dbconn.php';
  $review_restaurant_id = $_POST["restaurant_id_review"];

  if (!isset($_SESSION['user_id'])){
    echo "<script>
    alert('로그인을 해야 사용 가능합니다!');
    location.href='restaurant_detail_info.php?restaurant_id=$review_restaurant_id';
    </script>";
  }
  else{
    $review_word = $_POST["review"];
    $review_star = $_POST["starstar"];

     $write_review_query = "INSERT INTO `review_list`(`restaurant_id`, `member_id`, `review`) VALUES ('{$review_restaurant_id}','{$_SESSION["user_id"]}', '{$review_word}')";
     mysqli_query($conn, $write_review_query);

     $review_num_query = "SELECT * FROM restaurant_info where restaurant_id = '$review_restaurant_id'";
     $review_num_table = mysqli_query($conn, $review_num_query);
     $row = mysqli_fetch_row($review_num_table);
     // 리뷰수 갱신
     $row[2] = $row[2]+1;
     // 별점 갱신
     $row[3] +=($review_star-1);
     $row[3]= $row[3]/2;


     $star_num_query = "UPDATE restaurant_info SET number_of_review = '$row[2]', star='$row[3]' where restaurant_id = '$review_restaurant_id'";
     mysqli_query($conn, $star_num_query);
     echo "<script>alert('리뷰작성완료!');
     location.href='./main.php';</script>";
  }



?>
