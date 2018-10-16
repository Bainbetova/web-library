<script>
    $('#newTag_form').submit(function() {
        $.post('controllers/new_tag.php',
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