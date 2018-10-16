<?php
$error = false;

/* Создание базы данных */
$link = new mysqli('localhost', "Student", "2017");
if ($link->connect_error) {
    die('Connection failed: ' . $link->connect_error);
}

$sql = 'CREATE DATABASE library';
if ($link->query($sql)) {
    echo "Database LIBRARY created.\n";
} else {
    echo 'Error: ' . $link->error;
}

/* Подключение к созданной базе данных */
$conn = new mysqli("localhost", "Student", "2017", "library");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/* Создание таблиц */

// КНИГИ - BOOKS
$sql = "CREATE TABLE IF NOT EXISTS books (
            id int(11) NOT NULL AUTO_INCREMENT,
            image varchar(64) DEFAULT NULL,
            author varchar(64) NOT NULL,
            title varchar(128) NOT NULL,
            category varchar(8) NOT NULL,
            count int(11) NOT NULL,
            description text NOT NULL,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;";
if ($conn->query($sql) === TRUE) {
    $error = true;
} else {
    echo "<br>Error creating table BOOKS: " . $conn->error;
    $error = false;
}

// ПОЛЬЗОВАТЕЛИ - USERS
$sql = "CREATE TABLE IF NOT EXISTS users (
            id int(11) NOT NULL AUTO_INCREMENT,
            name varchar(30) NOT NULL,
            surname varchar(30) NOT NULL,
            mail varchar(30) NOT NULL,
            login varchar(30) NOT NULL,
            passwd varchar(255) NOT NULL,
            is_owner tinyint(4) NOT NULL,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;";
if ($conn->query($sql) === TRUE) {
    $error = true;
} else {
    echo "<br>Error creating table USERS: " . $conn->error;
    $error = false;
}

// ТЕГИ - TAGS
$sql = "CREATE TABLE IF NOT EXISTS tags (
            id int(11) NOT NULL AUTO_INCREMENT,
            tag varchar(30) NOT NULL,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;";
if ($conn->query($sql) === TRUE) {
    $error = true;
} else {
    echo "<br>Error creating table TAGS: " . $conn->error;
    $error = false;
}

// ФОРМУЛЯР - MAP
$sql = "CREATE TABLE IF NOT EXISTS map (
            id int(11) NOT NULL AUTO_INCREMENT,
            user_id int(11) NOT NULL,
            book_id int(11) NOT NULL,
            date_del date NOT NULL,
            PRIMARY KEY (id),
            KEY book_id (book_id),
            KEY book_id_2 (book_id),
            KEY book_id_3 (book_id),
            KEY book_id_4 (book_id),
            KEY user_id (user_id)
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;";
if ($conn->query($sql) === TRUE) {
    $error = true;
} else {
    echo "<br>Error creating table MAP: " . $conn->error;
    $error = false;
}

// СВЯЗЬ МЕЖДУ КНИГАМИ И ТЕГАМИ - RBT
$sql = "CREATE TABLE IF NOT EXISTS rbt (
            id int(11) NOT NULL AUTO_INCREMENT,
            id_book int(11) NOT NULL,
            id_tag int(11) NOT NULL,
            PRIMARY KEY (id),
            KEY id_book (id_book),
            KEY id_tag (id_tag)
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;";
if ($conn->query($sql) === TRUE) {
    $error = true;
} else {
    echo "<br>Error creating table RBT: " . $conn->error;
    $error = false;
}

/* Создание связей между таблицами */

// Ограничения внешнего ключа таблицы `map`
$sql = "ALTER TABLE map
            ADD CONSTRAINT map_ibfk_1 FOREIGN KEY (book_id) REFERENCES books (id),
            ADD CONSTRAINT map_ibfk_2 FOREIGN KEY (user_id) REFERENCES users (id);";
if ($conn->query($sql) === TRUE) {
    $error = true;
} else {
    echo "<br>Error alter table MAP: " . $conn->error;
    $error = false;
}

// Ограничения внешнего ключа таблицы `rbt`
$sql = "ALTER TABLE rbt
            ADD CONSTRAINT rbt_ibfk_1 FOREIGN KEY (id_book) REFERENCES books (id),
            ADD CONSTRAINT rbt_ibfk_2 FOREIGN KEY (id_tag) REFERENCES tags (id);";
if ($conn->query($sql) === TRUE) {
    $error = true;
} else {
    echo "<br>Error alter table RBT: " . $conn->error;
    $error = false;
}

