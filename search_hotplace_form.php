<?
  include './dbconn.php';
  include 'homebutton.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>핫플레이스별 검색 폼</title>

  </head>
  <body><br><br>
    <CENTER>
    <h1>핫플레이스별 검색</h1><br>
    <form name = search_hotplace_form.php action="search_hotplace.php" method="post">

      <fieldset style = "width:700px">

     <p><label>
       <input name="hothot" type="radio" value ="가로수길"checked />
       <span>가로수길</span>&emsp;
       <input name="hothot" type="radio" value ="가산디지털단지" />
       <span>가산디지털단지</span>&emsp;
       <input name="hothot" type="radio" value ="강남역" />
       <span>강남역</span>&emsp;
       <input name="hothot" type="radio" value ="건대입구" />
       <span>건대입구</span>&emsp;
     </label></p>

     <p><label>
       <input name="hothot" type="radio" value ="고속터미널" />
       <span>고속터미널</span>&emsp;
       <input name="hothot" type="radio" value ="광화문" />
       <span>광화문</span>&emsp;
       <input name="hothot" type="radio" value ="구로디지털단지" />
       <span>구로디지털단지</span>&emsp;
       <input name="hothot" type="radio" value ="노량진" />
       <span>노량진</span>&emsp;
     </label></p>

     <p><label>
       <input name="hothot" type="radio" value ="동대문" />
       <span>동대문</span>&emsp;
       <input name="hothot" type="radio" value ="로데오거리" />
       <span>로데오거리</span>&emsp;
       <input name="hothot" type="radio" value ="방이 먹자거리" />
       <span>방이 먹자거리</span>&emsp;
       <input name="hothot" type="radio" value ="서래마을" />
       <span>서래마을</span>&emsp;
     </label></p>

     <p><label>
       <input name="hothot" type="radio" value ="서울대입구" />
       <span>서울대입구</span>&emsp;
       <input name="hothot" type="radio" value ="성수역" />
       <span>성수역</span>&emsp;
       <input name="hothot" type="radio" value ="신촌" />
       <span>신촌</span>&emsp;
       <input name="hothot" type="radio" value ="압구정로데오" />
       <span>압구정로데오</span>&emsp;
       <input name="hothot" type="radio" value ="여의도" />
       <span>여의도</span>&emsp;
     </label></p>

     <p><label>
       <input name="hothot" type="radio" value ="이태원" />
       <span>이태원</span>&emsp;
       <input name="hothot" type="radio" value ="인사동" />
       <span>인사동</span>&emsp;
       <input name="hothot" type="radio" value ="영등포" />
       <span>영등포</span>&emsp;
       <input name="hothot" type="radio" value ="잠실" />
       <span>잠실</span>&emsp;
       <input name="hothot" type="radio" value ="천호" />
       <span>천호</span>&emsp;
       <input name="hothot" type="radio" value ="코엑스" />
       <span>코엑스</span>&emsp;
       <input name="hothot" type="radio" value ="홍대" />
       <span>홍대</span>
     </label></p>


   </fieldset>
   <br><input type = "submit" value ="검색">
 </form>




  </body>
</html>
