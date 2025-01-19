<?php

require_once __DIR__ . '/../../configs/Database.php';

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
        $stmt = $this->conn->prepare("INSERT INTO orders (user_id, shipping_address, total_amount) VALUES (:id, :address, :total)");
     
        $stmt->bindParam('id',$orderData['user_id']);
        $stmt->bindParam(':address',$orderData['address']);
        // $stmt->bindParam('payment_method',$orderData['payment_method']);
        $stmt->bindParam('total',$orderData['total']);

        $stmt->execute();
        $orderId = $this->conn->lastInsertId()    ;

        // Insert order items into `order_items` table
        foreach ($orderData['items'] as $productId => $item) {
            $stmt = $this->conn->prepare("INSERT INTO order_item (order_id, product_id, quantity, item_price) VALUES (:order_id, :product_id, :quantity, :price)");
          

            $stmt->bindParam('order_id',$orderId);
            $stmt->bindParam('product_id',$productId);
            $stmt->bindParam('quantity',$item['quantity']);
            $stmt->bindParam('price',$item['price']);

            
            
            $stmt->execute();
        }

        return $orderId; // Return the generated order ID
    }
}
