<?php
<<<<<<< HEAD
=======
error_reporting(E_ALL);
ini_set('display_errors', 1);

>>>>>>> ef7768321d3b2581b7129728829c6096b772e67b
$host = "localhost";
$dbname = "job_search";
$dbusername = "root";
$dbpassword = "";

try{
    $pdo = new PDO("mysql:host = $host; dbname=$dbname",$dbusername,$dbpassword);

    $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
<<<<<<< HEAD
=======
    echo "hi";
>>>>>>> ef7768321d3b2581b7129728829c6096b772e67b
    die("Connection failed : ".$e->getMessage());
}