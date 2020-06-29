<!--
추천 페이지
사용자로부터 나이, 가격대, 분위기를 입력받아 이에 맞는 맛집을 추천해주는 페이지
-->

<?
include 'homebutton.php';
?>


<center>
<br><br>
<h2>사용자 맞춤 맛집 추천</h2>
<br>
<select id="select_age" name="age" >
  <option value="선택1">나이</option>
  <option value="20">20대</option>
  <option value="30">30대</option>
  <option value="40">40대이상</option>
</select>

<select id="select_price" name="price" >
  <option value="선택2">가격대</option>
  <option value="1-2만원대">1-2만원대</option>
  <option value="2-3만원대">2-3만원대</option>
  <option value="3-4만원대">3-4만원대</option>
  <option value="4만원대이상">4만원대이상</option>
</select>

<select id="select_mood" name="mood" >
  <option value="선택3">분위기</option>
  <option value="데이트">데이트</option>
  <option value="회식">회식</option>
  <option value="가족모임">가족모임</option>
  <option value="이국적">이국적</option>
  <option value="캐주얼한">캐주얼한</option>
  <option value="고급스러운">고급스러운</option>
</select>
<!-- 버튼 클릭 시 reco함수를 호출해 결과값을 출력하도록 함-->
<button onclick="reco()">찾아주세요!</button>

<!--
한 페이지 내에서 변경사항이 발생할 때마다 같은 페이지에서 계속해서 결과를 갱신할 수 있도록 함
select box의 값을 php로 전달해 변수에 값을 넣는것이 불가능하여 ajax를 이용해 구현함
-->
<center>
  <p id="result"></p>
  <script src="//code.jquery.com/jquery.min.js"></script>
  <script>

      function reco() {
        $.ajax({
            url: "recommend_result.php",
            type: "get",
            dataType: "html",
            data: {
                select_age: $('#select_age').val(),
                select_price: $('#select_price').val(),
                select_mood: $('#select_mood').val(),
            }
        }).done(function(data) {
            $('#result').html(data);
        });
      }


  </script>
