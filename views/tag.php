<br><a href="javascript:void(0)" id="newstag" style="color: blue; font-size: 14pt; margin-left: 3%">Добавить тег</a><br><br>
<a href="javascript:void(0)" id="deletetag" style="color: blue; font-size: 14pt; margin-left: 3%">Удалить тег</a><br><br>
<a href="javascript:void(0)" id="listtag" style="color: blue; font-size: 14pt; margin-left: 3%">Просмотреть список тегов</a><br>

<script>   
  $('#newstag').click(function() {
    $.ajax({
      type: "GET",
      url: "controllers/new_tag.php",
      success: function(data) {
        $("#main").html(data);
      }
    });
  });   
  $('#edittag').click(function() {
    $.ajax({
      type: "GET",
      url: "edit_tag.php",
      success: function(data) {
        $("#main").html(data);
      }
    });
  });   
  $('#deletetag').click(function() {
    $.ajax({
      type: "GET",
      url: "delete_tag.php",
      success: function(data) {
        $("#main").html(data);
      }
    });
  });
  $('#listtag').click(function() {
    $.ajax({
      type: "GET",
      url: "list_tag.php",
      success: function(data) {
        $("#main").html(data);
      }
    });
  });
</script>
