<?
  session_start();
  include './dbconn.php';

  $add_restaurant_id = $_POST["add_restaurant_id"]; // 나만의 맛집 List에 추가할 가게의 ID

  // 로그인을 하지 않은 경우, 추가하기 버튼을 누르기 전 가게의 상세페이지로 이동
  if (!isset($_SESSION['user_id'])){
    echo "<script>
    alert('로그인을 해야 사용 가능합니다!');
    location.href='restaurant_detail_info.php?restaurant_id=$add_restaurant_id';
    </script>";
  }
  // 로그인을 한 경우
  else{
    $user_id = $_SESSION['user_id'];

    $mylist_check = "Select * from mylist where restaurant_id = '$add_restaurant_id' AND member_id ='$user_id'";
    $mylist_check_result = mysqli_query($conn, $mylist_check);
    $num = mysqli_num_rows($mylist_check_result);

    // 이미 추가되어 있는 가게인 경우
    // alert 창으로 예외메세지 출력 후, 가게의 상세페이지로 되돌아가기
    if ($num) {
      echo "<script>
        alert('이미 추가 되어있습니다!');
        location.href='restaurant_detail_info.php?restaurant_id=$add_restaurant_id';
      </script>";
      }
    // 추가되지 않은 가게인 경우, mylist에 insert
    // mylist_id 는 Auto-Increment 이므로, 따로 필트들을 작성해줌
    else{
      $mylist_query = "INSERT INTO `mylist`(`member_id`, `restaurant_id`) VALUES ('{$_SESSION["user_id"]}','{$add_restaurant_id}')";
         mysqli_query($conn, $mylist_query);

         echo "<script>alert('추가되었습니다!');
         location.href='./main.php';</script>";
    }


  }


?>
