
<?
  include './dbconn.php';
  include 'homebutton.php';

  $friend_id = $_POST['friend_id']; //사용자가 입력한 친구 id
  $restaurant_id = $_POST["idid"];

//사용자가 입력한 친구 id가 회원 목록에 있는지 찾기위한 쿼리문
  $query = "Select * from member where member_id = '$friend_id'";
  $result = mysqli_query($conn, $query);

//결과의 개수를 num에 저장. id는 중복이 되지 않기 때문에 num 값은 0 or 1이 된다.
  $num = mysqli_num_rows($result);

//num이 1의 값을 가지는 경우 => 사용자가 입력한 친구 id가 회원 목록에 있는 경우
  if($num)
  {

    $row = mysqli_fetch_array($result);
  //가게 정보를 출력하기 위한 쿼리문
    $query2="SELECT * from restaurant
            LEFT JOIN restaurant_info ON restaurant.restaurant_id = restaurant_info.restaurant_id
            WHERE restaurant.restaurant_id ='$restaurant_id'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($result2);

    /*
      메일 보내기 클릭시 메일 창으로 이동
      맛집 이름과 정보를 메일에 작성
    */
    echo "

    <center>
    <br>

    <a href='https://mail.google.com/mail/?view=cm&fs=1&to=$row[2]&su=[밥은 먹고 다니지?]친구야 나랑 같이 맛집가자~&body=$row2[1] 어때? %0D%0A%0D%0A-----------정보-----------%0D%0A주소 : $row2[2] $row2[6] %0D%0A종류 : $row2[3] %0D%0A별점 : $row2[8]%0D%0A--------------------------'
    onclick= 'plz()' target='_blank' >메일 보내기</a>

    </center>

    ";

/*
사용자가 입력한 친구 아이디가 존재할 경우 실행되는 함수
*/
    echo "
    <script>
    function plz()
    {
      alert('메일창으로 이동합니다');
      location.href='restaurant_detail_info.php?restaurant_id=$restaurant_id';
    }
    </script>
    ";
  }

  else
  {
/*
  사용자가 입력한 친구 아이디가 회원이 아닐경우 메세지 출력 후 상세 페이지로 돌아감
  restaurant_id값을 넘겨주지 않으면 빈 페이지가 나타나기 때문에 해당 레스토랑 id 값을 넘겨줘야 함
*/
    echo "
    <script>
      alert('해당 친구는 회원이 아닙니다!');
      location.href='restaurant_detail_info.php?restaurant_id=$restaurant_id';
    </script>
    ";
  }

?>
