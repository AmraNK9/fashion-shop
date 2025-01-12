<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Shop - Our Products</title>
</head>
<style>
    /* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
    background-color: #cf2929;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 1rem;
}

h1, h2 {
    margin: 0;
    color: #222;
}

/* Section styling */
.product-section {
    margin-top: 16px;
    padding: 2rem 1rem;
    text-align: center;
}

.section-title {
    font-size: 2rem;
    margin-bottom: 1.5rem;
    text-transform: uppercase;
}
    
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

/* Product card */
.product-card {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.product-image {
    width: 200;
    height: 200;
    display: block;
    object-fit: cover;
}

.product-info {
    padding: 1rem;
}

.product-name {
    font-size: 1.25rem;
    margin: 0.5rem 0;
}

.product-price {
    font-size: 1rem;
    color: #007b5e;
    font-weight: bold;
}

.product-link {
    display: inline-block;
    margin-top: 0.5rem;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    color: #fff;
    background-color: #007b5e;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.product-link:hover {
    background-color: #005940;
}

/* No products message */
.no-products-message {
    font-size: 1.2rem;
    color: #666;
    margin-top: 2rem;
}

</style>
<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <main>
        <section class="product-section">
            <div class="container">
                <h1 class="section-title">Our Products</h1>
                <div class="product-grid">
                    <?php if (!empty($products) && is_array($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <!-- <?php echo $product['img']?> -->
                            <article class="product-card">
                                <img 
                                    src="http://localhost/fashion_shop/public/images/<?php echo $product['img']?>" 
                                    alt="<?php echo $product['img']?>" 
                                    class="product-image"
                                >
                                <div class="product-info">
                                    <h2 class="product-name"><?php echo $product['name']; ?></h2>
                                    <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
                                    <a 
                                        href="product/<?php echo urlencode($product['product_id']); ?>" 
                                        class="product-link"
                                    > 
                                        View Details
                                    </a>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="no-products-message">No products available at the moment. Please check back later.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
        <?php include __DIR__ . '/../layouts/header.php'; ?>

</body>
</html>
