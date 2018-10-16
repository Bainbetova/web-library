<script>
$('.razg').click(function() {
    $.post('../controllers/razgalovanie.php',
        {
            id: $(this).data('id')
        },
        function(data) {
            $('#razgalovanie').html(data);
        }
    );
});
</script>