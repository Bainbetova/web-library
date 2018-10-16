<? include '../models/model_tag.php'; 
   require '../controllers/setup.php'; ?>
<?php 
    if (isset($_POST['tag'])) { $tag = $_POST['tag']; }
    $id_r = $_POST['id'];
    if (isset($tag)) {
        if (empty($tag)) { 
            echo "<p style=\"color: red; font-size: 13pt;\">Заполните пустые поля!</p>"; 
            exit; 
        }
        if (strlen($tag) > 30) { 
            echo "<p style=\"color: red; font-size: 13pt;\">Тег не должен превышать 30 символов!</p>"; 
            exit; 
        }        	
        
        //var_dump($id_r);
        $result = tag_link($tag);
        $row = mysqli_fetch_assoc($result);
        $id_from_tags = $row['id'];
        /*$tsql = "UPDATE rbt SET FOREIGN_KEY_CHECKS = 0";
        $conn->query($tsql);*/
        //if (empty($query) !== true) { // если такой тег нашелся
        //var_dump($id_from_tags);
        edit_relation_tag_and_book($tag, $id_r, $id_from_tags);
            
        //}
        /*$msql = "UPDATE rbt SET FOREIGN_KEY_CHECKS = 1";
        $conn->query($msql);*/
        mysqli_free_result($result);
    }
?>

<? include '../views/relation.php'; ?>