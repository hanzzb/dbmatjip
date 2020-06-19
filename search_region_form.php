<?
  include './dbconn.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>지역별 검색 폼</title>

  </head>
  <body><br><br>
    <CENTER>
    <h1>지역별 검색</h1><br>
    <form name = search_region_form.php action="search_region.php" method="post">

      <fieldset style = "width:500px">

     <p><label>
       <input name="gugu" type="radio" value ="강남구"checked />
       <span>강남구</span>&emsp;
       <input name="gugu" type="radio" value ="강동구" />
       <span>강동구</span>&emsp;
       <input name="gugu" type="radio" value ="강북구" />
       <span>강북구</span>&emsp;
       <input name="gugu" type="radio" value ="강서구" />
       <span>강서구</span>&emsp;
       <input name="gugu" type="radio" value ="관악구" />
       <span>관악구</span>
     </label></p>

     <p><label>
       <input name="gugu" type="radio" value ="광진구" />
       <span>광진구</span>&emsp;
       <input name="gugu" type="radio" value ="구로구" />
       <span>구로구</span>&emsp;
       <input name="gugu" type="radio" value ="금천구" />
       <span>금천구</span>&emsp;
       <input name="gugu" type="radio" value ="노원구" />
       <span>노원구</span>&emsp;
       <input name="gugu" type="radio" value ="도봉구" />
       <span>도봉구</span>
     </label></p>

     <p><label>
       <input name="gugu" type="radio" value ="동대문구" />
       <span>동대문구</span>&emsp;
       <input name="gugu" type="radio" value ="동작구" />
       <span>동작구</span>&emsp;
       <input name="gugu" type="radio" value ="마포구" />
       <span>마포구</span>&emsp;
       <input name="gugu" type="radio" value ="서대문구" />
       <span>서대문구</span>&emsp;
       <input name="gugu" type="radio" value ="서초구" />
       <span>서초구</span>
     </label></p>

     <p><label>
       <input name="gugu" type="radio" value ="성동구" />
       <span>성동구</span>&emsp;
       <input name="gugu" type="radio" value ="성북구" />
       <span>성북구</span>&emsp;
       <input name="gugu" type="radio" value ="송파구" />
       <span>송파구</span>&emsp;
       <input name="gugu" type="radio" value ="양천구" />
       <span>양천구</span>&emsp;
       <input name="gugu" type="radio" value ="영등포구" />
       <span>영등포구</span>
     </label></p>


     <p><label>
       <input name="gugu" type="radio" value ="용산구" />
       <span>용산구</span>&emsp;
       <input name="gugu" type="radio" value ="은평구" />
       <span>은평구</span>&emsp;
       <input name="gugu" type="radio" value ="종로구" />
       <span>종로구</span>&emsp;
       <input name="gugu" type="radio" value ="중구" />
       <span>중구</span>&emsp;
       <input name="gugu" type="radio" value ="중랑구" />
       <span>중랑구</span>
     </label></p>


   </fieldset>
   <br><input type = "submit" value ="검색">
 </form>




  </body>
</html>
