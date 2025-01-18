<?php
// Include the database class
include_once '../../configs/Database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data
    if (!empty($email) && !empty($password)) {
        // Create a new database connection
        $database = new Database();
        $conn = $database->getConnection();

        // Prepare a select statement to verify user credentials
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);

        // Execute the query
        if ($stmt->execute()) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify password
            if ($user && password_verify($password, $user['password'])) {
                echo "<div class='alert alert-success'>Login successful! Welcome, " . htmlspecialchars($user['first_name']) . ".</div>";
            } else {
                echo "<div class='alert alert-danger'>Invalid email or password.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Error: Unable to process request. Please try again.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Please fill out all fields.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f9fa;
    }
    .login-card {
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border: none;
    }
    .login-img {
      object-fit: cover;
      height: 100%;
    }
    .form-title {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .btn-custom {
      background-color: #000;
      color: #fff;
      font-weight: bold;
    }
    .btn-custom:hover {
      background-color: #333;
    }
    .logo {
      font-size: 2.5rem;
      font-weight: bold;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="card login-card">
      <div class="row g-4">
        <!-- Left Image Section -->
        <div class="col-md-6">
          <img src="../../public/images/d25ceb435dd1010018e0b90bf4d84422.jpg" alt="Login Image" class="img-fluid login-img">
        </div>
        <!-- Right Form Section -->
        <div class="col-md-6 d-flex align-items-center">
          <div class="card-body p-10">
            <div class="logo">Krist Shop</div>
            <h5 class="form-title">Login to Your Account</h5>
            <form method="POST" action="">
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-custom w-100">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
