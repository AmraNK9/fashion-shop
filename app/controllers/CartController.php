<?php
// CartController.php

class CartController
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }   
    }

    public function addToCart($productId, $quantity, $size, $price,$name,$img)
    {
        // Check if the product is already in the cart
        if (isset($_SESSION['cart'][$productId])) {
             
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
            $_SESSION['cart'][$productId]['size'] = $size;
        } else {
            // Add new product to the cart

            $_SESSION['cart'][$productId] = [
                'quantity' => $quantity,
                'size' => $size,
                'price' => $price,
                'name' => $name,
                'image' => $img,
                'product_id' => $productId
            ];
        }
        echo json_encode(['status' => 'success', 'message' => 'Product added to cart. '.$quantity]);
    }

    public function removeFromCart($productId)
    {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
            echo json_encode(['status' => 'success', 'message' => 'Product removed from cart.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Product not found in cart.']);
        }
    }
    public function getCart()
    {
        echo json_encode(value: ['status' => 'success', 'cart' => $_SESSION['cart']]);
    }
}
