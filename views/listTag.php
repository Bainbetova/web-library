<div id="newTag">

<h3>Список тегов:</h3>

    <p style="font-size: 14pt; color: #293499;">
    <?    while ($row = $result->fetch_row()): ?>
                <?=$row[0]?> <br>
            <? endwhile;
            $result->close(); 
    ?>  
    </p>

</div>