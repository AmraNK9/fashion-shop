<?php
include_once __DIR__.'/../../configs/Database.php';
include_once __DIR__.'./layout/header.php';
include_once __DIR__.'./layout/sidebar.php';

// Initialize database connection
$database = new Database();
$conn = $database->getConnection();

// Fetch all products
$query = "SELECT p.product_id, p.name, p.price, p.stock_quantity, c.category_name
          FROM fashion_product p
          LEFT JOIN category c ON p.category_id = c.category_id
          ORDER BY p.product_id DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Products Dashboard</h2>

    <!-- Add Product Button -->
    <div class="mb-4">
        <a href="create_product.php" class="btn btn-success">Create Product</a>
    </div>

    <!-- Products Table -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['product_id']; ?></td>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo htmlspecialchars($product['category_name']); ?></td>
                    <td><?php echo number_format($product['price'], 2); ?></td>
                    <td><?php echo $product['stock_quantity ']; ?></td>
                    <td>
                        <a href="edit_product.php?id=<?php echo $product['product_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_product.php?id=<?php echo $product['product_id']; ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">No products found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
