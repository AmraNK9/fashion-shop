<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Product Page</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .height {
      height: 100px
    }
  </style>
</head>

<body>
  <?php include __DIR__ . '/../layouts/header.php' ?>
  <div class="height">

  </div>
  <!-- Product Section -->
  <div class="container mt-6">
    <div class="row">
      <!-- Product Images -->
      <div class="col-md-6">
        <img src="http://localhost/fashion_shop/public/images/<?php echo $product['img'] ?>" class="img-fluid mb-3"
          alt="Product" />
        <div class="d-flex">
          <img src="http://localhost/fashion_shop/public/images/yellow.png" class="img-thumbnail me-2" alt="Thumbnail 1"
            style="width: 80px" />
          <img src="http://localhost/fashion_shop/public/images/green.png" class="img-thumbnail me-2" alt="Thumbnail 2"
            style="width: 80px" />
          <img src="http://localhost/fashion_shop/public/images/red.jpg" class="img-thumbnail me-2" alt="Thumbnail 3"
            style="width: 80px" />
        </div>
      </div>

      <!-- Product Details -->
      <div class="col-md-6">
        <h2><?php echo $product['name'] ?></h2>
        <!-- <p class="text-muted">Girls Kids Princess Formal Dress</p> -->
        <h4 class="text-success">$<?php echo $product['price'] ?></h4>
        <title>Star Rating</title>
        <style>
          .rating {
            display: inline-flex;
            align-items: center;
            font-size: 24px;
            color: orange;
          }

          .star {
            cursor: pointer;
            margin: 0 2px;
          }

          .active {
            color: green;
          }

          .star:hover,
          .star:hover~.star {
            color: gray;
          }

          .label {
            font-size: 16px;
            margin-left: 5px;
            color: black;
          }
        </style>

        <body>
          <div class="rating">
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9733;</span>
            <span class="star">&#9734;</span>

          </div>
        </body>
        <div>
          <label>Colors: As per picture </label>

        </div>
        <div>

          <label>Size: </label>
          <button class="btn btn-outline-secondary btn-sm">S</button>
          <button class="btn btn-outline-secondary btn-sm active">M</button>
          <button class="btn btn-outline-secondary btn-sm">L</button>
        </div>

        <div class="mt-3">
          <label>Quantity: </label>
          <input type="number" class="form-control" value="1" style="width: 100px" />
        </div>
        <div class="mt-4">
          <button class="btn btn-primary">Add to Cart</button>
          <a href="http://localhost/fashion_shop/views/cart/checkout.php">
            <button class="btn btn-success ms-2">Checkout</button>

          </a>
        </div>
      </div>

    </div>

    <!-- Tabs Section -->
    <div class="mt-5">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tab" href="#description">Description</a>
          <p>

          </p>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#additional-info"
              >Additional Information</a>
              <p>
               
              </p>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#reviews">Reviews</a>
            <p>
              
            </p>
          </li> -->
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active p-3" id="description">
          <p><?php echo $product['description'] ?></p>
        </div>
        <!-- <div class="tab-pane fade p-3" id="additional-info">
            <p><br>Wonderful gift: This princess dress is a great gift for your little princess. </br>
              <br>It can be used as a birthday gift, christmas gift, new year gift and so on.</br></p>
          </div>
          <div class="tab-pane fade p-3" id="reviews">
            <p><br>Perfect for any party: Great for christmas party, birthday party, baby showers, weddings, homecoming, outdoor, holiday, casual wear and any other special occasion.</br></p>
          </div> -->
      </div>
    </div>
  </div>

  <!-- Related Products -->
  <!-- <div class="container mt-5">
      <h4>Related Products</h4>
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <img src="kid yellow.jpg"
              class="card-img-top"
              alt="Related Product"/>
            <div class="card-body">
              <h6  class="card-title"><a href="PrincessBella.html">Princess Bella</h6></a>
              <p class="text-success">$200.00</p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img
              src="casual.jpg"
              class="card-img-top"
              alt="Related Product"
            />
            <div class="card-body">
              <h6 class="card-title"><a href="Casual Suit Two-Pieces Set.html">Casual Suit Two-Pieces Set</h6></a>
              <p class="text-success">$450.00</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img
              src="bag 1.jpg"
              class="card-img-top"
              alt="Related Product"
            />
            <div class="card-body">
              <h6 class="card-title"><a href="Bag.html">Hand BagHand Bag</h6></a>
              <p class="text-success">$300.00</p>
            </div>
          </div>
        </div>
      </div>
    </div> -->

  <?php include __DIR__ . '/../layouts/footer.php' ?>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const sizeButtons = document.querySelectorAll(".btn-outline-secondary");
      const addToCartButton = document.querySelector(".btn-primary");
      let selectedSize = "M"; // Default size

      // Update selected size on button click
      sizeButtons.forEach((button) => {
        console.log("click --")
        button.addEventListener("click", function () {
          // Remove active class from all buttons
          sizeButtons.forEach((btn) => btn.classList.remove("active"));
          // Add active class to clicked button
          this.classList.add("active");
          selectedSize = this.textContent; // Update selected size
        });
      });

      // Add to Cart button click event
      addToCartButton.addEventListener("click", function () {
        console.log("add to cart click")
        const productId = "<?php echo $product['product_id']; ?>";
        const productName = "<?php echo $product['name'] ?>"
        const price = "<?php echo $product['price'] ?>"
        const image = "<?php echo $product['img'] ?>"
        const quantity = document.querySelector("input[type='number']").value;
        console.log("quantity ..", quantity)
        fetch("http://localhost/fashion_shop/cart", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            action: "add",
            productId: productId,
            quantity: quantity,
            size: selectedSize,
            image: image,
            name: productName,
            price: price
          }),
        })
          .then((response)=> {
            console.log(response);
            alert(quantity +" products added to cart");
          }
        
        
        
        )
         
        .catch((error) => {
            console.log(error)
          // console.error("Error:", error);
        }); 
      });
    });

  </script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>