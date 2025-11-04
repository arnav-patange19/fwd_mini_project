<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require_once "..\\includes\\config_session_inc.php";

    $username = $_SESSION['username'];
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileactext = strtolower(end($fileExt));

    $allowed = array('pdf');

    if(in_array($fileactext, $allowed)){
        if($fileError === 0){
            $fileNameNew = ".pdf";
            $fileDestination = "profile_pdf\\".$username."".$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            header("Location:profile_edit.php");
        }
        else{
            echo "<script>
            alert('Error in file uploading');
            window.location.href = 'profile_edit.php';
            </script>";
            
        }
    }
    else{
        echo "<script>
            alert('Only \.pdf supported');
            window.location.href = 'profile_edit.php';
            </script>";
    }
}