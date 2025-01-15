<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Header with Search</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #fff;
    }

    .header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }

    .nav-links {
      display: flex;
      transition: opacity 0.3s ease-in-out;
    }

    .nav-links.hidden {
      opacity: 0;
      pointer-events: none;
    }

    .nav-links a {
      color: #000;
      text-decoration: none;
      margin: 0 15px;
      font-size: 16px;
      transition: color 0.3s;
    }

    .nav-links a:hover {
      color: #007bff;
    }

    .icons {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .icons i {
      font-size: 18px;
      color: #000;
      cursor: pointer;
    }

    .login-button {
      background-color: #000;
      border: none;
      color: #fff;
      padding: 5px 10px;
      font-size: 14px;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .login-button:hover {
      background-color: #333;
    }

    .search-box {
      display: none;
      flex-grow: 1;
      margin-left: 15px;
    }

    .search-box input {
      width: 100%;
      padding: 5px 10px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .search-box.visible {
      display: flex;
    }
  </style>
</head>
<body>
  <header class="header">
    <div class="logo fw-bold fs-4">Logo</div>

    <nav class="nav-links" id="navLinks">
      <a href="http://localhost/fashion_shop">Shop</a>
      <a href="#">Our Story</a>
      <a href="#">Blog</a>
      <a href="#">Contact Us</a>
    </nav>

    <div class="icons">
      <i class="fas fa-search" id="searchIcon"></i>
      <i class="far fa-heart"></i>
      <a href="http://localhost/fashion_shop/cart">
        <i class="fas fa-shopping-bag"></i>
      </a>
      <a href="http://localhost/fashion_shop/views/auth/login.php"><button class="login-button">Login</button></a>
    </div>

    <div class="search-box" id="searchBox">
      <input type="text" placeholder="Search...">
    </div>
  </header>

  <script>
    const searchIcon = document.getElementById('searchIcon');
    const searchBox = document.getElementById('searchBox');
    const navLinks = document.getElementById('navLinks');

    searchIcon.addEventListener('click', () => {
      searchBox.classList.toggle('visible');
      navLinks.classList.toggle('hidden');
    });
  </script>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
