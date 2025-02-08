<?php
include_once __DIR__ . '/../../configs/Database.php';
include_once __DIR__ . './layout/header.php';
include_once __DIR__ . './layout/sidebar.php';

// Initialize database connection
$database = new Database();
$conn = $database->getConnection();

// Initialize messages
$success = '';
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = htmlspecialchars(strip_tags($_POST['category_name']));
    $description = htmlspecialchars(strip_tags($_POST['description']));

    // Validate input
    if (empty($category_name)) {
        $error = "Category name is required.";
    } else {
        // Insert into categories table
        $query = "INSERT INTO category (category_name, description) VALUES (:category_name, :description)";
        $stmt = $conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':category_name', $category_name);
        $stmt->bindParam(':description', $description);

        // Execute the query
        try {
            //code...
            $stmt->execute();
            header("Location: http://localhost/fashion_shop/views/admin/categories.php");

        } catch (Throwable $th) {
            //throw $th;
            echo "<script>window.alert($th)</script>";
        }

    }
}

// Fetch all categories
$query = "SELECT * FROM category ORDER BY category_id DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Create Category</h2>

        <!-- Success/Error Messages -->
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Category Creation Form -->
        <form action="" method="POST" class="mb-5">
            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>

        <!-- Categories Table -->
        <h3>Existing Categories</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?php echo $category['category_id']; ?></td>
                            <td><?php echo htmlspecialchars($category['category_name']); ?></td>
                            <td><?php echo htmlspecialchars($category['description']); ?></td>
                            <td>
                                <a href="delete_category.php?id=<?php echo $category['category_id']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No categories found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>