/* Заполнение таблиц значениями */
// КНИГИ - BOOKS
$sql = "INSERT INTO books (id, image, author, title, category, count, description) VALUES
            (1, '1.jpg', 'К. Дж. Дейт', 'Введение в системы баз данных', 'inf', 16, 'Дейт, К. Дж. Введение в системы баз данных, 8-е издание.: Пер. с англ. - М. Вильяме, 2005. - 1328 с.: ил. - Парал. тит.англ.'),
            (2, '2.jpg', 'Бьерн Страуструп', 'Дизайн и эволюция C++', 'inf', 34, 'Страуструп Б. Дизайн и эволюция C++: Пер. с англ. - М.: ДМК Пресс; СПб.: Питер, 2006. - 448 с.: ил.'),
            (3, '3.jpg', 'В. Олифер Н. Олифер', 'Основы компьютерных сетей', 'inf', 28, 'Олифер В.Г., Олифер Н.А. Основы компьютерных сетей. - СПб.: Питер, 2009. - 352 с.: ил.'),
            (4, '4.png', 'Альфред Ахо, Рави Сети, Джеффр', 'Компиляторы. Принципы, технологии и инструментарий', 'inf', 23, 'Альфред В. Ахо, Моника С. Лам, Рави Сети, Джеффри Д. Ульман. Компиляторы: принципы, технологии и инструментарий = Compilers: Principles, Techniques, and Tools. — 2 изд. — М.: Вильямс, 2008. - 1184 с.: ил.'),
            (5, '5.jpg', 'Богданов А.В., Голубенко Ю.В. ', 'Волоконные технологические лазеры и их применение', 'prib', 12, 'Волоконные технологические лазеры и их применение'),
            (6, '6.jpg', 'Якушенков Ю. Г.', 'Теория и расчет оптико-электронных приборов', 'prib', 9, 'Теория и расчет оптико-электронных приборов: Учебник для студентов вузов. - 4-е изд., перераб. и доп. - M.: JIoroc, 1999.-480 с.: ил.'),
            (7, '7.jpg', 'Вопилкин Е.А. ', 'Расчет и конструирование механизмов приборов и систем', 'prib', 9, 'Расчет и конструирование механизмов приборов и систем. М.: Высшая школа, 1980., 463 с., ил.'),
            (8, '8.jpg', 'Панов В.А. и др.', 'Справочник конструктора оптико-механических приборов', 'prib', 6, 'Справочник конструктора оптико-механических приборов./ В.А. Панов, М.Я. Кругер, В.В. Кулагин и др.; под общ. ред. В.А. Панова. – 3-е изд., перераб. и доп. – Л.: Машиностроение, Ленингр. отд-ние, 1980. '),
            (9, '9.jpg', 'Сулимов Ю.И.', ' Электронные промышленные устройства', 'elec', 17, 'Сулимов Ю.И. Электронные промышленные устройства. Учебное пособие. Томск: Эль Контент, 2012. - 126 с. '),
            (10, '10.jpg', 'Касаткин А.С.', 'Электротехника', 'elec', 20, 'Касаткин А.С. Электротехника : учеб. для вузов / А.С. Касаткин, М.В. Немцов. - 9-е изд., стер. ; Гриф МО. - М. : Академия, 2007. - 539 с.'),
            (11, '11.jpg', 'Борисов Ю.М.', 'Электротехника', 'elec', 13, 'Борисов Ю.М. Электротехника : учеб. пособие для вузов / Ю.М. Борисов, Д.Н. Липатов, Ю.Н. Зорин. - Изд.3-е, перераб. и доп. ; Гриф МО. - Минск : Высш. шк. А, 2007. - 543 с'),
            (12, '12.jpg', 'Григораш О.В.', 'Электротехника и электроника', 'elec', 8, 'Григораш О.В. Электротехника и электроника : учеб. для вузов / О.В. Григораш, Г.А. Султанов, Д.А. Нормов. - Гриф УМО. - Ростов н/Д : Феникс, 2008. - 462 с'),
            (13, '13.jpg', 'Балабанов А.Н.', 'Краткий справочник технолога-машиностроителя', 'tm', 8, 'Балабанов А.Н. Краткий справочник технолога-машиностроителя. – М.: Издательство стандартов, 1992. – 464 с.'),
            (14, '14.jpg', 'Колесов И.М.', 'Основы технологии машиностроения', 'tm', 17, 'Колесов И.М. Основы технологии машиностроения. – М.: Машиностроение. 1987. – 320 с.'),
            (15, '15.jpg', 'Маталин А.А.', 'Технология машиностроения', 'tm', 19, 'Маталин А.А. Технология машиностроения. – Л.: Машиностроение, 1985. – 496 с.'),
            (16, '15.jpg', 'Суслов А.Г., Дальский А.М.', 'Научные основы технологии машиностроения', 'tm', 15, 'Суслов А.Г., Дальский А.М. Научные основы технологии машиностроения. – М.: Машиностроение, 2002. – 684 с., ил.'),
            (17, '16.jpg', 'Ковшов А.Н.', 'Технология машиностроения', 'tm', 18, 'Ковшов А.Н. Технология машиностроения. – М.: Машиностроение, 1987. – 320 с.'),
            (18, '17.jpg', 'Ахметов Н.С.', 'Общая и неорганическая химия', 'chim', 35, 'Ахметов Н.С. Общая и неорганическая химия.- М., 2003 – 224 с.: ил. '),
            (19, '18.jpg', 'Гельфман М.И., Юстратов В.П.', 'Химия', 'chim', 20, 'Гельфман М.И., Юстратов В.П. Химия. - СПб, М, Краснодар., 2008 — 480 с. '),
            (20, '19.jpg', 'Гранберг И.И.', 'Органическая химия.', 'chim', 18, 'Гранберг И.И. Органическая химия. – М: Высш. шк., 2001. – 672с. '),
            (21, '20.jpg', 'Семчиков Ю.Д.', 'Высокомолекулярные соединения', 'chim', 22, 'Семчиков Ю.Д. Высокомолекулярные соединения. - М.: Издательский центр «Академия», 2005. - 368 с.'),
            (22, '21.jpg', 'Абрамова М.А., Александрова Л.С. ', 'Экономическая теория', 'ekon', 21, 'Абрамова М.А., Александрова Л.С. Экономическая теория.- М.: Юриспруденция. — 2001. — 387 с.: табл., граф.'),
            (23, '22.jpg', 'Артамонов В.С., Попов А.И., Иванов С.А. ', 'Экономическая теория', 'ekon', 16, 'Артамонов В.С., Попов А.И., Иванов С.А. Экономическая теория.- СПб.: Питер.- 2010. — 528 с.'),
            (24, '23.jpg', 'Басовский Л.Е.', 'Экономическая теория', 'ekon', 8, 'Басовский Л.Е. Экономическая теория: учебник. — М.: ИНФРА-М. – 2013. — 224 с.'),
            (25, '24.jpg', 'Вечканов Г.С.', 'Макроэкономика', 'ekon', 10, 'Вечканов Г.С. Макроэкономика. — СПб.: Питер. – 2012. — 464 с.'),
            (26, '25.jpg', 'Балашов, А.П.', 'Основы менеджмента: Учебное пособие', 'mng', 19, 'Балашов, А.П. Основы менеджмента: Учебное пособие / А.П. Балашов. - М.: Вузовский учебник, ИНФРА-М, 2012. - 288 c.'),
            (27, '26.jpg', 'Виханский, О.С.', 'Менеджмент', 'mng', 15, 'Виханский, О.С. Менеджмент: учеб. для студ. вузов, обуч. по экон. спец. и по направлению 521600 Экономика / О.С.Виханский, А.И.Наумов. - 4-е изд., перераб. и доп. - М.: Экономистъ, 2008. - 669 с.'),
            (28, '27.jpg', 'Коротков, Э.М., Солдатова, И.Ю.', 'Основы менеджмента: Учебное пособие', 'mng', 9, 'Коротков, Э.М., Солдатова, И.Ю. Основы менеджмента: Учебное пособие / Э.М. Коротков,  И.Ю. Солдатова, - М.: Дашков и К,  2013. - 272 c.'),
            (29, '28.jpg', 'Дафт, Ричард Л.', 'Менеджмент', 'mng', 14, 'Дафт, Ричард Л. Менеджмент: [перевод с английского] / Л. Дафт. – Спб.:  Питер, 2012. – 863 с.');";
