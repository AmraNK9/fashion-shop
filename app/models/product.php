<?php

require_once __DIR__ . "/../../configs/database.php";

class Product {
    private $conn;
    private $tableName = "Fashion_Product";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // Fetch all products
    public function getAllProducts() {
        $query = "SELECT * FROM $this->tableName";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch a product by its ID
    public function getProductById($id) {
        $query = "SELECT * FROM $this->tableName WHERE product_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    // Fetch products by categoryId ID
    public function getProductsByCategoryId($id) {
        $query = "SELECT * FROM $this->tableName WHERE category_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Create a new product
    public function createProduct($data) {
        $query = "INSERT INTO $this->tableName (name, description, price, category_id, gender_id, size_id, img, stock_quantity) 
                  VALUES (:product_name, :product_description, :price, :category_id, :gender_id, :size_id, :img, :stock_quantity)";
        $stmt = $this->conn->prepare($query);
        // Bind parameters
        $stmt->bindParam(':product_name', $data['name']);
        $stmt->bindParam(':product_description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':category_id', $data['category_id'], PDO::PARAM_INT);
        $stmt->bindParam(':gender_id', $data['gender_id'], PDO::PARAM_INT);
        $stmt->bindParam(':size_id', $data['size_id'], PDO::PARAM_INT);
        $stmt->bindParam(':img', $data['image']);
        $stmt->bindParam(':stock_quantity', $data['quantity'], PDO::PARAM_INT);

        // Execute and return result
        return $stmt->execute();
    }

    // Update an existing product
    public function updateProduct($id, $data) {
        $query = "UPDATE $this->tableName 
                  SET name = :name, description = :description, price = :price, 
                      category_id = :category_id, gender_id = :gender_id, size_id = :size_id, 
                      img = :img, stock_quantity = :stock_quantity
                  WHERE product_id = :id";
        $stmt = $this->conn->prepare($query);
        $category_id = 1;

        // Bind parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->bindParam(':gender_id', $data['gender_id'], PDO::PARAM_INT);
        $stmt->bindParam(':size_id', $data['size_id'], PDO::PARAM_INT);
        $stmt->bindParam(':img', $data['img']);
        $stmt->bindParam(':stock_quantity', $data['stock_quantity'], PDO::PARAM_INT);

        // Execute and return result
        return $stmt->execute();
    }

    // Delete a product
    public function deleteProduct($id) {
        $query = "DELETE FROM $this->tableName WHERE product_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute and return result
        return $stmt->execute();
    }
}
?>
