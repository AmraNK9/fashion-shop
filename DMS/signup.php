<?php
// Include the database class
/*include_once 'Database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $terms = isset($_POST['terms']) ? 1 : 0;

    // Validate form data
    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password) && $terms) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Create a new database connection
        $database = new Database();
        $conn = $database->getConnection();

        // Prepare an insert statement
        $query = "INSERT INTO users (first_name, last_name, email, password) VALUES (:firstName, :lastName, :email, :password)";
        
        $stmt = $conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        // Execute the query
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Account created successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: Unable to create account. Please try again.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Please fill out all fields and agree to the terms.</div>";
    }
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
   body {
  font-family: Arial, sans-serif;
  background-color: #f8f9fa;
  margin: 0;
  padding-top: 50px;
}

.signup-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh; /* Full viewport height */
  background-color: #f8f9fa;
}

.signup-card {
  width: 900px;
  display: flex;
  border: none;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  background-color: #fff;
  border-radius: 8px;
  height: 100%; /* Ensure full height for both image and content */
}

.signup-img {
  
  width: 100%; /* Match the container width */
  height: 100%; /* Match the container height */
  object-fit: cover; /* Ensures image fits without distortion */
  display: block; /* Removes whitespace below images */

}

.card-body {
  width: 50%;
  padding: 40px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.logo {
  font-size: 2rem;
  font-weight: bold;
  color: #000;
  text-align: center;
  margin-bottom: 20px;
}

.form-title {
  font-size: 1.5rem;
  font-weight: bold;
  margin-bottom: 20px;
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
  background-color: #000;
  color: #fff;
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

.form-check-label {
  font-size: 0.9rem;
}

.form-check-input {
  margin-top: 6px;
}

.mb-3 {
  margin-bottom: 20px;
}
  </style>
</head>
<body>
    <?php include 'header.php'; ?>
  <div class="signup-container">
    <div class="card signup-card">
      <div class="row g-4">
        <!-- Left Image Section -->
        <div class="col-md-6">
          <img src="photo/download - 2025-01-13T232425.470.jpeg" alt="Signup Image" class="img-fluid signup-img">
        </div>
        <!-- Right Form Section -->
        <div class="col-md-6 d-flex align-items-center">
          <div class="card-body p-10">
            <div class="logo">Krist Shop</div>
            <h5 class="form-title">Create New Account</h5>
            <form method="POST" action="">
              <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required>
              </div>
              <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                <label class="form-check-label" for="terms">
                  I agree to the Terms & Conditions
                </label>
              </div>
              <button type="submit" class="btn btn-custom w-100 bg-black text-white">Signup</button>
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