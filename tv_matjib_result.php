<?php
$svrname = "mysql:host=localhost;port=3306;dbname=matjib;charset=utf8"; //dbname: matjipdb
$username = "matjibdb"; // root
$password = "0000";

  $select1 = $_GET['select1'];

try {
  $conn = new PDO("$svrname", $username, $password);

  $conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $keyword = "%TEST%";
  $no = 1;
  $tv = array('백종원의 골목식당', '수요미식회', '맛있는 녀석들');

  if($select1==1)
  {
    $query = "SELECT restaurant.restaurant_name, restaurant.gu, restaurant.restaurant_type, restaurant_info.star from broadcasting_restaurant
              LEFT JOIN restaurant ON restaurant.restaurant_id = broadcasting_restaurant.restaurant_id
              LEFT JOIN restaurant_info ON broadcasting_restaurant.restaurant_id = restaurant_info.restaurant_id WHERE program = '맛있는녀석들'";
  }
  if($select1==2)
  {
    $query = "SELECT restaurant.restaurant_name, restaurant.gu, restaurant.restaurant_type, restaurant_info.star from broadcasting_restaurant
              LEFT JOIN restaurant ON restaurant.restaurant_id = broadcasting_restaurant.restaurant_id
              LEFT JOIN restaurant_info ON broadcasting_restaurant.restaurant_id = restaurant_info.restaurant_id WHERE program = '수요미식회'";
  }
  if($select1==3)
  {
    $query = "SELECT restaurant.restaurant_name, restaurant.gu, restaurant.restaurant_type, restaurant_info.star from broadcasting_restaurant
              LEFT JOIN restaurant ON restaurant.restaurant_id = broadcasting_restaurant.restaurant_id
              LEFT JOIN restaurant_info ON broadcasting_restaurant.restaurant_id = restaurant_info.restaurant_id WHERE program = '백종원의골목식당'";
  }


  $stmt = $conn->prepare($query);
  $stmt->execute(array($keyword, $no));
  $result = $stmt->fetchAll(PDO::FETCH_NUM);




  for($i = 0; $i < count($result); $i++) {
    printf ("가게이름:%s //////  지역:%s //////  종류:%s /////////// 별점:%.1f ",$result[$i][0],  $result[$i][1], $result[$i][2], $result[$i][3]);
  }

}
catch (PDOException $e)
{
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;




// if($select1==1)
// {
//   for($i = 0; $i < count($result); $i++) {
//     printf ("tv:%s 가게이름:%s 주소:%s 평점:%.1f 리뷰수:%d ",$result[$i][0],  $result[$i][2], $result[$i][3], $result[$i][4], $result[$i][5]);
//   }
// }

?>
