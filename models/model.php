<?php 

    /* Функция подключения к бд */
    function connect() {
        $dsn = 'mysql:host=localhost;dbname=Library;charset=utf8';
        $db = new PDO($dsn, 'Student', '2017');
        return $db;
    }

    /* Функция для */
    function setup($db, $id) {
        $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    /* */
    

    /* Функция поиска по автору, названию, тегу */
    function search() {
        $connect = mysqli_connect("localhost", "Student", "2017", "library"); 
        if (!$connect) {     
            exit('MySQL Error: ' . mysqli_error($connect));
        } 
        $word = (isset($_GET['word'])) ? $_GET['word'] : null;
        $word = mysqli_real_escape_string($connect, trim($word)); 
        if(empty($word)) {
            echo 'Введите слово.';
        } else if (iconv_strlen($word, 'utf-8') < 3)  {     
            echo 'Слово не может быть менее трех символов.'; 
        } else if (iconv_strlen($word, 'utf-8') > 20) {     
            echo 'Слово не может быть более двадцати символов.'; 
        } else  {     
            $sql = "SELECT author, title, description, tag FROM books 
                            INNER JOIN rbt ON books.id = rbt.id_book
                            INNER JOIN tags ON rbt.id_tag = tags.id 
                            WHERE author LIKE '%$word%'
                            OR title LIKE '%$word%' 
                            OR tag LIKE '%$word%' GROUP BY books.id";
            $query = mysqli_query($connect, $sql); // Выполняем запрос                       
            
        }    
        return $query;     
    }   

    /* Функция для отображения содержимого формуляра */
    function view_cart($user) {
        $n = 'mysql:host=localhost;dbname=library;charset=utf8';
        $k = new PDO($n, 'Student', '2017');
        // output user's shopping cart
        $stmt = $k->prepare('SELECT *, COUNT(book_id) as count FROM map
                                LEFT JOIN books ON book_id = books.id 
                                WHERE user_id = :user_id GROUP BY book_id');
        $stmt->bindValue(':user_id', $user['id'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    /* Функция для добавления тега */
    function new_tag($tag) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $result = $conn->query("SELECT tag FROM tags WHERE tag = '$tag'"); 
        if (mysqli_num_rows($result) == 0) {
          $sql = "INSERT INTO tags (tag) 
              VALUES ('$tag')";
          if ($conn->query($sql) === TRUE) {
              // если введенного тега нет в таблице tag, то нужно добавить его туда, затем сдлеать связь между текущей книгой и тегом
              echo "<p style=\"color: #293499; font-size: 14pt;\">Тег успешно добавлен.";
          } else {
              echo "<p style=\"color: red; font-size: 14pt;\">Ошибка: ".$conn->error;
          }
        } else {
          echo "<p style=\"color: #293499; font-size: 14pt;\">Такой тег уже есть.";
        }
    }

    

    /* Функция для изменения тега */
    /*function edit_tag($tag, $etag) {
        $db = new mysqli('localhost', 'Student', '2017', 'library');
        if ($db->connect_errno) {
            exit('<p style="color: red; font-size: 14pt;">Error MYSQLI: ' . $db->connect_error . '</p>');
        }
 
        $stmt = $db->prepare("UPDATE `tags` SET `tag` = '$etag' WHERE `tag` = '$tag'");
        $stmt->bind_param("ss", $etag, $tag);
        
        if (!$stmt->execute()) {
            throw new InvalidQueryException("Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error);
        }
    }*/

    /* Функция для отображения списка тегов */
    function list_tag() {
        $mysqli = new mysqli("localhost", "Student", "2017", "library");
        $query = "SELECT tag FROM tags ORDER BY tag";
        $result = $mysqli->query($query);
        return $result;
    }

    /*function details($t) {
        $ds = 'mysql:host=localhost;dbname=library;charset=utf8';
        $d = new PDO($ds, 'Student', '2017');
        $stmt = $d->prepare('SELECT * FROM books WHERE id = :id');
        $stmt->bindValue(':id', $t, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }*/

    /* Функция для нахождения пользователя по e-mail */
    function login($email) {
        $conn = new mysqli("localhost", "Student", "2017", "shop");
        $res = $conn->query("SELECT * FROM users WHERE mail='$email'");
        return $res;
    }

    /* Функция для присвоения выбранному пользователю роли "Библиотекарь" */
    function appointment($r) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $sql = "UPDATE users SET is_owner = '1' WHERE id = $r";
        //$t = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
            echo "Права пользователя успешно изменены.";
        } else {
            echo "Error: ".$conn->error;
        }
    }

    /* Функция для присвоения выбранному пользователю роли Читатель" */
    function razgal($r) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $sql = "UPDATE users SET is_owner = '0' WHERE id = $r";
        if ($conn->query($sql) === TRUE) {
            echo "Права пользователя успешно изменены.";
        } else {
            echo "Error: ".$conn->error;
        }
    }

    /* Функция для авторизации пользователя */
    function authorization($tmail) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
		if ($res = $conn->query("SELECT * FROM users  WHERE mail='$tmail'")){
            return $res;
        }
        return $res;
    }

    /* */
    function auth_cart() {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $cart = $conn->query("SELECT * FROM map WHERE id = :id");
        return $cart;
    }

    /* Функция для удаления книги */
    function delete_book($r) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $sql = "DELETE FROM books WHERE id = $r";
        if ($conn->query($sql) === TRUE) {
          echo "<p style=\"color: #293499; font-size: 14pt;\">Книга удалена.";
        } else {
            echo "<p style=\"color: red; font-size: 14pt;\">Ошибка: ".$conn->error;
        }        
    }

    /*function get_details($get) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $result = $conn->query("SELECT * FROM books WHERE id = '$get'");

        //$stmt = $database->prepare('SELECT * FROM books WHERE id = :id');
        //$stmt->bindValue(':id', $get, PDO::PARAM_INT);
        //$stmt->execute();
        //return $stmt;
        return $result;
    }*/

    /* Функция для вывода пользователей, у которых не пустой формуляр */
    function readers_books() {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $stmt = $conn->query("SELECT user_id, name, surname, mail FROM map 
                                    INNER JOIN users ON map.user_id = users.id GROUP BY users.id");
        return $stmt;
    }

    /* Функция для вывода должников */
    function view_debtors() {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $stmt = $conn->query("SELECT name, surname, mail, author, title, date_del FROM map 
                                            LEFT JOIN users ON map.user_id = users.id 
                                            LEFT JOIN books ON map.book_id = books.id 
                                            WHERE map.date_del < CURDATE()");
        
        return $stmt;
    }
    
    /* Функция для вывода формуляра пользователя */
    function data_cart($user) {
        $dsn = 'mysql:host=localhost;dbname=Library;charset=utf8';
        $db = new PDO($dsn, 'Student', '2017');
        $usr = $db->prepare('SELECT books.id, name, surname, mail, author, title, date_del FROM map
                                        LEFT JOIN books ON book_id = books.id 
                                        LEFT JOIN users ON map.user_id = users.id
                                        WHERE user_id = :user_id');
        $usr->bindValue(':user_id', $user, PDO::PARAM_INT);
        $usr->execute();
        return $usr;
    }

    /* Функция для удаления записи из формуляра */    
    function delete_of_cart($r) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $sql = "DELETE FROM map WHERE book_id = '$r'";
        $ssql = "SELECT * FROM map WHERE book_id = '$r'";
        $res = $conn->query($ssql);
        if ($conn->query($sql) === TRUE) {
            $tsql = "SELECT * FROM books WHERE id = '$r'";
            $result = $conn->query($tsql);
            $trow = $result->fetch_assoc();
            $ucount = $trow['count'];
            $tcount = $ucount + 2;
            //var_dump($r);
            $rsql = "UPDATE books SET count = $tcount WHERE id = '$r'";
            echo "<p style=\"color: #293499; font-size: 12pt;\">Запись удалена.";            
        } else {
            echo "<p style=\"color: red; font-size: 12pt;\">Ошибка: ".$conn->error;
        }
    }

    /* Функция, возвращающая количество книг в библиотеке */
    function get_count($pos) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $query = "SELECT count FROM books WHERE id = $pos";
        $res = $conn->query($query);
        return $res;
    }

    /* Функция для добавления записи в таблицу */
    function insert_from_map($usr, $bkId, $date_insert, $pos, $tcount) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $query = "INSERT INTO map (user_id, book_id, date_del)
                                VALUES ('$usr', '$bkId', '$date_insert')";
        //$res = $conn->query($query);
        if ($conn->query($query) == TRUE) {
            echo '<p style="color: #293499; font-size: 14pt;">Книга успешно добавлена</p>';
            /* уменьшение кол-ва книг на складе */
           $ucount = $tcount - 1;
            $sql = "UPDATE books SET count = $ucount WHERE id = '$bkId'";
            $upd = $conn->query($sql);
        } else {
            echo '<p style="color: red; font-size: 14pt;">Ошибка при добавлении</p>';
        }
       // return $res;
    }

    /* Функция для регистрации пользователя */
    function signup($name, $surname, $mail, $login, $passwd) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //$cryptPasswd = crypt($passwd);
        $cryptPasswd = hash(md5, $passwd);

        if ($conn->query("INSERT INTO users (name, surname, mail, login, passwd, is_owner) VALUES ('$name', '$surname', '$mail', '$login', '$cryptPasswd', '0')")) {
            echo "<p style=\"color: #293499; font-size: 14pt;\">Регистрация прошла успешно!<br>Имя: $name<br>Фамилия: $surname<br>Почтовый ящик: $mail<br><a href=\"/library/index.php\">Вернуться на главную</a></p>";
        } else {
            echo '<p style="color: red; font-size: 14pt;">Ошибка при регистрации</p>';
        }
    }

    function new_book($image, $author, $title, $category, $count, $description) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
        $sql = "INSERT INTO books (image, author, title, category, count, description) 
                                VALUES ('$image', '$author', '$title', '$category', '$count', '$description')";
        if ($conn->query($sql) === TRUE) {
            echo "<p style=\"color: #293499; font-size: 14pt;\">Книга успешно добавлена.</p>";
        } else {
            echo '<p style="color: red; font-size: 14pt;">Ошибка: </p>'.$conn->error;
        }
    }

    function edit_book($image, $author, $title, $category, $count, $description, $r) {
        $conn = new mysqli("localhost", "Student", "2017", "library");
	    $sql = "UPDATE books SET image='$image', author='$author', title='$title', category='$category', count='$count', description='$description' WHERE id = '$r'";
        if ($conn->query($sql) === TRUE) {
            echo "<p style=\"color: #293499; font-size: 14pt;\">Книга изменена.";
        } else {
            echo "Ошибка: ".$conn->error;
        }
    }
?>