<center>
  <br>
  <h1>TV프로그램 방영 맛집</h1>
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
