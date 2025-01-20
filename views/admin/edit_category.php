<?php
include_once __DIR__ . '/../../configs/Database.php';
include_once __DIR__ . '/layout/header.php';
include_once __DIR__ . '/layout/sidebar.php';

$database = new Database();
$conn = $database->getConnection();

$success = '';
$error = '';

// Get the category ID from the URL
if (isset($_GET['id'])) {
    $category_id = intval($_GET['id']);

    // Fetch the category details
    $query = "SELECT * FROM Category WHERE category_id = :category_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    $stmt->execute();
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$category) {
        echo "<div class='alert alert-danger'>Category not found.</div>";
        exit;
    }
} else {
    echo "<div class='alert alert-danger'>Invalid category ID.</div>";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = htmlspecialchars(strip_tags($_POST['category_name']));
    $description = htmlspecialchars(strip_tags($_POST['description']));

    // Validate inputs
    if (empty($category_name) || empty($description)) {
        $error = "All fields are required.";
    } else {
        // Update the category in the database
        $query = "UPDATE Category SET category_name = :category_name, description = :description WHERE category_id = :category_id";
        $stmt = $conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':category_name', $category_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // $success = "Category updated successfully.";
            header("Location: /fashion_shop/views/admin/categories.php");
            exit;
        } else {
            $error = "Failed to update category.";
        }
    }
}
?>

<div class="container mt-4">
    <h2>Edit Category</h2>

    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
   
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name"
                value="<?php echo htmlspecialchars($category['category_name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"
                required><?php echo htmlspecialchars($category['description']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="http://localhost/fashion_shop/views/admin/categories_dashboard.php"
            class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include_once __DIR__ . '/layout/footer.php'; ?>