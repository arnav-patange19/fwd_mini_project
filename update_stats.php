<?php
// update_stats.php
// Stores and retrieves previous stats in stats.json for dashboard percentage calculations
header('Content-Type: application/json');
$statsFile = 'stats.json';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save current stats
    $input = json_decode(file_get_contents('php://input'), true);
    if (!is_array($input)) {
        echo json_encode(["success" => false, "error" => "Invalid input."]);
        exit;
    }
    $stats = [
        "jobs" => isset($input['jobs']) ? intval($input['jobs']) : 0,
        "applications" => isset($input['applications']) ? intval($input['applications']) : 0,
        "hirings" => isset($input['hirings']) ? floatval($input['hirings']) : 0.0
    ];
    file_put_contents($statsFile, json_encode($stats));
    echo json_encode(["success" => true]);
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Return previous stats
    if (file_exists($statsFile)) {
        $stats = json_decode(file_get_contents($statsFile), true);
        if (is_array($stats)) {
            echo json_encode(["success" => true, "stats" => $stats]);
            exit;
        }
    }
    echo json_encode(["success" => true, "stats" => ["jobs" => 0, "applications" => 0, "hirings" => 0.0]]);
    exit;
}
echo json_encode(["success" => false, "error" => "Invalid request"]);
