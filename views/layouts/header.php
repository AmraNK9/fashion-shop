<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Header</title>
  
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
  background-color:#000;
  border: none;
  color: #fff;
  padding: 5px 10px;
  font-size: 14px;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.login-button:hover {
  background-color: #000; 
}
 
  </style>
</head>
<body>
  <header class="header">
    
    <div class="logo fw-bold fs-4">Logo</div>

    
    <nav class="nav-links d-none d-md-flex">
      <a href="#">Shop</a>
      <a href="#">Our Story</a>
      <a href="#">Blog</a>
      <a href="#">Contact Us</a>
    </nav>

   
    <div class="icons">
      <i class="fas fa-search"></i>
      <i class="far fa-heart"></i>
      <i class="fas fa-shopping-bag"></i>
      <a href="login.php"><button class="login-button">Login</button></a>
    </div>
  </header>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>