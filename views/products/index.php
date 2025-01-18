<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Shop - Our Products</title>
</head>
<style>
    <style>@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Spartan:wght@400;500;600;700&display=swap');

    body,
    html {
        margin: 0;
        padding-top: 40px;
    }

    :root {
        --header-height: 4rem;
        --first-color: hsl(263, 95%, 70%);
        --first-color-alt: hsl(129, 44%, 94%);
        --second-color: hsl(34, 94%, 87%);
        --title-color: hsl(0, 0%, 13%);
        --text-color: hsl(27, 82%, 2%);
        --text-color-light: hsl(60, 1%, 56%);
        --body-color: hsl(0, 0%, 100%);
        --container-color: hsl(0, 0%, 93%);
        --border-color: hsl(129, 36%, 85%);
        --border-color-alt: hsl(113, 15%, 90%);

        --body-font: 'Lato', sans-serif;
        --second-font: 'Spartan', sans-serif;
        --big-font: 3.5rem;
        --h1-font-size: 2.75rem;
        --h2-font: 2rem;
        --h3-font: 1.65rem;
        --h4-font: 1.375rem;
        --large-font: 1.125rem;
        --normal-font: 1rem;
        --small-font: 0.875rem;
        --smaller-font: 0.75rem;
        --tiny-font: 0.6875rem;
        --p-font-size: 1.1rem;

        --weight-400: 400;
        --weight-500: 500;
        --weight-600: 600;
        --weight-700: 700;

        --transition: cubic-bezier(0, 0, 0.05, 1);
    }

    input,
    textarea,
    body {
        color: var(--text-color);
        font-family: var(--body-font);
        font-size: var(--normal-font);
        font-weight: var(--weight-400);
    }

    body {
        background-color: var(--body-color);
    }

    h1,
    h2,
    h3,
    h4 {
        font-family: var(--second-color);
        color: var(--title-color);
        font-weight: var(--weight-600);
    }

    ul {
        list-style: none;
    }

    a {
        text-decoration: none;
    }

    img {
        max-width: 100%;
    }

    button,
    textarea,
    input {
        background-color: transparent;
        border: none;
        outline: none;
    }

    .container {
        max-width: 1320px;
        margin-inline: auto;
        padding-inline: .75rem;
    }

    .grid {
        display: grid;
        gap: 4rem;
    }

    .section {
        padding-block: 2rem;
    }

    .section-lg {
        padding-block: 7rem;
        background-image: url(./images/home.jpg);
        background-size: cover;
        background-position: fixed;
    }

    .section_title {
        font-size: var(--h4-font);
        margin-bottom: 1.5rem;
    }

    .section_title span {
        color: var(--first-color);
    }

    .products_container {
        grid-template-columns: repeat(4, 1fr);
    }

    .product_item {
        border: 1px solid var(--border-color);
        border-radius: 1.5rem;
    }

    .product_banner {
        padding: 0.625rem 0.75rem 0.75rem;
    }

    .product_banner,
    .product_images {
        position: relative;
    }

    .product_images {
        display: block;
        overflow: hidden;
        border-radius: 1.25rem;
        align-items: center;
    }

    .product_actions {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        column-gap: 0.5rem;
        transition: all .2s var(--transition);
    }

    .action_btn {
        width: 40px;
        height: 40px;
        line-height: 42px;
        text-align: center;
        border-radius: 50%;
        background-color: var(--first-color-alt);
        border: 1px solid var(--border-color);
        color: var(--text-color);
        font-size: var(--small-font);
        position: relative;
    }

    .action_btn::before,
    .action_btn::after {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        transition: all .3s cubic-bezier(0.71, 1.7, 0.77, 1.24);
    }

    .action_btn::before {
        content: '';
        top: -2px;
        border: .5rem solid transparent;
        border-top-color: var(--first-color);
    }

    .action_btn::after {
        content: attr(aria-label);
        bottom: 100%;
        background-color: var(--first-color);
        color: var(--body-color);
        font-size: var(--tiny-font);
        white-space: nowrap;
        padding-inline: 0.625rem;
        border-radius: 0.25rem;
        line-height: 2.58;
    }

    .product_badge {
        position: absolute;
        left: 1.25rem;
        top: 1.25rem;
        background-color: var(--first-color);
        color: var(--body-color);
        padding: 0.25rem 0.625rem;
        border-radius: 2.5rem;
        font-size: var(--tiny-font);
    }

    .product_badge.light-pink {
        background-color: hsl(341, 100%, 73%);
    }

    .product_badge.light-green {
        background-color: hsl(155, 20%, 67%);
    }

    .product_badge.light-orange {
        background-color: hsl(24, 100%, 73%);
    }

    .product_badge.light-blue {
        background-color: hsl(202, 53%, 76%);
    }

    .product_content {
        padding: 0 1.25rem 1.25rem;
        position: relative;
    }

    .product_category {
        color: var(--text-color-light);
        font-size: var(--smaller-font);
    }

    .product_title {
        font-size: var(--normal-font);
        margin-block: 0.75rem 0.5rem;
    }

    .product_rating {
        color: hsl(42, 100%, 50%);
        font-size: var(--smaller-font);
        margin-bottom: 0.75rem;
    }

    .price {
        color: var(--first-color);
        font-weight: var(--weight-600);
        font-size: var(--large-font);
    }

    .cart_btn {
        position: absolute;
        bottom: 1.6rem;
        right: 1.25rem;
    }

    .product_img.hover,
    .product_actions,
    .action_btn::before,
    .action_btn::after,
    .product_item:hover .product_img-default {
        opacity: 0;
    }

    .product_item:hover .product_img.hover,
    .product_item:hover .product_actions,
    .action_btn:hover::before,
    .action_btn:hover::after {
        opacity: 1;
    }

    .action_btn:hover::before,
    .action_btn:hover::after {
        transform: translateX(-50%) translateY(-0.5rem);
    }

    .action_btn:hover {
        background-color: var(--first-color);
        border-color: var(--first-color);
        color: var(--body-color);
    }

    .space {
        height: 60px;
    }
