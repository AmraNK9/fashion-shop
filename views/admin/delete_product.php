<?php
include_once __DIR__.'/../../configs/Database.php';

$database = new Database();
$conn = $database->getConnection();

// Check if product ID is provided
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Check if the product exists
    $query = "SELECT * FROM fashion_product WHERE product_id = :product_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        echo "<script>alert('Product not found.'); window.location.href = 'products.php';</script>";
        exit;
    }

    // Delete the product
    $query = "DELETE FROM fashion_product WHERE product_id = :product_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

    

    if ($stmt->execute()) {
        echo "<script>alert('Product deleted successfully.'); window.location.href = 'products.php';</script>";
    } else {
        echo "<script>alert('Failed to delete product.'); window.location.href = 'products.php';</script>";
    }
} else {
    echo "<script>alert('Invalid product ID.'); window.location.href = 'products.php';</script>";
}
?>
