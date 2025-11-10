<?php
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/controllers/UserController.php';

use Config\Database;
use Controllers\UserController;

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$database = new Database();
$db = $database->connect();
$userController = new UserController($db);

$method = $_SERVER['REQUEST_METHOD'];
$id = $_GET['id'] ?? null;
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case 'GET':
        if ($id) $userController->getById($id);
        else $userController->getAll();
        break;

    case 'POST':
        $userController->create($input);
        break;

    case 'PUT':
        if ($id) $userController->update($id, $input);
        else echo json_encode(["message" => "User ID required"]);
        break;

    case 'DELETE':
        if ($id) $userController->delete($id);
        else echo json_encode(["message" => "User ID required"]);
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Method Not Allowed"]);
        break;
}
