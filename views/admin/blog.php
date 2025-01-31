<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'fashion_shop');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle blog deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM blogs WHERE id=$id");
    header(header: "Location:http://localhost/fashion_shop/views/admin/blog.php");
    exit;
}

// Fetch blogs
$blogs = $conn->query("SELECT * FROM blogs ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Blog Management</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include_once __DIR__.'/layout/header.php' ?>
    <?php include_once __DIR__.'/layout/sidebar.php' ?>

<div class="container my-5">
    <h1 class="text-center mb-4">Blog Management</h1>
    <a href="add_blog.php" class="btn btn-success mb-3">Add Blog</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $blogs->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['title']; ?></td>
                <td><img src="http://localhost/fashion_shop/public/images/<?= $row['image']; ?>" width="100" alt=""></td>
                <td><?= $row['created_at']; ?></td>
                <td>
                    <a href="edit_blog.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="blog.php?delete=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include_once __DIR__.'/layout/footer.php' ?>

</body>
</html>
