<?php


// session_start();
// include_once 'Database.php';


// if (!isset($_SESSION['user'])) {
//     header("Location: login.php");
//     exit;
// }

// $userId = $_SESSION['user']['id'];

// try {
//     $database = new Database();
//     $conn = $database->getConnection();


//     $query = "SELECT first_name, last_name, email, photo FROM users WHERE id = :id";
//     $stmt = $conn->prepare($query);
//     $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
//     $stmt->execute();
//     $user = $stmt->fetch(PDO::FETCH_ASSOC);

//     if (!$user) {
//         session_destroy();
//         header("Location: login.php");
//         exit;
//     }


//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $firstName = htmlspecialchars($_POST['first_name']);
//         $lastName = htmlspecialchars($_POST['last_name']);
//         $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
//         $password = $_POST['password'] ?? '';


//         if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
//             $photoTmp = $_FILES['photo']['tmp_name'];
//             $photoName = uniqid() . "_" . basename($_FILES['photo']['name']);
//             $photoPath = "photo/" . $photoName;
//             move_uploaded_file($photoTmp, $photoPath);
//         } else {
//             $photoPath = $user['photo'] ?? 'photo/default-profile.png';
//         }


//         $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;


//         $updateQuery = "UPDATE users SET 
//             first_name = :first_name, 
//             last_name = :last_name, 
//             email = :email, 
//             photo = :photo" . (!empty($hashedPassword) ? ", password = :password" : "") . " 
//             WHERE id = :id";

//         $stmt = $conn->prepare($updateQuery);
//         $stmt->bindParam(':first_name', $firstName);
//         $stmt->bindParam(':last_name', $lastName);
//         $stmt->bindParam(':email', $email);
//         $stmt->bindParam(':photo', $photoPath);
//         if (!empty($hashedPassword)) {
//             $stmt->bindParam(':password', $hashedPassword);
//         }
//         $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

//         if ($stmt->execute()) {

//             header("Location: index.php");
//             exit;
//         } else {
//             $error = "Failed to update profile.";
//         }
//     }
// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            padding-top: 70px;
        }

        .profile-container {
            max-width: 700px;
            margin: 40px auto;
            background: white;
            border-radius: 3px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 40px;
        }

        .right-content {
            padding: 20px;
            flex: 3;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 80vh;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 600px;
        }

        .form-control {
            border-radius: 8px !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2) !important;
            border: 1px solid #000 !important;
            padding: 12px !important;

        }

        .row {
            width: 100%;
            display: flex;
            justify-content: space-between;

        }

        .row .col-md-7,
        .row .col-12 {
            flex: 1;
            margin: 0 10px;

        }

        .profile-header h2 {
            font-weight: bold;
        }

        .profile-header h4 {
            font-weight: bold;
        }

        .profile-header h5 {
            padding-top: 2px;
        }

        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-image-wrapper {
            position: relative;
            display: inline-block;

        }

        .profile-image-wrapper img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            box-shadow: 0 1px 7px rgba(48, 46, 46, 0.3);
            display: block;
            margin: 0 auto;
            transition: box-shadow 0.3s ease;
            background-color: var(--bs-secondary);
        }

        .profile-image-wrapper img:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        .profile-image-wrapper .edit-icon {
            position: absolute;
            bottom: -1px;
            left: 90%;
            transform: translateX(-50%);
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 100%;
            padding: 3px;
            color: black;
            cursor: pointer;
            font-size: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-decoration: none;
        }

        .profile-image-wrapper .edit-icon:hover {
            color: white;
            background-color: black;
            transform: translateX(-50%) scale(1.1);
        }

        .input-group {
            display: flex;
            align-items: center;
            width: 100%;
        }


        .input-group .form-control {
            border-radius: 8px 0 0 0;
            border: 1px solid #000;
            padding: 12px;

            flex-grow: 1;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .input-group .toggle-password {
            border-radius: 0 8px 8px 0;
            border: 1px solid #000;
            background-color: white;
            color: black;
            padding: 0 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .input-group .toggle-password:hover {
            background-color: black;
            color: white;
        }

        .input-group .toggle-password i {
            font-size: 16px;
        }

        #photoInput {
            display: none;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            justify-content: flex-end;
            width: 100%;
        }

        .action-buttons button {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action-buttons button:hover {
            background-color: #333;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <div class="container">
        <div class="profile-container">
            <div class="right-content">
                <div class="profile-header">
                    <h2>My Profile</h2>
                    <div class="profile-image-wrapper">
                        <img id="profileImage" src="photo/default-profile.png" alt="">
                        <a href="#" class="edit-icon" onclick="document.getElementById('photoInput').click();">
                            <i class="fas fa-edit"></i>
                        </a>
                        <input type="file" id="photoInput" name="photo" accept="image/*" onchange="previewImage(event)">
                    </div>
                    <h5>Hello 👋</h5>
                    <h4><?php echo htmlspecialchars($user['name']); ?></h4>
                </div>
                <!-- <form method="POST" enctype="multipart/form-data"> -->
                    <div class="row mb-4">
                        <div class="col-md-7">
                            <label for="firstName" class="form-laabel"> Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name"
                                value="<?php echo htmlspecialchars($user['name']); ?>" readonly>
                        </div>
                        <!-- <div class="col-md-7">
                            <label for="lastName" class="form-label">Last Name</label>
                        </div> -->
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-7">
                            <label for="emailAddress" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="emailAddress" name="email"
                                value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                        </div>
                        <!-- <div class="col-md-7">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" value="********" readonly>
                                <button type="button" class="toggle-password" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>

                        </div> -->
                    </div>
                    <div class="action-buttons">
                        <!-- <button type="button" class="btn btn-secondary" onclick="window.location.reload();">Cancel</button> -->

                        <a href="/fashion_shop/log_out">
                            <button class="btn btn-primary">Log out</button>

                        </a>
                    </div>
            </div>

            <!-- </form> -->
            <?php if (isset($error)) {
                echo "<div class='alert alert-danger mt-3'>$error</div>";
            } ?>
        </div>
    </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('profileImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

    </script>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
</body>

</html>