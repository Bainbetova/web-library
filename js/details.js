<script>   
$('#relationtag button').click(function() {
    $.post('../views/relation.php',
        {
        id: '<?= $row['id'] ?>'
        },
        function(data) {
        $('#relationtag').html(data);
        }
    );
});
</script>