<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Product</title>
    <link rel="stylesheet" href="/public/css/admin-styles.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f9;
        color: #333;
    }

    header {
        background-color: #007b5e;
        color: #fff;
        padding: 1rem 2rem;
        text-align: center;
    }

    main {
        display: flex;
        justify-content: center;
        padding: 2rem;
    }

    .form-section {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        width: 100%;
        max-width: 500px;
    }

    form label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    form input,
    form textarea,
    form button {
        width: 100%;
        padding: 0.75rem;
        margin-bottom: 1rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
    }

    form button {
        background-color: #007b5e;
        color: #fff;
        border: none;
        cursor: pointer;
        font-size: 1rem;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
    }

    form button:hover {
        background-color: #005940;
    }
</style>

<body>
    <header>
        <h1>Admin Panel - Add Product</h1>
    </header>
    <?php include_once __DIR__."/../../app/controllers/CategoryController.php"?>

    <?php $CategoryControler2 = new CategoryController();
    $categories = $CategoryControler2->getAllCategories();
    ?>
    <main>
        <section class="form-section">
            <form action="http://localhost/fashion_shop/admin/store" method="POST" enctype="multipart/form-data">
                <label for="product-name">Product Name:</label>
                <input type="text" id="product-name" name="product_name" required>

                <label for="product-price">Price (USD):</label>
                <input type="number" id="product-price" name="product_price" step="0.01" required>

                <label for="product-quantity">Product quantity:</label>
                <input type="number" id="product-quantity" name="product_quantity" step="1" required>

                <label for="product-image">Upload Image:</label>
                <input type="file" id="product-image" name="image" accept="image/*" required>
                <label for="product-image">Categories</label>
                <select id="category_id" name="category_id">
                    <?php foreach ($categories as $category): ?>

                    <option value="<?php echo $category['category_id']?>" >
                        <?php echo $category['category_name']?>
                    </option>
                    <?php endforeach;?>
                </select>
                <br><br>
                <label for="product-description">Description:</label>
      
                <textarea id="product-description" name="product_description" rows="4"></textarea>
                <button type="submit">Add Product</button>
            </form>
        </section>
    </main>
</body>

</html>