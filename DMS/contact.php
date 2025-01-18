

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding-top: 50px;
    }

    .contact-container {
      padding: 70px 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background-color: #f8f9fa;
      box-sizing: border-box;
    }

    @media (max-height: 800px) {
      .contact-container {
        padding: 50px 20px;
      }
    }

    .contact-card {
      display: flex;
      flex-direction: row;
      width: 70%;
      max-width: 800px;
      min-height: 380px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      border-radius: 8px;
      background-color: #fff;
    }

    @media (max-width: 768px) {
      .contact-card {
        flex-direction: column;
        width: 90%;
        min-height: auto;
      }
      .contact-image {
        height: 200px;
      }
    }

    .contact-image {
      width: 50%;
      height: auto;
      min-height: 300px;
      background: url('photo/contactus.jpeg') no-repeat center center;
      background-size: cover;
    }

    .contact-form {
      padding: 15px 30px;
      width: 50%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .contact-form .form-label {
      font-size: 14px;
    }

    .contact-form .form-control {
      font-size: 14px;
      padding: 10px;
      border-radius: 10px; /* Border-radius for the input and textarea boxes */
      border: 2px solid black; /* Solid black border for the input and textarea boxes */
    }

    .contact-form textarea {
      resize: vertical;
      height: 70px;
    }

    footer {
      margin-top: auto;
    }
  </style>
</head>
<body>
  <?php ini_set('display_errors', '0');  // Disable error display
?>
    <?php include 'header.php'; ?>
    <div class="contact-container">
        <div class="contact-card">
            <div class="contact-image"></div>
            <div class="contact-form">
                <h3 class="fw-bold mb-4">Contact Us</h3>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Your Phone</label>
                        <input type="text" class="form-control" id="phone" nmae="phone" placeholder="Enter your phone number"required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Your Address</label>
                        <input type="text" class="form-control" id="address" name="address"placeholder="Enter your address"required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control" id="message" rows="3" name="message" placeholder="Write your message"required ></textarea>
                    </div>
                    <button type="submit" class="btn w-100 bg-black text-white">Send Message</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>