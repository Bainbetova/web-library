<? include '../models/output.php'; ?>
<?php
// output row list
/*$stmt = $db->prepare('SELECT * FROM books WHERE category = :category');
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->execute();*/
$stmt = category($category);

while ($row = $stmt->fetch_assoc()): ?>
  <h4> <?= $row['title'] ?> <br>
  Автор: <?= $row['author']?> </h4>
  <p>
    <img class="picture" src="../image/<?= $row['image'] ?>" style="width: 80%" alt="<?= $row['name'] ?>">
    <br>
    <?  //$bt = $db->prepare('SELECT id_tag FROM rbt WHERE id_book = :id');
    //$bt->bindValue(':id', $row['id'], PDO::PARAM_STR);
    //$bt->execute();
      $bt = prepare_bt($row['id']);
    ?>
    Теги:
    <?while ( $rel = $bt->fetch_assoc()):    
    //$tg = $db->prepare('SELECT tag FROM tags WHERE id = :id_tag');
    //$tg->bindValue(':id_tag', $rel['id_tag'], PDO::PARAM_STR);
    //$tg->execute();    
    $tg = output_tags($rel['id_tag']);
       while ($tgs = $tg->fetch_assoc()): ?>
        <?= $tgs['tag'] ?>  
      <?php endwhile ?>
    <? endwhile;?>
    <br>
  <?php if ($row['count'] > 0): ?>
    В наличии <?= $row['count'] ?> шт.<br>
  <?php else: ?>
    Нет в наличии<br>
  <?php endif; ?>
  </p>
  <p>
    <a href="../controllers/details.php?id=<?= $row['id'] ?>" id="podr">Подробнее</a>    
  </p>
<?php endwhile; ?>