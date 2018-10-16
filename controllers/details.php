<?php   require '../models/output.php'; 
        require_once '../controllers/setup.php'; ?>

<?php 
    //$get = $_GET['id'];
    //$stmt = get_details($get);
    //$row = $stmt->fetch_row();
    $get = $_GET['id'];
    $stmt = get_details($get);
    $row = $stmt->fetch_assoc();
    
    $tag = $row['id']; 
    $bt = get_relation($tag);

    $ttag = $rel['id_tag'];
    $tg = get_tag($ttag);
         
            
?>

<? include '../views/details.php'; ?>