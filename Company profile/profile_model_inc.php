<?php
try{
    require_once "../includes/db_inc.php";
    require_once "../includes/config_session_inc.php";

    $_SESSION['cmp_id'] = 1;

    $cmp_id = $_SESSION['cmp_id'];
    
    $query = "SELECT * FROM company_profile WHERE id = :cmp_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":cmp_id",$cmp_id);

    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    $logo = "../cmp_logos/".$results["cmp_name"]."/logo.jpeg";
    $cover = "../cmp_logos/".$results["cmp_name"]."/cover.jpeg";

    $_SESSION['cmp_name'] = $results["cmp_name"];

    $pdo = null;
    $stmt = null;

}catch(PDOException $e){
    die("Connection failed : ".$e->getMessage());
}