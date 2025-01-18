<?php
require_once __DIR__ . "/../../configs/database.php";
class Category {
    private $conn;
    private $tableName = "Category";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // Fetch all category
    public function getAllCategory() {
        $query = "SELECT * FROM $this->tableName";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch a category by its ID
    public function getCategoryById($id) {
        $query = "SELECT * FROM $this->tableName WHERE category_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create a new category
    public function createCategory($data) {
        $query = "INSERT INTO $this->tableName (name, description) 
                  VALUES (:name, :description)";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);

        // Execute and return result
        return $stmt->execute();
    }

    // Update an existing category
    public function updateCategory($id, $data) {
        $query = "UPDATE $this->tableName 
                  SET name = :name, description = :description
                  WHERE category_id = :id";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);

        // Execute and return result
        return $stmt->execute();
    }

    // Delete a category
    public function deleteCategory($id) {
        $query = "DELETE FROM $this->tableName WHERE category_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute and return result
        return $stmt->execute();
    }
}
?>
