<?  include '../js/new.js'; ?>

<div id="newProduct">

   <h3>Добавление книги</h3>

    <form id="newProduct_form">  

    <label for="pimage">Название изображения книги</label>
    <input type="text" id="pimage" value="<?php if (isset($_POST['image'])) echo $_POST['image']; ?>" required>

    <label for="pauthor">Автор книги</label>
    <input type="text" id="pauthor" value="<?php if (isset($_POST['author'])) echo $_POST['author']; ?>" required>

    <label for="ptitle">Название книги</label>
    <input type="text" id="ptitle" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>" required>

    <label for="pcategory">Категория</label>
    <input type="text" id="pcategory" value="<?php if (isset($_POST['category'])) echo $_POST['category']; ?>" required>

    <label for="pcount">Количество на складе</label>
    <input type="text" id="pcount" value="<?php if (isset($_POST['count'])) echo $_POST['count']; ?>" required>

    <label for="pdescription">Описание</label>
    <input type="text" id="pdescription" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>" required>

    <div id="clear">
    <input type="reset" value="Очистить">
    </div>

    <div id="add">
    <input type="submit" value="Добавить книгу">
    </div>

    </form>

</div>