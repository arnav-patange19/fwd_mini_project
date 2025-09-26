<?php
// add_job.php
// Appends a new job post to database.csv
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = ['job_title', 'category', 'openings', 'applications', 'status', 'company'];
    $row = [];
    $missing = false;
    foreach ($fields as $field) {
        $val = isset($_POST[$field]) ? trim($_POST[$field]) : "";
        if ($val === "") {
            $missing = true;
        }
        $row[] = str_replace(["\n", "\r", ","], " ", $val);
    }
    if ($missing) {
        echo json_encode(["success" => false, "error" => "All fields are required."]);
        exit;
    }
    $csvLine = implode(",", $row) . "\n";
    $file = fopen('database.csv', 'a');
    fwrite($file, $csvLine);
    fclose($file);
    echo json_encode(["success" => true]);
    exit;
}
echo json_encode(["success" => false, "error" => "Invalid request"]);
