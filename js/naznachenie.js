<script>
$('.naznach').click(function() {
    $.post('../controllers/naznachenie.php',
        {
            id: $(this).data('id')
        },
        function(data) {
            $('#naznachenie').html(data);
        }
    );
});
</script>