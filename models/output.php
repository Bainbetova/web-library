<?php
    /* Функция для вывода всех книг из определенной категории */
    function category($category) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $stmt = $conn->query("SELECT * FROM books WHERE category = '$category'");
        return $stmt;
    }

    /* Производит запрос, в котором возвращает id_tag для принятого в параметре id_book */
    function prepare_bt($idBook) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $bt = $conn->query("SELECT id_tag FROM rbt WHERE id_book = '$idBook'");
        return $bt;
    }

    /* Функция для вывода тегов */
    function output_tags($idBookTag) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $tg = $conn->query("SELECT * FROM tags WHERE id = '$idBookTag'");
        return $tg;
    }

    /* Функция для вывода всех пользователей с ролью «заведующий библиотекой» */
    function view_chief() {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $rbk = $conn->query("SELECT * FROM users WHERE is_owner = 2");
        return $rbk;
    }

    /* Функция для вывода всех пользователей с ролью «библиотекарь» */
    function view_admin() {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $rek = $conn->query("SELECT * FROM users WHERE is_owner = 1");
        return $rek;
    }

    /* Функция для вывода всех пользователей с ролью «читатель» */
    function view_user() {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $rk = $conn->query("SELECT * FROM users WHERE is_owner = 0");
        return $rk;
    }

    /* возвращает книгу с принятым id */
    function get_details($get) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $stmt = $conn->query("SELECT * FROM books WHERE id = '$get'");
        return $stmt;
    }

    /* Служит для возврата id тега из таблицы rbt, где значение поля id_book совпа-дает с принятым параметром. */
    function get_relation($tag) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $bt = $conn->query("SELECT id_tag FROM rbt WHERE id_book = '$tag'");    
        return $bt;
    }

    /* Функция для вывода тегов с определенным id */
    function get_tag($ttag) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $tg = $conn->query("SELECT tag FROM tags WHERE id = '$ttag'");   
        return $tg;
    }
?>