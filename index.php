<?php
require_once(__DIR__ . '/Backend/Logic/MainLogic.php');


class Route extends MainLogic
{
    public static $routes = [];

    public static function resource($uri, $action)
    {
        self::$routes[] = $uri;
        if ($_SERVER['REQUEST_URI'] == $uri) {
            $action->__invoke();
        }
    }

    public static function DeleteProduct()
    {
        parent::DeleteProducts();
    }
}

Route::resource('/', function () {
    $products = MainLogic::GetProducts();
    $request = Route::DeleteProduct();
    require_once(__DIR__ . '/FrontEnd/Pages/product-list.php');
});

Route::resource('/add-product', function () {
    require_once(__DIR__ . '/FrontEnd/Pages/add-product.php');
});