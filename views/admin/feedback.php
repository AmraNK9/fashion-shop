<?php

include_once __DIR__.'/..//../configs/Database.php';
include_once __DIR__.'./layout/header.php';
include_once __DIR__.'./layout/sidebar.php';

$database = new Database();
$conn = $database->getConnection();

$query = "SELECT *
          FROM feedback 
         ";

$stmt = $conn->prepare($query);
$stmt->execute();
$feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Feedback Management</h2>

        <!-- Feedback Table -->
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Feedback List</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Submitted At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Row -->
                         <?php foreach ($feedbacks as $feedback) :?>
                        <tr>
                            <td><?php echo $feedback['id'] ?></td>
                            <td><?php echo $feedback['name'] ?></td>
                            <td><?php echo $feedback['phone'] ?></td>
                            <td><?php echo $feedback['email'] ?></td>
                            <td><?php echo $feedback['message'] ?></td>
                            <td><?php echo $feedback['created_at'] ?></td>


                          
                            <td>
                                <button class="btn btn-sm btn-primary">View</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach ?>
                        <!-- Repeat Rows Dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

