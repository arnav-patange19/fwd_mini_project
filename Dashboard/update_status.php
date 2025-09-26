<?php
// update_status.php
// Updates the status of a job post in database.csv by index
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ob_clean(); // Clear any previous output
    $index = isset($_POST['index']) ? intval($_POST['index']) : -1;
    $newStatus = isset($_POST['status']) ? $_POST['status'] : '';
    $csv = file('database.csv');
    if ($index < 0 || $index >= count($csv) - 1 || ($newStatus !== 'Active' && $newStatus !== 'Inactive')) {
        echo json_encode(["success" => false, "error" => "Invalid request."]);
        exit;
    }
    $fields = str_getcsv($csv[$index + 1]); // skip header
    $fields[4] = $newStatus; // status column
    $csv[$index + 1] = implode(',', $fields) . "\n";
    file_put_contents('database.csv', implode('', $csv));
    echo json_encode(["success" => true]);
    exit;
}
echo json_encode(["success" => false, "error" => "Invalid request"]);
