<?php
try{
    require_once "profile_contr.php";

    $experience = explode(".",$results['experience']);
    $education = explode(".",$results['education']);
    $skills = explode(".",$results['skills']);
    $achievement = explode(".",$results['achievements']);
    $goals = explode(".",$results['goals']);

}catch(PDOException $e){
    die("Connection failed : ".$e->getMessage());
}