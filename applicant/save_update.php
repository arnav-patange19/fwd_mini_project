<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    try{

    $name = $_POST['name'];
    $location = $_POST['location'];
    $about = $_POST['about'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];
    $education = $_POST['education'];
    $achieve = $_POST['achieve'];
    $goals = $_POST['goals'];
    $email = $_POST['email'];
    $pronouns = $_POST['pronouns'];


    require_once "..\\includes\\db_inc.php";
    require_once "..\\includes\\config_session_inc.php";

    $username = $_SESSION['username'];
    
    $file = "profile_pdf//".$username.".pdf";
    if(file_exists($file)) $pdf = 1;
    else $pdf = 0;

    $query = "UPDATE applicant_profile SET  name = :name, email = :email, location = :location, pronouns= :pronouns, about = :about,experience = :experience,education = :education, skills = :skills,achievements = :achieve,goals=:goals,pdf = :pdf  WHERE username = '$username';";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":name" , $name);
    $stmt->bindParam(":email" , $email);
    $stmt->bindParam(":location" , $location);
    $stmt->bindParam(":pronouns" , $pronouns);
    $stmt->bindParam(":about" , $about);
    $stmt->bindParam(":experience" , $experience);
    $stmt->bindParam(":education" , $education);
    $stmt->bindParam(":skills" , $skills);
    $stmt->bindParam(":achieve" , $achieve);
    $stmt->bindParam(":goals" , $goals);
    $stmt->bindParam(":pdf" , $pdf);

    $stmt->execute();
    
    $pdo = null;
    $stmt = null;

    echo "<script>
        alert('Successfully updated');
        window.location.href = 'profile.php';
        </script>";
    
    }

    catch(PDOException $e){
    die("Connection failed : ".$e->getMessage());
}





}