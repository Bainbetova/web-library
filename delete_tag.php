<?php  include '../models/model_tag.php'; ?>
<?php
    if (isset($_POST['tag'])) { $tag = $_POST['tag']; }

    if (isset($tag)) {
        if (empty($tag)) { 
            echo "<p style=\"color: red; font-size: 14pt;\">Заполните поле.</p>"; 
            exit; 
        }
        if (strlen($tag) > 30) { 
            echo "<p style=\"color: red; font-size: 14pt;\">Длина тега не должна превышать 30 символов.</p>"; 
            exit; 
        }
        delete_tag($tag);
    }
?>
<?php include '../views/deleteTag.php'; ?>