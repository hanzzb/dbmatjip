
<select id="select1" name="please" onchange="showMe()">
  <option value="0">선택</option>
  <option value="1">맛있는 녀석들</option>
  <option value="2">수요미식회</option>
  <option value="3">백종원의 골목식당</option>

</select>

<p id="result"></p>
<script src="//code.jquery.com/jquery.min.js"></script>
<script>

    function showMe() {
        $.ajax({
            url: "tv_matjib_result.php",
            type: "get",
            data: {
                select1: $('#select1').val(),
            }
        }).done(function(data) {
            $('#result').text(data);
        });
    }

</script>
