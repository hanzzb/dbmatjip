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
    <script>
      function button_clicked(){
        <?
        $gu_name = $_POST['login_id'];

        // $query = "Select * from member where restaurant = '$gu_name'";
        // $result = mysqli_query($conn, $query);
        // $num = mysqli_num_rows($result);
        // if ($num==0) {
        //   echo "검색 결과가 없습니다!";
        // } else {
        //
        // }
      ?>
      }
    </script>
    <h1>지역별 검색</h1><br>
    <form action = "search_region_form.php" name = "gu_form" method = "post">
            <fieldset style = "width:100px">
                <legend><h3>구</h3></legend>
                <center>
                <input type="submit" name="gangnam_button" value="강남구">
                <input type="submit" name="gangdong_button" value="강동구" >
                <input type="submit" name="gangbook_button" value="강북구">
                <input type="submit" name="gangseo_button" value="강서구"><br>
                <input type="submit" name="gwanak_button" value="관악구" >
                <input type="submit" name="gwangjin_button" value="광진구">
                <input type="submit" name="guro_button" value="구로구">
                <input type="submit" name="geumcheon_button" value="금천구" ><br>
                <input type="submit" name="nowon_button" value="노원구">
                <input type="submit" name="dobong_button" value="도봉구">
                <input type="submit" name="dongdaemun_button" value="동대문구">
                <input type="submit" name="dongjak_button" value="동작구"><br>
                <input type="submit" name="mapo_button" value="마포구">
                <input type="submit" name="seodaemun_button" value="서대문구">
                <input type="submit" name="seocho_button" value="서초구">
                <input type="submit" name="seongdong_button" value="성동구"><br>
                <input type="submit" name="seongbuk_button" value="성북구">
                <input type="submit" name="songpa_button" value="송파구">
                <input type="submit" name="yangcheon_button" value="양천구">
                <input type="submit" name="yeongdeungpo_button" value="영등포구"><br>
                <input type="submit" name="yongsan_button" value="용산구">
                <input type="submit" name="eunpyeong_button" value="은평구">
                <input type="submit" name="jonglo_button" value="종로구">
                <input type="submit" name="jung_button" value="중구">
                <input type="submit" name="junglang_button" value="중랑구"><br>
              </center>
            </fieldset>
    </form>
  </body>
</html>
