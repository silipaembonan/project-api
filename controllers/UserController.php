<?php
namespace Controllers;

use PDO;

class UserController {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    // GET /users
    public function getAll() {
        $query = "SELECT id, username, email FROM {$this->table}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }

    // GET /users?id=1
    public function getById($id) {
        $query = "SELECT id, username, email FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($data ?: ["message" => "User not found"]);
    }

    // POST /users
    public function create($input) {
        if (empty($input['username']) || empty($input['email']) || empty($input['password'])) {
            http_response_code(400);
            echo json_encode(["message" => "Incomplete data"]);
            return;
        }

        $query = "INSERT INTO {$this->table} (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $hashed = password_hash($input['password'], PASSWORD_BCRYPT);
        $stmt->execute([$input['username'], $input['email'], $hashed]);

        echo json_encode(["message" => "User created successfully"]);
    }

    // PUT /users?id=1
    public function update($id, $input) {
        $query = "UPDATE {$this->table} SET username = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $hashed = password_hash($input['password'], PASSWORD_BCRYPT);
        $stmt->execute([$input['username'], $input['email'], $hashed, $id]);

        echo json_encode(["message" => "User updated successfully"]);
    }

    // DELETE /users?id=1
    public function delete($id) {
        $query = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        echo json_encode(["message" => "User deleted successfully"]);
    }
}
