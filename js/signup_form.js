<script>

  $('#signup_form').submit(function() {
    $.post('/library/controllers/signup.php',
      {
        name: $('#sname').val(),
        surname: $('#ssurname').val(),
        mail: $('#smail').val(),
        login: $('#slogin').val(),
        passwd: $('#spasswd').val(),
        repasswd: $('#srepasswd').val()
      },
      function(data) {
        $('#main').html(data);
      }
    );
    return false;
  });
</script>