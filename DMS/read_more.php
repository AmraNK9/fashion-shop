<!-- Main Blog Page (index.html) -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Main Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 40px;
        }

        /* Custom CSS */
        .blog-title {
            font-size: 2rem;
            font-weight: bold;
        }

        .read-more-btn {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
        }

        .read-more-btn:hover {
            background-color: #0056b3;
            color: white;
        }

        .blog-header-image {
            width: 100%;
            height: 450px;
            /* You can change the height as needed */
            object-fit: cover;
            /* Makes sure the image covers the area without distortion */
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <?php $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'fashion_shop';

    // Create connection
    $conn = new mysqli($host, $user, $password, $database); ?>
    <?php

// Get the blog ID from the URL
$id = $_GET['id'];

// Fetch blog details
$query = "SELECT * FROM blogs WHERE id = $id";
$result = $conn->query($query);
$blog = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $blog['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .blog-title { font-size: 2.5rem; font-weight: bold; margin-bottom: 20px; }
        .blog-content { font-size: 1.2rem; line-height: 1.8; }
    </style>
</head>
<body>
    <div class="container my-5">
        <a href="blog.php" class="btn btn-secondary mb-3">Back to Blog</a>
        <p class="text-muted">Published on <?= date('d M Y', strtotime($blog['created_at'])); ?></p>
        <img src="http://localhost/fashion_shop/public/images/<?= $blog['image']; ?>" class="img-fluid mb-4" alt="<?= $blog['title']; ?>">
        <h1 class="blog-title"><?= $blog['title']; ?></h1>
        <div class="blog-content">
            <p><?= nl2br($blog['content']); ?></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'footer.php'; ?>
</html>
