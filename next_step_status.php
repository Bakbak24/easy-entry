<?php
include_once(__DIR__ . '/classes/User.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $currentStep = $data['currentStep'];

    session_start();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        try {
            $user->nextStep($currentStep);
            $response = array('success' => true, 'message' => 'Status updated.' . $user->getEmail());
        } catch (Exception $e) {
            http_response_code(500);
            $response = array('success' => false, 'message' => $e->getMessage());
        }
    } else {
        http_response_code(401);
        $response = array('success' => false, 'message' => 'User not authenticated.');
    }
    echo json_encode($response);
} else {
    http_response_code(400);
    $response = array('success' => false, 'message' => 'Invalid request.');
    echo json_encode($response);
}
