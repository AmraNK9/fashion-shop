<?php
$conn = new mysqli('localhost', 'root', '', 'fashion_shop');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];

    $targetDir = __DIR__ . "/../../public/images/";
    $imageName = basename($_FILES['image']['name']);
    $targetFilePath = $targetDir . $imageName;

    // Move uploaded file
    move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);

    $conn->query("INSERT INTO blogs (title, content, image) VALUES ('$title', '$content', '$image')");
    header(header: "Location:http://localhost/fashion_shop/views/admin/blog.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
    <h1 class="text-center mb-4">Add Blog</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Blog</button>
    </form>
</div>
</body>
</html>
