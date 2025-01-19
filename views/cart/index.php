<?php
// require_once __DIR__ . '/../../app/controllers/CartController.php';

// $cartController = new CartController();
$cart = $_SESSION['cart'];

// Calculate subtotal and total
$subtotal = 0;
foreach ($cart as $productId => $details) {
  $subtotal += $details['price'] * $details['quantity'];
}
$total = $subtotal; // Add additional charges like tax or shipping here if needed
$deliveryCharge = 5.00; // Example delivery charge
$grandTotal = $total + $deliveryCharge;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .cart-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .cart-table th,
    .cart-table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #e0e0e0;
    }

    .cart-table th {
      background-color: #f9f9f9;
    }

    .product-img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 8px;
    }

    .quantity-input {
      width: 50px;
      text-align: center;
    }

    .summary-card {
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .summary-total {
      font-size: 1.2rem;
      font-weight: bold;
    }

    .btn-update {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 5px 10px;
    }

    .btn-update:hover {
      background-color: #0056b3;
    }

    .btn-remove {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 5px 10px;
    }

    #remove-btn {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 5px 10px;
    }

    #remove-btn:hover {
      background-color: #a71d2a;

    }

    .btn-remove:hover {
      background-color: #a71d2a;
    }

    .btn-checkout {
      background-color: #28a745;
      color: white;
      border: none;
      padding: 10px 15px;
      width: 100%;
      font-size: 1rem;
    }

    .btn-checkout:hover {
      background-color: #218838;
    }

    .space {
      height: 64px;
    }
  </style>
</head>

<body>
  <?php include __DIR__ . '/../layouts/header.php' ?>
  <div class="space"></div>
  <div class="container mt-5">
    <h1 class="mb-4">Checkout</h1>
    <?php if (empty($cart)): ?>
      <div class="alert alert-warning">Your cart is empty.</div>
    <?php else: ?>
      <div class="row">
        <!-- Cart Items -->
        <div class="col-lg-8">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Products</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($cart as $productId => $details): ?>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="http://localhost/fashion_shop/public/images/<?php echo $details['image']; ?>"
                        class="product-img me-3" alt="<?php echo $details['name']; ?>">
                      <div>
                        <p class="mb-0"><strong><?php echo $details['name']; ?></strong></p>
                        <p class="text-muted mb-0">Size: <?php echo $details['size']; ?></p>
                      </div>
                    </div>
                  </td>
                  <td>$<?php echo number_format($details['price'], 2); ?></td>
                  <td>
                    <div class="d-flex align-items-center">
                      <form method="POST" action="/api/cart.php">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                        <input type="number" disabled="true" name="quantity" value="<?php echo $details['quantity']; ?>"
                          class="quantity-input me-2" min="1">
                        <!-- <button type="submit" class="btn btn-update">Update</button> -->
                      </form>
                    </div>
                  </td>
                  <td>$<?php echo number_format($details['price'] * $details['quantity'], 2); ?></td>
                  <td>
                    <form method="POST" action="cart">
                      <input type="hidden" name="action" value="remove">
                      <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                      <button type="submit" class="btn btn-remove" value="<?php echo $productId; ?>"
                        id="remove-btn">Remove</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- Cart Summary -->
        <div class="col-lg-4">
          <div class="summary-card">
            <h4>Order Summary</h4>
            <hr>
            <div class="d-flex justify-content-between">
              <p>Subtotal:</p>
              <p>$<?php echo number_format($subtotal, 2); ?></p>
            </div>
            <div class="d-flex justify-content-between">
              <p>Delivery Charge:</p>
              <p>$<?php echo number_format($deliveryCharge, 2); ?></p>
            </div>
            <div class="d-flex justify-content-between summary-total">
              <p>Grand Total:</p>
              <p>$<?php echo number_format($grandTotal, 2); ?></p>
            </div>
            <hr>
            <a href="http://localhost/fashion_shop/views/cart/checkout.php">
              <button class="btn-checkout">Proceed to Checkout</button>

            </a>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <div class="space"></div>
  <?php include __DIR__ . '/../layouts/footer.php' ?>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const removeBtns = document.querySelectorAll(".btn-remove");
      const input = document.querySelector('input[name="inputName"]');

      removeBtns.forEach((btn) => {

        // Add to Cart button click event
        btn.addEventListener("click", function () {
          const productId = btn.value;

          const quantity = document.querySelector("input[type='number']").value;
          console.log("quantity ..", quantity)
          fetch("http://localhost/fashion_shop/cart", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              action: "remove",
              productId: productId,

            }),
          })
            .then((response) => response.json())
            .then((data) => {
              alert(data.message);
            })
          // .catch((error) => {
          //     console.log(error)
          //   console.error("Error:", error);
          // }); 
        });
      })

    });

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>