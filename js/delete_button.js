<script>
    $('#delete button').click(function() {
    $.post('../controllers/delete.php',
        {
        id: '<?= $row['id'] ?>'
        },
        function(data) {
        $('#delete').html(data);
        }
    );
});
</script>