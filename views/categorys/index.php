<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fashion Shop</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>
    <h1>Our Categorys</h1>
    <div class="categorys">
        <?php foreach ($categorys as $category): ?>
            <div class="category">
                <h2><?php echo $category['category_name']; ?></h2>
                <p>$<?php echo $category['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
