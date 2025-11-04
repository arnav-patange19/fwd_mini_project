<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    try{

    $cmp_name = $_POST['cmp_name'];
    $industry = $_POST['industry'];
    $headquarters = $_POST['headquarters'];
    $overview = $_POST['overview'];
    $website = $_POST['website'];
    $special = $_POST['special'];
    $achieve = $_POST['achieve'];
    $cmp_size = $_POST['cmp_size'];

    require_once "..\\includes\\db_inc.php";
    require_once "..\\includes\\config_session_inc.php";

    $cmp_id = $_SESSION['cmp_id'];

    $query = "UPDATE company_profile SET cmp_name = :cmp_name, overview = :overview, website = :website, industry = :industry,
    cmp_size = :cmp_size, headquarters = :headquarters, special = :special, achieve = :achieve WHERE id = $cmp_id;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":cmp_name" , $cmp_name);
    $stmt->bindParam(":overview" , $overview);
    $stmt->bindParam(":website" , $website);
    $stmt->bindParam(":industry" , $industry);
    $stmt->bindParam(":cmp_size" , $cmp_size);
    $stmt->bindParam(":headquarters" , $headquarters);
    $stmt->bindParam(":special" , $special);
    $stmt->bindParam(":achieve" , $achieve);


    $stmt->execute();
    
    $pdo = null;
    $stmt = null;

    echo "<script>
        alert('Successfully updated');
        window.location.href = 'main.php';
        </script>";
    
    }

    catch(PDOException $e){
    die("Connection failed : ".$e->getMessage());
}





}