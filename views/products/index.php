<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fashion Shop</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>
    <h1>Our Products</h1>
    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="/public/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <h2><?php echo $product['name']; ?></h2>
                <p>$<?php echo $product['price']; ?></p>
                <a href="?product/<?php echo $product['product_id']; ?>">View Details</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
