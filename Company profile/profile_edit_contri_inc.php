<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileactext = strtolower(end($fileExt));

    $allowed = array('jpeg');

    if(in_array($fileactext, $allowed)){
        if($fileError === 0){
            $fileNameNew = "cat.".$fileactext;
            $fileDestination = "Job_search//cmp_logos//".$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            header("Location:trial.php?upload=success");
        }
        else{
            echo "error";
        }
    }
    else{
        echo "wrong file type";
    }
}