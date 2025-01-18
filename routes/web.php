<?php
require_once __DIR__ . '/../app/controllers/ProductController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php'; 
require_once __DIR__ . '/../app/controllers/CartController.php'; 
require_once __DIR__ . '/../app/controllers/CategoryController.php'; 
require_once __DIR__ . '/../app/controllers/AuthController.php'; 




$productController = new ProductController();
$adminController = new AdminController(); 
$cartController = new CartController();
$categoryController = new CategoryController();
$authController = new AuthController();


$route = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

$routeParts = explode('/', string: $route);

$baseRoute = $routeParts[1] ?? '';
$subRoute = $routeParts[2] ?? null;
switch ($baseRoute) {
    case '':
        $categoryController->index();
        break;
    case 'products':
        // echo 'reach';
        $productController->index();

    case "cart":
        $requestBody = file_get_contents('php://input');
        $data = json_decode($requestBody, true);
        if($data == null){
            // $cartController->getCart();

            include __DIR__ . "/../views/cart/index.php";
            return;
        }
        $action = $data['action'];
        $productId = $data['productId'];
        $quantity = $data['quantity'] ?? 1;
        $size = $data['size'] ?? 'M';
        $price = $data['price'] ?? 0;
        $name = $data['name'] ?? '' ;
        $image = $data['image']?? '';
        // echo "reach";

        
        
    
        switch ($action) {
            case 'add':
                $cartController->addToCart($productId, (int)$quantity,$size,$price,$name,$image);
                break;
            case 'remove':
                $cartController->removeFromCart($productId);
                break;
            case 'view':
                $cartController->getCart();
                break;
            
            default:
                echo json_encode(['status' => 'error', 'message' => 'Invalid action.']);
                break;
        }
    case "profile":
        $authController->index();
    case 'log_out':
        // echo "logout";
        $authController->logout();

    case 'product':
        // Show a specific product if ID is provided
        if ($subRoute !== null) {
            $productController->show($subRoute);
        } else {
            // Redirect to the product list if no ID is provided
            header("Location:");
            exit;
        }
        break;
    
  


    case 'productsByCategory':
        // Show a specific product if ID is provided
        if ($subRoute !== null) {
            $productController->productsByCategoryId($subRoute);
        } else {
            // Redirect to the product list if no ID is provided
            header("Location: login.php");
            exit;
        }
        break;

    case 'admin':
        // Admin routes
        if ($subRoute === null) {
            // Default admin page (e.g., dashboard or product management)
            $adminController->dashboard();
        } elseif ($subRoute === 'create') {
            // Handle product creation
            $adminController->createProduct();
        } elseif ($subRoute === 'store') {
            $adminController->storeProduct();
        } elseif ($subRoute === 'edit' && isset($routeParts[2])) {
            // Handle product editing with an ID
            $adminController->editProduct($routeParts[2]);
        } elseif ($subRoute === 'delete' && isset($routeParts[2])) {
            // Handle product deletion with an ID
            $adminController->deleteProduct($routeParts[2]);
        } else {
            // Invalid admin subroute
            http_response_code(404);
            echo "404 Not Found - Admin";
        }
        break;

    default:
        // Handle invalid routes with a 404 response
        http_response_code(404);
        echo "404 Not Found";
        break;
}
?>
