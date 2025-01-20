<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php require_once __DIR__ . "/../../app/models/OrderModel.php" ?>
<?php
$orderModel1 = new OrderModel();
$orders = $orderModel1->getUserOrders($_SESSION['user_id'], null);
?>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Order history</h2>
        <table class="table table-bordered">
            <thead class="table-light">
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
                <?php foreach ($orders as $key => $order): ?>
                    <tr>

                        <td><?php echo $key ?></td>
                        <td><?php echo $order['customer_name'] ?></td>
                        <td><?php echo $order['total_amount'] ?></td>
                        <td><?php echo $order['status'] ?></td>
                        <td><?php echo $order['order_date'] ?></td>
                        <td>
                            <a href="http://localhost/fashion_shop/order/<?php echo $order['order_id'] ?>">
                                <button class="btn btn-primary btn-sm">View</button>
                            </a>
                            <!-- <button class="btn btn-danger btn-sm">Delete</button> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>