<?php
include_once __DIR__.'/../../configs/Database.php';

$database = new Database();
$conn = $database->getConnection();

// Check if the category ID is provided
if (isset($_GET['id'])) {
    $category_id = intval($_GET['id']);

    // Check if the category exists
    $query = "SELECT * FROM Category WHERE category_id = :category_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    $stmt->execute();
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$category) {
        echo "<div class='alert alert-danger'>Category not found.</div>";
        exit;
    }

    // Delete the category
    $query = "DELETE FROM Category WHERE category_id = :category_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>alert('Category deleted successfully.'); window.location.href = 'categories.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Failed to delete category.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Invalid category ID.</div>";
    exit;
}
?>
