<?php

require_once __DIR__ . '/../../app/models/OrderModel.php';

class CheckoutController
{
    public function handleCheckout()
    {
        if(!isset($_SESSION)){
            session_start();
        }

        // Ensure the cart isn't empty
        if (empty($_SESSION['cart'])) {
            $_SESSION['error'] = "Your cart is empty.";
            header("Location: /cart");
            exit();
        }

        // Validate user inputs
        $address = trim($_POST['address']);
        $paymentMethod = trim($_POST['paymentMethod']);

        if (empty($address)) {
            $_SESSION['error'] = "Delivery address is required.";
            header("Location: /checkout");
            exit();
        }

        if (empty($paymentMethod)) {
            $_SESSION['error'] = "Please select a payment method.";
            header("Location: /checkout");
            exit();
        }

        // Save order in database
        $orderModel = new OrderModel();
        $orderId = $orderModel->createOrder([
            'user_id' => $_SESSION['user_id'], // Assuming logged-in user
            'address' => $address,
            'payment_method' => $paymentMethod,
            'items' => $_SESSION['cart'],
            'total' => $this->calculateTotal($_SESSION['cart'])
        ]);

        // Clear cart after order is placed
        unset($_SESSION['cart']);

        // Redirect to order success page
        $_SESSION['success'] = "Order placed successfully! Your Order ID is #$orderId.";
        header("Location: /fashion_shop/products");
        exit();
    }

    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total + 5.00; // Add delivery charge (example: $5.00)
    }
}
