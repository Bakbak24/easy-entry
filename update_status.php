<?php
include_once(__DIR__ . '/classes/User.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $newStatus = $data['status'];

    session_start();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $user->statusUpdate($newStatus);
    }
} else {
    http_response_code(400);
    $response = array('success' => false, 'message' => 'Invalid request.');
    echo json_encode($response);
}
