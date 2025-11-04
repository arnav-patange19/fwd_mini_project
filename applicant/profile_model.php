<?php
try{
    require_once "..\\includes\\db_inc.php";
    require_once "..\\includes\\config_session_inc.php";

    $_SESSION['username'] = 'Johndoe123';

    $username = $_SESSION['username'];
    
    $query = "SELECT * FROM applicant_profile WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username",$username);

    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    $pdo = null;
    $stmt = null;

}catch(PDOException $e){
    die("Connection failed : ".$e->getMessage());
}