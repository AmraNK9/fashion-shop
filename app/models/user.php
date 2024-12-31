<?php
require_once __DIR__ . "/../../configs/database.php";

class User
{
    private $conn;
    private $tableName = 'users';

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // Create a new user
    public function createUser($data)
    {
        $query = "INSERT INTO $this->tableName (name, email, password, phone_number, address, role) 
                  VALUES (:name, :email, :password, :phone_number, :address, :role)";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', password_hash($data['password'], PASSWORD_DEFAULT)); // Hash password
        $stmt->bindParam(':phone_number', $data['phone_number']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':role', $data['role']);

        // Execute query
        return $stmt->execute();
    }
    // Get users
    public function getUsers($id)
    {
        $query = "SELECT * FROM $this->tableName ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Get a user by ID
    public function getUserById($id)
    {
        $query = "SELECT * FROM $this->tableName WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update an existing user
    public function updateUser($id, $data)
    {
        $query = "UPDATE $this->tableName 
                  SET name = :name, email = :email, phone_number = :phone_number, 
                      address = :address, role = :role 
                  WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':phone_number', $data['phone_number']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':role', $data['role']);

        // Execute query
        return $stmt->execute();
    }

    // Delete a user
    public function deleteUser($id)
    {
        $query = "DELETE FROM $this->tableName WHERE user_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute query
        return $stmt->execute();
    }

    public function loginUser($email, $password)
    {
        $query = "SELECT * FROM $this->tableName WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Fetch the user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user exists and password matches
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Return user data on successful login
        } else {
            return false; // Login failed
        }
    }

}
?>