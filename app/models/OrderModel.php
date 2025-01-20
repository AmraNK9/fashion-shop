<?php

require_once __DIR__ . '/../../configs/Database.php';

class OrderModel
{
    private $conn;
    private $tableName = "Fashion_Product";

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function createOrder($orderData)
    {
        // Insert order details into `orders` table
        $stmt = $this->conn->prepare("INSERT INTO orders (user_id, shipping_address, total_amount) VALUES (:id, :address, :total)");

        $stmt->bindParam(':id', $orderData['user_id']);
        $stmt->bindParam(':address', $orderData['address']);
        $stmt->bindParam(':total', $orderData['total']);

        $stmt->execute();
        $orderId = $this->conn->lastInsertId();

        // Insert order items into `order_items` table
        foreach ($orderData['items'] as $productId => $item) {
            $stmt = $this->conn->prepare("INSERT INTO order_item (order_id, product_id, quantity, item_price) VALUES (:order_id, :product_id, :quantity, :price)");

            $stmt->bindParam(':order_id', $orderId);
            $stmt->bindParam(':product_id', $productId);
            $stmt->bindParam(':quantity', $item['quantity']);
            $stmt->bindParam(':price', $item['price']);

            $query = 'UPDATE fashion_product SET stock_quantity = stock_quantity - ' . $item['quantity'] . ' WHERE product_id = ' . $productId . ';';
            $this->conn->exec($query);

            $stmt->execute();
        }

        return $orderId; // Return the generated order ID
    }
    public function comfirmOrder($orderId)
    {
        // Insert order details into `orders` table
        $stmt = $this->conn->prepare("UPDATE orders as o SET o.status = 'complete' WHERE order_id = :order_id");

        $stmt->bindParam(':order_id', $orderId);
     

        $stmt->execute();
      

        return $orderId; // Return the generated order ID
    }
    public function getUserOrders($userId, $orderId)
    {
        $where = '';
        if ($userId) {
            $where = ' WHERE o.user_id = :user_id';
        }
        if ($orderId) {
            $where = ' WHERE o.order_id = :order_id';
        }

        // $query = 'UPDATE orders as o SET o.status = complete WHERE order_id = 2';
        // UPDATE orders as o SET o.status = "complete" WHERE order_id = 2;

        // $this->conn->exec($query);
        // Fetch orders for the user
        $stmt = $this->conn->prepare("
         SELECT 
                o.order_id, 
                o.user_id, 
                o.shipping_address, 
                o.total_amount, 
                o.order_date,
                oi.product_id, 
                o.status,
                oi.quantity, 
                oi.item_price, 
                usr.name AS customer_name,
                usr.email As customer_email,
                p.name AS product_name
            FROM 
                orders o
            LEFT JOIN 
                order_item oi ON o.order_id = oi.order_id
            LEFT JOIN 
                users usr ON o.user_id = usr.user_id
            LEFT JOIN 
                fashion_product p ON oi.product_id = p.product_id
            $where
            ORDER BY 
                o.order_date DESC;
        ");
        if ($userId) {
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        }
        if ($orderId) {
            $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);
        }
        $stmt->execute();

        $orders = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $orderId = $row['order_id'];

            if (!isset($orders[$orderId])) {
                // Add order details if not already added
                $orders[$orderId] = [
                    'order_id' => $orderId,
                    'user_id' => $row['user_id'],
                    'shipping_address' => $row['shipping_address'],
                    'total_amount' => $row['total_amount'],
                    'order_date' => $row['order_date'],
                    'status' => $row['status'],
                    'customer_name' => $row['customer_name'],
                    'customer_email' => $row['customer_email'],
                    'items' => []
                ];
            }

            // Add item details to the order
            $orders[$orderId]['items'][] = [
                'product_id' => $row['product_id'],
                'name' => $row['product_name'],
                'quantity' => $row['quantity'],
                'price' => $row['item_price']
            ];
        }
        return $orders; // Return all orders with items
    }
}
