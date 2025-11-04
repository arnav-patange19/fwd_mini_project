<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require_once "..\\includes\\config_session_inc.php";

    $cmp_name = $_SESSION['cmp_name'];

    $source = __DIR__ . "\\..\\default\\cover.jpeg";
    $copyPath = __DIR__ . "\\..\\cmp_logos\\" . $cmp_name . "\\cover.jpeg";

    if (file_exists($copyPath) && file_exists($source)) {
        if(copy($source,$copyPath)){
            echo "<script>
            alert('Successfully deleted');
            window.location.href = 'profile_edit.php';
            </script>";
        }
        else{
            echo "<script>
            alert('Error in deleting the image');
            window.location.href = 'profile_edit.php';
            </script>";
        }
    }else {
        echo "<script>
            alert('Error in locating the image');
            window.location.href = 'profile_edit.php';
            </script>";
        
    }
}