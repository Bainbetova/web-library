<?php   require_once ('../models/model.php'); 
        require '../controllers/setup.php'; ?>

<?php $stmt = view_cart($user);    ?>

<?php require '../views/cart.php'; ?>