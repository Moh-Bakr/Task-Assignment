<?php require_once(__DIR__ . '/../layouts/navbar.php') ?>
<?php require_once(__DIR__ . '/../../index.php') ?>

<body class="d-flex flex-column" style="min-height: 100vh">
<main style="flex: 1">
    <form action="<?php $request ?>" method="post" class="container py-4" id="products_form">
        <div class="row justify-content-center justify-content-sm-start">
            <?php foreach ($products as $key => $product) { ?>
                <div class="col-10 col-sm-6 col-md-4 col-lg-3 my-3 ">
                    <div class="card border border-secondary rounded-lg">
                        <div class="card-body text-center">
                            <div class="custom-control custom-checkbox text-left mb-2">
                                <input type="checkbox" class="delete-checkbox"
                                       name="products[]" id="product<?= $product['id'] ?>"
                                       value="product<?= $product['id'] ?>">
                                <label class="custom-control-label" for="product<?= $product['id'] ?>"></label>
                            </div>
                            <h5 class="card-title"><?= $product['sku'] ?></h5>
                            <h5 class="card-title"><?= $product['name'] ?></h5>
                            <h5 class="card-subtitle mb-2"><?= $product['price'] ?> $</h5>
                            <?= $product['size'] ? '<h5 class="card-text">' . 'Size: ' . $product['size'] . ' MB' . '</h5>' : '' ?>
                            <?= $product['weight'] ? '<h5 class="card-text">' . 'Weight: ' . $product['weight'] . ' KG' . '</h5>' : '' ?>
                            <?= $product['height'] ? '<h5 class="card-text">' . 'Dimensions: ' . $product['height'] . 'x' . $product['width'] . 'x' . $product['length'] . '</h5>' : '' ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </form>
</main>
<?php require_once(__DIR__ . '/../scripts/scripts.php') ?>
<?php require_once(__DIR__ . '/../layouts/footer.php') ?>
</body>