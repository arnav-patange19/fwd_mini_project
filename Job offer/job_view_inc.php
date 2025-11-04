<?php
$name = "prisha"; 
?>
<!doctype html>
<html>
    <head>
    </head>
    <body>
        <?php
        $name = "prisha"; 
        function display($results){
            foreach ($results as $result){
                echo '<div class = "cart">';
                echo '<h2>'.$result['job_name'].'</h2>';
                echo '<span class = "circles">'.$result['location'].'</span>';
                echo '<span class = "circles" >'.$result['job_type'].'</span>';
                echo '<span class = "circles" >'.$result['exp_yrs'].' years</span>';
                echo '<p>'.$result['about'].'</p>';
                echo 'Posted on <span>'.$result['posted_date'].'</span> &middot; <span>'.$result['applicants_count'].'</span> applicants';
                echo '<p><center><a href="details.php?name=' . urlencode($result['job_name']) . '" class="view">View Application and Details</a></center></p>';
                echo '</div>';
            }
        }
        ?>
    </body>
</html>