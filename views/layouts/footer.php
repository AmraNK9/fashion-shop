<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Design</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .footer {
            background-color: #232323;
            color: #fff;
            padding: 40px 0;
        }
        .footer a {
            color: #fff;
            text-decoration: none;
        }
        .footer a:hover {
            color: #d3d3d3;
        }
        .footer .footer-title {
            font-weight: bold;
            margin-bottom: 15px;
        }
        .footer ul li {
        line-height: 2; 
    }
    .subscribe-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: transparent;
        padding: 8px 12px;
        border: 2px solid #fff;
        border-radius: 10px;
        margin-top: 15px;
        color: #fff; 
    }
    .subscribe-box input {
        background: transparent;
        border: none;
        outline: none;
        color: #fff; 
        width: 100%;
        font-size: 16px; 
    }
    .subscribe-box input::placeholder {
        color: #fff;
    }
    .subscribe-box button {
        background: none;
        border: none;
        color: #fff; 
        font-size: 20px;
        cursor: pointer;
    }
        .social-icons {
            text-align: right;
        }
        .social-icons a {
            font-size: 20px;
            margin-left: 15px;
        }
        .payment-icons {
            text-align: left;
        }
        .payment-icons img {
            margin: 5px;
            width: 40px;
        }
        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #444;
            padding-top: 15px;
            margin-top: 20px;
        }
        .copyright {
            text-align: center;
            font-size: 14px;
            color: #fff;
            flex: 1;
            
        }
    </style>
</head>
<body>


<footer class="footer">
    <div class="container">
        <div class="row">
           
            <div class="col-md-4">
                <h4 class="footer-title">Krist</h4>
                <p><i class="fas fa-phone-alt"></i> (704) 5550127</p>
                <p><i class="fas fa-envelope"></i> krist@example.com</p>
                <p><i class="fas fa-map-marker-alt"></i> 3891 Ranchview Dr. Richardson, California 62639</p>
            </div>
           
            <div class="col-md-2">
                <h5 class="footer-title">Information</h5>
                <ul class="list-unstyled">
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">My Cart</a></li>
                    <li><a href="#">My Wishlist</a></li>
                    <li><a href="#">Checkout</a></li>
                </ul>
            </div>
            
            <div class="col-md-2">
                <h5 class="footer-title">Service</h5>
                <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Delivery Information</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>
            
            <div class="col-md-4">
                <h5 class="footer-title">Subscribe</h5>
                <p>Enter your email below to be the first to know about new collections and product launches.</p>
                <div class="subscribe-box">
                    <input type="email" placeholder="Your Email">
                    <button type="button"><i class="fas fa-arrow-right"></i></button> 
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="payment-icons">
                <img src="photo/visa.png" alt="Visa">
                <img src="photo/master.png" alt="MasterCard">
                <img src="photo/download - 2024-12-27T202917.251.jpeg" alt="PayPal">
                <img src="photo/_KBZPay Customer.jpeg" alt="PayPal">
                <img src="photo/cb bank.png" alt="PayPal">
            </div>
            <div class="copyright">
                <p>&copy; 2023 Krist All Rights are reserved</p>
            </div>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
