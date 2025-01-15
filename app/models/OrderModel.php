<?php

require_once __DIR__ . '/../../database/Database.php';

class OrderModel
{
    private $conn;
    private $tableName = "Fashion_Product";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function createOrder($orderData)
    {

        // Insert order details into `orders` table
        $stmt = $this->conn->prepare("INSERT INTO orders (user_id, address, payment_method, total) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(
            "issd",
            $orderData['user_id'],
            $orderData['address'],
            $orderData['payment_method'],
            $orderData['total']
        );
        $stmt->execute();
        $orderId = $stmt->insert_id;

        // Insert order items into `order_items` table
        foreach ($orderData['items'] as $productId => $item) {
            $stmt = $this->conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
            $stmt->bindParam(
                "iiid",
                $orderId,
                $productId,
                $item['quantity'],
                $item['price']
            );
            $stmt->execute();
        }

        return $orderId; // Return the generated order ID
    }
}
