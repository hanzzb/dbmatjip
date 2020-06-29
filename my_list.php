<?
include './dbconn.php';
include 'homebutton.php';

//뒤로가기 눌렀을 때 페이지가 뜨지 않는 오류 해결
header('Cache-Control:no cache');
session_cache_limiter('private_no_expire');

session_start();

//쿼리문 작성시 필요한 user_id
if (isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
}
else {
  echo " 다시 시도해주세요!";
}

//사용자가 저장한 맛집들의 정보를 출력하기 위한 쿼리문
$query = "SELECT * from mylist
          LEFT JOIN restaurant ON restaurant.restaurant_id = mylist.restaurant_id
          LEFT JOIN restaurant_info ON restaurant_info.restaurant_id = mylist.restaurant_id WHERE mylist.member_id = '$user_id'";

$result=mysqli_query($conn, $query);

echo "
<center>
<br>
<h1>나만의 맛집 리스트</h1>
</center>
<br><br><br>
<center>
    <table width='1000' border='1'>
    <tr>
    <td width='20%' align='center'>가게명</td>
    <td width='10%' align='center'>지역</td>
    <td width='10%' align='center'>종류</td>
    <td width='10%' align='center'>별점</td>
    <td width='10%' align='center'>리스트에서 삭제</td>
     </tr>

</center>

";

while($row = mysqli_fetch_array($result))
{
  //맛집 정보를 한줄씩 출력하고 맛집 하나하나마다 삭제 버튼 넣기
  echo("
  <tr>
  <td align = 'center'><a href='restaurant_detail_info.php?restaurant_id=".$row["restaurant_id"]."'>$row[restaurant_name]</td>
  <td align = 'center'>$row[gu]</td>
  <td align = 'center'>$row[restaurant_type]</td>
  <td align = 'center'>$row[star]</td>
  <td align = 'center'>
  <form action='delete_list.php' name='delete_button' method='post'>
  <input type = 'hidden' name='delete_list' value ='$row[restaurant_id]'>
  <input type = 'submit' value ='삭제'></form></td>
  </tr>

  ");

}

?>

<script type="text/javascript"></script>

<script>
function button_click(id){
  alert('삭제~');
}
</script>
