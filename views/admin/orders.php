<?php
include_once __DIR__.'/..//../configs/Database.php';
include_once __DIR__.'./layout/header.php';
include_once __DIR__.'./layout/sidebar.php';

$database = new Database();
$conn = $database->getConnection();

$query = "SELECT orders.order_id, users.name AS user_name, orders.total_amount, orders.status, orders.order_date 
          FROM orders 
          JOIN users ON orders.user_id = users.user_id";

$stmt = $conn->prepare($query);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
    <h1>Orders</h1>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order['order_id']; ?></td>
                    <td><?php echo $order['user_name']; ?></td>
                    <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
                    <td><?php echo ucfirst($order['status']); ?></td>
                    <td><?php echo $order['order_date']; ?></td>
                    <td>
                        <a href="http://localhost/fashion_shop/admin_order/<?php echo $order['order_id'] ?>" class="btn btn-primary btn-sm">View</a>
                        <!-- <a href="delete_order.php?id=<?php echo $order['order_id']; ?>" class="btn btn-danger btn-sm">Delete</a> -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include_once __DIR__.'./layout/footer.php'; ?>


















































































