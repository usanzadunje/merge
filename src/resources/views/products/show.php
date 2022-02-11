<?php $title = 'Post: ' . $product->getName() ?>

<?php ob_start() ?>

<h1><?= $title ?></h1>
<div>
    <h1><?= $product->getName() ?></h1>
    <p><?= $product->getDescription() ?></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php include resource_path('views/layout.php') ?>
