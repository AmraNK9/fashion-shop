<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Order Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        section {
            padding: 20px 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .form-control {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    


    
        <section>
            <div class="container">
                <h2 class="text-center text-primary mb-4">Submit Your Order</h2>
                <form action="submit.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" class="form-control" rows="3" placeholder="Enter your address" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="payment_type" class="form-label">Payment Type</label>
                        <select name="payment_type" id="payment_type" class="form-select" required>
                            <option value="">Select a payment type</option>
                            <option value="master card">Master Card</option>
                            <option value="visa card">Visa Card</option>
                            <option value="credit card">Credit Card</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cardno" class="form-label">Card Number</label>
                        <input type="text" name="cardno" id="cardno" class="form-control" placeholder="Enter your card number" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" name="btnsubmit" class="btn btn-primary btn-lg">Submit Order</button>
                    </div>
                </form>
            </div>
        </section>
    </main>


   

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
