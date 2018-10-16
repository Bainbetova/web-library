<script>
    $('#relation_form').submit(function() {
        $.post('../controllers/relation.php',
            {
                id: $('#pid').val(),
                tag: $('#ptag').val()        
            },
            function(data) {
                $("#main").html(data);
            }
        );
        return false;
    });
</script>