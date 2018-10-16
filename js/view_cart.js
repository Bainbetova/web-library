<script>
$('.view_cart').click(function() {
    $.post('../controllers/view.php',
        {
            id: $(this).data('id')
        },
        function(data) {
            $('#main').html(data);
        }
    );
});
</script>