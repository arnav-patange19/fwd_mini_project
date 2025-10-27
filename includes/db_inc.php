<?php
$host = "localhost";
$dbname = "job_search";
$dbusername = "root";
$dbpassword = "";

try{
    $pdo = new PDO("mysql:host = $host; dbname=$dbname",$dbusername,$dbpassword);

    $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "hi";
    die("Connection failed : ".$e->getMessage());
}