<?php
require_once __DIR__ . '/../app/controllers/ProductController.php';

$productController = new ProductController();
$route = explode('/', $_SERVER['REQUEST_URI'])[2];

$route = substr($route,1);

echo $route;

if ($route === 'products') {
    $productController->index();
} elseif ($route === 'product') {
    $id = explode('/', $_SERVER['REQUEST_URI'])[2];
    $productController->show($id);
} else {
    // $productController->index();
    header("Location: ?products");

    // echo "404 Not Found";
}
?>
