<?php
include_once __DIR__.'/../../configs/Database.php';
include_once __DIR__.'./layout/header.php';
include_once __DIR__.'./layout/sidebar.php';

$database = new Database();
$conn = $database->getConnection();

$success = '';
$error = '';

// Get product ID from the URL
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Fetch product details
    $query = "SELECT * FROM fashion_product WHERE product_id = :product_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        echo "<div class='alert alert-danger'>Product not found.</div>";
        exit;
    }

    // Fetch categories for the dropdown
    $query = "SELECT * FROM category";
    $categories_stmt = $conn->prepare($query);
    $categories_stmt->execute();
    $categories = $categories_stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "<div class='alert alert-danger'>Invalid product ID.</div>";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $price = floatval($_POST['price']);
    $stock_quantity = intval($_POST['stock_quantity']);
    $category_id = intval($_POST['category_id']);

    if (empty($name) || empty($price) || empty($stock_quantity) || empty($category_id)) {
        $error = "All fields are required.";
    } else {
        // Update product in the database
        $query = "UPDATE fashion_product 
                  SET name = :name, price = :price, stock_quantity = :stock_quantity, category_id = :category_id 
                  WHERE product_id = :product_id";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock_quantity', $stock_quantity);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $success = "Product updated successfully.";
            header("Location: /fashion_shop/views/admin/products.php");
            exit;
            // echo "<script>alert('Product updated successfully.'); window.location.href = 'products.php';</script>";

        } else {
            $error = "Failed to update product.";
        }
    }
}
?>

<div class="container mt-4">
    <h2>Edit Product</h2>

    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="stock_quantity" class="form-label">Stock Quantity</label>
            <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="<?php echo htmlspecialchars($product['stock_quantity']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['category_id']; ?>" <?php echo $product['category_id'] == $category['category_id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category['category_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="products.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include_once __DIR__.'/layout/footer.php'; ?>