</style>

<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>
  
    <main>
        <div class="space"></div>
        <?php $categoryControler = new CategoryController(); ?>


        <section class="products section container">
            <?php if(isset($isfromCategoryById) && $isfromCategoryById == true) : ?>
            <h3 class="section_title">Our <span>Product</span> For <?php echo $categoryControler->show($categoryId)['category_name'] ?></h3>

            <?php else: ?>
            <h3 class="section_title">Our <span>Product</span></h3>
            <?php endif;?>
            <div class="tab_items">
                <div class="tab_item active-tab">
                    <div class="products_container grid">

                        <?php if (!empty($products) && is_array($products)): ?>

                            <?php foreach ($products as $product): ?>
                                <div class="product_item">
                                    <div class="product_banner">


                                        <a href="product/<?php echo urlencode($product['product_id']); ?>"
                                            class="product_images">
                                            <img src="photo/men.jpg" alt="" class="product_img">
                                            <img src="http://localhost/fashion_shop/public/images/<?php echo $product['img'] ?>"
                                                alt="<?php echo $product['img'] ?>" class="product_img">
                                        </a>

                                        <div class="product_actions">
                                            <a href="/fashion_shop/product/<?php echo urlencode($product['product_id']); ?>"
                                                class="action_btn" aria-label="Quick View">
                                                <i class="fi fi-rs-eye"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="product_content">
                                        <span
                                            class="product_category"><?php echo $categoryControler->show($product['category_id'])['category_name'] ?>
                                        </span>
                                        <a href="/fashion_shop/product/<?php echo urlencode($product['product_id']); ?>">
                                            <h3 class="product_title"><?php echo $product['name']; ?></h3>
                                        </a>
                                        <div class="product_rating">

                                        </div>
                                        <div class="product_price flex">
                                            <span class="price">$<?php echo number_format($product['price'], 2); ?></span>
                                        </div>


                                    </div>
                                </div>
                             
              
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="no-products-message">No products available at the moment. Please check back later.</p>
                        <?php endif; ?>



                    </div>
                </div>

            </div>
        </section>

    </main>
    <?php include __DIR__ . '/../layouts/footer.php'; ?>

</body>

</html>