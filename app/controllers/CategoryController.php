<?php
require_once __DIR__ . "/../models/productCategory.php";
class CategoryController {
    public function index() {
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        include __DIR__ . "/../../DMS/home.php";
    }

    public function show($id) {
        $categoryModel = new Category();
        $category = $categoryModel->getCategoryById($id);
        // include __DIR__ . "/../../views/products/index.php";
        return $category;
    }






    public function getAllCategories(){
        $categoryModel = new Category();


        return $categoryModel->getAllCategory();
    }




































}
?>
