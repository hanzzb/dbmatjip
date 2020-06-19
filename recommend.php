<center>
<br><br><br>


<select id="select_age" name="age" >
  <option value="선택1">선택</option>
  <option value="20">20대</option>
  <option value="30">30대</option>
  <option value="40">40대이상</option>
</select>

<select id="select_price" name="price" >
  <option value="선택2">선택</option>
  <option value="1-2만원대">1-2만원대</option>
  <option value="2-3만원대">2-3만원대</option>
  <option value="3-4만원대">3-4만원대</option>
  <option value="4만원이상">4만원이상</option>
</select>

<select id="select_mood" name="mood" >
  <option value="선택3">선택</option>
  <option value="데이트">데이트</option>
  <option value="회식">회식</option>
  <option value="가족모임">가족모임</option>
  <option value="이국적">이국적</option>
  <option value="캐주얼한">캐주얼한</option>
  <option value="고급스러운">고급스러운</option>
</select>
<button onclick="reco()">찾아주세요!</button>

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
