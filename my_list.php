<?

include './dbconn.php';
include 'homebutton.php';
header('Cache-Control:no cache');
session_cache_limiter('private_no_expire');

session_start();
if (isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
}
else {
  echo " 다시 시도해주세요!";
}


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
  echo("
  <tr>
  <td align = 'center'><a href='restaurant_detail_info.php?restaurant_id=".$row["restaurant_id"]."'>$row[restaurant_name]</td>
  <td align = 'center'>$row[gu]</td>
  <td align = 'center'>$row[restaurant_type]</td>
  <td align = 'center'>$row[star]</td>
  <td align = 'center'>
  <form action='delete_list.php' name='delete_button' method='post'>
  <input type = 'hidden' name='aa' value ='$row[restaurant_id]'>
  <input type = 'submit' value ='삭제'></form></td>
  </tr>

  ");

}

?>

<script type="text/javascript"></script>
<script>

//<td align = 'center'><input type='button' id=$row[restaurant_id] onclick='button_click(this.id);' value='삭제' /></td>

function button_click(id){
  alert('삭제~');


  <?

    include './dbconn.php';
    $id = $_GET['id'];
    echo "$id";
    //$query_plz = "DELETE FROM mylist WHERE restaurant_id='$id' && member_id='jione'";
    //echo "$query_plz";
    //mysqli_query($conn, $query_plz);


  ?>
}
</script>
