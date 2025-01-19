<?php
include_once __DIR__ . '/../../configs/Database.php';
include_once __DIR__ . './layout/header.php';
include_once __DIR__ . './layout/sidebar.php';

$database = new Database();
$conn = $database->getConnection();

$query = "SELECT * FROM categories";
$stmt = $conn->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
    <!-- <div class="d-flex j-space-between">
        <h1>Categories</h1>
        <a href="http://localhost/fashion_shop/views/admin/create_category.php" class="btn btn-primary btn-sm">Edit</a>

    </div> -->
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
                    <td><?php echo $category['id']; ?></td>
                    <td><?php echo $category['name']; ?></td>
                    <td><?php echo $category['description']; ?></td>
                    <td>
                        <a href="edit_category.php?id=<?php echo $category['id']; ?>"
                            class="btn btn-primary btn-sm">Edit</a>
                        <a href="delete_category.php?id=<?php echo $category['id']; ?>"
                            class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include_once __DIR__ . './layout/footer.php'; ?>