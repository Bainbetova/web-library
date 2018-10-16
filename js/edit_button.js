<script>   
$('#edit button').click(function() {
    $.post('../views/edit.php',
      {
        id: '<?= $row['id'] ?>'
      },
      function(data) {
        $('#edit').html(data);
      }
    );
});
</script>