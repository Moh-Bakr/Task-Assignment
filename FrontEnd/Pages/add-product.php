<?php require_once(__DIR__ . '/../layouts/navbar.php') ?>
<?php require_once(__DIR__ . '/../scripts/validator.php') ?>
<body class="d-flex flex-column" style="min-height: 100vh">
<main style="flex: 1">
    <form action="add-product" method="POST" id="product_form" class="py-4">
        <div class="container">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-4 col-md-7 col-9">
                    <div class="form-group mb-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">SKU</span>
                            </div>
                            <input type="text" class="form-control" name="sku" id="sku"
                                   value="<?php if (!empty($_POST)) echo $_POST['sku'] ?? ''; ?>">
                        </div>
                        <div class="error text-danger font-weight-bold">
                            <?= $errors['sku'] ?? '' ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Name</span>
                            </div>
                            <input type="text" class="form-control" name="name" id="name"
                                   value="<?php if (!empty($_POST)) echo $_POST['name'] ?? ''; ?>">
                        </div>
                        <div class="error text-danger font-weight-bold">
                            <?= $errors['name'] ?? '' ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Price</span>
                            </div>
                            <input type="text" class="form-control" name="price" id="price"
                                   value="<?php if (!empty($_POST)) echo $_POST['price'] ?? ''; ?>">
                        </div>
                        <div class="error text-danger font-weight-bold">
                            <?= $errors['price'] ?? '' ?>
                        </div>
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <label for="productType" class="input-group-text">ProductType</label>
                        </div>
                        <select name="type" class="custom-select" id="productType">
                            <option selected value="<?php if (empty($_POST))
                                echo('Type Switcher');
                            else echo $_POST['type']; ?>">
                                <?php if (!empty($_POST)) {
                                    echo htmlspecialchars($_POST['type']) ?? '';
                                } ?>
                            </option>
                            <option value="DVD" id="DVD">DVD</option>
                            <option value="Furniture" id="Furniture">Furniture</option>
                            <option value="Book" id="Book">Book</option>

                        </select>
                    </div>
                    <div class="error text-danger font-weight-bold">
                        <?= $errors['type'] ?? '' ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-7 col-9 offset-lg-2 ">
                    <div class="form-group d-none" id="dvd-form">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Size</span>
                            </div>
                            <input type="text" class="form-control" name="size" id="size" placeholder=""
                                   value="<?php if (!empty($_POST)) echo $_POST['size'] ?? ''; ?>">
                            <div class="input-group-append">
                                <span class="input-group-text">MB</span>
                            </div>
                            <?php if (empty($errors)) {
                                echo '<p class="my-2 text-secondary">
                            Please provide DVD size in mega bytes
                            </p>';
                            } ?>
                        </div>
                        <div class="error text-danger font-weight-bold">
                            <?= $errors['size'] ?? '' ?>
                        </div>
                    </div>
                    <div class="form-group d-none" id="book-form">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Weight</span>
                            </div>
                            <input type="text" class="form-control" name="weight" id="weight"
                                   value="<?php if (!empty($_POST)) echo $_POST['weight'] ?? ''; ?>">
                            <div class="input-group-append">
                                <span class="input-group-text">KG</span>
                            </div>
                            <?php if (empty($errors)) {
                                echo '<p class="my-2 text-secondary">
                               Please provide book weight in kilo grams
                                </p>';
                            } ?>
                        </div>
                        <div class="error text-danger font-weight-bold">
                            <?= $errors['weight'] ?? '' ?>
                        </div>
                    </div>
                    <div class="form-group  d-none" id="furniture-form">
                        <div class="form-group mb-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Height</span>
                                </div>
                                <input type="text" class="form-control" name="height" id="height"
                                       value="<?php if (!empty($_POST)) echo $_POST['height'] ?? ''; ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">CM</span>
                                </div>
                            </div>
                            <div class="error text-danger font-weight-bold">
                                <?= $errors['height'] ?? '' ?>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="form-group mb-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Width</span>
                                    </div>
                                    <input type="text" class="form-control" name="width" id="width"
                                           value="<?php if (!empty($_POST)) echo $_POST['width'] ?? ''; ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">CM</span>
                                    </div>
                                </div>
                                <div class="error text-danger font-weight-bold">
                                    <?= $errors['width'] ?? '' ?>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Length</span>
                                    </div>
                                    <input type="text" class="form-control" name="length" id="length"
                                           value="<?php if (!empty($_POST)) echo $_POST['length'] ?? ''; ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">CM</span>
                                    </div>
                                </div>
                                <div class="error text-danger font-weight-bold">
                                    <?= $errors['length'] ?? '' ?>
                                </div>
                            </div>
                            <?php if (empty($errors)) {
                                echo '<p class="my-2 text-secondary">
                            Please provide dimensions in HxWxL format
                        </p>';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</main>
<?php require_once(__DIR__ . '/../scripts/scripts.php') ?>
<?php require_once(__DIR__ . '/../layouts/footer.php') ?>
</body