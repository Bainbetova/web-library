<ul>
  <li><a href="/library/index.php">Главная</a></li>
</ul>

<nav id="slow_nav">
    <ul>
        <li>
        <a href="#">Книги</a>
            <ul style="width: 100%">
            <li><a href="/library/controllers/inf.php">>Информатика</a></li>
            <li><a href="/library/controllers/pribor.php">>Приборостроение</a></li>
            <li><a href="/library/controllers/electrika.php">>Электротехника</a></li>
            <li><a href="/library/controllers/tm.php">>Технология машиностроения</a></li>
            <li><a href="/library/controllers/chemie.php">>Химимия</a></li>
            <li><a href="/library/controllers/ekonomika.php">>Экономика</a></li>
            <li><a href="/library/controllers/managment.php">>Менеджмент</a></li>
            </ul>
        </li> 
    </ul>
</nav>

<?php if ($user): ?>
<div id="login">
  <h3 id="username"><?= $user['name']; ?>,</h3>
  <h3>добро пожаловать в библиотеку!</h3>
  <?php if ($user['is_owner'] == 1): ?>    
    <a href="javascript:void(0)" id="newbook">Добавить книгу</a>
    <a href="javascript:void(0)" id="tag">Управление тегами</a>
    <a href="/library/controllers/readers.php">Читатели</a>
    <a href="/library/controllers/debtors.php">Должники</a>
  <?php endif; ?>
  <?php if ($user['is_owner'] == 2): ?>    
    <a href="javascript:void(0)" id="newbook">Добавить книгу</a>
    <a href="/library/controllers/new_admin.php">Персонал</a>
    <a href="javascript:void(0)" id="tag">Управление тегами</a>
    <a href="/library/controllers/readers.php">Читатели</a>
    <a href="/library/controllers/debtors.php">Должники</a>
  <?php endif; ?>
</div>
  <ul>
    <li><a href="/library/controllers/cart.php">Формуляр</a></li>
    <li><a href="javascript:void(0)" id="logout">Выход</a></li>
  </ul>
  <script>   
    $('#newbook').click(function() {
      $.ajax({
        type: "GET",
        url: "/library/controllers/new.php",
        success: function(data) {
          $("#main").html(data);
        }
      });
    });
  </script>
  <script>   
    $('#tag').click(function() {
      $.ajax({
        type: "GET",
        url: "/library/controllers/tag.php",
        success: function(data) {
          $("#main").html(data);
        }
      });
    });
  </script>
  <script>
    $('#logout').click(function() {
      $.ajax({
        url: '/library/controllers/logout.php',
        success: function() {
          location.reload();
        }
      });      
    });
  </script> 
<?php else: ?>
<div id="login">
  <h3>Авторизация</h3>
  <form id="login_form">
    <input type="email" id="lmail" style="color:black" placeholder="E-mail" required>
    <input type="password" id="lpasswd" style="color:black" placeholder="Password" required>
    <input type="submit" id="come" value="Войти">
  </form>
  <a href="javascript:void(0)" id="open_signup">Регистрация</a> 
  <script>
    $(document).ready(function() {
      $('#login_form').submit(function() {
        $.ajax({
          type: "POST",
          url: "/library/controllers/authorization.php",
          data: {
            email: $('#lmail').val(),
            password: $('#lpasswd').val() },
            success: function(data) {
              $("#main").html(data);
            }
        });
        return false;
      });
    });
    /*$('#login_form').submit(function() {
      $.post('/library/controllers/authorization.php',
      {
        email: $('#lmail').val(),
            password: $('#lpasswd').val()
      },
      function(data){
        if(data.length > 0) {
          $('#main').html(data);
        } else {
          location.reload();
        }
      }
    );
    return false;
  });*/
    $('#open_signup').click(function() {
      $.ajax({
        type: "GET",
				url: "/library/controllers/signup.php",
				success: function(data){
					$("#main").html(data);
				}
      });
    });
</script>
</div>
<?php endif ?>