<?php 
require_once "profile_model.php";
require_once "profile_contr.php";

?>
<!doctype html>
<html>
    <head>
        <link href = "profile.css" rel = "stylesheet">
    </head>
    <body>
        <div class = "main_div">
            <div class = "first_div">
                <div class = "section1">
                    <div class = "cmp_cover">
                        <img class ="cmp_cover_img" src = "<?php echo 'profile_img/' . $results['username'] . '_cover.jpeg'; ?>" style = "
                        height: 191px;
                        width:100%;
                        ">
                    </div>
                    <div class = "cmp_logo">
                        <img class = "cmp_logo_img" src = "<?php echo 'profile_img/' . $results['username'] . '.jpeg'; ?>" style = "
                        height: 208px;
                        width: 208px;
                        ">
                    </div>
                    <div class = "cmp_first_intro">
                        <h2> <?php echo $results['name'];?> </h2>
                        <p>Username : <?php echo $results['username'];?></p>
                        <p><?php echo $results['location'];?></p>
                    </div>
                </div> 
                <div class = "section2">
                    <h2>About</h2>
                    <p>
                       <?php echo $results['about'];?>
                    </p>
                </div>

                <div class = "section2">
                    <h2>Experience</h2>
                    <p>
                        <?php
                        foreach($experience as $y){
                            echo "<div class = experience>";
                            echo $y;
                            echo "</div>";
                            echo "<br>";
                        }
                        ?>
                    </p>
                </div>
                <div class = "section2">
                    <h2>Education</h2>
                    <p>
                        <?php
                        
                        foreach($education as $y){
                            echo "<div class = experience>";
                            echo $y;
                            echo "</div>";
                            echo "<br>";
                        }
                        ?>
                    </p>
                </div>
                <div class = "section2">
                    <h2>Skills</h2>
                    <p>
                        <?php
                        
                        foreach($skills as $y){
                            echo "<div class = experience>";
                            echo $y;
                            echo "</div>";
                            echo "<br>";
                        }
                        ?>
                    </p>
                </div>
                <div class = "section2">
                    <h2>Achievements</h2>
                    <p>
                        <?php
                        
                        foreach($achievement as $y){
                            echo "<div class = experience>";
                            echo $y;
                            echo "</div>";
                            echo "<br>";
                        }
                        ?>
                    </p>
                </div>
                <div class = "section2">
                    <h2>Goals</h2>
                    <p>
                        <?php
                        foreach($goals as $y){
                            echo "<div class = experience>";
                            echo $y;
                            echo "</div>";
                            echo "<br>";
                        }
                        ?>
                    </p>
                </div>
                
            </div>

            <div class = "second_div">
                <form action = "profile_edit.php">
                     <center><button class = "section3" class = "edit_profile"><h2>Edit Profile</h2></button></center>
                </form>
               
                <div class = "section2">
                    <h2>Personal Information</h2>
                    <h3>Email Id</h3>
                    <p><?php echo $results['email'];?></p>
                    <h3>Pronouns</h3>
                    <p><?php echo $results['pronouns'];?></p>
                    <h3>Resume</h3>
                    <p><embed src="
                    <?php
                    if($results['pdf'] ===1)
                     echo 'profile_pdf/' . $results['username'] . '.pdf'; 
                    else echo "";
                     ?>
                    " type="application/pdf" width="100%" height="400px" />
</p>
                </div>
            </div>
        </div>
    </body>
</html>