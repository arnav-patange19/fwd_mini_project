<?php

function display($results){
    foreach ($results as $result){
        echo '<div class = "cart">';
        echo '<form action = "details.php" action = "POST">';
        echo '<h2>'.$result['job_name'].'</h2>';
        echo '<span class = "circles">'.$result['location'].'</span>';
        echo '<span class = "circles" >'.$result['job_type'].'</span>';
        echo '<span class = "circles" >'.$result['exp_yrs'].' years</span>';
        echo '<p>'.$result['about'].'</p>';
        echo 'Posted on <span>'.$result['posted_date'].'</span> &middot; <span>'.$result['applicants_count'].'</span> applicants';
        echo '<p><center><button class = "view">View Application and Details</button></center></p>';
        echo '</form>';
        echo '</div>';
    }
}