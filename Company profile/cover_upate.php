<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    require_once "..\\includes\\config_session_inc.php";

    $cmp_name = $_SESSION['cmp_name'];
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileactext = strtolower(end($fileExt));

    $allowed = array('jpeg','png','jpg');

    if(in_array($fileactext, $allowed)){
        if($fileError === 0){
            $fileNameNew = "cover.jpeg";
            $fileDestination = "..\\cmp_logos\\".$cmp_name."\\".$fileNameNew;
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
            alert('Only \.jpeg \.png \.jpg supported');
            window.location.href = 'profile_edit.php';
            </script>";
    }
}