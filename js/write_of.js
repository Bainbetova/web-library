<script>
    $('.js_write_of').click(function() {
    $.post('../controllers/write_of.php',
        {
            id: $(this).data('id')
        },
        function(data) {
            $('#write_of').html(data);
        }
    );
    });
</script>