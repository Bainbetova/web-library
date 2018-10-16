<script>
    $('#deleteTag_form').submit(function() {
        $.post('controllers/delete_tag.php',
            {
                tag: $('#ptag').val()
            },
            function(data) {
                $("#main").html(data);
            }
        );
        return false;
    });
</script>