if ($conn->query($sql) === TRUE) {
    $error = true;
} else {
    echo "<br>Error insert values into from table BOOKS: " . $conn->error;
    $error = false;
}

// ПОЛЬЗОВАТЕЛИ - USERS
$sql = "INSERT INTO users (id, name, surname, mail, login, passwd, is_owner) VALUES
            (37, 'Елизавета', 'Прохорова', 'elizaveta@mail.ru', 'elizaveta', '827ccb0eea8a706c4c34a16891f84e7b', 1),
            (38, 'Заведующий', 'Библиотекой', 'bainbetova@mail.ru', 'bainbetova', '4deb952153ce3744d3c724aed6c09830', 2),
            (39, 'Иван', 'Иванов', 'ivanov@mail.ru', 'ivanovivan', 'b0baee9d279d34fa1dfd71aadb908c3f', 1),
            (40, 'Петр', 'Петров', 'petrov@mail.ru', 'petrov', 'f396c3b74762b1fee69b10abb875139b', 0),
            (41, 'Екатерина', 'Сидорова', 'sidorovaek@mail.ru', 'ekaterina', '25d55ad283aa400af464c76d713c07ad', 0);";
if ($conn->query($sql) === TRUE) {
    $error = true;
} else {
    echo "<br>Error insert values into from table USERS: " . $conn->error;
    $error = false;
}

