<?php
session_start();
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: /cart");
    exit();
}

$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .space{
            height: 100px
        }
    </style>
</head>
<body>
<?php include __DIR__.'/../layouts/header.php' ?>
    <div class="space">

    </div>
    <div class="container mt-5">
        <h1>Checkout</h1>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="http://localhost/fashion_shop/check_out" method="POST">
            <div class="mb-3">
                <label for="address" class="form-label">Delivery Address:</label>
                <textarea id="address" name="address" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Payment Method:</label>
                <div>
                    <input type="radio" id="creditCard" name="paymentMethod" value="Credit Card" required>
                    <label for="creditCard">Credit Card</label>
                </div>
                <div>
                    <input type="radio" id="paypal" name="paymentMethod" value="PayPal" required>
                    <label for="paypal">PayPal</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
    <div class="space"></div>
  <?php include __DIR__.'/../layouts/footer.php' ?>

</body>
</html>
