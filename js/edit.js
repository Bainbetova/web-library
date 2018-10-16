<script>
    $('#editProduct_form').submit(function() {
        $.post('/library/controllers/edit.php',
            {
                id: $('#pid').val(),
                image: $('#pimage').val(),
                author: $('#pauthor').val(),
                title: $('#ptitle').val(),
                category: $('#pcategory').val(),
                count: $('#pcount').val(), 
                description: $('#pdescription').val()                
            },
            function(data) {
                $("#main").html(data);
            }
        );
        return false;
    });
</script>