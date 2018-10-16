<script>
    $('#write_of button').click(function() {
    $.post('../controllers/write_of.php',
        {
            id: '<?= $user['id'] ?>'
        },
        function(data) {
            $('#write_of').html(data);
        }
    );
    });
</script>   