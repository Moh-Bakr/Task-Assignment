<?php require_once(__DIR__ . '/../layouts/navbar.php') ?>
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
                            <input type="text" class="form-control" name="sku" id="sku">
                        </div>

                    </div>
                    <div class="form-group mb-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Name</span>
                            </div>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>

                    </div>
                    <div class="form-group mb-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Price</span>
                            </div>
                            <input type="text" class="form-control" name="price" id="price">
                        </div>

                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <label for="productType" class="input-group-text">ProductType</label>
                        </div>
                        <select name="type" class="custom-select" id="productType">
                            <option selected value="type"
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
                            <label for="size"></label><input type="text" class="form-control" name="size" id="size" placeholder="">
                            <div class="input-group-append">
                                <span class="input-group-text">MB</span>
                            </div>

                        </div>

                    </div>
                    <div class="form-group d-none" id="book-form">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Weight</span>
                            </div>
                            <input type="text" class="form-control" name="weight" id="weight">
                            <div class="input-group-append">
                                <span class="input-group-text">KG</span>
                            </div>

                        </div>

                    </div>
                    <div class="form-group  d-none" id="furniture-form">
                        <div class="form-group mb-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Height</span>
                                </div>
                                <input type="text" class="form-control" name="height" id="height">
                                <div class="input-group-append">
                                    <span class="input-group-text">CM</span>
                                </div>
                            </div>

                        </div>
                        <div class="form-group mb-4">
                            <div class="form-group mb-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Width</span>
                                    </div>
                                    <input type="text" class="form-control" name="width" id="width">
                                    <div class="input-group-append">
                                        <span class="input-group-text">CM</span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group mb-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Length</span>
                                    </div>
                                    <input type="text" class="form-control" name="length" id="length">
                                    <div class="input-group-append">
                                        <span class="input-group-text">CM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</main>
<?php require_once(__DIR__ . '/../scripts/scripts.php') ?>
<?php require_once(__DIR__ . '/../layouts/footer.php') ?>
</body>