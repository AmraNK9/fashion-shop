<?php
class AdminController
{
    public function dashboard()
    {
        // echo "Welcome to the Admin Dashboard.";
        // Render admin dashboard view

        include __DIR__ . "/../../views/admin/dashboard.php";

    }

    public function storeProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['product_name']);
            $description = htmlspecialchars($_POST['product_description']);
            $price = floatval($_POST['product_price']);
            $quantity = floatval($_POST['product_quantity']);
            $category_id = $_POST['category_id'];
            $imageName = null;

            // Handle image upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $targetDir = __DIR__ . "/../../public/images/";
                $imageName = basename($_FILES['image']['name']);
                $targetFilePath = $targetDir . $imageName;
                echo $imageName;

                // Validate file type
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

                if (!in_array($imageFileType, $allowedTypes)) {
                    die("Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.");
                }

                if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                    die("Failed to upload image.");
                }
            }

            // Save the product in the database
            $productModel = new Product();
            $data =  array("name"=> $name, "price"=>$price, "description"=>$description,"image"=>$imageName,"quantity"=>$quantity,"category_id"=>$category_id);
            $productModel->createProduct($data);

            // Redirect to the admin dashboard
            header("Location: /fashion_shop/admin");
            exit;
        }
    }


    public function createProduct()
    {
        include __DIR__ . "/../../views/admin/create_product.php";

        // Render a form for adding a new product
    }

    public function editProduct($id)
    {
        echo "Edit product with ID: " . htmlspecialchars($id);
        // Fetch product details and render edit form
    }

    public function deleteProduct($id)
    {
        echo "Deleting product with ID: " . htmlspecialchars($id);
        // Perform delete operation
    }
}
?>