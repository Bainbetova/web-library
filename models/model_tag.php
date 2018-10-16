<?php

    /* Функция для удаления тега */
    function delete_tag($tag) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        //$sql = "SELECT * FROM tags WHERE tag = '$tag'"; // проверяем есть ли введенный тег в БД
        $link = mysqli_connect("localhost", "Student", "2017", "library");
        $query = "SELECT * FROM tags WHERE tag = '$tag'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $row = mysqli_fetch_assoc($result);
        $t = $row['tag'];
        if ($t != '') { // если такой тег нашелся
            $tsql = "DELETE FROM tags WHERE tag = '$t'"; // удаляем введенный тег из БД
            if (mysqli_query($link, $tsql) === TRUE) {
                echo "<p style=\"color: #293499; font-size: 14pt;\">Тег удален.";
            } else {
                echo "<p style=\"color: #293499; font-size: 14pt;\">Ошибка: ".$conn->error;        
            }
        } else {
            echo "<p style=\"color: #293499; font-size: 14pt;\">Ошибка, такого тега нет в базе данных";        
        }
        mysqli_free_result($result);
    }
    
    /* */
    function tag_link($tag) {
        $tag_link = mysqli_connect("localhost", "Student", "2017", "library");
        $query = "SELECT * FROM tags WHERE tag = '$tag'";
        $result = mysqli_query($tag_link, $query) or die(mysqli_error($tag_link));
       return $result;
    }

    /* Функция для прикрепления введенного тега к выбранной книге */
    function edit_relation_tag_and_book($tag, $id_r, $id_from_tags) {
        $query = "SELECT * FROM tags WHERE tag = '$tag'";
        if (empty($query) !== true) {
            $tag_link = mysqli_connect("localhost", "Student", "2017", "library");
            $sql = "INSERT INTO rbt (id_book, id_tag) VALUES ('$id_r', '$id_from_tags')"; // как вставить найденный выше id            
            if (mysqli_query($tag_link, $sql) === TRUE) {
                echo "Изменения применены.";               
            } else {
                echo "Ошибка: ".mysqli_error($tag_link);
            }
        }
    }
?>