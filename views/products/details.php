<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $product['name']; ?></title>
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>
    <h1><?php echo $product['name']; ?></h1>
    <img src="/public/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
    <p><?php echo $product['description']; ?></p>
    <p>Price: $<?php echo $product['price']; ?></p>
    <a href="/cart/add?id=<?php echo $product['id']; ?>">Add to Cart</a>
</body>
</html>
