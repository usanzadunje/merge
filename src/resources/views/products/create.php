<?php $title = 'Create post' ?>

<?php ob_start() ?>

<h1><?= $title ?></h1>
<form action="/products/store" method="POST">
    <label for="name">Product name: </label>
    <input id="name" type="text" name="name">

    <input type="submit" value="Submit">
</form>

<?php $content = ob_get_clean(); ?>

<?php include resource_path('views/layout.php') ?>
