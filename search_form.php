<?
include 'homebutton.php'; // 홈 버튼
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>검색 폼</title>
  </head>
  <body><br><br>
    <CENTER>
      <h1>검색</h1>
      <!-- 지역별 검색 버튼 -->
      <form action='search_region_form.php' name='search_region_form_button' method='post'>
      <input type = "submit" value ="지역별 검색"></form>
      <!-- 종류별 검색 버튼 -->
      <form action='search_type_form.php' name='search_type_form_button' method='post'>
      <input type = "submit" value ="종류별 검색"></form>
      <!-- 핫플레이스별 검색 버튼 -->
      <form action='search_hotplace_form.php' name='search_hotplace_button' method='post'>
      <input type = "submit" value ="핫플레이스별 검색">
      </form>

  </body>
</html>
