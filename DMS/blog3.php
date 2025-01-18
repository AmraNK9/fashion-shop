<!-- Main Blog Page (index.html) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Main Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            padding-top:40px;
        }
        /* Custom CSS */
        .blog-title {
            font-size: 2rem;
            font-weight: bold;
        }
        .read-more-btn {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
        }
        .read-more-btn:hover {
            background-color: #0056b3;
            color: white;
        }
        .blog-header-image {
            width: 100%;
            height: 450px; /* You can change the height as needed */
            object-fit: cover; /* Makes sure the image covers the area without distortion */
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container my-5">
        <!-- Blog Header -->
        <div class="text-center mb-5">
            <h1 class="blog-title">Writing has always been kind of therapeutic for me</h1>
        </div>
          <!-- Image Below Blog Header -->
          <div class="text-center mb-5">
            <img src="photo/blog3.jpeg" class="blog-header-image" alt="Blog Header Image">
        </div>
    </div>
        
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- Read More Page (read-more.html) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Main Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .blog-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .blog-content {
            font-size: 1.2rem;
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <a href="blog.php" class="btn btn-secondary mb-3">Back to blog</a>
        <p class="text-muted">Published on 21 Dec 2024</p>
        <img src="https://via.placeholder.com/800x400" class="img-fluid mb-4" alt="Blog Post Image">
        <div class="blog-content">
            <p>Praesent vel mi bibendum, finibus leo ac, condimentum arcu. Pellentesque sem ex, tristique sit amet suscipit in, mattis imperdiet enim. Integer tempus justo nec velit fringilla, eget eleifend neque blandit. Sed tempor magna sed congue auctor. Mauris eu turpis eget tortor ultricies elementum. Phasellus vel placerat orci, a venenatis justo. Phasellus faucibus venenatis nisl vitae vestibulum. Praesent id nibh arcu. Vivamus sagittis accumsan felis, quis vulputate </p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'footer.php'; ?>
</html>
