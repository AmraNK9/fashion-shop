<?php
require_once __DIR__ . "../../models/Product.php";

class ProductController {
    public function index() {
        $productModel = new Product();
        $products = $productModel->getAllProducts();
        // echo $products;
        // for ($i=0; $i < ; $i++) { 
        //     # code...
        // }
        include __DIR__ . "/../../views/products/index.php";
    }

    public function show($id) {
        $productModel = new Product();
        $product = $productModel->getProductById($id);
        include __DIR__ . "/../../views/products/details.php";
    }
}
?>
