<?
  include './dbconn.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>타입별 검색 폼</title>

  </head>
  <body><br><br>
    <CENTER>
    <h1>타입별 검색</h1><br>
    <form name = search_type_form.php action="search_type.php" method="post">

      <fieldset style = "width:500px">

     <p><label>
       <input name="type" type="radio" value ="한식"checked />
       <span>한식</span>&emsp;
       <input name="type" type="radio" value ="중식" />
       <span>중식</span>&emsp;
       <input name="type" type="radio" value ="양식" />
       <span>양식</span>&emsp;
       <input name="type" type="radio" value ="일식" />
       <span>일식</span>&emsp;
     </label></p>

     <p><label>
       <input name="type" type="radio" value ="치킨" />
       <span>치킨</span>&emsp;
       <input name="type" type="radio" value ="패스트푸드" />
       <span>패스트푸드</span>&emsp;
       <input name="type" type="radio" value ="디저트카페" />
       <span>디저트카페</span>&emsp;
     </label></p>


   </fieldset>
   <br><input type = "submit" value ="검색">
 </form>




  </body>
</html>
