<?php   include '../js/relation.js';  ?>

<br>
<div id="relation">
      
    <h3>Добавить тег</h3>

    <form id="relation_form">  

        <label for="pid"></label>
        <input type="text" id="pid" value="<?php if (isset($_POST['id'])) echo $_POST['id']; ?>" required>

        <label for="ptag">Введите тег</label>
        <input type="text" id="ptag" value="<?php if (isset($_POST['tag'])) echo $_POST['tag']; ?>" required>

        <div id="clear">
        <input type="reset" value="Очистить">
        </div>

        <div id="add">
        <input type="submit" value="Привязать тег">
        </div>

    </form>
      
</div>