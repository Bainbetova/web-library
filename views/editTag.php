<div id="editProduct">

   <h3>Изменение тега</h3>

    <form id="editTag_form">  

    <label for="ptag">Введите изначальный тег</label>
    <input type="text" id="ptag" value="<?php if (isset($_POST['tag'])) echo $_POST['tag']; ?>" required>

    <label for="etag">Введите изменненный тег</label>
    <input type="text" id="etag" value="<?php if (isset($_POST['etag'])) echo $_POST['etag']; ?>" required>

    <div id="clear">
    <input type="reset" value="Очистить">
    </div>

    <div id="add">
    <input type="submit" name="submit" value="Изменить">
    </div>

    </form>

</div>