<?php
// delete_job.php
// Deletes a job post from database.csv by index
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = isset($_POST['index']) ? intval($_POST['index']) : -1;
    $csv = file('database.csv');
    if ($index < 0 || $index >= count($csv) - 1) {
        echo json_encode(["success" => false, "error" => "Invalid job index."]);
        exit;
    }
    // Remove the line at index+1 (skip header)
    array_splice($csv, $index + 1, 1);
    file_put_contents('database.csv', implode('', $csv));
    echo json_encode(["success" => true]);
    exit;
}
echo json_encode(["success" => false, "error" => "Invalid request"]);
