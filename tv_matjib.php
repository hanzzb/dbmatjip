<?
include 'homebutton.php';
?>
<center>
  <br>
  <h1>TV프로그램 방영 맛집</h1>

<!-- 사용자의 선택이 바뀔때마다 결과목록을 갱신해주기 위해 onchange에 showMe함수 지정 -->
<select id="program" name="please" onchange="showMe()">
  <option value="0">선택</option>
  <option value="맛있는 녀석들">맛있는 녀석들</option>
  <option value="수요미식회">수요미식회</option>
  <option value="백종원의 골목식당">백종원의 골목식당</option>
</select>

<p id="result"></p>
</center>
<script src="//code.jquery.com/jquery.min.js"></script>
<script>
    /*
      위 select box에서 선택된 항목의 value값을 form 사용 없이 tv_matjib_result.php로 보내는 것이 불가능해 ajax를 사용하여 구현함
    */
    function showMe() {
        $.ajax({
            url: "tv_matjib_result.php",
            type: "get",
            dataType:"html",
            data: {
                program: $('#program').val(),
            }
        }).done(function(data) {
            $('#result').html(data);
        });
    }

</script>
