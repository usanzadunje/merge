<?php $title = 'Update post ' . $product->getName() ?>

<?php ob_start() ?>

<h1><?= $title ?></h1>
<form action="/products/<?php echo $product->getId(); ?>/update" method="POST">
    <label for="name">Product name: </label>
    <input id="name" type="text" name="name" value="<?php echo $product->getName(); ?>">

    <input type="submit" value="Submit">
</form>

<?php $content = ob_get_clean(); ?>

<?php include resource_path('views/layout.php') ?>
