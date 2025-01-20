<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>Course Website</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Spartan:wght@400;500;600;700&display=swap');

    body,
    html {
      width: 100%;
      /* Ensure full viewport width */
      height: 100%;
      /* Ensure full viewport height */
      overflow-x: hidden;
      /* Prevent horizontal scrolling */
      font-family: 'Lato', sans-serif;
      /* Default font */
      padding-top: 30px;

    }

    :root {
      --header-height: 4rem;
      --first-color: hsl(263, 73.00%, 82.50%);
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
      max-width: 1500px;
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
      padding-block: 9rem;
      background-image: url(photo/home.jpg);
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

    .form_input {
      border: 1px solid var(--border-color-alt);
      padding-inline: 1rem;
      height: 45px;
      border-radius: 0.25rem;
      font-size: var(--small-font);
    }

    .flex {
      display: flex;
      align-items: center;
      column-gap: .5rem;
    }

    .nav,
    .nav_menu,
    .nav_list,
    .header_user-actions {
      display: flex;
      align-items: center;
    }

    .nav {
      height: calc(var(--header-height) + 2.5rem);
      justify-content: space-between;
      column-gap: 1rem;
    }

    .nav_logo-img {
      width: 150px;
    }

    .nav_menu {
      width: 100%;
      margin-left: 2.5rem;
    }

    .nav_list {
      column-gap: 2.5rem;
      margin-right: auto;
    }

    .nav_link {
      color: var(--title-color);
      font-weight: var(--weight-700);
      transition: all 0.2s var(--transition);
    }

    .header_search {
      width: 340px;
      position: relative;
    }

    .header_search .form_input {
      width: 80%;
    }

    .search_btn {
      position: absolute;
      top: 24%;
      right: 1.25rem;
      cursor: pointer;
    }

    .header_user-actions {
      column-gap: 1.25rem;
    }

    .header_action-btn {
      position: relative;
    }

    .header_action-btn i {
      width: 30px;
    }


    .active_link,
    .nav_link:hover {
      color: var(--first-color);
    }

    /*=== Home */
    .home_container {
      grid-template-columns: 5fr 7fr;
      align-items: right;
      text-align: center;
    }

    .home_subtitle,
    .home_description {
      font-size: var(--large-font);
    }

    .home_subtitle {
      font-family: var(--second-color);
      font-weight: var(--weight-600);
      margin-bottom: 1rem;
      display: block;
    }

    .home_title {
      font-size: var(--h1-font-size);
      font-weight: var(--weight-700);
      line-height: 1.4;
    }

    .home_title span {
      color: var(--first-color);
      font-size: var(--second-font);
    }

    .home_description {
      margin-block: .5rem 2rem;
    }

    .btn {
      display: inline-block;
      background-color: var(--first-color);
      border: 2px solid var(--first-color);
      color: var(--body-color);
      padding-inline: 1.75rem;
      height: 49px;
      line-height: 49px;
      border-radius: .25rem;
      font-family: var(--second-font);
      font-size: var(--small-font);
      font-weight: var(--weight-700);
      transition: all 0.4s var(--transition);
    }

    .btn:hover {
      background-color: transparent;
      color: var(--first-color);
    }

    .category_item {
      text-align: center;
      border: 1px solid var(--border-color);
      padding: 0.625rem 0.625rem 1.25rem;
      border-radius: 1.25rem;
    }

    .category_img {
      border-radius: 0.75rem;
      margin-bottom: 1.25rem;
    }

    .category_title {
      color: var(--text-color);
      font-size: var(--small-font);
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

    .feactures_container {
      grid-template-columns: repeat(4, 1fr);
      padding: 5%;
    }


    .feature_img {
      width: 40px;
    }

    .feature_text h3 {
      font-size: var(--h4-font);
      font-weight: var(--weight-700);
    }

    .feature_text p {
      font-size: var(--small-font);
    }

    .subscribe-box {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: transparent;
      padding: 8px 12px;
      border: 2px solid #fff;
      /* White border */
      border-radius: 10px;
      margin-top: 15px;
      color: #fff;
      /* White text */
    }

    .subscribe-box input {
      background: transparent;
      border: none;
      outline: none;
      color: #fff;
      /* White text */
      width: 100%;
      font-size: 16px;
      /* Optional for better readability */
    }

    .subscribe-box input::placeholder {
      color: #fff;
      /* Placeholder text in white */
    }

    .subscribe-box button {
      background: none;
      border: none;
      color: #fff;
      /* White color for the arrow icon */
      font-size: 20px;
      cursor: pointer;
    }

    .social-icons {
      text-align: right;
    }

    .social-icons a {
      font-size: 20px;
      margin-left: 15px;
    }

    .payment-icons {
      text-align: left;
    }

    .payment-icons img {
      margin: 5px;
      width: 40px;
    }

    .footerb_container {
      grid-template-columns: repeat(3, 1fr);
    }

    .copyright {
      text-align: center;
      font-size: 14px;
      color: #fff;
      flex: 1;

    }

    .hero {
      /* background: url('https://via.placeholder.com/500x200') no-repeat center center; */
      height: 600px;
      background-image: linear-gradient(rgba(246, 238, 238, 0.3), rgba(250, 160, 160, 0.3)), url(./images/background.jpg);
      background-size: cover;
      background-position: center;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1rem;
      align-items: center;
      padding: 10%;
      background-image: url(http://localhost/fashion_shop/DMS/photo/home.jpg);

    }

    .hero .content {
      max-width: 500px;
      text-align: center;

    }

    .hero h1 {
      font-size: 48px;
    }

    .hero p {
      font-size: 24px;
    }

    .section_title span {
      color: ;
    }

    .section_title span {
      color: #6f42c1;
    }
  </style>
  <!-- <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" /> -->
  <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"> -->

  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    /> -->
</head>

<body>

  <?php include 'header.php'; ?>

  <!--home-->
  <!--<section class="home section-lg container">
      <div class="home_container container grid">
        <div class="home_content">
          <span class="home_subtitle">Classic Exclusive</span>
          <h1 class="home_title">
            Fashion Trending <br><span>Great Collection</span>
          </h1>
          <p class="home_description">
            Save more with coupons & up to 20% off !</p>
            <a href="shop.php" class="btn btn-black">Shop Now</a>
        </div>
      
      </div>
    </section>-->


  <!--home-->
  <div class="hero animate__animated animate__fadeIn">
    <div class="content">
      <h1 class="home_title">Fashion Trending<br><span>Great Collection</span></h1>
      <p class="home_description">Save more with coupons & up to 20% off !</p>
      <a href="/fashion_shop/products"><button
          class="btn animate__animated animate__bounceIn p-2 text-white bg-pruple custom-btn">Shop Now</button></a>
    </div>
  </div>
  <style>
    .bg-pruple {
      background-color: #6f42c1 !important;
      border-radius: 30px !important;
    }

    .text-white {
      color: #fff !important;
    }

    .custom-btn {
      width: 150px;
      padding: 15px 20px;
      font-size: 16px;
      text-align: center;
    }
  </style>
  <!--home end-->


  <!--category-->
  <section class="categories container section">
    <h3 class="section_title">Available<span> Categories</span></h3>

    <div class="categories_container swiper">
      <div class="swiper-wrapper">
        <?php if (!empty($categories) && is_array($categories)): ?>
          <?php foreach ($categories as $category): ?>
            <a href="http://localhost/fashion_shop/productsByCategory/<?php echo $category['category_id'] ?>">
            <p class="category_item swiper-slide">
              <!-- <img src="http://localhost/fashion_shop/dms/photo/<?php echo $category['category_name'] ?>.jpg" alt="" class="category_img"> -->
              <span class="category_title"><?php echo $category['category_name'] ?></span>
            </p>
            </a>
         
          <?php endforeach; ?>
        <?php else: ?>
          <p class="no-products-message">No products available at the moment. Please check back later.</p>
        <?php endif; ?>




      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </section>


  <!--Features-->
  <div class="feactures_container grid container">
    <div class="feacture_box">
      <img src="http://localhost/fashion_shop/dms/photo/free.png" alt="" class="feature_img">
      <div class="feature_text">
        <h3>Free Shipping</h3>
        <p>Free shiping for order above $250</p>
      </div>
    </div>

    <div class="feacture_box">
      <img src="http://localhost/fashion_shop/dms/photo/money.png" alt="" class="feature_img">
      <div class="feature_text">
        <h3>Money Guarantee</h3>
        <p>Within 30 days for an exchange</p>
      </div>
    </div>

    <div class="feacture_box">
      <img src="http://localhost/fashion_shop/dms/photo/online.png" alt="" class="feature_img">
      <div class="feature_text">
        <h3>Online Support</h3>
        <p>24 hours a day , 7 days a week</p>
      </div>
    </div>

    <div class="feacture_box">
      <img src="http://localhost/fashion_shop/dms/photo/payment.png" alt="" class="feature_img">
      <div class="feature_text">
        <h3>Flexible Payment</h3>
        <p>Pay with multiple credit cards</p>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> -->


  <script src="script.js"></script>
  <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
  <script src="main.js"></script>
  <?php include 'footer.php'; ?>
</body>

</html>