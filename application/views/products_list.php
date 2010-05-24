<?php require_once '_header.php'; ?>

    <p><a href = "<?= BASE_URL ?>products/edit/">Add new product</a></p>
    
        <?= Display::products($products, true) ?>

<?php require_once '_footer.php'; ?>