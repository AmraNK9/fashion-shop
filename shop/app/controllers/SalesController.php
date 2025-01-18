<?php
echo "3";
require_once __DIR__ . '/../../configs/database.php';

class SalesController
{
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getDailySales($date) {
        // Query to fetch product sales for a given day
        $query = "SELECT 
    fashion_product.name AS product_name,
    COALESCE(SUM(CASE WHEN orders.order_date LIKE :date1 THEN order_item.quantity ELSE 0 END), 0) AS total_sold,
    :date as order_date
FROM 
    fashion_product
LEFT JOIN 
    order_item ON order_item.product_id = fashion_product.product_id
LEFT JOIN 
    orders ON order_item.order_id = orders.order_id
GROUP BY 
    fashion_product.product_id;
        ";
        
        // Add wildcards to the date for the LIKE clause
        $date1 = '%' . $date . '%';
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':date1', $date1);
        $stmt->execute();
        
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Debug output
        
        return $data;
    }
}
?>
