<?php
/*session_start();
include_once 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $database = new Database();
        $conn = $database->getConnection();

        // Fetch user data by email
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Save user data to session
            $_SESSION['user'] = [
                'id' => $user['id'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email']
            ];

            // Redirect to My Profile
            header("Location: myprofile.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Invalid email or password.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Please fill out all fields.</div>";
    }
}*/
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
      background-color: #f8f9fa;
      margin: 0;
      padding-top: 50px;
    }

    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f9fa;
    }

    .login-card {
      width: 700px; /* Reduced overall card width */
      display: flex;
      border: none;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .login-img {
      width: 100%; /* Reduced image width */
      object-fit: cover;
    }

    .card-body {
      width: 50%;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .logo {
      font-size: 2rem;
      font-weight: bold;
      color: #000;
      text-align: center;
      margin-bottom: 10px;
    }

    .form-title {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 15px;
      text-align: center;
    }

    .btn-custom {
      background-color: #000;
      color: #fff;
      font-weight: bold;
      padding: 10px;
      border: none;
      border-radius: 5px;
      text-transform: uppercase;
    }

    .btn-custom:hover {
      background-color: #333;
    }

    .form-label {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .form-control {
      border-radius: 5px;
      padding: 10px;
      font-size: 1rem;
    }

    .mb-3 {
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="login-container">
    <div class="card login-card">
      <div class="row g-0">
        <!-- Left Image Section -->
        <div class="col-md-6">
          <img src="photo/LOGIN.jpeg" alt="Login Image" class="img-fluid login-img">
        </div>
        <!-- Right Form Section -->
        <div class="col-md-6 d-flex align-items-center">
          <div class="card-body p-3">
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
              <button type="submit" class="btn btn-custom w-100 bg-black text-white mb-3">Login</button>
              <div class="col-12 mb-3">
                <p class="m-0 text-black text-center">Don't have an account? <a href="signup.php" class="link-primary text-decoration-none">Sign up</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
