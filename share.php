
<?
  include './dbconn.php';

  $friend_id = $_POST['friend_id'];
  $restaurant_id = $_POST["idid"];

  $query = "Select * from member where member_id = '$friend_id'";
  $result = mysqli_query($conn, $query);
  $num = mysqli_num_rows($result);


  if($num)
  {

    $row = mysqli_fetch_array($result);

    $query2="SELECT * from restaurant where restaurant_id ='$restaurant_id'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($result2);



    echo "

    <center>
    <br>
    <a href='https://mail.google.com/mail/?view=cm&fs=1&to=$row[2]&su=[밥은 먹고 다니지?]친구야 나랑 같이 맛집가자~&body=$row2[1] 어때? 아래 링크로 들어가서 확인해봐! %0D%0Ahttp://localhost/project/restaurant_detail_info.php?restaurant_id=$restaurant_id'
    onclick= 'plz()' target='_blank' >메일 보내기</a>
    </center>

    ";

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
    echo "
    <script>
      alert('해당 친구는 회원이 아닙니다!');
      location.href='restaurant_detail_info.php';
    </script>
    ";
  }

?>
