<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $catgory['category_name']; ?></title>
</head>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>
    <p><?php echo $category['category_name']; ?></p>
    <p><?php echo $category['description']; ?></p>
</body>
</html>
