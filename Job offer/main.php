<?php 
require_once "job_model_inc.php";
require_once "job_view_inc.php";
require_once "..\\includes\\config_session_inc.php";
?>
<!Doctype html>
<html>
    <head>
        <link href = "main.css" rel = "stylesheet">
    </head>
    <body>
        <h2>Posted Jobs the job_name should be unique</h2>
        <p class = "post"><button class = "post_button"> &#43; Post New Job</button></p>
        <div class = "main_div">
            <?php display($results) ?>
        </div>
    </body>
</html>