
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-top: 50px;
        }
        .price {
            font-size: 1.5rem;
            color: #000;
            font-weight: bold;
        }
        form .form-group label {
            font-weight: bold;
        }
        .carousel-item img {
            max-height: 500px;
            width: auto;
            object-fit: cover;
            border-radius: 5px;
        }
        .custom-container {
            margin: 20px auto; /* Center alignment */
            padding: 15px; /* Inner padding */
            max-width: 1200px; /* Optional: control width */
        }
        .space{
            height: 64px;
        }
    </style>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="space"></div>
    <div class="custom-container">
        <div class="row">
            <!-- Product Images -->
            <div class="col-md-6">
                <div id="productImages" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="photo/jeanjk.jpeg" class="d-block w-100" alt="Product Image">
                        </div>
                        <div class="carousel-item">
                            <img src="photo/jeanfront.jpeg" class="d-block w-100" alt="Product Image">
                        </div>
                        <div class="carousel-item">
                            <img src="photo/jeanback.jpeg" class="d-block w-100" alt="Product Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#productImages" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#productImages" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6 mt-4">
                <h3>Lightweight Jacket</h3>
                <p class="price">$58.79</p>
                <p>
                    Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
                </p>
                <form>
                    <div class="form-group">
                        <label for="size">Size</label>
                        <select id="size" class="form-control">
                            <option>Choose an option</option>
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <select id="color" class="form-control">
                            <option>Choose an option</option>
                            <option>Black</option>
                            <option>Blue</option>
                            <option>Gray</option>
                        </select> 
                    </div>
                    <!--<div class="form-group d-flex align-items-center">
                        <button type="button" class="btn btn-primary" id="decrement">-</button>
                        <input type="text" id="quantity" class="form-control mx-2 text-center" value="1" style="width: 50px;">
                        <button type="button" class="btn btn-primary" id="increment">+</button>
                    </div>-->
                    <button type="submit" class="btn  btn-block bg-info text-white mt-4">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('increment').addEventListener('click', () => {
            let quantity = parseInt(document.getElementById('quantity').value, 10);
            document.getElementById('quantity').value = quantity + 1;
        });

        document.getElementById('decrement').addEventListener('click', () => {
            let quantity = parseInt(document.getElementById('quantity').value, 10);
            if (quantity > 1) {
                document.getElementById('quantity').value = quantity - 1;
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
