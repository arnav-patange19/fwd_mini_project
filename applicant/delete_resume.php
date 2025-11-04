<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require_once "..\\includes\\config_session_inc.php";

    $username = $_SESSION['username'];

    $file = __DIR__ . "\\profile_pdf\\" . $username . ".pdf";
    if (file_exists($file)) {
        if (unlink($file)) {
            echo "<script>
            alert('Resume successfully deleted');
            window.location.href = 'profile_edit.php';
            </script>";
        } else {
           echo "<script>
            alert('Error in deleting the file');
            window.location.href = 'profile_edit.php';
            </script>";
        }
    }else {
        echo "<script>
            alert('No resume uploaded');
            window.location.href = 'profile_edit.php';
            </script>";
        
    }
}