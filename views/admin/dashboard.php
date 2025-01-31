<?php
include_once __DIR__.'/../../configs/database.php';
include_once __DIR__.'/layout/header.php';
include_once __DIR__.'/layout/sidebar.php';
?>
    <?php if($_SESSION['user_role'] != 'admin' ){
        header('Location: views/auth/login.php');
        exit;
    } ?>
<div class="container mt-4">
    <h1>Admin Dashboard</h1>
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">View and manage all registered users.</p>
                    <a href="http://localhost/fashion_shop/views/admin/users.php" class="btn btn-light">View Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <h5 class="card-title">Manage Orders</h5>
                    <p class="card-text">View and manage all orders.</p>
                    <a href="http://localhost/fashion_shop/views/admin/orders.php" class="btn btn-light">View Orders</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <h5 class="card-title">Manage Categories</h5>
                    <p class="card-text">View and manage product categories.</p>
                    <a href="http://localhost/fashion_shop/views/admin/categories.php" class="btn btn-light">View Categories</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <h5 class="card-title">Manage Products</h5>
                    <p class="card-text">View and manage Products .</p>
                    <a href="http://localhost/fashion_shop/views/admin/products.php" class="btn btn-light">View Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Sale Report</div>
                <div class="card-body">
                    <h5 class="card-title">Manage Sale Report</h5>
                    <p class="card-text">View and manage Sale Reports categories.</p>
                    <a href="http://localhost/fashion_shop/sales" class="btn btn-light">Sale Report</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Feedbacks</div>
                <div class="card-body">
                    <h5 class="card-title">Manage Feedbacks</h5>
                    <p class="card-text">View and manage Feedbacks.</p>
                    <a href="http://localhost/fashion_shop/views/admin/feedback.php" class="btn btn-light">Sale Report</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__.'./layout/footer.php'; ?>
