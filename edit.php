<? include_once '../models/model.php'; ?>
<?php 
    if(isset($_POST['id'])) { $id = $_POST['id']; }
    if (isset($_POST['image'])) { $image = $_POST['image']; }
    if (isset($_POST['author'])) { $author = $_POST['author']; }
    if (isset($_POST['title'])) { $title = $_POST['title']; }
    if (isset($_POST['category'])) { $category = $_POST['category']; }
    if (isset($_POST['count'])) { $count = $_POST['count']; }
    if (isset($_POST['description'])) { $description = $_POST['description']; }

    $r = $_POST['id'];
    if (isset($image) && isset($author) && isset($title) && isset($category) && isset($count) && isset($description)) {
        if (empty($image) || empty($author) || empty($title) || empty($category) || empty($count) || empty($description)) { 
            echo "<p style=\"color: red; font-size: 14pt;\">Заполните пустые поля!</p>"; 
            exit; 
        }
        if (strlen($title) > 128) { 
            echo "<p style=\"color: red; font-size: 14pt;\">Название киниг не должно превышать 128 символов!</p>"; 
            exit; 
        }
        if (strlen($author) > 64) { 
            echo "<p style=\"color: red; font-size: 14pt;\">Длина фамлий и имен авторов не должна превышать 64 символа.</p>"; 
            exit; 
        }
        if (strlen($image) > 64) { 
            echo "<p style=\"color: red; font-size: 14pt;\">Название изображения товара не должно превышать 64 символов!</p>"; 
            exit; 
        }
        $i = "inf"; $p = "prib"; $e = "elec"; $m = "tm"; $c = "chim"; $ek = "ekon"; $mg = "mng";
        if (strcmp("$category", $i) != 0 && strcmp("$category", $p) != 0 && strcmp("$category", $e) != 0 && strcmp("$category", $m) != 0 && strcmp("$category", $c) != 0 && strcmp("$category", $ek) != 0 && strcmp("$category", $mg) != 0) { 
            echo "<p style=\"color: red; font-size: 14pt;\">Введена неверная категория!</p>"; 
            exit;
        }
        if (strlen($count) > 11) { 
            echo "<p style=\"color: red; font-size: 14pt;\">Количество должно состоять не более чем из 11 цифр!</p>"; 
            exit; 
        }
    
        edit_book($image, $author, $title, $category, $count, $description, $r);
        /*$dsn = 'mysql:host=localhost;dbname=Library;charset=utf8';
        $db = new PDO($dsn, 'Student', '2017');
        $sql = $db->prepare("UPDATE books 
                                SET image='$image', author='$author', title='$title', category='$category', count='$count', description='$description' 
                                WHERE id = $r");
        $sql->execute();
        
        if ($db->query($sql) === TRUE) {
            echo "<p style=\"color: #293499; font-size: 14pt;\">Книга изменена.";
        } else {
            echo "Ошибка: ".$db->error;
        }*/
    }
?>

<? include '../views/edit.php';?>