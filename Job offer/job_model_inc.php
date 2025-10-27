<?php

try{
    require_once "..\\includes\\db_inc.php";
    require_once "..\\includes\\config_session_inc.php";

    $_SESSION['cmp_id'] = 1;
    $cmp_id = $_SESSION['cmp_id'];

    $query = "SELECT * FROM job_offers WHERE cmp_id = :cmp_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":cmp_id",$cmp_id);

    $stmt->execute();

    $results = $stmt->fetchALL(PDO::FETCH_ASSOC);



    $pdo = null;
    $stmt = null;

}catch(PDOException $e){
    die("Connection failed : ".$e->getMessage());
}