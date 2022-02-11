<?php $title = 'List of products' ?>

<?php ob_start() ?>

<h1>List of products</h1>
<ul>
    <?php
    foreach ($products as $product): ?>
        <li>
            <h1><?= $product->getName() ?></h1>
            <p><?= $product->getDescription() ?></p>
            <a href="/products/<?php echo $product->getId() ?>">SHOW</a>
        </li>
    <?php
    endforeach ?>
</ul>

<?php $content = ob_get_clean(); ?>

<?php include resource_path('views/layout.php') ?>
