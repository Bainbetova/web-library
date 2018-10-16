<?  include '../js/newtag.js'; ?>

<div id="newTag">

   <h3>Добавление тега</h3>

    <form id="newTag_form" method="POST">  

    <label for="ptag">Введите слово</label>
    <input type="text" id="ptag" value="<?php if (isset($_POST['tag'])) echo $_POST['tag']; ?>" required>

    <div id="clear">
    <input type="reset" value="Очистить">
    </div>

    <div id="add">
    <input type="submit" value="Добавить">
    </div>

    </form>

</div>