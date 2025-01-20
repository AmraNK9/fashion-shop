<?php
include_once __DIR__ . '/../../configs/Database.php';
include_once __DIR__ . './layout/header.php';
include_once __DIR__ . './layout/sidebar.php';

$database = new Database();
$conn = $database->getConnection();

$query = "SELECT * FROM Category";
$stmt = $conn->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
    <h1>Categories</h1>

    <div class="mb-4">
        <a href="create_category.php" class="btn btn-success">Create Category</a>
    </div>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo $category['category_id']; ?></td>
                    <td><?php echo $category['category_name']; ?></td>
                    <td><?php echo $category['description']; ?></td>
                    <td>
                        <a href="edit_category.php?id=<?php echo $category['category_id']; ?>"
                            class="btn btn-primary btn-sm">Edit</a>
                        <a href="delete_category.php?id=<?php echo $category['category_id']; ?>"
                            class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include_once __DIR__ . './layout/footer.php'; ?>