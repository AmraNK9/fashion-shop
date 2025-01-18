<?php
/*session_start();
include_once 'Database.php';
// Database connection parameters
$servername = "localhost"; // Change to your DB server
$username = "root"; // Change to your DB username
$password = ""; // Change to your DB password
$dbname = "your_database_name"; // Change to your DB name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to extract product from the cart table
function getProductFromCart($productId) {
    global $conn;
    // SQL query to fetch the product by product ID
    $sql = "SELECT * FROM cart WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output the product details (you can customize this as needed)
        while ($row = $result->fetch_assoc()) {
            echo "Product ID: " . $row['product_id'] . "<br>";
            echo "Product Name: " . $row['product_name'] . "<br>";
            echo "Quantity: " . $row['quantity'] . "<br>";
            echo "Price: " . $row['price'] . "<br>";
        }
    } else {
        echo "No product found in the cart with the given ID.";
    }

    $stmt->close();
}

// Function to delete a product from the cart table
function deleteProductFromCart($productId) {
    global $conn;
    // SQL query to delete the product by product ID
    $sql = "DELETE FROM cart WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    if ($stmt->execute()) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
    $stmt->close();
}

// Example usage:

// Extract product from the cart (example with product ID 1)
$productId = 1; // Change this to the product ID you want to extract
getProductFromCart($productId);

// Delete product from the cart (example with product ID 1)
deleteProductFromCart($productId);

// Close the connection
$conn->close();*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff;
      padding-top: 70px;
    }

    .product-image {
      width: 50px;
      height: auto;
    }

    .quantity-box {
      display: flex;
      border: 1px solid #ced4da;
      border-radius: 5px;
      width: 100px;
      overflow: hidden;
    }

    .quantity-box button {
      background-color: #fff;
      border: none;
      padding: 5px 10px;
      font-size: 16px;
      color: #000;
    }

    .quantity-box input {
      width: 40px;
      text-align: center;
      border: none;
      outline: none;
      font-size: 14px;
    }

    .quantity-box button:hover {
      background-color: #e9ecef;
    }

    .checkout-summary {
      background-color: #fff;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .checkout-summary h5,
    .checkout-summary span {
      font-weight: bold;
      color: #000;
    }
    .custom-btn {
    padding: 5px 10px; /* Adjust padding to make buttons smaller */
    font-size: 12px;   /* Make font size consistent */
    line-height: 1.2;  /* Control button height */
    width: 100px;      /* Set a fixed width for consistent size */
    text-align: center; /* Center text within the button */
  }
  </style>
</head>
<body>
  <?php include 'header.php'; ?>

  <div class="container my-5">
    <!-- Checkout Header -->
    <h2 class="mb-4">Checkout</h2>

    <div class="row">
      <!-- Product Section -->
      <div class="col-md-8">
        <table class="table align-middle">
          <thead>
            <tr>
              <th scope="col">Products</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Subtotal</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <!-- Example Product -->
            <tr>
              <td>
                <img src="https://via.placeholder.com/50" alt="product" class="product-image me-2">
                <span>Example Product<br><small>Size: M</small></span>
              </td>
              <td>$50.00</td>
              <td>
                <div class="quantity-box">
                  <button>-</button>
                  <input type="text" value="1" readonly>
                  <button>+</button>
                </div>
              </td>
              <td>$50.00</td>
              <td><a href="#" class="fa fa-trash text-danger"></a></td>
            </tr>
            <!-- Add more products as needed -->
          </tbody>
        </table>
        <!-- Buttons for Back and Clear Cart -->
        <div class="d-flex justify-content-between action-buttons">
  <!-- Back Button -->
  <a href="cart.php" class="btn btn-outline-secondary custom-btn">Back</a>
  
  <!-- Clear Cart Button -->
  <button class="btn btn-danger custom-btn" onclick="clearCart()">Clear Cart</button>
</div>
      </div>

      <!-- Summary Section -->
      <div class="col-md-4">
        <div class="checkout-summary shadow-sm">
          <div class="d-flex justify-content-between mb-2">
            <h5>Subtotal</h5>
            <span>$50.00</span>
          </div>
          <div class="mb-3">
            <label for="discountCode" class="form-label">Enter Discount Code</label>
            <div class="input-group">
              <input type="text" class="form-control" id="discountCode" placeholder="DISCOUNT10">
              <button class="btn btn-dark">Apply</button>
            </div>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span>Delivery Charge</span>
            <span>$5.00</span>
          </div>
          <hr>
          <div class="d-flex justify-content-between fw-bold mb-3">
            <span>Grand Total</span>
            <span>$55.00</span>
          </div>
          <a href="submitorder.php"><button class="btn btn-dark w-100 text-white">Submit Order</button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <?php include 'footer.php'; ?>
</body>
</html>
