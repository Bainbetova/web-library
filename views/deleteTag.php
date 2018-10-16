<?  include '../js/delete_tag.js'; ?>

<div id="newTag">

<h3>Удаление тега</h3>

 <form id="deleteTag_form" method="POST">  

 <label for="ptag">Введите тег, который желаете удалить</label>
 <input type="text" id="ptag" value="<?php if (isset($_POST['tag'])) echo $_POST['tag']; ?>" required>

 <div id="clear">
 <input type="reset" value="Очистить">
 </div>

 <div id="add">
 <input type="submit" value="Удалить">
 </div>

 </form>

</div>