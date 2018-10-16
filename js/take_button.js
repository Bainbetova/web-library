<script>
$('#take button').click(function() {
  $.post('../controllers/take.php',
    {
      id: '<?= $row['id'] ?>'
    },
    function(data) {
      $('#take').html(data);
    }
  );
});
</script>