// ТЕГИ - TAGS
$sql = "INSERT INTO tags (id, tag) VALUES
            (1, 'программирование'),
            (2, 'приборостроение'),
            (3, 'машиностроение'),
            (4, 'экономика'),
            (8, 'электротехника'),
            (9, 'менеджмент'),
            (10, 'базы данных'),
            (11, 'компиляторы'),
            (16, 'sql'),
            (17, 'компьютерные сети'),
            (18, 'c++'),
            (19, 'лазеры'),
            (21, 'конструирование'),
            (22, 'устройства'),
            (23, 'электроника'),
            (24, 'машиностроение'),
            (25, 'общая химия'),
            (26, 'органическая химия'),
            (27, 'неорганическая химия'),
            (28, 'макроэкономика'),
            (29, 'химия');";
if ($conn->query($sql) === TRUE) {
    $error = true;
} else {
    echo "<br>Error insert values into from table TAGS: " . $conn->error;
    $error = false;
}

// MAP
$sql = "INSERT INTO map (id, user_id, book_id, date_del) VALUES
            (104, 40, 4, '2018-05-04'),
            (105, 40, 17, '2018-05-01'),
            (106, 41, 5, '2018-05-31'),
            (108, 41, 18, '2018-05-15'),
            (110, 41, 21, '2018-05-31'),
            (112, 41, 29, '2018-05-31');";
if ($conn->query($sql) === TRUE) {
    $error = true;
} else {
    echo "<br>Error insert values into from table MAP: " . $conn->error;
    $error = false;
}

// RBT
$sql = "INSERT INTO rbt (id, id_book, id_tag) VALUES
            (1, 1, 1),
            (18, 1, 10),
            (19, 1, 16),
            (20, 4, 11),
            (21, 2, 18),
            (22, 3, 17),
            (23, 2, 1),
            (24, 3, 1),
            (25, 4, 1),
            (26, 5, 2),
            (27, 5, 19),
            (28, 6, 2),
            (29, 7, 2),
            (30, 7, 21),
            (31, 8, 2),
            (32, 8, 21),
            (33, 9, 8),
            (34, 10, 8),
            (35, 11, 8),
            (36, 12, 8),
            (37, 12, 23),
            (38, 13, 3),
            (39, 16, 3),
            (40, 17, 3),
            (41, 18, 25),
            (42, 18, 27),
            (43, 18, 29),
            (44, 19, 29),
            (45, 20, 29),
            (46, 21, 29),
            (47, 20, 26),
            (48, 22, 4),
            (49, 23, 4),
            (50, 24, 4),
            (51, 25, 4),
            (52, 25, 28),
            (53, 26, 9),
            (54, 27, 9),
            (55, 28, 9),
            (56, 29, 9),
            (57, 14, 3),
            (58, 15, 3);";
if ($conn->query($sql) === TRUE) {
    $error = true;
} else {
    echo "<br>Error insert values into from table RBT: " . $conn->error;
    $error = false;
}

if ($error == true) {
    echo "The database was created successfully.";
} else {
    echo "<br>Errors when trying to create data base LIBRARY.";
}
?>